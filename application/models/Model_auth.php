<?php







class Model_auth extends CI_Model
{



    public function __construct()
    {



        parent::__construct();
    }
    public function changePhoto($userId,$photo){
         $updated = $this->db->where('id',$userId)->update('users',[
            'photo'=>$photo
         ]);   
         if(!$updated){
            return false;
         }
         return $this->getUserById($userId);
    }
    public function getUserById($userId){
        return $this->db
                    ->select('*')
                    ->from('users')
                    ->where('id',$userId)
                    ->get()
                    ->row_array();
    }
    public function changePassword($userId,$updatedData){
        $updated = $this->db->where('id',$userId)->update('users',$updatedData);   
        if(!$updated){
            return false;
         }
         return $this->getUserById($userId);

    }
    public function CreateEtudiant()
    {
        $insert_data = array(
            'cin' => $this->input->post('cin'),
            'email' => $this->input->post('email'),
            'prenom' => $this->input->post('prenom'),
            'nom' => $this->input->post('nom'),
            // 'pays' => $this->input->post('selectPays'),
            'etablissement_id' => $this->input->post('etablissement_id'),
            'phone' => $this->input->post('phone'),
            'ville' => $this->input->post('ville'),
            'adresse' => 'adresse',
            'code_postal' => $this->input->post('code_postal'),
        );
        $query = $this->db->insert('etudiants', $insert_data);

        if ($query) {
            // Récupérez l'ID de l'étudiant inséré
            $insert_id = $this->db->insert_id();

            // 2. Insérez l'ID de l'étudiant dans la table 'users'
            $insert_data_users = array(
                'username' => $this->input->post('cin'),
                'password' => $this->input->post('password'),
                'type' => 'Etudiant',
                'etudiant_id' => $insert_id, // Insérez l'ID de l'étudiant ici
            );

            $query = $this->db->insert('users', $insert_data_users);

            return $query;
        } else {
            return false; // Retournez false en cas d'échec de l'insertion dans 'etudiant'
        }
        
        
    }
    public function loginUser($username,$password){
        $user = $this->db->select('*')
                        ->from('users')
                         ->where('username',$username)
                        //  ->where('compte_incube',true)
                         ->get()
                         ->row_array();
        if($user && $user['password']==$password){
            return $user;
        }   
        else{
            return null;
        }                 
    }
    public function getUserInfo($user){
        if($user['type']=='Etudiant'){
            return $this->db->select('*')
            ->from('etudiants')
            ->where('id='.$user['etudiant_id'])
            ->get()
            ->row_array();
        }
        else if($user['type']=='Enseignant'){
            return $this->db->select('*')
            ->from('enseignant')
            ->where('id='.$user['enseignant_id'])
            ->get()
            ->row_array();
        }
         

    }
    public function getEnseignantInfo($user){
        return $this->db->select('*')
                        ->from('enseignant')
                        ->where('id='.$user['enseignant_id'])
                        ->get()
                        ->row_array();

    }
    public function createGoogleInfoForUser($info,$user_id){
              $inserted= $this->db
                        ->insert('google_info',$info);
              if($inserted){
                    $info_id = $this->db->insert_id();
                    $updated =  $this->db->where('id',$user_id)
                            ->update('users',['google_info'=>$info_id]);
                     if($updated){
                        return $info_id;
                     }
                     return false;
              }else{
                 return false;
              }         
    }
    public function findOrCreateUserInfo($user_id,$info){
          $user = $this->db->select('*')
                              ->from('users')
                              ->where('id',$user_id)
                              ->get()
                              ->row_array();
            if(!$user['google_info']){
                return $this->createGoogleInfoForUser($info,$user_id); 
            }
            else{
                $updated =  $this->db
                        ->where('id',$user['google_info'])
                        ->update('google_info',[
                            'email'=>$info['email'],
                            'expires_in'=>$info['expires_in'],
                            'access_token'=>$info['access_token'],
                            'created_at'=>$info['created_at']
                        ]);
                  return  $user['google_info'] ;

                       
            }
    }
    
    public function fetchStructureData()
    {
        $query = $this->db->select('u.*, sa.*')
                        ->from('users u')
                        ->join('structure_appui sa', 'u.structure_id = sa.id')
                        ->get();
        return $query->result_array();
    }

    public function getStructure($id)
    {
        // Fetch the tuteur's details
        $this->db->select('u.username,u.password, sa.*');
        $this->db->from('users u');
        $this->db->join('structure_appui sa', 'u.structure_id = sa.id');
        $this->db->where('sa.id', $id);
        $query = $this->db->get();
        $structure = $query->row_array(); // Get tuteur data
    
        
           return [
                'structure'=>$structure,
            ];
        
    }

    public function updateStructureData($userId)
    {
        $validator = array('success' => false, 'message' => array());
    
        // Validation rules
        $this->form_validation->set_rules('editnom', 'Nom', 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\- ]+$/]');
        $this->form_validation->set_rules('editprenom', 'Prénom', 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\- ]+$/]');
        $this->form_validation->set_rules('editemail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('editaffiliation', 'Affiliation', 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\- ]+$/]');
        $this->form_validation->set_rules('editusername', 'Username', 'required|regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.]+$/u]');
        $this->form_validation->set_rules('editpassword', 'Mot de passe ', 'regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]');
        $this->form_validation->set_rules('editconfirmpassword', 'Confirmez le mot de passe ', 'matches[editpassword]');
    
        if ($this->form_validation->run() === true) {
            // Start database transaction
            $this->db->trans_start();
    
            // Prepare update data for `enseignant`
            $update_data_enseignant = array(
                'nom'      => $this->input->post('editnom'),
                'prenom'   => $this->input->post('editprenom'),
                'email'    => $this->input->post('editemail'),
                'affiliation' => $this->input->post('editaffiliation'),
                'id_etab' => $this->input->post('editetab')
            );
    
            $this->db->where('id', $userId);
            $status_enseignat = $this->db->update('enseignant', $update_data_enseignant);
    
            // Prepare update data for `users`
            $update_data_users = array(
                'username' => $this->input->post('editusername'),
                // Only update password if it's being changed
                'password' => !empty($this->input->post('editpassword')) ? $this->input->post('editpassword') : null,
                'role_referent'     => $this->input->post('editrole'),
            );
    
            $this->db->where('enseignant_id', $userId);
            $status_users = $this->db->update('users', $update_data_users);
    
            // Update the domaines (many-to-many relationship)
            $domaines = $this->input->post('editdomaine');
            $this->db->where('id_tuteur', $userId);
            $this->db->delete('tuteur_domaine');
    
            // Insert new domaines
            if (!empty($domaines)) {
                foreach ($domaines as $d_id) {
                    $this->db->insert('tuteur_domaine', [
                        'id_tuteur' => $userId,
                        'id_domaine' => $d_id
                    ]);
                }
            }
    
            // Complete transaction
            $this->db->trans_complete();
    
            if ($this->db->trans_status() === false) {
                $validator['message'] = 'Échec de la mise à jour du tuteur.';
                return false;
            }
    
            if ($status_enseignat && $status_users) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la mise à jour du tuteur.';
                return false;
            }
        } else {
            $validator['message'] = validation_errors();
            return false;
        }
    }

    public function updateProfileEnseignant($referentId,$userId,$updateData){
        $updated = $this->db->where('id',$referentId)
                            ->update('enseignant',$updateData);
        if(!$updated){
            return false; 
        } 
        return $this->getUserById($userId);                   
    }
    public function updateProfileEtudiant($studentId,$userId,$updateData){
        $updated = $this->db->where('id',$studentId)
                            ->update('etudiants',$updateData);
        if(!$updated){
            return false; 
        } 
        return $this->getUserById($userId);                    
    }
  
}