<?php







class Coaching extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_coaching');
        $this->load->database();
        $this->load->library('session');

    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];


    }
    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];
    }
    public function createCoaching(){
      
            $validator = array('success' => false, 'messages' => array());
            $validate_data = array(
                array(
                    'field' => 'nom',
                    'label' => 'Nom',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'date_debut',
                    'label' => 'Date Début',
                    'rules' => 'required',
                ),
                array(
                    'field' => 'date_fin',
                    'label' => 'Date Fin',
                    'rules' => 'required',
                ),
               
                array(
                    'field' => 'referent_id',
                    'label' => 'Référent',
                    'rules' => 'required',
                ),
             );
            $this->form_validation->set_rules($validate_data);
            $this->form_validation->set_error_delimiters('<p>', '</p>');
             $inserted_data = [
                'nom'=>$this->input->post('nom'),
                'date_debut'=>$this->input->post('date_debut'),
                'date_fin'=>$this->input->post('date_fin'),
                'referent_id'=>$this->input->post('referent_id')
             ];
            if ($this->form_validation->run() === true) {
                $thumbnailfile = $_FILES['thumbnail'];
                if($thumbnailfile && isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['name']){
                    $path = './assets/assets/images/'.$_FILES['thumbnail']['name'];
                    move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
                    $inserted_data['thumbnail']= $_FILES['thumbnail']['name'];
                }
                $inserted_data['created_at'] = date('Y-m-d');
                $created = $this->model_coaching->createCoaching($inserted_data);
                if($created){
                    echo json_encode([
                        'success'=>true,
                        'message'=>'La Session De Coaching Est Crée avec succes'
                    ]);
                }
                else{
                    echo json_encode([
                        'success'=>false,
                        'message'=>'Echec De l\'insertion veuillez Réessayer'
                    ]);
                }
            
            } else {
                        $validator['success'] = false;
                        foreach ($_POST as $key => $value) {
                            $validator['message'] = form_error($key);
                        }
                    }
    
           


    }

    public function updateFormation($id){
      
        $validator = array('success' => false, 'messages' => array());
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_debut',
                'label' => 'Date Début',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_fin',
                'label' => 'Date Fin',
                'rules' => 'required'
            ),
         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $updated_data = [
            'nom'=>$this->input->post('nom'),
            'date_debut'=>$this->input->post('date_debut'),
            'date_fin'=>$this->input->post('date_fin')
         ];
        if ($this->form_validation->run()) {
            $thumbnailfile = $_FILES['thumbnail'];
            if($thumbnailfile && isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['name']){
                $path = './assets/assets/images/'.$_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
                $updated_data['thumbnail']= $_FILES['thumbnail']['name'];
            }
            $created = $this->model_coaching->updateFormation($id,$updated_data);
            if($created){
                echo json_encode([
                    'success'=>true,
                    'message'=>'La Formation Est Crée avec succes'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'Echec De l\'insertion veuillez Réessayer'
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
    public function fetchCoachingData()
    {
        $moduleData = $this->model_coaching->fetchCoachingData();
        $result = array('data' => array());
        foreach ($moduleData as $key => $value) {
         
            
                    $actionButtons = '    
           <div class="dashboard__button__group">
                    <a href="'.base_url('update_coaching').'?coaching_id='.$value['id'].'"  class="dashboard__small__btn__2" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Modifier</a>
                        </div>

                        ';
                
            
            $progressButton = '<span class="dashboard__td dashboard__td--running">non publié</span> ';	
               

            $detailsButton = '<div>
			<a class="action-button btn btn-primary" href="'.base_url('detail_coaching').'?coaching_id='.$value['id'].'">
                                                       <i class="icofont-eye-open"></i>   </a></div>	 
                                                       ';		
          
            

            $result['data'][$key] = array(
                $value['nom'],
                $value['date_debut'],
                $value['coach'],
                $detailsButton,
                $actionButtons
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function inviteStudents($formationId,$inviteType="indiv"){
            $invited = $this->model_coaching->inviteStudents($formationId,$inviteType);
            
            if($invited){
                $mailSent = $this->sendEmailInvitation($formationId);
                if($mailSent){
                    echo json_encode([
                        'success'=>true,
                        'message'=>'Un Invitation est Envoyé Aux Etudiants Concernés'
                    ]);
                }
                else{
                    echo json_encode([
                        'success'=>false,
                        'message'=>'Echec De l\'opération veuillez Réessayer'
                    ]);    
                }

            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'Echec De l\'opération veuillez Réessayer'
                ]);
            }

    }
    private function sendEmailInvitation($formationId){
        $students = $this->input->post('students');
        $studentsIds = array();
        foreach($students as $s){
            $studentsIds[]=$s;
        }
        $mails = $this->model_coaching->getStudentsEmails($studentsIds);
        $formation = $this->model_coaching->getFormationById($formationId);
        $this->load->library('email');
        // Send email invitation
        $this->email->set_mailtype('html');
        $this->email->from('votre@email.com', 'PEESO');
        $this->email->to($mails);
        $this->email->subject('Invitation A La Formation');
        $this->email->message(
            "<p>Bonjour,
            <br>Vous etes invité à la formation ".$formation['nom']."</br>
            
             <br><br>Cordialement,<br>PEESo</p>"
        );
    
        return $this->email->send();

    }
    public function getUpdateFormationForm($id){
        $info = $this->model_coaching->getFormation($id);
        if(!$info){
            show_404();
            return;

        }
        else{
            $this->load->view('admin/gestion_formation/update_formation',[
                'info'=>$info
            ]);
        }

    }
    public function getUpdateInvitationForm($id){
        $formation = $this->model_coaching->getFormationById($id);
        $students = $this->model_coaching->getIninvitedStudents($id);
        if(!$formation){
            show_404();
            return;
        }
        else{
            $this->load->view('admin/gestion_formation/invite_students_admin',[
                'info'=>[
                    'students'=>$students,
                    'formation'=>$formation
                ]
            ]);
        }

    }
    

    public function getGroupInvitationForm($id){
        $formation = $this->model_coaching->getFormationById($id);
        $students = $this->model_coaching->getIninvitedStudents($id);
        if(!$formation){
            show_404();
            return;
        }
        else{
            $this->load->view('admin/gestion_formation/groupe_invitation_admin',[
                'info'=>[
                    'students'=>$students,
                    'formation'=>$formation
                ]
            ]);
        }

    }
    public function getFormationsStudent(){
        
        $formations = $this->model_coaching->getFormationStudent($_POST,$this->getIdEtudiant());
        $this->load->view('student/formations',[
            'info'=>$formations
        ]);
        

    }
    public function createDemandeFormation($formationId){
            $created = $this->model_coaching->createDemandeFormation([
                'formation_id'=>$formationId,
                'etudiant_id'=>$this->getIdEtudiant()
            ]);
            if($created){
                echo json_encode([
                    'success'=>true,
                    'message'=>'Demande est Envoyé Avec Succés'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'Echec De l\'opération veuillez Réessayer'
                ]);
            }
    }
    public function fetchNotAcceptedDemandesCoaching(){
        $moduleData = $this->model_coaching->fetchNotAcceptedDemandesCoaching();
        $result = array('data' => array());
        foreach ($moduleData as $key => $value) {
         
            $actionButtons = '    
           <div class="dashboard__button__group">
                    <button onclick="acceptDemande('.$value['demande_id'].')"  class="dashboard__small__btn__2">
                        <i class="icofont-check"></i>
                        inviter
                    </button>

             </div>

            ';
            $detailsButton = '<div>
			<a class="action-button btn btn-primary" href="'.base_url('profile_etudiant').'?etudiant_id='.$value['id'].'">
                                                       <i class="icofont-eye-open"></i>   </a></div>	 
                                                       ';		
            
            

            $result['data'][$key] = array(
                $value['nom'].' '.$value['prenom'],
                $value['coaching_name'],
                $detailsButton,
                $actionButtons
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    public function getDemandesForReferents(){

        $refrentId = $this->getIdEnseignant();
        $moduleData = $this->model_coaching->getDemandeForReferent($refrentId);
        $result = array('data' => array());
        foreach ($moduleData as $key => $value) {
            if($value['accepted']){
                $detailsButton = '<span class="dashboard__td dashboard__td--running">Accepté</span> ';	
            }	
            else{
                $detailsButton = '<span class="dashboard__td dashboard__td--over">En Attente</span> 
                                                           ';	
            }
            
             $result['data'][$key] = array(
                $value['formation_name'],
                $value['nom'].' '.$value['prenom'],
                
          
                $detailsButton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    public function getStudentDemandes(){
        $studentId = $this->getIdEtudiant();
        $moduleData = $this->model_coaching->getDemandeByStudent($studentId);
        $result = array('data' => array());
        foreach ($moduleData as $key => $value) {
            if($value['accepted']){
                $detailsButton = '<span class="dashboard__td dashboard__td--running">Accepté</span> ';	
            }	
            else{
                $detailsButton = '<span class="dashboard__td dashboard__td--over">En Attente</span> 
                                                           ';	
            }
            
             $result['data'][$key] = array(
                $value['nom'],
          
                $detailsButton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    public function acceptDemand($demandeId){
            $accepted =     $this->model_coaching->acceptDemande($demandeId); 
            $demande = $this->model_coaching->getDemandeFormationById($demandeId);
           $mail_sent =  $this->sendDemandAcceptationMail($demande['formation_id'],$demande['etudiant_id']);
            if($accepted &&  $mail_sent){
                echo json_encode([
                    'success'=>true,
                    'message'=>'un email est envoyé à l\'apprenant '
                ]);

            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'Echec De l\'opération veuillez Reessayer'
                ]);
                
            }
    }
    private function sendDemandAcceptationMail($formationId,$studentId){
        $etudiant = $this->model_coaching->getStudentById($studentId);
        $formation = $this->model_coaching->getFormationById($formationId);
        $this->load->library('email');
        // Send email invitation
        $this->email->set_mailtype('html');
        $this->email->from('votre@email.com', 'PEESO');
        $this->email->to($etudiant['email']);
        $this->email->subject('Invitation A La Formation');
        $this->email->message(
            "<p>Bonjour ".$etudiant['nom']." ".$etudiant['prenom']."
            <br>Votre Demande pour La formation <strong>  ".$formation['nom']."</strong></br>
            <br> A été accepté avec succés</br>
            
             <br><br>Cordialement,<br>PEESo</p>"
        );
    
        return $this->email->send();

    }
    public function affecterFormateur(){
        $referentId = $this->input->post('referent_id');
        $formationId = $this->input->post('formation_id');
        $affected = $this->model_coaching->affecterFormaionToRefrent($referentId,$formationId);
        if($affected){
            echo json_encode([
                'success'=>true,
                'message'=>'formation affecté avec succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Echec De L\'opération veuillez Réessayer'
            ]);
        }

    }
    public function prepareAffectationForm($formationId){
        $formation = $this->model_coaching->getFormationById($formationId);
        if($formation){
            $referents = $this->model_coaching->getAllReferents();
            $this->load->view('admin/gestion_formation/affectTeacher',[
                'info'=>[
                    'referents'=>$referents,
                    'formation'=>$formation
                ]
            ]);
        }
        else{
            show_404();
            return ;
        }


    }
    public function createCoachingEnseignant(){
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
            'referent_id'=>$this->getIdEnseignant()
         ];
        if ($this->form_validation->run() === true) {
            $thumbnailfile = $_FILES['thumbnail'];
            if($thumbnailfile && isset($_FILES['thumbnail']['name']) && $_FILES['thumbnail']['name']){
                $path = './assets/assets/images/'.$_FILES['thumbnail']['name'];
                move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path);
                $inserted_data['thumbnail']= $_FILES['thumbnail']['name'];
            }
            $inserted_data['created_at'] = date('Y-m-d');
            $created = $this->model_coaching->createCoaching($inserted_data);
            if($created){
                echo json_encode([
                    'success'=>true,
                    'message'=>'La Formation Est Crée avec succes'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'Echec De l\'insertion veuillez Réessayer'
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
    public function getFormationForEnseignant(){
            $connectedReferent = $this->getIdEnseignant();
            $formations = $this->model_coaching->getFormationForEnseignant($connectedReferent);
            $result = array('data' => array());
        foreach ($formations as $key => $value) {
            
             
            $actionButtons = '    
            <div class="dashboard__button__group">
                     <a href="'.base_url('update_formation').'?formation_id='.$value['id'].'"  class="dashboard__small__btn__2" href="#">
                         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Modifier</a>
                         </div>
 
                         ';
                 
             
             $progressButton = '<span class="dashboard__td dashboard__td--running">non publié</span> ';	
                
 
             $detailsButton = '<div>
             <a class="action-button btn btn-primary" href="'.base_url('detail_formation_referent').'?formation_id='.$value['id'].'">
                                                        <i class="icofont-eye-open"></i>   </a></div>	 
                                                        ';		
           

            $result['data'][$key] = array(
                $value['nom'],
                $value['date_debut'],
               
                $value['date_debut'],
                $detailsButton,
                $actionButtons
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);


    }
    public function publishFormation($formationId){
            $publie = $this->model_coaching->publishFormation($formationId);
            if($publie){
                echo json_encode([
                    'success'=>true,
                    'message'=>'La Formation est maintenant accessible'
                ]);

            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'Echec De L\'opération Vauillez Réessayer'
                ]);
            }

    }
    public function getGroupProgression($formationId): void{
        $progression = $this->model_coaching->getGroupProgression($formationId);
        $this->load->view('utils/formation_progress',[
            'info'=>[
                'progressions'=>$progression
            ]
        ]);
    }
    public function createCoachingContent(){
        $info = $this->model_coaching->prepareCreateCoachingForm();
        $this->load->view('admin/gestion_coaching/createCoaching',[
            'info'=>$info
        ]);
    }
    public function createCoachingReferentContent(){
        $info = $this->model_coaching->prepareCreateCoachingForm();
        $this->load->view('enseignant/formation/createCoaching',[
            'info'=>$info
        ]);
    }
    public function getMembers($coachingId){
        $info = $this->model_coaching->getMembers($coachingId);
        $this->load->view('admin/gestion_coaching/members',[
            'info'=>$info
        ]);


    }
    public function eliminateMember($coachingId,$etudiant_id){
        $deleted = $this->model_coaching->eliminateMember($coachingId,$etudiant_id);
        if($deleted){
            echo json_encode([
                'success'=>true,
                'message'=>'le membre est éliminée avec Succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Echec De l\'opération veuillez Réessayer'
            ]);
        }

    }








}