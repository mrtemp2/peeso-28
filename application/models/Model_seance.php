<?php







class Model_seance extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createSeance($seance){
        $last_seance = $this->getLastSeanceFormation($seance['formation_id']);    
        if($last_seance['last_order']){
            $seance['ordre'] = intval($last_seance['last_order'])+1;
        }
        else{
            $seance['ordre'] = 1;
        }
        return  $this->db->insert('seances',$seance);
    }
    public function createSeanceCoaching($seance){
        $last_seance = $this->getLastSeanceCoaching($seance['coaching_id']);    
        if($last_seance['last_order']){
            $seance['ordre'] = intval($last_seance['last_order'])+1;
        }
        else{
            $seance['ordre'] = 1;
        }
        return  $this->db->insert('seances',$seance);
    }
    public function updateSeance($seance_id,$updateData){
        return $this->db->where('id',$seance_id)->update('seances',$updateData);
    }
    public function getLastSeanceFormation($formationId){
       return $this->db->select('max(ordre) as last_order')
                ->from('seances')
                ->where('formation_id',$formationId)
                ->get()
                ->row_array();


    }
    public function getLastSeanceCoaching($coachingId){
        return $this->db->select('max(ordre) as last_order')
                 ->from('seances')
                 ->where('coaching_id',$coachingId)
                 ->get()
                 ->row_array();
 
 
    }
    public function getAllSeanceByFormation($formationId){
       return  $this->db
                    ->select("*,DATE_FORMAT(date_debut, '%W, %d %M, %Y') AS formatted_date_debut,date(date_debut) date_debut_day")  
                    ->from('seances')
                    ->where('formation_id',$formationId)
                    ->get()
                    ->result_array();


    }
    public function getAllSeanceByCoaching($coachingId){
        return  $this->db
                     ->select("*,DATE_FORMAT(date_debut, '%W, %d %M, %Y') AS formatted_date_debut,date(date_debut) date_debut_day")  
                     ->from('seances')
                     ->where('coaching_id',$coachingId)
                     ->get()
                     ->result_array();
 
 
     }
    public function getSeanceById($id){
        
        return $this->db->select('*')->from('seances')->where('id',$id)->get()->row_array();


    }
    public function getFormationGroupById($formationGroupId){
        return $this->db->select('*')
                                  ->from('formations_groupes')
                                  ->where('id',$formationGroupId)
                                  ->get()
                                  ->row_array();
    }
    public function getCoachingGroupById($coachingGroupId){
        return $this->db->select('*')
                                  ->from('coaching_groupes')
                                  ->where('id',$coachingGroupId)
                                  ->get()
                                  ->row_array();
    }
    public function getDetailsSeances($formationId){

            return [
                'seances'=>$this->getAllSeanceByFormation($formationId),
            ];
    }
    public function getDetailsSeancesCoaching($coachingId){

        return [
            'seances'=>$this->getAllSeanceByCoaching($coachingId),
        ];
}
    public function getGroupeSeance($seanceId,$groupeId){
        	
        return  $this->db->select('*')
                        ->from('seance_group')
                        ->where('seance_id',$seanceId)
                        ->where('group_id',$groupeId)
                        ->get()
                        ->row_array();
                                        


    }
    public function getRandezVous($seanceGroupId){
        return $this->db->select('*')->from('randez_vous')->where('seance_id',$seanceGroupId)->get()->row_array();

    }
    public function getSingleSeance($seanceId){
        $info =[
            'seance'=>null,
            'randezVous'=>null
        ];
        $seance = $this->getSeanceById($seanceId);
        if($seance){
             $info['seance'] = $seance;  
             $randezVous = $this->getRandezVous($seance['id']);
            if($randezVous){
                $info['randezVous']  =$randezVous;
            }
             return $info;  
        }
        else{
            return null;
        }
    }
    public function startSeance($seanceId,$formation_group_id){
        $seance = $this->getSeanceById($seanceId);
        $formationGroup = $this->getFormationGroupById($formation_group_id);
        if($formationGroup && $seance){
            $groupeId = $formationGroup['groupe_id'];
            $seanceGroupe = $this->getGroupeSeance($seanceId,$groupeId); 
            if($seanceGroupe){
                return false;
            }
            else{
                return $this->db->insert('seance_group',[
                    'seance_id'=>$seanceId,
                    'group_id'=>$groupeId,
                    'started'=>true
                ]);
            }
        }
    }
    public function startSeanceCoaching($seanceId,$coaching_group_id){
        $seance = $this->getSeanceById($seanceId);
        $coachingGroup = $this->getCoachingGroupById($coaching_group_id);
        if($coachingGroup && $seance){
            $groupeId = $coachingGroup['groupe_id'];
            $seanceGroupe = $this->getGroupeSeance($seanceId,$groupeId); 
            if($seanceGroupe){
                return false;
            }
            else{
                return $this->db->insert('seance_group',[
                    'seance_id'=>$seanceId,
                    'group_id'=>$groupeId,
                    'started'=>true
                ]);
            }
        }
    }
    public function createEchange($echange){
        return $this->db->insert('echanges',$echange);
    }
    public function fetchExchanges($seance_id,$type='formation'){
        if($type=='formation'){
            return  $this->db->select('e.id as id_teacher,DATE_FORMAT(ech.created_at, "%W le %d, %M")  as number_of_days,e.nom as nom_teacher,e.prenom as prenom_teacher,et.id as id_studient,et.nom as nom_student,et.prenom as prenom_student,u.photo as photo_student,ech.sender,ech.comment,ech.rapport')
            ->from('echanges ech')
            ->join('enseignant e','ech.enseignant_id=e.id','left')
            ->join('etudiants et','ech.etudiant_id=et.id','left')
            ->join('users u','ech.sender=u.id')
            ->where('ech.seance_id',$seance_id)
            ->order_by('ech.created_at','ASC')
            ->get()
            ->result_array();
        }
        else{
            return ;
    
        }
    }
    public function getReferentByFormation($formationId){
            return $this->db->select('e.*,case when u.photo is null then concat("default.","jpg") else u.photo end as profile_picture')
                            ->from('formations f')
                            ->join('enseignant e','f.referent_id=e.id')
                            ->join('users u','e.id=u.enseignant_id')
                            ->where('f.id',$formationId)
                            ->get()
                            ->row_array();


    }
    public function prepareExchangesPage($seanceId){
        $seance = $this->getSeanceById($seanceId);
        if(!$seance){
            return null;
        }
        $members = $this->db
                        ->select('e.*,case when u.photo is null then concat("default.","jpg") else u.photo end as profile_picture')
                        ->from('formations_students fs')
                        ->join('etudiants e','fs.student_id=e.id')
                        ->join('users u','e.id=u.etudiant_id')
                        ->where('fs.formation_id',$seance['formation_id'])
                        ->get()
                        ->result_array();

       
        $referent = $this->getReferentByFormation($seance['formation_id']);
                       return [
            'seance'=>$seance,
            'members'=>$members,
            'referent'=>$referent
        ];
    }
    

    
    

    
    
    
}
