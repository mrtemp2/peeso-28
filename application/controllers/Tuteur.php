<?php







class Tuteur extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_tuteur');
        $this->load->database();
        $this->load->library('session');

    }
    
    public function createTiteur()
    {
        $validator = array('success' => false, 'messages' => array());
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),
            array(
                'field' => 'prenom',
                'label' => 'First name',
                'rules' => 'required'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'affiliation',
                'label' => 'Affiliation',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'username',
                'rules' => 'required|callback_validate_username'
            ),
            array(
                'field' => 'password',
                'label' => 'Mot de passe',
                'rules' => 'required|min_length[6]|callback_validate_password'
            ),
            array(
                'field' => 'confirmpassword',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors'=> array(
                    'required'=>'le champ "confirmez le mot de passe" est requis',
                    'matches'=>'le champ" confirmez le mot de passe" doit etre le même que le mot de passe'
                )

            )
        );
    
    
    
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        $this->form_validation->set_message('is_unique', ' %s existe déjà!');
        $this->form_validation->set_message('matches', 'veuillez vérifier votre %s ');
        $this->form_validation->set_message('valid_email', '%s Non Valid');
    
        if ($this->form_validation->run() === true) {
            
            $attendance = $this->model_tuteur->createTiteur();
            if ($attendance == true) {
                $validator['success'] = true;
                $validator['message'] = 'Compte ajouté avec succès';
                
                
                // Retirez les balises HTML du contenu de l'e-mail
                $nom1 = htmlspecialchars($this->input->post('nom'), ENT_QUOTES, 'UTF-8');
                $prenom1 = htmlspecialchars($this->input->post('prenom'), ENT_QUOTES, 'UTF-8');
                $username = htmlspecialchars($this->input->post('username'), ENT_QUOTES, 'UTF-8');
                $mpd = htmlspecialchars($this->input->post('password'), ENT_QUOTES, 'UTF-8');
                $email1 = htmlspecialchars($this->input->post('email'), ENT_QUOTES, 'UTF-8');
    
                
    
                $base_url = base_url('logged');
                
    
                $this->email->set_mailtype('html'); // Définir le type de contenu comme HTML
                $this->email->from('votre@email.com', 'PEESO');
                $this->email->to($email1);
                $this->email->subject('Inscription compte Référent ');
    
                // Utilisez des styles CSS pour personnaliser le style d'écriture et centrer le contenu
                $this->email->message("<html><body style='text-align:center;font-family: Arial, sans-serif;'>
                    <p style='font-weight:bold;font-size:18px;'>INSCRIPTION</p>
                    <p>Bonjour $nom1 $prenom1,</p>
                    <p>Votre inscription est enregistrée sur la plateforme des entrepreneurs.</p>
                    <p>Utilisez le Nom d'Utilisateur et le Mot de Passe ci-dessous pour vous connecter <a href='$base_url'>à la plateforme des entrepreneurs :</a></p>
                    <p style='font-weight:bold;'>Nom d'Utilisateur : $username</p>
                    <p style='font-weight:bold;'>Mot de passe : $mpd</p>
                    <p><a href='$base_url'>Cliquez ici pour accéder à la plateforme</a></p>
                    </body></html>"
                );
    
    
                if ($this->email->send()) {
                    // L'e-mail a été envoyé avec succès
                    $validator['message'] = 'Un mail a été envoyé avec succès. Les informations de connexion ont été incluses.';
                } else {
                    // Erreur lors de l'envoi de l'e-mail
                    $validator['message'] = 'Erreur lors de l\'envoi du mail.';
                }
            } else {
                $validator['success'] = false;
                $validator['message'] = 'Erreur lors de l\'ajout';
            }
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['message'] = form_error($key);
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function validate_password($password)
	{
		// Ajoutez vos conditions de validation pour le mot de passe ici
		// Vérifiez si le mot de passe contient des caractères ou des scripts non autorisés

		if (preg_match('/[<">%]/', $password) || stripos($password, 'script') !== false) {
			$this->form_validation->set_message('validate_current_password', 'Le champ Mot de passe contient des caractères non autorisés.');
			return false;
		}

		// Ajoutez d'autres conditions de validation si nécessaire
		// ...

		return true;
	}

    public function fetchTuteurData()
    {
        $moduleData = $this->model_tuteur->fetchTuteurData();
        $result = array('data' => array());
        $x = 1;
        foreach ($moduleData as $key => $value) {
         
            $actionButtons = '    
           <div class="dashboard__button__group">
                                                        <button onclick="updateReferent('.$value['id'].')"  class="dashboard__small__btn__2" href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Modifier</button>
                    <button onclick="deleteReferent('.$value['id'].')" class="dashboard__small__btn__2 dashboard__small__btn__3" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Supprimer</button>
                </div>

            ';
            $profileButton = '<div>
			<a class="action-button btn btn-primary" href="'.base_url('profile_referent').'?referent_id='.$value['id'].'">
                                                       <i class="icofont-eye-open"></i>   </a></div>	 
                                                       ';		
            
            

            $result['data'][$key] = array(
                
                $value['nom'] . '  ' . $value['prenom'],
                $value['email'],
                $profileButton,
                $actionButtons
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function updateTuteurData($moduleId = null)
    {
        if ($moduleId) {
            $update = $this->model_tuteur->updateTuteurData($moduleId);
            if ($update === true) {
                $validator['success'] = true;
                $validator['messages'] = "Modifé avec succès";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Erreur lors de la modification des informations";
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    public function getUpdateTutteurForm($id){
        $info = $this->model_tuteur->getTuteur($id);
        if(!$info){
            show_404();
            return;

        }
        else{
            $this->load->view('admin/gestion_referent/update_referent',[
                'info'=>$info
            ]);
        }

    }

    public function removeTuteur($moduleId = null)
    {
        if ($moduleId) {
            $remove = $this->model_tuteur->removeTuteur($moduleId);
            if ($remove === true) {
                $validator['success'] = true;
                $validator['messages'] = "Supprimé avec succès";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Erreur lors de la suppression";
            }

            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($validator);
        }
    }

    public function getTuteur($id)
    {
        $result = $this->model_tuteur->getTuteur($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
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

			$update = $this->model_tuteur->updateProfile($userId);

			// Debugging output
			error_log("Update result: " . json_encode($update));
             $user_data = $this->session->userdata()['logged'];
			
                $user_data['username'] = htmlspecialchars($this->input->post('username'),ENT_QUOTES, 'UTF-8');
                $user_data['password'] = htmlspecialchars($this->session->userdata()['logged']['password'],ENT_QUOTES, 'UTF-8');
				
				
				$user_data['photo'] =htmlspecialchars($this->session->userdata()['logged']['photo'],ENT_QUOTES, 'UTF-8');

          
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
					$status = $this->model_tuteur->changePhoto($userId, $photo);

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

			$update = $this->model_tuteur->changePassword($user_id);

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
		$stored_password = $this->model_tuteur->getStoredPassword($user_id);

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