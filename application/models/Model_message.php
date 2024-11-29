<?php







class Model_message extends CI_Model
{



    private $enseignantsRoles = array('coach');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_fiche');
        
    }
    public function setMessageReciever($message_recievers){

       return  $this->db
             ->insert_batch('messages_users_peeso',$message_recievers)  ; 

    }
    public function getUsersMessages($student_ids,$message){
        $int_st_ids = array();
        foreach($student_ids as $s){
            $int_st_ids[]=intval($s);
        }
        $reciever_type_key = 'etudiant_id';
        if(in_array($message['type_reciever'],$this->enseignantsRoles)){
            $reciever_type_key='enseignant_id';
        }
        $users = $this->db
                      ->select('id')  
                      ->from('users')  
                      ->where_in($reciever_type_key,$int_st_ids)
                      ->get()  
                      ->result_array();
        $message_recievers = array();
        foreach($users as $u){
                $message_recievers[]=[
                    'user_id'=>$u['id'],
                    'message_id'=>$message['id'],
                    'type_sender'=>$message['type_sender'],
                     'type_reciever'=>$message['type_reciever'],
                ];
        }     
        return $message_recievers;              
    }
    public function getUsersForMessages($recieverType,$role=null){
        if($recieverType=='Etudiant'){
            return $this->db->select('*')
                        ->from('etudiants')
                        ->get()
                        ->result_array();
        }
        else if($recieverType=='Enseignant'){
            return $this->db
                        ->select('*')
                        ->from('enseignant')
                        
                        ->where('role',$role)
                        ->get()
                        ->result_array();
        }
    }
    public function findOneMessage($id){
        return $this->db
                    ->select('*')
                    ->from('messages_peeso')
                    ->where('id',$id)
                    ->row_array();
    }
    public function createMessage($message){
       $created = $this->db
       ->insert('messages_peeso',$message);
       if(!$created){

        return false;
       }
        return $this->db->insert_id() ;
    }
    public function getSentMessages($sender_id,$type_reciever){
        return $this->db
                     ->select('m.*')
                      ->from('messages_peeso m')     
                     ->where('m.sender_id',$sender_id)
                     ->where('m.type_receiver',$type_reciever);
    }
    public function getRecievedMessages($reciever_id,$type_sender){
        return $this->db
                     ->select('m.*')
                      ->from('messages_users_peeso mu')     
                     ->where('mu.user_id',$reciever_id)
                     ->where('mu.type_sender',$type_sender)
                     ->join('messages m','mu.message_id=m.id')
                     ;

    }



    
  



    
}