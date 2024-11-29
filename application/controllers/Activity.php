<?php
class Activity extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_activity');
        $this->load->database();
        $this->load->library('session');
    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];
    }

    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];
    }
      public function createActivity(){
        $validate_data = array(
            array(
                'field' => 'titre',
                'label' => 'Titre',
                'rules' => 'required'
            ),
            array(
                'field' => 'instructions',
                'label' => 'Instructions',
                'rules' => 'required'
            ),

         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $inserted_data = [
            'titre'=>$this->input->post('titre'),
            'instructions'=>$this->input->post('instructions'),
            'seance_id'=>$this->input->post('seance_id')
         ];
        if ($this->form_validation->run() === true) {
                $thumbnailfile = $_FILES['document'];
                if($thumbnailfile && isset($_FILES['document']['name']) && $_FILES['document']['name']){
                    $path = './assets/assets/images/'.$_FILES['document']['name'];
                    move_uploaded_file($_FILES['document']['tmp_name'], $path);
                    $inserted_data['document']= $_FILES['document']['name'];
                }
                $created = $this->model_activity->createActivity($inserted_data);
                if($created){
                    echo json_encode([
                        'success'=>true,
                        'message'=>'Activité crée avec succés'
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
    public function updateActivity($moduleId){
        $validate_data = array(
            array(
                'field' => 'titre',
                'label' => 'Titre',
                'rules' => 'required'
            ),
            array(
                'field' => 'instructions',
                'label' => 'Instructions',
                'rules' => 'required'
            ),
         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $updatedData = [
            'titre'=>$this->input->post('titre'),
            'instructions'=>$this->input->post('instructions'),
         ];
        if ($this->form_validation->run() === true) {
                $thumbnailfile = $_FILES['document'];
                if($thumbnailfile && isset($_FILES['document']['name']) && $_FILES['document']['name']){
                    $path = './assets/assets/images/'.$_FILES['document']['name'];
                    move_uploaded_file($_FILES['document']['tmp_name'], $path);
                    $updatedData['document']= $_FILES['document']['name'];
                }
                $created = $this->model_activity->updateActivity($moduleId,$updatedData);
                if($created){
                    echo json_encode([
                        'success'=>true,
                        'message'=>'Activité modifié avec succés'
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
    public function getActivities($formationId){
        $activities =    $this->model_activity->getAllActivitiesByFormation($formationId);
        $this->load->view('admin/gestion_seances/activities',[
           'info'=>[
               'activities'=>$activities
           ]
        ]);                       

    }
    public function prepareUpdateActivity($moduleId){
        $activity = $this->model_activity->getActivityById($moduleId);
        if(!$activity){
            show_404();
            return ;
        }
        else{
            $this->load->view('admin/gestion_seances/modifier_activity',[
                'info'=>[
                    'activity'=>$activity
                ]
            ]);
        }


    }
    public function getDetailsActivitiesEtudiant($formation_group_id){
        $info = $this->model_activity->getDetailsActivitiesEtudiant($formation_group_id,$this->getIdEtudiant());
        $this->load->view('student/formation/student_activities',[
            'info'=>$info
        ]);
    }
    public function livrerActivity(){
        
        $inserted_data =array();
        $documentFile = $_FILES['document'];
        if($documentFile && isset($_FILES['document']['name']) && $_FILES['document']['name']){
            $path = './assets/assets/images/'.$_FILES['document']['name'];
            move_uploaded_file($_FILES['document']['tmp_name'], $path);
            $inserted_data['document']= $_FILES['document']['name'];
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'aucun fichier est remis'
            ]) ;
        }
        $inserted_data['created_at'] = date('Y-m-d');
        $inserted_data['activity_id'] = $this->input->post('activity_id');
        $inserted_data['etudiant_id'] = $this->getIdEtudiant();
        $created = $this->model_activity->livrerDevoir($inserted_data);
        if($created){
            echo json_encode([
                'success'=>true,
                'message'=>'devoir remis avec succés'
            ]);

        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Une Erreur s\'est produite veuillez réessayer'
            ]);

        }

    }
    public function getDetailsActivity($seanceId){
            $info = $this->model_activity->getDetailsActivity($seanceId);
          //  echo json_encode($info);
            $this->load->view('enseignant/formation/activities_referent',[
                'info'=>$info
            ]);
    }
    public function getDetailsActivityCoaching($seanceId){
        $info = $this->model_activity->getDetailsActivity($seanceId);
      //  echo json_encode($info);
        $this->load->view('enseignant/coaching/activities_referent',[
            'info'=>$info
        ]);
}
    public function getSingleActivityReferent($activityId){
        $info = $this->model_activity->getSingleActivityReferent($activityId);  
        $this->load->view('enseignant/formation/single-activity',[
            'info'=>$info
        ]);


    }
    public function getSingleActivityReferentCoaching($activityId){
        $info = $this->model_activity->getSingleActivityReferent($activityId);  
        $this->load->view('enseignant/coaching/single-activity',[
            'info'=>$info
        ]);


    }
    
    
  
}