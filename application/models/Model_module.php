<?php







class Model_module extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function createModule($module){
       
        return  $this->db->insert('modules',$module);
    }
    public function updateModule($module_id,$updateValue){
       return  $this->db->where('id',$module_id)->update('modules',$updateValue);
    }
    public function getAllModulesByFormation($formationId){
        return $this->db
                    ->select('*')
                    ->from('modules')
                    ->where('formation_id',$formationId)
                    ->get()
                    ->result_array();
    }
    public function getModuleById($moduleId){
        return $this->db->select('*')->from('modules')->where('id',$moduleId)->get()->row_array();

    }
    public function getFormationGroupById($formationGroupId){
        return $this->db->select('*')
                                  ->from('formations_groupes')
                                  ->where('id',$formationGroupId)
                                  ->get()
                                  ->row_array();
    }
    public function getAllModulesBySeance($seanceId){
        return $this->db
                    ->select('*')
                    ->from('modules')
                    ->where('seance_id',$seanceId)
                    ->get()
                    ->result_array();
    }
    public function getSeanceById($id){
        
        return $this->db->select('*')->from('seances')->where('id',$id)->get()->row_array();


    }
    public function getDetailsModules($seanceId){
        $seance = $this->getSeanceById($seanceId);
        if(!$seance){
            return null;
        }
        return [
            'seance'=>$seance,
            'modules'=>$this->getAllModulesBySeance($seanceId)
        ];


    }
}