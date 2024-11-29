<?php







class Model_activity extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createActivity($activity){
       
        return  $this->db->insert('activities',$activity);
    }
    public function updateActivity($activity_id,$updateValue){
       return  $this->db->where('id',$activity_id)->update('activities',$updateValue);
    }
    public function getAllActivitiesByFormation($formationId){
        return $this->db
                    ->select('*')
                    ->from('activities')
                    ->where('formation_id',$formationId)
                    ->get()
                    ->result_array();
    }
    public function getActivityById($moduleId){
        return $this->db->select('*')->from('activities')->where('id',$moduleId)->get()->row_array();
    }
    public function getFormationGroupById($formationGroupId){
        return $this->db->select('*')
                                  ->from('formations_groupes')
                                  ->where('id',$formationGroupId)
                                  ->get()
                                  ->row_array();
    }
    public function getAtivitiesBySeanceId($seanceId){
        return $this->db->select('*')
                                  ->from('activities')
                                  ->where('seance_id',$seanceId)
                                  ->get()
                                  ->result_array();
    }
    public function getDetailsActivitiesEtudiant($seanceId,$etudiant_id){
            $seance = $this->getSeanceById($seanceId);
            if($seance){
                return [
                    'activities'=>$this->getAtivitiesBySeanceId($seanceId),
                    'activity_status'=>$this->getActivityStatus($etudiant_id,$seanceId)
                ];
            }
            else{
                return null;
            }
    }
    public function getActivityStatus($etudiant_id,$seance_id){
            $activity_students = $this->db->select("a.id,ea.document,DATE_FORMAT(created_at, '%W, %d %M, %Y') AS date_remis")
                                         ->from('etudiants_activities ea')
                                         ->join('activities a','ea.activity_id=a.id')
                                         ->where('ea.etudiant_id',$etudiant_id)   
                                         ->where('a.seance_id',$seance_id)
                                         ->get()
                                         ->result_array();
            $activityStudents = array() ;
            foreach($activity_students as $as) {
                $activityStudents[$as['id']] = [
                    'document'=>$as['document'],
                    ''
                ];
            } 
            return  $activityStudents  ;                        
    }
    public function getEtudiantActivity($activityId,$etudiantId){
        return $this->db->select('*')->from('etudiants_activities')->where('etudiant_id',$etudiantId)->where('activity_id',$activityId)->get()->row_array();
    }
    public function prepareDetailsActivityPage($activityId,$etudiant_id){
        $activity = $this->getActivityById($activityId);
        if(!$activity){
            return null;
        }
        return [
            'activity'=>$activity,
            'activity_status'=>$this->getEtudiantActivity($activityId,$etudiant_id)
        ];
    }
    public function getDevoir($etudiantId,$activity_id){
        return $this->db
                    ->select('*')    
                    ->from('etudiants_activities')
                    ->where('etudiant_id',$etudiantId)
                    ->where('activity_id',$activity_id)
                    ->get()
                    ->row_array();
        
    }
    public function livrerDevoir($etudiant_activity){
        $exitant = $this->getDevoir($etudiant_activity['etudiant_id'],$etudiant_activity['activity_id']);
        if($exitant) {
                return $this->db->where('id',$exitant['id'])->update('etudiants_activities',$etudiant_activity);
        }
        else{
            return $this->db->insert('etudiants_activities',$etudiant_activity);

        }


    }
    public function getSeanceById($id){
        
        return $this->db->select('*')->from('seances')->where('id',$id)->get()->row_array();


    }
    public function getDetailsActivity($seanceId){
        $seance = $this->getSeanceById($seanceId);
        if(!$seance){
            return null;

        }
        
        else{
            return [
                'seance'=>$seance,
                'activities'=>$this->getAtivitiesBySeanceId($seanceId),
            ];
        }
       
    }
    public function getSingleActivityReferent($activityId){
        $activity = $this->getActivityById($activityId);
        if($activity){
           $livrables =  $this->db->select("e.*,DATE_FORMAT(ea.created_at, '%W, %d %M, %Y') AS date_remis,ea.document,case when u.photo is null then concat('default.','jpg') else u.photo end as profile_picture")
                            ->from('etudiants_activities ea')
                            ->join('etudiants e','ea.etudiant_id=e.id')
                            ->join('users u','e.id=u.etudiant_id')
                            ->where('ea.activity_id',$activityId)
                            ->get()
                            ->result_array();
            return [
                'student_activities'=>$livrables
            ]                ;
        }
        else{
            return null;
        }        
    }

}