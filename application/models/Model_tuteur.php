<?php







class Model_tuteur extends CI_Model
{



    public function __construct()
    {
        parent::__construct();
    }

    public function createTiteur()
    {
        // Validate if at least one domaine is selected
        $domaines = $this->input->post('domaine');
        if (count($domaines) == 0) {
            return ['success' => false, 'message' => 'Vous devez sélectionner au moins un domaine'];
        }

        // Prepare insert data for 'enseignant'
        $insert_data = array(
            'nom' => $this->input->post('nom'),
            'prenom' => $this->input->post('prenom'),
            'email' => $this->input->post('email'),
            'affiliation' => $this->input->post('affiliation'),
            
        );

        // Insert into 'enseignant' table
        $query = $this->db->insert('enseignant', $insert_data);

        if ($query) {
            // Get inserted 'enseignant' ID
            $insert_id = $this->db->insert_id();
            
           $type_enseignant = 'Enseignant';
           
            // Insert data into 'users' table
            $insert_data_users = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'type' => $type_enseignant,
                'enseignant_id' => $insert_id, // Insert the 'enseignant' ID here
                'role_referent' => 'academique',
                'compte_incube'=>true

            );
            
            $query_users = $this->db->insert('users', $insert_data_users);

            // Check if the 'users' insertion was successful
            if ($query_users) {
                // Insert domains for the tuteur
                $tuteur_domaine = array();
                foreach ($domaines as $t) {
                    $tuteur_domaine[] = [
                        'id_tuteur' => $insert_id,
                        'id_domaine' => $t,
                    ];
                }

                // Insert batch into 'tuteur_domaine' table
                $query_domaine = $this->db->insert_batch('tuteur_domaine', $tuteur_domaine);

                if ($query_domaine) {
                    return ['success' => true, 'message' => 'Insertion réussie'];
                } else {
                    return ['success' => false, 'message' => 'Erreur lors de l\'insertion des domaines'];
                }
            } else {
                return ['success' => false, 'message' => 'Erreur lors de l\'insertion de l\'utilisateur'];
            }
        } else {
            return ['success' => false, 'message' => 'Erreur lors de l\'insertion de l\'enseignant'];
        }
    }

  
    public function fetchTuteurData()
    {
        $query = $this->db->select('u.*, en.*')
                        ->from('users u')
                        ->join('enseignant en', 'u.enseignant_id = en.id')
                        ->get();
        return $query->result_array();
    }


    public function updateTuteurData($userId)
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

    public function removeTuteur($subjectId = null)
    {
        if ($subjectId) {
            $this->db->where('id', $subjectId);
            $result = $this->db->delete('enseignant');
            $this->db->where('enseignant_id', $subjectId);
            $result = $this->db->delete('users');
            return ($result === true ? true : false);
        }
    }
    public function getTuteurProfile($id)
    {
        // Fetch the tuteur's details
        $this->db->select('u.username,u.password, en.*');
        $this->db->from('users u');
        $this->db->join('enseignant en', 'u.enseignant_id = en.id');
        $this->db->where('en.id', $id);
        $query = $this->db->get();
        $tuteur = $query->row_array(); // Get tuteur data
    
        if ($tuteur) {
           $refrentDomaines = $this->db->select('d.*')->from('tuteur_domaine td')->join('domaine d','td.id_domaine=d.id')->where('td.id_tuteur',$id)->get()->result_array();
             return [
                'referent'=>$tuteur,
                'domaines'=>$this->getDomainesWithColors($refrentDomaines)
            ];
        }
        else{
            return null;
        }
    
       
    }
    private function getDomainesWithColors($domaines){
        $colors = array('#1EC902','#EDEDED','#F2277E','#44CEA9');
        $domaines_with_colors= array();
        
        foreach($domaines as $d){
            $dom = $d;
            $dom['color']=$colors[rand(0,count($colors)-1)];
            $domaines_with_colors[]=$dom;
        }
        return $domaines_with_colors;

    }
    public function getTuteur($id)
    {
        // Fetch the tuteur's details
        $this->db->select('u.username,u.password, en.*');
        $this->db->from('users u');
        $this->db->join('enseignant en', 'u.enseignant_id = en.id');
        $this->db->where('en.id', $id);
        $query = $this->db->get();
        $tuteur = $query->row_array(); // Get tuteur data
    
        if ($tuteur) {
           $domaines = $this->db->select('*')->from('domaine')->get()->result_array();
           $domaines_ids = array();
           $refrentDomaines = $this->db->select('*')->from('tuteur_domaine')->where('id_tuteur',$id)->get()->result_array();
            foreach($refrentDomaines as $r){
                $domaines_ids[]=$r['id_domaine'];

            }
           return [
                'referent'=>$tuteur,
                'domaine_ids'=>$domaines_ids,
                'domaines'=>$domaines
            ];
        }
        else{
            return null;
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

    public function getPassword($user_id)
	{
		if ($user_id) {
			$this->db->select('password');
			$this->db->where('id', $user_id);
			$query = $this->db->get('users');

			if ($query->num_rows() == 1) {
				return $query->row()->password;
			}
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

    public function getAllEtablissements(){
        return $this->db->select('*')->from('etablissements')->where('active', 1)->get()->result_array();
    }
    public function getALLTuteur()
    {
        $query = $this->db->select('u.photo, en.nom, en.prenom, GROUP_CONCAT(d.nom SEPARATOR " | ") as domaine')
                        ->from('users u')
                        ->join('enseignant en', 'u.enseignant_id = en.id')
                        ->join('tuteur_domaine td', 'en.id = td.id_tuteur')
                        ->join('domaine d','td.id_domaine = d.id')
                        ->group_by('en.id')
                        ->get();
        return $query->result_array();
    }

}