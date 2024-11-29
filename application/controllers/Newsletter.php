<?php
class Newsletter extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_newsletter');
        $this->load->database();
    }

    public function add_subscriber(){

        $this->load->library('email');
        $mail = $this->input->post('email');
        $insert_data = array(
            'email'=>$this->input->post('email'),
        );
        $success = $this->model_newsletter->add_subscriber($insert_data);
        if ($success) {

                $this->email->set_mailtype('html'); // Définir le type de contenu comme HTML
                $this->email->from('votre@email.com', 'PEESO');
                $this->email->to($mail);
                $this->email->subject('Inscription à la Newsletter du PEESo');
                $this->email->message("
                            <html><body style='font-family: Arial, sans-serif;'>
                                <p>Félicitations vous êtes maintenant abonnés à notre Newsletter :) </p>
                            </body></html>"
                        );
        
                $mail = $this->email->send();
            
                if($mail){
                    $validator = array('success' => true, 'message'=>'Succès de l\'envoie');
                } else {
                    $validator = array('success' => false, 'message'=>'Échec de l\'envoie');
                }
            
            } else {
            $validator = array('success' => false, 'message' => 'Échec de l\'ajout');
        }
        header('Content-Type: application/json');
        echo json_encode($validator);
    }

    public function sendEmail(){
        $soumissionFile = $_FILES['image'];
        $image = '';
        if (!empty($soumissionFile['name'])) {
            $bind = array(
                'upload_path' => './assets/assets/images',
                'allowed_types' => 'png|jpg|jpeg',
                'max_size' => 240000
            );
            $this->load->library("upload", $bind);
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data('file_name');
            } else {
                $validator = array('success' => false, 'message' => $this->upload->display_errors());
            }
        }

        $validator = array('success'=> false, 'message' => array());

        $this->form_validation->set_rules('subject','Sujet Du Mail','required|regex_match[/^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\']+$/u]');
        $this->form_validation->set_rules('titre-fr','Titre','regex_match[/^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\']+$/u]');
        // $this->form_validation->set_rules('content-fr','Contenu Du Mail','regex_match[#^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$#]');
        $this->form_validation->set_rules('lien','Lien','regex_match[#^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\'\/]+$#u]');

        if($this->form_validation->run() === true){
            $mail = array(
                'subject'=>$this->input->post('subject'),
                'titre'=>$this->input->post('titre-fr'),
                'image'=> $image,
                'content'=>$this->input->post('content-fr'),
                'withlink'=>$this->input->post('withlink'),
                'lien'=>$this->input->post('lien'),
                
            );
            $success = $this->model_newsletter->sendMessage($mail);
            if($success){
                $validator = array('success' => true,'message' => 'Newsletter envoyée avec succès');
            }
            else{
                $validator = array('success' => false, 'message' => "Erreur lors de l\'envoie de la newsletter");
            }
        } else{
            $validator = array('success' => false, 'message' => validation_errors());
        }

        header('Content-Type: application/json');
        echo json_encode($validator);

    }
       
    
    public function fetchSubscribers()
    {
        $moduleData = $this->model_newsletter->fetchSubscribers();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $button = '
               <div class="actions">
                <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-eye"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSoumission" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
                </button>
                 <button class="btn btn-sm btn-warning action-button" data-target="#editModal" onclick="editSubject(' . $value['id'] . ')"><i class="fas fa-edit"></i></button>
             
               </div>
            ';



            $result['data'][$key] = array(
                $value['id'],
                $value['email'],
                $button


            );

        }
        echo json_encode($result);
    }

    public function get_subscriber($id)
    {
        $subscriber = $this->model_newsletter->getSubscriber($id);
        echo json_encode($subscriber);
    }

    public function removeSubscriber($id)
    {
        $is_deleted = $this->model_newsletter->removeSubscriber($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec succès']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'problème de suppression']);
        }

    }

    public function update_subscriber($module_id)
    {

        $validator = array('success' => false, 'message' => '');

        // Utilisez la bibliothèque de validation CodeIgniter pour valider les données
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email');


        if ($this->form_validation->run() === true) {
            $update_data = array(
                'email' => $this->input->post('edit_email'),
            );

            // Effectuez la mise à jour dans le modèle
            $update_result = $this->model_newsletter->update_subscriber($module_id, $update_data);
            if ($update_result === true) {
                $validator['success'] = true;
                $validator['messages'] = "Modifiée avec succès";
            } else {
                $validator['messages'] = "Erreur lors de la mise à jour";
            }
        } else {
            $validator['messages'] = validation_errors(); // Erreurs de validation
        }

        // Renvoyez la réponse JSON
        header('Content-Type: application/json');
        echo json_encode($validator);
    }

    public function fetchNewsletters()
    {
        $moduleData = $this->model_newsletter->fetchNewsletters();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $button = '
               <div class="actions">
                <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-eye"></i>
                </button>
               </div>
            ';



            $result['data'][$key] = array(
                $value['subject'],
                $value['titre'],
                $value['created_at'],
                $button


            );

        }
        echo json_encode($result);
    }

    public function get_newsletter($id)
    {
        $newsletter = $this->model_newsletter->get_newsletter($id);
        echo json_encode($newsletter);
    }
    public function test(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
            $this->load->library('email');
                $config = array(
                    $config['protocol'] = 'smtp',
                    $config['smtp_host'] = 'ssl://smtp.gmail.com',
                    $config['smtp_port'] = '465',
                    $config['smtp_user'] = 'raniay089@gmail.com',
                    $config['smtp_pass'] = 'raniaismine',
                    $config['mailtype'] = 'html', // or 'text'
                    $config['charset'] = 'utf-8',
                    $config['newline'] = "\r\n", //Double quotes required
                    $config['validation'] = TRUE,
                );
                $html_content = "<h1> Vos données d'accés :<br><br></h1>
                                <h3>Username</h3>" . 'motherfucker' . "<br><h3>Password</h3>" . 'bitch' . "<br>
                                <p>Pour se connecter cliquer  <a href='" . base_url() . "'>ici </a></p>";
                $mail_data = $html_content;
                $this->email->initialize($config);
                $this->email->set_newline("\r\n");
               $this->email->from('ESEN');
                $validator=array();
               if(isset($_POST["type"]) ){
                    if($_POST['type']=='html'){
                        $this->email->set_mailtype("html");
                    }
                    else{
                        $validator['error']='please send a valid Type';
                    }
                }
                if(isset($_POST['emails'])){
                    $emails= json_decode($_POST["emails"]);     
                    $this->email->to($emails);
                }
                if(isset($_POST["email"]) ){
                    $email= $_POST["email"];
                    $this->email->to($email);
                }
                if(isset($_POST["subject"]) ){
                    $subject= $_POST["subject"];
                }
                if(isset($_POST["message"]) ){
                    $message= $_POST["message"];
                }
                

                $this->email->subject($subject);
                $this->email->message($message);
                $mail = $this->email->send();
              
                $validator['messages'] = "Validé avec succès";
                $validator["success"] = $mail;
                echo json_encode($validator);
                return ;    
        
            /* */
            

     }
  
}