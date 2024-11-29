<?php







class Model_livrable extends CI_Model
{



    public function __construct()
    {



        parent::__construct();
    }
    public function getParameterLivrableInitiateur($seanceId){
        $seance = $this->db->select('*')->from('seance_initiateur')
                                        ->where('id',$seanceId) 
                                         ->get()
                                         ->row_array() ;
        if(!$seance){
            return null;
         }                                 
        $parameters= $this->db->select('*')
                        ->from('parameter_livrables_initiateur')
                        ->where('id_attribution_seance',$seance['id_attribution_seance'])
                        ->get()
                        ->result_array();
         return [
            'seance'=>$seance,
            'livrables'=>$parameters
         ];               
    }
    public function createLivrable($seanceId,$livrables){
        $deleted = $this->db->where('seance_id',$seanceId)->delete('livrable_initiateur');
        return $this->db->insert_batch('livrable_initiateur',$livrables);
    }
    public function getCreatedLivrable($seanceId){
        return  $this->db->select('*')->from('livrable_initiateur')->where('seance_id',$seanceId)->get()->result_array();


    }
    public function getParameterLivrableInnovateur($seanceId){
        $seance = $this->db->select('*')->from('seance_innovateur')
                                        ->where('id',$seanceId) 
                                         ->get()
                                         ->row_array() ;
        if(!$seance){
            return null;
         }                                 
        $parameters= $this->db->select('*')
                        ->from('parameter_livrables_innovateur')
                        ->where('id_attribution_seance',$seance['id_attribution_seance'])
                        ->get()
                        ->result_array();
         return [
            'seance'=>$seance,
            'livrables'=>$parameters
         ];               
    }
    public function createLivrableInnovateur($seanceId,$livrables){
        $deleted = $this->db->where('seance_id',$seanceId)->delete('livrable_innovateur');
        return $this->db->insert_batch('livrable_innovateur',$livrables);
    }
       // $info = $this->model_livrable->getCreatedLivrableInnovateur($seanceId);
    public function getCreatedLivrableInnovateur($seanceId){

        return  $this->db->select('*')->from('livrable_innovateur')->where('seance_id',$seanceId)->get()->result_array();
    }
    public function getParameterLivrablePromoteur($seanceId){
        $seance = $this->db->select('*')->from('seance_promoteur')
                                        ->where('id',$seanceId) 
                                         ->get()
                                         ->row_array() ;
        if(!$seance){
            return null;
         }                                 
        $parameters= $this->db->select('*')
                        ->from('parameter_livrables_promoteur')
                        ->where('id_attribution_seance',$seance['id_attribution_seance'])
                        ->get()
                        ->result_array();
         return [
            'seance'=>$seance,
            'livrables'=>$parameters
         ];               
    }
    public function createLivrablePromoteur($seanceId,$livrables){
        $deleted = $this->db->where('seance_id',$seanceId)->delete('livrable_promoteur');
        return $this->db->insert_batch('livrable_promoteur',$livrables);
    }
       // $info = $this->model_livrable->getCreatedLivrableInnovateur($seanceId);
    public function getCreatedLivrablePromoteur($seanceId){

        return  $this->db->select('*')->from('livrable_promoteur')->where('seance_id',$seanceId)->get()->result_array();
    }

}
