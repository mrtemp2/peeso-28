<?php


class Model_admin extends CI_Model
{
    function __construct()
    {
       parent::__construct();

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
	public function getAdminInfo($id = 2){
		return $this->db->select('*')->where('id', $id)->get('users')->row_array();
	}
	public  function getEtudiantWithEstablishment($etudiantId){
        return $this->db->select('e.*,etab.nom as etablissement')->from('etudiants e')
                                     ->join('etablissements etab','e.etablissement_id=etab.id')   

                                      ->where('e.id',$etudiantId)->get()->row_array();

    }
	public function getStudentByUserId($userId){
		return $this->db->select('e.*')
						->from('users u')
						->join('etudiants e','u.etudiant_id=e.id')
						->where('u.id',$userId)
						->get()
						->row_array()
						;
}
}