<?php


class Model_randezvous extends CI_Model
{
    function __construct()
    {
       parent::__construct();

    }
    public function getSeanceGroupById($id){
      return  $this->db->select('*')
                        ->from('seance_group')
                        ->where('id',$id)
                        ->get()
                        ->row_array();


    }
    public function getSeanceById($id){
      return  $this->db->select('*')
                        ->from('seances')
                        ->where('id',$id)
                        ->get()
                        ->row_array();


    }
    public function getValidToken($user_data){
          if(!isset($user_data['google_info']) || !$user_data['google_info']){
            return null;
          }
          return $this->db
                      ->select('*')
                      ->from('google_info')
                      ->where('id',$user_data['google_info'])
                      ->where('DATE_ADD(created_at, INTERVAL 3590 SECOND)>NOW()')
                      ->get()
                      ->row_array();     
    }
    public function getEnseignantsForRandezVous(){
      return $this->db
                  ->select('u.*,e.nom,e.prenom')
                  ->from('users u')
                  ->join('enseignant e','u.enseignant_id=e.id')
                  ->get()
                  ->result_array();
    }
    public function seperateAttendees($users_ids){
      $users = array();
      foreach($users_ids as $id){
        $users[]=$id;
      }
      $invitedUsers = $this->db->select('*')->from('users')->where_in('id',$users);
      $googleUsers = array();
      $withoutGoogle = array();
      foreach($invitedUsers as $u){
        if($u['google_info']){
          $googleUsers[]=$u['id'];
        }
        else{
          $withoutGoogle[]=$u['id'];
        }
      }
      return [
        'google'=>$googleUsers,
        'normal'=>$withoutGoogle
      ];
    }
    public function getGoogleEmails($seanceId){

        $seanceGroup = $this->getSeanceById($seanceId);
        $group_members = $this->db->select('DISTINCT(student_id) as etudiant_id')
                                  ->from('formations_students')
                                  ->where('formation_id',$seanceGroup['formation_id'])
                                  ->get()
                                  ->result_array();
        $studentIds = array()   ;
        foreach($group_members as $gm) {
            $studentIds[] = intval($gm['etudiant_id']);
        }
        $group_members = $this->db->select('u.*,gi.email as google_email')
                                  ->from('users u')
                                  ->join('google_info gi','u.google_info=gi.id')
                                  ->where_in('u.etudiant_id',$studentIds)
                                  ->get()
                                    ->result_array();
        if(count($group_members)!=count($studentIds)){
          return null;

        }
        
        $usersIds = array();                          
        $google_emails = array();
        foreach($group_members as $gm){
          $usersIds[] = $gm['id'];
          $google_emails[] = [
            'email'=>$gm['google_email']
          ];
        }
        return[
          'users_ids'=>$usersIds,
          'emails'=>$google_emails
        ];
    }
    public function setAttendees($users_ids,$randezVousId){
        $attendees = $this->seperateAttendees($users_ids);
        $randezVousUsers = array();
        foreach($attendees['google'] as $a){
            $randezVousUsers[]=[
              'user_id'=>$a,
              'recieved_invite'=>true,
              'randez_vous_id'=>$randezVousId,
              
            ];

        }
        foreach($attendees['normal'] as $a){
          $randezVousUsers[]=[
            'user_id'=>$a,
            'recieved_invite'=>false,
            'randez_vous_id'=>$randezVousId,
            
          ];

        }
       return $this->db->insert('randez_vous_users',$randezVousUsers);
    }
    public function getUsersIdsBySeanceGroup($seance_group_id){
          $seanceGroup = $this->getSeanceGroupById($seance_group_id);
          if(!$seanceGroup){
            return null;
          }
        $users = $this->db->select('u.id as user_id')
                            ->from('etudiants_groupes eg')
                            ->join('users u','eg.etudiant_id=u.etudiant_id')
                            ->where('eg.groupe_id',$seanceGroup['group_id'])
                            ->get()
                            ->result_array();
          $usersIds = array();
          foreach($users as $u){
            $usersIds[] = $u['user_id'];
          }
          return $usersIds;

    }
    public function createRandezVousUsers($randezVousId,$userIds){
      $randez_vous_users = array();
      foreach ($userIds as $id) {
        $randez_vous_users[] = [
          'user_id'=>$id,
          'randez_vous_id'=>$randezVousId
        ];
      }
      return $this->db->insert_batch('randez_vous_users',$randez_vous_users);

    }
    public function getUsersIdsBySeance($seanceId){
      $seance = $this->getSeanceById($seanceId) ;
      $group_members = $this->db->select('DISTINCT(student_id) as etudiant_id')
                                ->from('formations_students')
                                ->where('formation_id',$seance['formation_id'])
                                ->get()
                                ->result_array();
        $studentIds = array()   ;
        foreach($group_members as $gm) {
        $studentIds[] = intval($gm['etudiant_id']);
        }
        $group_members = $this->db->select('*')
              ->from('users')
              ->where_in('u.etudiant_id',$studentIds)
              ->get()
               ->result_array();
        $usersIds =array();
        foreach($group_members as $g){
          $usersIds[] =$g['id'];
        }
        return $usersIds;
    }
    public function createRandezVous($randezvous,$usersIds=null){
        $created = $this->db->insert('randez_vous',$randezvous);
        if($created){
          $randezvous_id = $this->db->insert_id();
          if(!$usersIds){
              $usersIds = $this->getUsersIdsBySeance($randezvous['seance_id']);

          }
          
          return $this->createRandezVousUsers($randezvous_id,$usersIds);
        }
        return false;

        
    }
    
    public function getRandezVousEnvoyes($date,$userId){
     
      return $this->db->select("concat(hour(date_debut),':',minute(date_debut)) as hour_min_deb,concat(hour(date_fin),':',minute(date_fin)) as hour_min_fin,titre,lieu,id,calender_link")
                        ->from('randez_vous')
                        ->where('added_by',$userId)
                        ->where('date(date_debut)',$date)
                        ->get()
                        ->result_array();
    }
    public function getRandezVousRecus($date,$user_id){
      return $this->db
                  ->select("concat(hour(r.date_debut),':',minute(r.date_debut)) as hour_min_deb,concat(hour(r.date_fin),':',minute(r.date_fin)) as hour_min_fin,r.titre,r.lieu,r.id,r.calender_link")
                  ->from('randez_vous_users rvu')
                  ->join('randez_vous r','rvu.randez_vous_id=r.id')  
                  ->where('date(r.date_debut)',$date)
                  ->where('rvu.user_id',$user_id)
                  ->get()
                  ->result_array();



    }
    public function findRandezVousById($id){
        return $this->db->select('*,date(date_debut) as calendarDate')->from('randez_vous')->where('id',$id)
                                      ->get()->row_array();
    }
  
    public function getAllRendezVous(){
      return $this->db->select('rv.*, concat(en.prenom, " ", en.nom) as nom_ref')
                      ->from('randez_vous rv')
                      ->join('enseignant en', 'rv.added_by = en.id','left')
                      ->get()->result_array();
    }
    public function prepareDetailsRandezVousPage($id) {
        $randezVous = $this->findRandezVousById($id);
        return [
          'randezVous'=>$randezVous
        ];


    }


}