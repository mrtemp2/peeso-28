<?php







class Message extends CI_Controller
{



    public function __construct()
    {



        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_message');
        $this->load->database();
        $this->load->library('session');
    }
    private function getIdUser(){
        return $this->session->userdata()['logged']['id'];
    }
    private function getTypeUser(){
        $type = $this->session->userdata()['logged']['type'];
        if($type=='Enseignant'){
            return $this->session->userdata()['logged']['role'];
        }
        return $type;
    }

    public function sendMessageToCoach(){
        $validate_data = array(
            array(
                'field' => 'sujet',
                'label' => 'Suject',
                'rules' => 'required'
            ),
            array(
                'field' => 'content',
                'label' => 'Contenu',
                'rules' => 'required'
            ),
           
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        $validator =array();
        if ($this->form_validation->run() === true) {
                $message = [
                    'sender_id'=>$this->getIdUser(),
                    'sujet'=>$this->input->post('sujet'),
                    'content'=>$this->input->post('content'),
                    'created_at'=>date('Y-m-d'),
                    'type_sender'=>$this->getTypeUser(),
                    'type_reciever'=>'coach'
                ];
                $insert_id = $this->model_message->createMessage($message);
                if(!$insert_id){
                    echo json_encode([
                        'success'=>false,
                        'message'=>'Erreur De Créaction',

                    ]);
                    return;
                }
                $message['id'] = $insert_id;
                $messages_users = $this->model_message->getUsersMessages($this->input->post('recievers'),$message);
                $test = $this->model_message->setMessageReciever($messages_users);
                if(!$test){
                    echo json_encode([
                        'success'=>false,
                        'message'=>'Erreur De Créaction',
                    ]);
                    return;
                }
                echo json_encode([
                    'success'=>true,
                    'message'=>'Message Crée avec succés'
                ]);
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
            $validator['message']='vérifier vos champs';
            echo json_encode($validator);
        }
        
    }
  
    function envoyerMail()
    {
        $validator = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules('email', 'Email *', 'trim|required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
        $this->form_validation->set_rules('name', 'FullName *', 'trim|required|regex_match[/^[a-zA-ZÀ-ÿ\s\-\_\'\.]+$/u]');
        $this->form_validation->set_rules('message', 'Message *', 'trim|required|regex_match[/^[\p{L}\p{N}\s,.!?\'"-]+$/u]');              

        if ($this->form_validation->run() === true) {

            $this->load->library('email');
            $nom = $this->input->post('name');
            $email = $this->input->post('email');
            $message = $this->input->post('message');

            $this->email->set_mailtype('html'); // Définir le type de contenu comme HTML
                $this->email->from('votre@email.com', 'PEESO');
                $this->email->to('nidhalabbassi9@gmail.com');
                $this->email->subject('Contactez PEESo');
    
                // Utilisez des styles CSS pour personnaliser le style d'écriture et centrer le contenu
                $this->email->message("<p>Bonjour, <br>
                            Nom et Prénom :  ".$nom."<br>
                            Email : ".$email.",<br> 
                            Message : ".$message.
                        "</p>"
                );
            $mailSent = $this->email->send();

            $validator = array('success' => false, 'messages' => array());
                if ($mailSent) {
                    $validator['success'] = true;
                    $validator['messages'] = 'Envoyé avec succès';
                } else {
                    $validator['success'] = false;
                    $validator['messages'] = 'Échec de l\'envoi';
                }
        } else {
            $validator['success'] = false;
            $validator['messages'] = 'Échec de l\'envoi';
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
        
    }

    
  
}