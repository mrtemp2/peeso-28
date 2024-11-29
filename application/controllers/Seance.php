<?php
class Seance extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_seance');
        $this->load->database();
        $this->load->library('session');
    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];
    }

    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];
    }
    public function getRoleUser(){
        return $this->session->userdata()['logged']['type'];
    }
    public function createSeance(){
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),

         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $inserted_data = [
            'nom'=>$this->input->post('nom'),
            'formation_id'=>$this->input->post('formation_id'),
            'date_debut'=>$this->input->post('date_debut'),
            'date_fin'=>$this->input->post('date_fin')
            
         ];
        if ($this->form_validation->run()) {
                $created = $this->model_seance->createSeance($inserted_data);
                if($created){
                    echo json_encode([
                        'success'=>true,
                        'message'=>'seance crée avec succés'
                    ]);
                }
                else{
                    echo json_encode([
                        'success'=>false,
                        'message'=>'Echec De l\'opération veuillez Réeesayer'
                    ]);
                }
        } else {
            $validator=array();
                $validator['success'] = false;
                foreach ($_POST as $key => $value) {
                    $validator['message'] = form_error($key);
                }
                echo json_encode($validator);
         }


    }
    public function updateSeance($seance_id){
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),

         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $update_data = [
            'nom'=>$this->input->post('nom'),
            'date_debut'=>$this->input->post('date_debut'),
            'date_fin'=>$this->input->post('date_fin'),
            'formation_id'=>$this->input->post('formation_id'),
            
         ];
        if ($this->form_validation->run() === true) {
                $updated = $this->model_seance->updateSeance($seance_id,$update_data);
                if($updated){
                    echo json_encode([
                        'success'=>true,
                        'message'=>'seance modifié avec succés'
                    ]);
                }
                else{
                    echo json_encode([
                        'success'=>false,
                        'message'=>'Echec De l\'opération veuillez Réeesayer'
                    ]);
                }
        } else {
                $validator['success'] = false;
                foreach ($_POST as $key => $value) {
                    $validator['message'] = form_error($key);
                }
                echo json_encode($validator);
         }


    }
    public function getSeances($formationId){
         $seances =    $this->model_seance->getAllSeanceByFormation($formationId);
         $this->load->view('admin/gestion_seances/seances',[
            'info'=>[
                'seances'=>$seances
            ]
         ]);                       

    }
    public function prepareUpdateSeance($seanceId){
        $seance = $this->model_seance->getSeanceById($seanceId);
        if(!$seance){
            show_404();
            return ;
        }
        else{
            $this->load->view('admin/gestion_seances/modifier_seances',[
                'info'=>[
                    'seance'=>$seance
                ]
            ]);
        }


    }
    public function getDetailsSeance($formation_group_id){
        $info = $this->model_seance->getDetailsSeances($formation_group_id);
        $this->load->view('enseignant/formation/seances',[
            'info'=>$info
        ]);
    }
    public function getDetailsSeanceCoaching($coaching_group_id){
        $info = $this->model_seance->getDetailsSeances($coaching_group_id);
        $this->load->view('enseignant/coaching/seances',[
            'info'=>$info
        ]);
    }
    public function getDetailsSeanceEtudiant($formation_group_id){
        $info = $this->model_seance->getDetailsSeances($formation_group_id);
        $this->load->view('student/formation/seances_etudiant',[
            'info'=>$info
        ]);
    }
   
    public function getSingleSeance($seanceId){
        $info  = $this->model_seance->getSingleSeance($seanceId);
        $this->load->view('enseignant/formation/single-seance',[
            'info'=>$info
        ]);
    }
    public function getSingleSeanceCoaching($seanceId){
        $info  = $this->model_seance->getSingleSeance($seanceId);
        $this->load->view('enseignant/coaching/single-seance',[
            'info'=>$info
        ]);
    }
    public function getSingleSeanceEtudiant($seanceId){
        $info  = $this->model_seance->getSingleSeance($seanceId);
        $this->load->view('student/formation/single-seance-etudiant',[
            'info'=>$info
        ]);
    }
    public function startSeance($seanceId,$formation_group_id){
        $created = $this->model_seance->startSeance($seanceId,$formation_group_id);;
        if($created){
            echo json_encode([
                'success'=>true,
                'message'=>'La Séance Est Démarrée Avec Succés'
            ]);
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Une Erreur Est Produite Veuillez Réessayer'
            ]);
        }
    }
    public function startSeanceCoaching($seanceId,$coaching_group_id){
        $created = $this->model_seance->startSeanceCoaching($seanceId,$coaching_group_id);;
        if($created){
            echo json_encode([
                'success'=>true,
                'message'=>'La Séance Est Démarrée Avec Succés'
            ]);
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Une Erreur Est Produite Veuillez Réessayer'
            ]);
        }
    }
    public function createEchangeEnseignant($type='initiateur'){
        $validate_data = array(
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => 'required'
            ),
           
            array(
                'field' => 'seance_id',
                'label' => 'La Seance est requis',
                'rules' => 'required'
            ),


           
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        if (!$this->form_validation->run()) {
            $validator = array();
            $validator['success'] = false;
            $validator['message']= 'vérifier vos champs';
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
            echo json_encode($validator);
            return;
        }
        $inserted_data = [
            'comment'=>$this->input->post('comment'),
            'seance_id'=>$this->input->post('seance_id'),
            'enseignant_id'=>$this->getIdEnseignant(),
            'created_at'=>date('Y-m-d'),
            'sender'=>$this->getIdUser()
        ];
        $rapport_file = $_FILES['rapport'];
        if($rapport_file && isset($_FILES['rapport']['name'])){
            $path = './assets/assets/images/'.$_FILES['rapport']['name'];
            move_uploaded_file($_FILES['rapport']['tmp_name'], $path);
            $inserted_data['rapport']= $_FILES['rapport']['name'];
        }
        $test = $this->model_seance->createEchange($inserted_data);
        if($test){
            echo json_encode([
                'success'=>true,
                'message'=>'crée avec succés'
           ]);
        }
        else{
            echo json_encode([
                'success'=>true,
                'message'=>'échec de l\'opération veuillez réessayer' 
            ]);
        }
        return;
    }
    public function createEchangeEtudiant($type='initiateur'){
        $validate_data = array(
            array(
                'field' => 'comment',
                'label' => 'Comment',
                'rules' => 'required'
            ),
           
            array(
                'field' => 'seance_id',
                'label' => 'La Seance Est Requise',
                'rules' => 'required'
            ),


           
        );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        if (!$this->form_validation->run()) {
            $validator = array();
            $validator['success'] = false;
            $validator['message']= 'vérifier vos champs';
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
            echo json_encode($validator);
            return;
        }
        $inserted_data = [
            'comment'=>$this->input->post('comment'),
            'etudiant_id'=>$this->getIdEtudiant(),
            'created_at'=>date('Y-m-d'),
            'seance_id'=>$this->input->post('seance_id'),
            'sender'=>$this->getIdUser()
        ];
        $rapport_file = $_FILES['rapport'];
        if($rapport_file && isset($_FILES['rapport']['name'])){
            $path = './assets/assets/images/'.$_FILES['rapport']['name'];
            move_uploaded_file($_FILES['rapport']['tmp_name'], $path);
            $inserted_data['rapport']= $_FILES['rapport']['name'];
        }
        $test = $this->model_seance->createEchange($inserted_data);
        if($test){
            echo json_encode([
                'success'=>true,
                'message'=>'crée avec succés'
           ]);
        }
        else{
            echo json_encode([
                'success'=>true,
                'message'=>'échec de l\'opération veuillez réessayer' 
            ]);
        }
        return;
    }
    public function getEchanges($seance_id){
       

        $html = '';
        $echanges = $this->model_projet->fetchExchanges($seance_id);
        
        foreach($echanges as $e){
              if($e['sender']!=$this->getIdUser()){
                $html.='<div class="user-info-area">
            <div class="user-pict">
                <img src="https://esen-sci-compet.com/eesu/assets/assets/images/default.png" alt="">
            </div>
            <div class="user-other-info">
                <div class="user-name-area">
                   '. $this->getNomSenderExchange($e).'
                </div>
                <div class="message-date">
                    '.$e['number_of_days'].'
                </div>
                <div class="user-message-area">
                     <p>
                        '.$e['comment'].'
                     </p>  
                     '.$this->getRapportHtml($e['rapport']).' 

                </div>
            </div>

        </div>';
                }      
                else{
                
                        $html.='<div class="user-info-area right">
            <div class="user-pict">
                <img src="https://esen-sci-compet.com/eesu/assets/assets/images/default.png" alt="">
            </div>
            <div class="user-other-info">
                <div class="user-name-area">
                    Vous
                </div>
                <div class="message-date">
                   '.$e['number_of_days'].'
                </div>
                <div class="user-message-area">
                     <p>
                       '.$e['comment'].'
                     </p>   
                        '.$this->getRapportHtml($e['rapport']).'
                </div>
            </div>

        </div>';
                   
        }


        } 

        echo $html;
    }
  
 
    
      
    
}