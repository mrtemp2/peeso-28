<?php


class Model_fiche extends CI_Model
{
    function __construct()
    {
       parent::__construct();

    }
    public function createLangues($formations){
        return $this->db->insert_batch('langues',$formations);
       
       }  
    public function createFormations($formations){
     return $this->db->insert_batch('formations',$formations);
    
    }  
    public function createCertificat($formations){
        return $this->db->insert_batch('certificats',$formations);
    }  
    public function createParcours($formations){
        try{
            return $this->db->insert_batch('parcours',$formations);
        }catch(Exception $e){
            throw $e;
        }
    }
    public function findCertificatBy($critere){
        $query = $this->db->select('*')
                          ->from('certificats');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['nom']) && $critere['nom']){
            $query =$query->where('nom',intval($critere['nom']));
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }
  
    public function findParcoursBy($critere){
        $query = $this->db->select('*')
                          ->from('parcours');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['etablissement_id']) && $critere['etablissement_id']){
            $query =$query->where('etablissement_id',intval($critere['etablissement_id']));
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }
    public function findFormationBy($critere){
        $query = $this->db->select('*')
                          ->from('formations');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['nom']) && $critere['nom']){
            $query =$query->where('nom',$critere['nom']);
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }
    public function findLanguesBy($critere){
        $query = $this->db->select('*')
                          ->from('langues');
        if(isset($critere['id']) &&$critere['id'] ){
            $query =$query->where('id',intval($critere['id']));
        }
        if(isset($critere['nom']) && $critere['nom']){
            $query =$query->where('nom',$critere['nom']);
        }
        if(isset($critere['etudiant_id']) && $critere['etudiant_id']){
            $query =$query->where('etudiant_id',intval($critere['etudiant_id']));
        }
        return $query->get()->row_array();
    }

    public function getEtablissement()
    {
        return $this->db->select('*')
                        ->from('etablissements')
                        ->where('active',true)
                        ->get()
                        ->result_array();
        
    }
    public function getParcoursEtudiant($id_etudiant){
        return $this->db->select('p.*,e.nom as etablissement')
                        ->from('parcours p')
                        ->join('etablissements e','p.etablissement_id=e.id')
                        ->where('etudiant_id',$id_etudiant)
                        ->get()
                        ->result_array();
    }
    public function deleteParcours($idcert,$id_etudiant){
        return $this->db->where('id',intval($idcert))
                        ->where('etudiant_id',intval($id_etudiant))
                        ->delete('parcours');    

    }
    public function getLanguesEtudiant($id_etudiant){
        return $this->db->select('*')
                        ->from('langues')
                        ->where('etudiant_id',$id_etudiant)
                        ->get()
                        ->result_array();
    }
    public function deleteLangue($idcert,$id_etudiant){
        return $this->db->where('id',intval($idcert))
                        ->where('etudiant_id',intval($id_etudiant))
                        ->delete('langues');    

    }
    public function getFormationsEtudiant($id_etudiant){
        return $this->db->select('*')
                        ->from('formations')
                        ->where('etudiant_id',$id_etudiant)
                        ->get()
                        ->result_array();
    }
    public function deleteFormation($idcert,$id_etudiant){
        return $this->db->where('id',intval($idcert))
                        ->where('etudiant_id',intval($id_etudiant))
                        ->delete('formations');    

    }
    public function getCertificatsEtudiant($id_etudiant){
        return $this->db->select('*')
                        ->from('certificats')
                        ->where('etudiant_id',$id_etudiant)
                        ->get()
                        ->result_array();
    }
    public function deleteCertificat($idcert,$id_etudiant){
        return $this->db->where('id',intval($idcert))
                        ->where('etudiant_id',intval($id_etudiant))
                        ->delete('certificats');    

    }
    public function updateFormationEtudiant($id,$etudiant_id,$data){
           return  $this->db
                 ->where('etudiant_id',intval($etudiant_id))
                 ->where('id',intval($id))
                 ->update('formations',$data);   

    }
    public function updateParcoursEtudiant($id,$etudiant_id,$data){
        return  $this->db
              ->where('etudiant_id',intval($etudiant_id))
              ->where('id',intval($id))
              ->update('parcours',$data);   

    }
    public function updateLangueEtudiant($id,$etudiant_id,$data){
        return  $this->db
              ->where('etudiant_id',intval($etudiant_id))
              ->where('id',intval($id))
              ->update('langues',$data);   
    }
    public function updateCertificatEtudiant($id,$etudiant_id,$data){
        return  $this->db
            ->where('etudiant_id',intval($etudiant_id))
            ->where('id',intval($id))
            ->update('certificats',$data);       

    }

   

    public function fetchEtudiantData()
    {
        $query = $this->db->select('u.*, et.*')
                        ->from('users u')
                        ->join('etudiants et', 'u.etudiant_id = et.id')
                        ->get();
        return $query->result_array();
    }

    public function getEtudiant($id)
    {
        // Fetch the etudiant's details
        $this->db->select('u.*, etu.*, et.nom as nom_etab, et.id as id_etab');
        $this->db->from('users u');
        $this->db->join('etudiants etu', 'u.etudiant_id = etu.id');
        $this->db->join('etablissements et', 'etu.etablissement_id = et.id');
        $this->db->where('etu.id', $id);
        $query = $this->db->get();
        $etudiant = $query->row_array(); // Get etudiant data
    
        return $etudiant; // Return the etudiant details with domain IDs and names
    }

    
    public function updateTuteurData($userId)
    {
        $validator = array('success' => false, 'message' => array());
    
        // Validation rules
        $this->form_validation->set_rules('editnom', 'Nom', 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\- ]+$/]');
        $this->form_validation->set_rules('editprenom', 'Prénom', 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ\'\- ]+$/]');
        $this->form_validation->set_rules('editcin', 'cin', 'trim|required|regex_match[/^[0-9]{8}$/]');
        $this->form_validation->set_rules('editphone', 'phone', 'trim|required|regex_match[/^[0-9]{8}$/]');
        $this->form_validation->set_rules('editemail', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('editville', 'ville', 'required|regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.\-]+$/u]');
        $this->form_validation->set_rules('editadresse', 'adresse', 'required|regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.\-]+$/u]');
        $this->form_validation->set_rules('editcodepostal', 'code postal', 'trim|required|regex_match[/^[0-9]{1,8}$/]');
        $this->form_validation->set_rules('editniveau', 'niveau', 'required|regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.\-]+$/u]');
        $this->form_validation->set_rules('editusername', 'Username', 'required|regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.]+$/u]');
        $this->form_validation->set_rules('editpassword', 'Mot de passe ', 'regex_match[/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/]');
        $this->form_validation->set_rules('editconfirmpassword', 'Confirmez le mot de passe ', 'matches[editpassword]');
    
        if ($this->form_validation->run() === true) {
            // Start database transaction
            $this->db->trans_start();
    
            // Prepare update data for `étudiant`
            $update_data_etudiant = array(
                'nom'      => $this->input->post('editnom'),
                'prenom'   => $this->input->post('editprenom'),
                'cin' => $this->input->post('editcin'),
                'phone' => $this->input->post('editphone'),
                'email'    => $this->input->post('editemail'),
                'ville' => $this->input->post('editville'),
                'adresse' => $this->input->post('editadresse'),
                'code_postal' => $this->input->post('editcodepostal'),
                'niveau' => $this->input->post('editniveau'),
                'etablissement_id' => $this->input->post('editetab')
            );
    
            $this->db->where('id', $userId);
            $status_enseignat = $this->db->update('etudiants', $update_data_etudiant);
    
            // Prepare update data for `users`
            $update_data_users = array(
                'username' => $this->input->post('editusername'),
                // Only update password if it's being changed
                'password' => !empty($this->input->post('editpassword')) ? $this->input->post('editpassword') : null,
            );
    
            $this->db->where('etudiant_id', $userId);
            $status_users = $this->db->update('users', $update_data_users);
    
            // Complete transaction
            $this->db->trans_complete();
    
            if ($this->db->trans_status() === false) {
                $validator['message'] = 'Échec de la mise à jour de l\'étudiant.';
                return false;
            }
    
            if ($status_enseignat && $status_users) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la mise à jour de l\'étudiant.';
                return false;
            }
        } else {
            $validator['message'] = validation_errors();
            return false;
        }
    }


    public function removeEtudiant($subjectId = null)
    {
        if ($subjectId) {
            $this->db->where('id', $subjectId);
            $result = $this->db->delete('etudiants');
            $this->db->where('etudiant_id', $subjectId);
            $result = $this->db->delete('users');
            return ($result === true ? true : false);
        }
    }


    public function updateProfile($userId = null)
	{
		if ($userId) {
			$update_data = array(
				'username' => $this->input->post('username'),
			);

			$this->db->where('id', $userId);
			$status = $this->db->update('users', $update_data);
			
			if ($status) {
				return array('success' => true, 'message' => 'Modifié avec succès');
			} else {
				return array('success' => false, 'message' => 'Erreur lors de la mise à jour du profil.');
			}
			
		}

		return array('success' => false, 'message' => 'ID utilisateur non valide.');
	}

    public function changePhoto($userId, $photoFileName)
	{
		if ($userId) {
			$update_data = array(
				'photo' => $photoFileName
			);

			$this->db->where('id', $userId);
			$status = $this->db->update('users', $update_data);

			if ($status) {
				return array('success' => true, 'message' => 'Modifié avec succès');
			} else {
				return array('success' => false, 'message' => 'Erreur lors de la mise à jour du profil.');
			}

		} else {
            return array('success' => false, 'message' => 'ID utilisateur non valide.');
        }
	}

    public function changePassword($user_id = null)
	{
		if ($user_id) {
			$new_hashed_Password = $this->input->post('newPassword');
	
            // Mettre à jour le mot de passe 
            $update_data = array(
                'password' => $new_hashed_Password
            );
            $this->db->where('id', $user_id);
            $status = $this->db->update('users', $update_data);

            return ($status == true);	
		}
		return false;
		
	}

    public function getStoredPassword($userId)
	{
		// Remplacez "users" par le nom de votre table d'utilisateurs si nécessaire
		$query = $this->db->select('password')->where('id', $userId)->get('users');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row->password;
		} else {
			return false; // Gérer le cas où l'utilisateur n'est pas trouvé
		}
	}







}