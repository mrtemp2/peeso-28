<?php







class Randezvous extends CI_Controller
{




    public function __construct()
    {



        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_randezvous');
        $this->load->database();
        $this->load->library('session');
        $this->load->library('gutils');
    }
    private function getIdUser(){
        return $this->session->userdata()['logged']['id'];
    }
    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];


    }
    private function prepareClient($accessToken){
        $gutils = new Gutils();
        $client = $gutils->getClientInstance();
        $google_oauth_version = 'v3';
        $client->setClientId($this->client_id);
        $client->setClientSecret($this->clientSecret);
        $client->addScope("https://www.googleapis.com/auth/userinfo.email");
        $client->addScope("https://www.googleapis.com/auth/userinfo.profile");
        $client->addScope("https://www.googleapis.com/auth/calendar");
        $client->setAccessToken($accessToken);
        return $client;

    }
    public function prepareRandezVousForm($seance_id){
        $groupe_seance = $this->model_randezvous->getSeanceById($seance_id);
         $googleInfo = $this->model_randezvous->getValidToken($this->session->userdata()['logged']);
        if($groupe_seance){
            $this->load->view('enseignant/formation/create-randez-vous',[
                'info'=>[
                    'seance'=>$groupe_seance,
                    'google_login'=>$googleInfo
                ]
            ]);
        }
        else{
            show_404();
            return;
        }

    }
    public function prepareRandezVousFormCoaching($seance_id){
        $groupe_seance = $this->model_randezvous->getSeanceById($seance_id);
         $googleInfo = $this->model_randezvous->getValidToken($this->session->userdata()['logged']);
        if($groupe_seance){
            $this->load->view('enseignant/coaching/create-randez-vous',[
                'info'=>[
                    'seance'=>$groupe_seance,
                    'google_login'=>$googleInfo
                ]
            ]);
        }
        else{
            show_404();
            return;
        }

    }
    private function getUserId(){
           return $this->session->userdata()['logged']['id'];
    }
    private function verifyConnection(){
        if(!$this->session->userdata()['logged']){
            redirect('logged');
        }
        return;
    }
    private function googleCreateRandezVous($randezvous,$emails){
       
        $googleInfo = $this->model_randezvous->getValidToken($this->session->userdata()['logged']);
        if($googleInfo){
            try{
                $access_token = $googleInfo['access_token'];
            $client = $this->prepareClient($access_token);
            $gutils = new Gutils();
            $gutils->getCalenderService($client);
            $response = $gutils->createEvent(array(
                'summary' => $randezvous['titre'],
                'location' => 'Tunisia',
                'description' => $randezvous['description'],
                'start' => array(
                    

                  'dateTime' =>'2024-12-30T09:00:00',
                  'timeZone' => 'CET',
                ),
                'end' => array(
                  'dateTime' => '2024-12-30T10:00:00',
                  'timeZone' => 'CET',
                ),
                'recurrence' => array(
                  'RRULE:FREQ=DAILY;COUNT=2'
                ),
                'conferenceData' => [
                    'createRequest' => [
                        'requestId'             => uniqid(),
                        'conferenceSolutionKey' => [
                            'type' => 'hangoutsMeet'
                        ]
                    ]
                ],
                'attendees' => $emails,
                'reminders' => array(
                  'useDefault' => FALSE,
                  'overrides' => array(
                    array('method' => 'email', 'minutes' => 24 * 60),
                    array('method' => 'popup', 'minutes' => 10),
                  ),
                ),
              ));
            return [
                'success'=>true,
                'google_response'=>$response
            ];
            }catch(Exception $e){
                return array(
                    'success'=>false,
                    'message'=>$e->getMessage(),
                    'access_token'=>$access_token
                );
            }
            return ;
        }
        else{
            /*echo json_encode(['message'=>'must be redirected to google login']);
            return;*/

            redirect('auth/google_login');      
        }
     
    }
    public function verifyGoogleLogin(){
        $googleInfo = $this->model_randezvous->getValidToken($this->session->userdata()['logged']);
        if($googleInfo){
                echo json_encode([
                    'success'=>true
                ]);  
        }
        else{
            echo json_encode([
                'success'=>false
            ]);
        }
    }
    public function createRandezVous(){
        $this->verifyConnection();
        $validate_data = array(
            array(
                'field' => 'titre',
                'label' => 'Titre',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'lieu',
                'label' => 'Lieu',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_debut',
                'label' => 'Date Debut',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_fin',
                'label' => 'Date Fin',
                'rules' => 'required'
            ),
          
        );
        
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        $validator =array();
        if ($this->form_validation->run() === true) {
                $inserted_data = [
                    'titre'=>$this->input->post('titre'),
                    'description'=>$this->input->post('description'),
                    'lieu'=>$this->input->post('lieu'),
                    'date_debut'=>$this->input->post('date_debut'),
                    'date_fin'=>$this->input->post('date_fin'),
                    'added_by'=>$this->getIdUser(),
                    'seance_id'=>$this->input->post('seance_id')
                ];
                $seance_group_id = $this->input->post('seance_id');
                $virtual_meeting = $this->input->post('virtual_meeting')=="1"?true:false;
                if($virtual_meeting){
                    $emails = $this->model_randezvous->getGoogleEmails($seance_group_id);
                    if(!$emails){
                        echo json_encode([
    
                            'success'=>false,
                            'message'=>'aucun des membres se connecte avec son compte google'
                        ]);
                        return ;
    
                    }
                    

                    $google_result= $this->googleCreateRandezVous($inserted_data,$emails['emails']);
                    $google_result['emails']=$emails;
                    if(!$google_result['success']){
                    echo json_encode($google_result);
                    return;
                
                    }
                    else{
                        $inserted_data['meet_link'] = $google_result['google_response']->getHangoutLink();
                        $inserted_data['calender_link'] = $google_result['google_response']->getHtmlLink();
                    }
                
                    $inserted=$this->model_randezvous->createRandezVous($inserted_data,$emails['users_ids']);
              }
              else{
                $inserted=$this->model_randezvous->createRandezVous($inserted_data);
              }
             
              if($inserted){
                echo json_encode([
                    'success'=>true,
                    'message'=>'the appoitment is created successfully'
                ]);

              }
              else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'the appoitment is not created'
                ]);
              }
        
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
            echo json_encode($validator);
        }



    }
    public function  getGoogleEmail($seanceId){
        $result =  $this->model_randezvous->getGoogleEmails($seanceId);
        echo json_encode($result);
    }
    public function getRandezVousEnvoyesHtml(){
        $date = $_GET['date'];
        $user_id= $this->getIdUser();
        $appoitments = $this->model_randezvous->getRandezVousEnvoyes($user_id,$date);
        foreach($appoitments as $a){
                        


        }



    }
    public function getRandezVousEnvoyeByDate($date){
           $randezVous = $this->model_randezvous->getRandezVousEnvoyes($date,$this->getIdUser());     
           $html = '<div class="top-wrapper">
                                            <i class="fa-regular fa-calendar-lines-pen"></i>
                                            <span>Randez Vous Envoyés</span>
                                        </div>' ;
           foreach($randezVous as $r){
                if($r['calender_link']){
                    $html .= '
                    <div class="assignment-list" onclick="detailRandezVous('.$r['id'].')">
                                        <div class="left">
                                           <img src="https://ssl.gstatic.com/calendar/images/dynamiclogo_2020q4/calendar_31_2x.png">
                                            <p>Tunisie,Mannouba:</p>
                                            <span>'.$r['titre'].'</span>
                                        </div>
                                        <div class="right">
                                            <span>'.$r['hour_min_deb'].' - '.$r['hour_min_fin'].'</span>
                                        </div>
                                        </div>
                      ';
                }
                else{
                    $html .= '
                    <div class="assignment-list" onclick="detailRandezVous('.$r['id'].')">
                                        <div class="left">
                                            <i class="icofont-ui-calendar"></i>
                                            <p>Tunisie,Mannouba:</p>
                                            <span>'.$r['titre'].'</span>
                                        </div>
                                        <div class="right">
                                            <span>'.$r['hour_min_deb'].' - '.$r['hour_min_fin'].'</span>
                                        </div>
                                        </div>
                 ';
                }
            }
            echo $html;

    }
    public function getRandezVousRecusByDate($date){
        $randezVous = $this->model_randezvous->getRandezVousRecus($date,$this->getIdUser());     
        $html = '<div class="top-wrapper">
                                            <i class="fa-regular fa-calendar-lines-pen"></i>
                                            <span>Randez Vous Recus</span>
                                        </div>' ;
        foreach($randezVous as $r){
             if($r['calender_link']){
                $html .= '
                 <div class="assignment-list" onclick="detailRandezVous('.$r['id'].')">
                                     <div class="left">
                                         <img src="https://ssl.gstatic.com/calendar/images/dynamiclogo_2020q4/calendar_31_2x.png">
                                         <p>Tunisie,Mannouba:</p>
                                         <span>'.$r['titre'].'</span>
                                     </div>
                                     <div class="right">
                                         <span>'.$r['hour_min_deb'].' - '.$r['hour_min_fin'].'</span>
                                     </div>
                                 </div>
             ';
             }
             else{
                $html .= '
                <div class="assignment-list" onclick="detailRandezVous('.$r['id'].')">
                                    <div class="left">
                                        <i class="icofont-ui-calendar"></i>
                                        <p>Tunisie,Mannouba:</p>
                                        <span>'.$r['titre'].'</span>
                                    </div>
                                    <div class="right">
                                        <span>'.$r['hour_min_deb'].' - '.$r['hour_min_fin'].'</span>
                                    </div>
                                </div>
                ';
             }
         }
                echo $html;

        }
     public function testGetRvRecus($date,$userId)   {
        $randezVous = $this->model_randezvous->getRandezVousRecus($date,$userId); 
        echo json_encode($randezVous);

     }
    public function findRandezVousById($id){
            $r = $this->model_randezvous->findRandezVousById($id);
            echo json_encode($r);
    }

    public function getAllRendezVous(){
        $rendezvous = $this->model_randezvous->getAllRendezVous();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($rendezvous);
    }
   
    
  
}