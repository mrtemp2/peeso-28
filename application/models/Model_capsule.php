<?php







class Model_capsule extends CI_Model
{
    public function __construct()
    {
       parent::__construct();
    }
    public function add_capsule($insert_data){
        return $this->db->insert('capsules_videos', $insert_data);
    }
    public function fetch_data_capsule(){
        return $this->db->select('titre,id,id_video')->get('capsules_videos')->result_array();
    }
    public function getCapsule($id){
        return $this->db->select('titre,titre-en,id_video,id,published')->where('id',$id)->get('capsules_videos')->row_array();
    }
    public function update_capsule($id,$update_data){
        $this->db->where('id', $id);
        $status = $this->db->update('capsules_videos', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }

    }
    public function capsules_section(){
       return $this->db->order_by('created_at','asc')->get('capsules_videos',4)->result_array(); 
    }
    /*public function get_others_sections($id){
        return $this->db->where('id!=',$id)->get('news',3)->result_array(); 
    }*/
    public function remove_capsule($id){
        return $this->db->delete('capsules_videos', array('id' => $id));
    }
    public function fetchDataCapsulesFront($page,$limit){
        $query = $this->db->select('*')->from('capsules_videos');    
        $result =  $query->limit($limit,($page-1)*$limit)->get()->result_array();
        $count_query= $this->db->select('count(*) as nb')->from('capsules_videos')->get()->row_array();
        $total = $count_query['nb'];

        $numberOfPages = floor($total/$limit);
        if($total%$limit!=0){
           $numberOfPages++; 
        }
        return ['data'=>$result,'numberOfPages'=>$numberOfPages,'page'=>$page];
    }
   




}
