<?php



defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);

class Admin extends CI_Controller
{
    function __construct()
    {
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('model_admin');
       $this->load->database();
    }


    public function updateProfile()
	{
		$this->load->library('session');

		$userId = $this->session->userdata['logged']['id'];
		$response = array('success' => false, 'message' => '');

		$this->form_validation->set_rules('username', 'Username *', 'trim|required|regex_match[/^[a-zA-Z0-9._@-]+$/]');


		if ($this->form_validation->run() === true) {
			// Debugging output
			error_log("Validation successful");

			$update = $this->model_admin->updateProfile($userId);

			// Debugging output
			error_log("Update result: " . json_encode($update));

			$user_data = $this->session->userdata()['logged'] ;
                $user_data['username'] = htmlspecialchars($this->input->post('username'),ENT_QUOTES, 'UTF-8');
				$user_data['password'] = htmlspecialchars($this->session->userdata()['logged']['password'],ENT_QUOTES, 'UTF-8');
				$user_data['photo'] = htmlspecialchars($this->session->userdata()['logged']['photo'],ENT_QUOTES, 'UTF-8');


			
			$this->session->set_userdata('logged', $user_data);
			if ($update) {
				$response['success'] = $userId;
				$response['message'] = "Modifié avec succès";
			} else {
				$response['message'] = "Erreur lors de la mise à jour du profil.";
			}
		} else {
			$response['message'] = "Erreurs de validation.";
			$response['errors'] = array(
				'username' => form_error('username'),
			);
		}

		header('Content-Type: application/json');
		echo json_encode($response);
	}


    public function changePhoto($userId = null, $photo = null)
	{
		$userId = $_SESSION['logged']['id'];

		if ($userId) {
			if ($_FILES['photo']['name']) {
				$upload_config = array(
					'upload_path' => './assets/assets/images',
					'allowed_types' => 'png|jpg|jpeg',
					'max_size' => 4000
				);

				$this->load->library("upload", $upload_config);

				if ($this->upload->do_upload('photo')) {
					$upload_data = $this->upload->data();
					$photo = $upload_data['file_name'];

					// Resize the uploaded image to the desired dimensions
					$this->resizeImage($photo, 200, 200); // Adjust dimensions as needed

					// Now, update the user's photo in the database
					$status = $this->model_admin->changePhoto($userId, $photo);

					if ($status) {
						$response['success'] = true;
						$response['message'] = "Modifié avec succès";
						$_SESSION['user_photo'] = base_url('assets/assets/images/' . $res[0]->photo);
						echo json_encode($response);
					} else {
						$response['success'] = false;
						$response['message'] = "Erreur lors de la mise à jour de la photo.";
						echo json_encode($response);
					}
				} else {
					$response['message'] = 'Erreur lors du téléchargement de la photo : ' . $this->upload->display_errors();
				}
			}
		}
		$_SESSION['user_photo'] = base_url('assets/assets/images/' . $photo);

		header('Content-Type: application/json');
		echo json_encode($response);
	}

    public function changePassword()
	{
		

		$user_id = $this->session->userdata['logged']['id'];
		

		$this->form_validation->set_rules('old_password', 'Mot de passe actuel', 'required|callback_validate_current_password');
		$this->form_validation->set_rules('newPassword', 'Nouveau mot de passe', 'required|callback_password_complexity');
		$this->form_validation->set_rules('confirmPassword', 'Confirmez le mot de passe', 'required|matches[newPassword]');

		$validator = array(); // Créez un tableau pour stocker les messages de validation

		if ($this->form_validation->run() === true) {

			$update = $this->model_admin->changePassword($user_id);

			if ($update) {
				$this->session->userdata['logged']['password'] = $this->input->post('newPassword');
				$validator['success'] = true;
				$validator['messages'] = "Modifié avec succès";
			} else {
				$validator['success'] = false;
				$validator['messages'] = 'Erreur lors de la modification';
				
			}
		} else {
			$validator['success'] = false;
			$validator['messages'] = strip_tags(validation_errors());  // Utilisez la fonction validation_errors() pour obtenir les erreurs de validation du formulaire
		}

		echo json_encode($validator);
	}

    public function validate_current_password($password)
	{

		// Check if the password contains any disallowed characters or scripts
		if (preg_match('/[<">]/', $password) || stripos($password, 'script') !== false) {
			$this->form_validation->set_message('validate_current_password', 'Le champ Mot de passe contient des caractères non autorisés.');
			return false;
		}

		$user_id = $this->session->userdata['logged']['id'];
		$stored_password = $this->model_admin->getStoredPassword($user_id);

		if ($password === $stored_password) {
			// Les mots de passe correspondent
			return true;
		} else {
			// Les mots de passe ne correspondent pas
			$this->form_validation->set_message('validate_current_password', 'Le champ Mot de passe actuel est incorrect');
			return false;
		}
	}

    public function password_complexity($password)
	{
		if (strlen($password) < 8) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins 8 caractères.');
			return false;
		}
		if (!preg_match('/[a-z]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins une lettre minuscule.');
			return false;
		}
		if (!preg_match('/[A-Z]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins une majuscule.');
			return false;
		}

		if (!preg_match('/[!@#$%^&*]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins un caractère spécial.');
			return false;
		}
		if (!preg_match('/[1-8]/', $password)) {
			$this->form_validation->set_message('password_complexity', 'Le mot de passe doit contenir au moins un chiffre.');
			return false;
		}

		return true;
	}

	private function resizeImage($filename, $width, $height)
	{
		$config['image_library'] = 'gd2';
		$config['source_image'] = './assets/assets/images/' . $filename;
		$config['maintain_ratio'] = FALSE;
		$config['width'] = $width;
		$config['height'] = $height;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}

}

















