<?php
class Module extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_module');
        $this->load->database();
        $this->load->library('session');
    }
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];
    }

    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];
    }
      public function createModule(){
        $validate_data = array(
            array(
                'field' => 'titre',
                'label' => 'Titre',
                'rules' => 'required'
            ),

         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $inserted_data = [
            'titre'=>$this->input->post('titre'),
            'seance_id'=>$this->input->post('seance_id')
         ];
        if ($this->form_validation->run() === true) {
                $thumbnailfile = $_FILES['document'];
                if($thumbnailfile && isset($_FILES['document']['name']) && $_FILES['document']['name']){
                    $path = './assets/assets/images/'.$_FILES['document']['name'];
                    move_uploaded_file($_FILES['document']['tmp_name'], $path);
                    $inserted_data['document']= $_FILES['document']['name'];
                }
                $created = $this->model_module->createModule($inserted_data);
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
    public function updateModule($moduleId){
        $validate_data = array(
            array(
                'field' => 'titre',
                'label' => 'Titre',
                'rules' => 'required'
            ),
         );
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
         $updatedData = [
            'titre'=>$this->input->post('titre'),
         ];
        if ($this->form_validation->run() === true) {
                $thumbnailfile = $_FILES['document'];
                if($thumbnailfile && isset($_FILES['document']['name']) && $_FILES['document']['name']){
                    $path = './assets/assets/images/'.$_FILES['document']['name'];
                    move_uploaded_file($_FILES['document']['tmp_name'], $path);
                    $updatedData['document']= $_FILES['document']['name'];
                }
                $created = $this->model_module->updateModule($moduleId,$updatedData);
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
    public function getModules($formationId){
        $modules =    $this->model_module->getAllModulesByFormation($formationId);
        $this->load->view('admin/gestion_seances/modules',[
           'info'=>[
               'modules'=>$modules
           ]
        ]);                       

    }
    public function prepareUpdateModule($moduleId){
        $module = $this->model_module->getModuleById($moduleId);
        if(!$module){
            show_404();
            return ;
        }
        else{
            $this->load->view('admin/gestion_seances/modifier_modules',[
                'info'=>[
                    'module'=>$module
                ]
            ]);
        }
    }
    public function getDetailsModule($seanceId){
            $info = $this->model_module->getDetailsModules($seanceId);
            if(!$info){
                show_404();
                return ;

            }
            else{
                $this->load->view('utils/formation_modules',[
                    'info'=>$info
                ]);
            }


    }
    public function getDetailsModuleCoaching($seanceId){
        $info = $this->model_module->getDetailsModules($seanceId);
        if(!$info){
            show_404();
            return ;

        }
        else{
            $this->load->view('utils/coaching_modules',[
                'info'=>$info
            ]);
        }


    }
    
  
}