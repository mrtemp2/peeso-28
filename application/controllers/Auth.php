<?php







class Auth extends CI_Controller
{

    private $client_id='758483891516-bms2g51fkp7jf69uihfaqjtjtpiobbv6.apps.googleusercontent.com';
    private $clientSecret='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';

    public function __construct()
    {



        parent::__construct();
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_auth');
        $this->load->model('model_admin');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('gutils');

    }
    private function getUserId(){
       return $this->session->userdata()['logged']['id'];
    }    
    private function getGoogleAccessToken($code)
	{
		$client_id = $this->client_id;
		$client_secret = $this->clientSecret;
		$redirect_uri = base_url('auth/google_login');

		$url = 'https://oauth2.googleapis.com/token';
		$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code=' . $code . '&grant_type=authorization_code';
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);

		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		$response = curl_exec($ch);

		if (curl_errno($ch)) {
			log_message('error', 'CURL Error in getGoogleAccessToken: ' . curl_error($ch));
			return ['error'=>'curlError'];
		}

		$data = json_decode($response, true);
		if ($http_code != 200) {
			log_message('error', 'Failed to get access token, HTTP code ' . $http_code);
			return ['error'=>'http code !=200','status'=>$http_code,'data'=>$data,'postdata'=>$curlPost];
		}

		if (isset($data['error'])) {
			log_message('error', 'Error in getGoogleAccessToken: ' . $data['error_description']);
			return ['error'=>$data,'http_code'=>$http_code];
		}

		return $data;
	}
    private function getGoogleUserInfo($token)
	{
		$url = 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $token;
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
		if ($http_code != 200) {
			log_message('error', 'Failed to get user info, HTTP code ' . $http_code);
			return $data;
		}

		log_message('debug', 'Google user info: ' . print_r($data, true));

		if (empty($data['email'])) {
			log_message('error', 'No email field in the user info');
			return $data;
		}

		return $data;
    }
    public function google_login()
	{
		$redirect_uri = base_url('auth/google_login');
        $last_url = $this->session->userdata()['last_url'];
        $gutils = new Gutils();
        $client = $gutils->getClientInstance();
        $google_oauth_version = 'v3';
        $client->setClientId($this->client_id);
        $client->setClientSecret($this->clientSecret);
        $client->setRedirectUri($redirect_uri);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
        $client->addScope("https://www.googleapis.com/auth/calendar");
        if (isset($_GET['code']) && !empty($_GET['code'])) {
            // Exchange the one-time authorization code for an access token
            $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($accessToken);
            
            // Make sure access token is valid
            if (isset($accessToken['access_token']) && !empty($accessToken['access_token'])) {
                // Now that we have an access token, we can fetch the user's profile data
                $google_oauth = $gutils->getOauth2Service($client);
                $google_account_info = $google_oauth->userinfo->get();
                if($google_account_info){
                    $info_id = $this->model_auth->findOrCreateUserInfo($this->getUserId(),[
                        'name'=>$google_account_info->name,
                        'lastname'=>$google_account_info->name,
                        'email'=>$google_account_info->email,
                        'access_token'=>$accessToken['access_token'],
                        'expires_in'=>intval($accessToken['expires_in']),
                        'created_at'=>date("Y-m-d H:i:s")
                        
                     ]);
                     if($info_id){
                        $userdata = $this->session->userdata()['logged'];
                        $userdata['google_info'] = $info_id;
                        $this->session->set_userdata('logged', $userdata);
                        redirect($last_url); 
                    }
                     else{
                        $this->session->set_flashdata('login_failed', 'database_error.');
				        redirect($last_url);
                     }
                }
             else{
                $this->session->set_flashdata('login_failed', 'Erreur de connexion avec Google.');
                redirect($last_url);
       
                }
            } else {
                $this->session->set_flashdata('login_failed', 'Erreur de connexion avec Google.');
                redirect($last_url);
            }
        } else {
            // Redirect to Google Authentication page
            $authUrl = $client->createAuthUrl();
           
            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
           return;
            // exit;
        }
        
        // Utiliser la même URL pour le rappel
        /*$last_url = $this->session->userdata()['last_url'];
		$this->load->library('session');
		$this->load->helper('url');

		$code = isset($_GET['code'])?$_GET['code']:null;
        $error = '';
		// Si le code n'est pas présent, initiez le flux de connexion
		if (empty($code)) {
			$auth_url = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query([
				'client_id' => $this->client_id,
				'redirect_uri' => $redirect_uri,
				'response_type' => 'code',
				'scope' => 'https://www.googleapis.com/auth/userinfo.email',
				'access_type' => 'offline',
               
                
				
			]);

			redirect($auth_url);
		} else {
            
			$access_data = $this->getGoogleAccessToken($code);
            echo json_encode([
                'code'=>$code,
                'token'=>$access_data
            ]);
            /*if($access_data){
                $google_user_info = $this->getGoogleUserInfo($access_data['access_token']);
                if(!$google_user_info){
                    $this->session->set_flashdata('login_failed', 'Erreur de connexion avec Google.');
				    echo json_encode($google_user_info);
                    return;
                }
                else{
                    $info_id = $this->model_auth->findOrCreateUserInfo($this->getUserId(),[
                        'name'=>$google_user_info['name'],
                        'lastname'=>$google_user_info['name'],
                        'email'=>$google_user_info['email'],
                        'access_token'=>$access_data['access_token'],
                        'expires_in'=>intval($access_data['expires_in']),
                        'created_at'=>date("Y-m-d H:i:s")
                        
                     ]);
                     if($info_id){
                        $userdata = $this->session->userdata()['logged'];
                        $userdata['google_info'] = $info_id;
                        $this->session->set_userdata('logged', $userdata);
                        redirect($last_url); 
                    }
                     else{
                        $this->session->set_flashdata('login_failed', 'database_error.');
				        redirect($last_url);
                     }
                }
            }
            else {
				$this->session->set_flashdata('login_failed', 'Erreur de connexion avec Google.');
				echo json_encode
                //redirect($last_url);
			}   */
            
	//	}
	}
    public function updateUserData($newUserData){
            $this->session->set_userdata('logged', $newUserData);
    }

    public function CreateEtudiant()
    {
        $validator = array('success' => false, 'messages' => array());
        $validate_data = array(
            array(
                'field' => 'cin',
                'label' => 'cin',
                'rules' => 'required|max_length[8]|integer'
            ),
            array(
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'required|numeric'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|valid_email'
            ),
            array(
                'field' => 'password',
                'label' => 'Mot de passe',
                'rules' => 'required|min_length[6]|callback_validate_password'
            ),
            array(
                'field' => 'prenom',
                'label' => 'First name',
                'rules' => 'required'
            ),
            array(
                'field' => 'ville',
                'label' => 'Ville',
                'rules' => 'required'
            ),
            array(
                'field' => 'code_postal',
                'label' => 'Code Postal',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'nom',
                'label' => 'Last Name',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'adresse',
                'label' => 'Adresse',
                'rules' => 'required'
            ),
            
            array(
                'field' => 'confirm-pass',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]',
                'errors'=> array(
                    'required'=>'le champs confirmer mot de passe est requis',
                    'matches'=>'le champs confirmer mot de passe doit etre le meme que le mot de passe'
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
            
            $attendance = $this->model_auth->CreateEtudiant();
            if ($attendance == true) {
                $validator['success'] = true;
                $validator['messages'] = 'Compte ajouté avec succès';
                
                
                // Retirez les balises HTML du contenu de l'e-mail
                $nom1 = htmlspecialchars($this->input->post('nom'), ENT_QUOTES, 'UTF-8');
                $prenom1 = htmlspecialchars($this->input->post('prenom'), ENT_QUOTES, 'UTF-8');
                $cin1 = htmlspecialchars($this->input->post('cin'), ENT_QUOTES, 'UTF-8');
                $mpd = htmlspecialchars($this->input->post('password'), ENT_QUOTES, 'UTF-8');
                $email1 = htmlspecialchars($this->input->post('email'), ENT_QUOTES, 'UTF-8');


                

                $this->email->set_mailtype('html'); // Définir le type de contenu comme HTML
                $this->email->from('votre@email.com', 'PEESO');
                $this->email->to($email1);
                $this->email->subject('Inscription compte Etudiant');

                // Utilisez des styles CSS pour personnaliser le style d'écriture et centrer le contenu
                $this->email->message("<html><body style='text-align:center;font-family: Arial, sans-serif;'>
                    <p style='font-weight:bold;font-size:18px;'>INSCRIPTION</p>
                    <p>Bonjour $nom1 $prenom1,</p>
                    <p>Votre inscription est enregistrée sur la plateforme des projets.</p>
                    <p>Utilisez le Nom d'Utilisateur et le Mot de Passe ci-dessous pour vous connecter <a href='".base_url()."logged'>à la plateforme des projets :</a></p>
                    <p style='font-weight:bold;'>Nom d'Utilisateur : $cin1</p>
                    <p style='font-weight:bold;'>Mot de passe : $mpd</p>
                    <p><a href='".base_url()."logged'>Cliquez ici pour accéder à la plateforme</a></p>
                    </body></html>"
                );


                if ($this->email->send()) {
                    // L'e-mail a été envoyé avec succès
                    $validator['messages'] = 'Un mail a été envoyé avec succès. Les informations de connexion ont été incluses.';
                } else {
                    // Erreur lors de l'envoi de l'e-mail
                    $validator['messages'] = 'Erreur lors de l\'envoi du mail.';
                }
            } else {
                $validator['success'] = false;
                $validator['messages'] = 'Erreur lors de l\'ajout';
            }
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }
        echo json_encode($validator);
    }
    
    public function validate_type_compte($type_compte){
        if($type_compte!='Élève' && $type_compte!='User'){
            $this->form_validation->set_message('validate_type', 'Le champ Mot de passe contient des caractères non autorisés.');
            return false;    
        } 
        return true;
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
    public function logged()
	{


		$this->form_validation->set_rules('username', 'Nom d\'Utilisateur', 'required');
		$this->form_validation->set_rules('password', 'Mot de Passe', 'required');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_message('required', 'Le champ %s est obligatoire');

		$recaptchaResponse = $this->input->post('g-recaptcha-response');
		$recaptchaSecretKey = '6Lfoj_0oAAAAAJc9lWKy91Yd8BxDy6BhRkb4MH0D';
		$recaptchaVerify = $this->verifyRecaptcha($recaptchaResponse, $recaptchaSecretKey);



		if (!empty($code)) {
			// Utilisateur connecté via Google ou via votre formulaire de connexion, redirigez-le vers le tableau de bord
			redirect('dashboard');
		}
		if ($this->session->userdata('google_login') === true) {
			redirect('dashboard'); // Redirigez immédiatement vers le tableau de bord si l'utilisateur est connecté via Google
		}

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('pages/logged');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$login = $this->model_auth->loginUser($username, $password);

			if ($login) {
			
					if ($login['is_blocked']) {
						// User is blocked, show a message and prevent login
						$this->session->set_flashdata('login_failed', 'Utilisateur bloqué. Contactez l\'administrateur.');
						redirect('logged');
                        return;
                    }

                    else{
                        $info  = $this->connectUser($login);
                        /*echo json_encode($info);
                        return ;*/
                        redirect('dashboard');

                    }
				

				
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Identifiant ou Mot de passe invalide');

				redirect('logged');
			}
		}
	}
    private function connectUser($user){
        $user_data = array(
            'id' => $user['id'],
            'username' => $user['username'],
            'password' => $user['password'],
            'type' => $user['type'],
            'etudiant_id'=>$user['etudiant_id'],
            'enseignant_id'=>$user['enseignant_id'],
            'photo' => $user['photo'],
            'etab_id'=>$user['etab_id']
        );
      //  return $user;
        if($user['type']=='Etudiant'){
            $etud = $this->model_auth->getUserInfo($user);
            $user_data['nom'] = $etud['nom'];
            $user_data['prenom'] = $etud['prenom'];
            $user_data['etablissement_id'] = $etud['etablissement_id'];
            $user_data['cin'] = $etud['cin'];    
            $user_data['email'] = $etud['email'];
            $user_data['phone'] = $etud['phone'];
            $user_data['ville'] = $etud['ville'];
            $user_data['phone'] = $etud['adresse'];
            $user_data['email'] = $etud['code_postal'];
        }
        if($user['type']=='Enseignant'){
            $etud = $this->model_auth->getUserInfo($user);
           // return $etud;
            $user_data['nom'] = $etud['nom'];
            $user_data['prenom'] = $etud['prenom'];
            $user_data['email'] = $etud['email'];
            $user_data['affiliation'] = $etud['affiliation'];    
            $user_data['role'] = $etud['role'];
            $user_data['etablissement_id'] = $etud['id_etab'];
        }
        
        $this->session->set_userdata('logged', $user_data);
        
        return $user_data;

    }
    public function getUserData(){
        echo json_encode($this->session->userdata()['logged']);
    }
    private function verifyRecaptcha($recaptchaResponse, $recaptchaSecretKey)
	{
		$recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';

		$recaptchaData = array(
			'secret' => $recaptchaSecretKey,
			'response' => $recaptchaResponse,
		);

		$options = array(
			'http' => array(
				'header' => "Content-type: application/x-www-form-urlencoded\r\n",
				'method' => 'POST',
				'content' => http_build_query($recaptchaData),
			),
		);

		$context = stream_context_create($options);
		$recaptchaResult = file_get_contents($recaptchaUrl, false, $context);

		if ($recaptchaResult === false) {
			// Erreur lors de la requête reCAPTCHA
			return false;
		}

		$recaptchaResult = json_decode($recaptchaResult);

		return $recaptchaResult->success;
	}

    public function loggedout()
	{

		$this->session->unset_userdata('logged');

		$this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('etudiant_id');
		$this->session->unset_userdata('enseignant_id');

		$this->session->sess_destroy();

		$this->session->set_flashdata('user_loggedout', 'Vous êtes maintenant déconnecté');

		redirect('logged');
	}
    public function getUserInfo(){
        $etud = $this->model_auth->getUserInfo([
            'type'=>'Enseignant',
            'enseignant_id'=>$this->session->userdata()['logged']['enseignant_id']
        ]);
        echo json_encode($etud);
        
    }

    public function fetchStructureData()
    {
        $moduleData = $this->model_auth->fetchStructureData();
        $result = array('data' => array());
        $x = 1;
        foreach ($moduleData as $key => $value) {
         
            $actionButtons = '    
           <div class="dashboard__button__group">
                                                        <button onclick="updateStructure('.$value['id'].')"  class="dashboard__small__btn__2" href="#">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Modifier</button>
                    <button onclick="deleteStructure('.$value['id'].')" class="dashboard__small__btn__2 dashboard__small__btn__3" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Supprimer</button>
                </div>

            ';
            $profileButton = '<div>
			<a class="action-button btn btn-primary" href="'.base_url('profile_structure').'?structure_id='.$value['id'].'">
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

    public function getUpdateStructureForm($id){
        $info = $this->model_auth->getStructure($id);
        if(!$info){
            show_404();
            return;

        }
        else{
            $this->load->view('admin/gestion_structure/update_structure',[
                'info'=>$info
            ]);
        }

    }

    public function updateStructureData($moduleId = null)
    {
        if ($moduleId) {
            $update = $this->model_auth->updateStructureData($moduleId);
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
     private function getEtudiantId(){
         return $this->session->userdata()['logged']['etudiant_id'];
      }   
      private function getEnseignantId(){
         return $this->session->userdata()['logged']['enseignant_id'];
      }     
    private function getUserRole(){
        return $this->session->userdata()['logged']['type'];
    }
    public function changePhoto()
	{
		$userId = $this->getUserId();

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
					$status = $this->model_auth->changePhoto($userId, $photo);

					if ($status) {
						$response['success'] = true;
						$response['message'] = "Modifié avec succès";
						$this->connectUser($status);
					} else {
						$response['success'] = false;
						$response['message'] = "Erreur lors de la mise à jour de la photo.";
				
					}
				} else {
					$response['message'] = 'Erreur lors du téléchargement de la photo : ' . $this->upload->display_errors();
				}
			}
		}
		
		
		echo json_encode($response);
	}
    public function changeProfileInfo(){
        $role = $this->getUserRole();
         
            if($role=='Etudiant'){
               $user =  $this->model_auth->updateProfileEtudiant($this->getEtudiantId(),$this->getUserId(),[
                    'nom'=>$this->input->post('nom'),
                    'prenom'=>$this->input->post('prenom'),
                    'phone'=>$this->input->post('phone'),
                    'email'=>$this->input->post('email'),
                ]);
              $this->connectUser($user);  
              echo json_encode([
                'success'=>true,
                'message'=>'profile modifie avec succes'
              ]);  
          }
          else{
                $user =  $this->model_auth->updateProfileEnseignant($this->getEnseignantId(),$this->getUserId(),[
                    'nom'=>$this->input->post('nom'),
                    'prenom'=>$this->input->post('prenom'),
                  
                    'email'=>$this->input->post('email'),
                    'affiliation'=>$this->input->post('affiliation'),
                ]);
                 $this->connectUser($user);  
                 echo json_encode([
                    'success'=>true,
                    'message'=>'profile modifie avec succes'
                  ]);  
          }
          return ;

    }

}