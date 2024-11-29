<?php







class Projet extends CI_Controller
{


    private $domPdf;
    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_projet');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('model_fiche');
        $this->load->library('pdf');
        $this->load->library('excel');
        $this->domPdf = new Pdf();

    }
     
    
    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];


    }
    public function getIdEnseignant(){
        return $this->session->userdata()['logged']['enseignant_id'];


    }
    public function getEtablissementEnseignant(){
        return $this->session->userdata()['logged']['etablissement_id'];


    }
    public function getIdUser(){
        return $this->session->userdata()['logged']['id'];
    }

    public function fetchProjetData()
    {
        $moduleData = $this->model_projet->fetchProjetData();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            // if($value['1er_validation']==0){
            //     $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            // }
            // else{
            //     $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            // }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_appel'],
                $value['nom_ee'],
                // $etatButton,
                $viewbutton,
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function fetchProjetData1erValidation()
    {
        $moduleData = $this->model_projet->fetchProjetData1erValidation();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            $evaluatebutton = '<button type="button" data-toggle="modal" data-target="#evaluerSubjectModal" onclick="evaluer(' . $value['id'] . ')" style="
                            background-color: #0eee86; 
                            border: 1px solid #0eee86; 
                            border-radius: 50%;
                            width: 36px;
                            height: 36px;
                            display: flex;
                            align-items: center;
                            cursor: pointer;
                            justify-content: center;
                            transition: 0.3s;
                        ">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            // if($value['1er_validation']==0){
            //     $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            // }
            // else{
            //     $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            // }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_ee'],
                // $etatButton,
                $viewbutton,
                $evaluatebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function fetchProjetDataRefuse()
    {
        $moduleData = $this->model_projet->fetchProjetDataRefuse();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            // if($value['1er_validation']==0){
            //     $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            // }
            // else{
            //     $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            // }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_ee'],
                // $etatButton,
                $viewbutton,
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchProjetDataInitiateur()
    {
        $moduleData = $this->model_projet->fetchProjetDataInitiateur();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            // if($value['1er_validation']==0){
            //     $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            // }
            // else{
            //     $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            // }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_appel'],
                $value['nom_ee'],
                // $etatButton,
                $viewbutton,
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchProjetDataInnovateur()
    {
        $moduleData = $this->model_projet->fetchProjetDataInnovateur();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            // if($value['1er_validation']==0){
            //     $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            // }
            // else{
            //     $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            // }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_appel'],
                $value['nom_ee'],
                // $etatButton,
                $viewbutton,
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchProjetDataPromoteur()
    {
        $moduleData = $this->model_projet->fetchProjetDataPromoteur();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            // if($value['1er_validation']==0){
            //     $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            // }
            // else{
            //     $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            // }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_appel'],
                $value['nom_ee'],
                // $etatButton,
                $viewbutton,
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchProjetAccepteData()
    {
        $moduleData = $this->model_projet->fetchProjetAccepteData();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            if($value['affecte']==0){
                $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            }
            else{
                $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_appel'],
                $value['nom_ee'],
                $etatButton,
                $viewbutton,
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchProjetEnCoursData()
    {
        $moduleData = $this->model_projet->fetchProjetEnCoursData();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
            if($value['affecte']==0){
                $etatButton = '<button class="btn btn-sm btn-danger action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-close"></i></button>';
            }
            else{
                $etatButton = '<button class="btn btn-sm btn-success action-button" disabled style="pointer-events: none; opacity: 1 !important;"><i class="fas fa-check"></i></button>';
            }

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_appel'],
                $value['nom_ee'],
                $etatButton,
                $viewbutton,
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
   
    public function removeProjet($moduleId = null)
    {
        if ($moduleId) {
            $remove = $this->model_projet->removeProjet($moduleId);
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

    public function getProjet($id)
    {
        $result = $this->model_projet->getProjet($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    private function validateProject($project){
        $regx_float = '/^-?\d+(\.\d+)?$/';
        $errors = [];
        if(isset($project['montant_total_investe']) && !preg_match($regx_float,$project['montant_total_investe']) ){
                $errors['montant_total_investe'] = 'ce champs n\'est pas valide';

        }    
        if(isset($project['taux_finoncement']) && !preg_match($regx_float,$project['taux_finoncement']) ){
            $errors['taux_finoncement'] = 'ce champs n\'est pas valide';
   

        }    
        if(isset($project['montant_credit']) && !preg_match($regx_float,$project['montant_credit']) ){
            
            $errors['montant_credit'] = 'ce champs n\'est pas valide';

        }  
        return $errors;  
         
        ///^-?\d+(\.\d+)?$/
        
    }
    public function getEchangesEtudiant($project_id,$id_enseignant){
       

            $html = '';
            $etudiantId = $this->getIdEtudiant();
            $echanges = $this->model_projet->fetchExchanges(intval($id_enseignant),$etudiantId,intval($project_id));
            foreach($echanges as $e){
                  if($e['sender']!=$this->getIdUser()){
                    $html.='<div class="user-info-area">
                <div class="user-pict">
                    <img src="https://esen-sci-compet.com/eesu/assets/assets/images/default.png" alt="">
                </div>
                <div class="user-other-info">
                    <div class="user-name-area">
                       '. $e['nom_teacher'].' '. $e['prenom_teacher'].'
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
    
    private function getNomSenderExchange($e){
        if($e['nom_student'] && $e['prenom_student']){
                return $e['nom_student'] .' '.$e['prenom_student'];
        }
        else{
            return $e['nom_teacher'] .' '.$e['prenom_teacher'];
            
        }
    }
    public function getEchangesHistory($seanceId,$type){
        $html = '';
        $echanges = $this->model_projet->fetchExchanges($seanceId,$type);
        foreach($echanges as $e){
              
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
              echo $html;

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
    public function getEchangesInnovateur($seance_id){
       

        $html = '';
        $echanges = $this->model_projet->fetchExchanges($seance_id,'innovateur');
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
    public function getEchangesPromoteur($seance_id){
       

        $html = '';
        $echanges = $this->model_projet->fetchExchanges($seance_id,'promoteur');
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
        $test = $this->model_projet->createEchange($inserted_data,$type);
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
        $test = $this->model_projet->createEchange($inserted_data,$type);
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
    
    public function addCacheUsers(){
       
        
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required',
                
            ),
            array(
                'field' => 'prenom',
                'label' => 'prenom',
                'rules' => 'required',
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required',
                          
            ),
            array(
                'field' => 'phone',
                'label' => 'Numéro De Téléhpone',
                'rules' => 'required',
                ),
            array(
                'field' => 'niveau',
                'label' => 'niveau',
                'rules' => 'required',
                        
            ),
            array(
                'field' => 'etablissement_id',
                'label' => 'Etablissement',
                'rules' => 'required',
                         
            ),
            array(
                'field' => 'appel_id',
                'label' => 'Appel A La condidature',
                'rules' => 'required',
                         
            ),
            
            
            
        );
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
        if (!$this->form_validation->run()) {
            $validator = array();
            $validator['success'] = false;
            $validator['message']= 'vérifier vos champs';
            foreach ($_POST as $key => $value) {
                if(form_error($key) && form_error($key)!=''){
                    $validator['messages'][$key] = form_error($key);
                }
                
            }
            if(isset($validator['messages'])){
                echo json_encode($validator);
                return;
            }
        }
        $this->form_validation->set_rules($validate_data);
        $inserted_data= [
            'nom'=>$this->input->post('nom'),
            'prenom'=>$this->input->post('prenom'),
            'email'=>$this->input->post('email'),
            'phone'=>$this->input->post('phone'),
            'niveau'=>$this->input->post('niveau'),
            'etablissement_id'=>$this->input->post('etablissement_id'),
            'appel_id'=>$this->input->post('appel_id'),
            'addedBy'=>$this->getIdEtudiant()
        ];
        $cv_file = $_FILES['cv'];
        if(!$cv_file){
            echo json_encode([
                'success'=>false,
                'message'=>'vérifier vos champs',
                'messages'=>[
                    'cv'=>'le cv est requis'
                ]  
            ]);  
            return;
        }
        
        $path = './assets/assets/images/'.$_FILES['cv']['name'];
        move_uploaded_file($_FILES['cv']['tmp_name'], $path);
        $inserted_data['cv']= $_FILES['cv']['name'];
        if($this->input->post('old_promotion') &&  $this->input->post('old_promotion')!='aucune'){
            $inserted_data['old_promotion']= $this->input->post('old_promotion');
            $inserted_data['old_niveau']= $this->input->post('old_niveau');
        }
        $created = $this->model_projet->createCacheUser($inserted_data);
        if(!$created){
            echo json_encode([
                'success'=>false,
                'message'=>'Echec De l\'opération veuillez reessayer'
            ]);
        }
        else{
            echo json_encode([
                'success'=>true,
                'message'=>'Utilisateur Crée avec Succés'
            ]);
        }
    }
    
    public function deleteCacheUser($user_id){
        $deleted = $this->model_projet->deleteCacheUser($user_id,$this->getIdEtudiant());
        if($deleted){
            echo json_encode([
                'success'=>true,
                'message'=>'l\utilisateur est Crée avec Succes'
            ]);
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Echec De l\'oprération'
            ]);
        }
    }
    public function getMembersHtml($appel_id){
        $id_etudiant = $this->getIdEtudiant();
        $html = '';

        $formations = $this->model_projet->getStudentCacheUsers($appel_id,$id_etudiant);
        foreach($formations as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['prenom'].'</td>';
            $html .= '<td>'.$f['email'].'</td>';
            
            $html .='<td>'.'<div class="actions">
            <button type="button" class="btn btn-sm btn-danger action-button"  onclick="removeUser('.$f['id'].')"><i class="far fa-trash-alt"></i></button>
            </div>'.'</td>';
            $html .= '</tr>';
        }
        echo $html;
    }
    public function getMembresProject($id_project){
        echo json_encode($this->model_projet->getMembresProject($id_project));

    }
   private function validateProjectForm(){
    $validate_data = array(
        array(
            'field' => 'titre',
            'label' => 'Titre',
            'rules' => 'required',
          
        ),
      
        array(
            'field' => 'besoin_project',
            'label' => 'Besoin',
            'rules' => 'required',
        ),
        array(
            'field' => 'solution_project',
            'label' => 'Solution',
            'rules' => 'required',
                      
        ),
        array(
            'field' => 'clients_potentiels',
            'label' => 'Clients Potentiels',
            'rules' => 'required',
            ),
        array(
            'field' => 'offre',
            'label' => 'Offre',
            'rules' => 'required',
        ),
        array(
            'field' => 'genre_project',
            'label' => 'Genre',
            'rules' => 'required',
                       
        ),
        array(
            'field' => 'link_vid',
            'label' => 'Lien Video',
            'rules' => 'required',
                     
        ),
        array(
            'field' => 'creation_step',
            'label' => 'Genre',
            'rules' => 'required',
            'question'=>' Où êtes vous dans votre projet?'            
        ),
        
        array(
            'field' => 'motivation_letter',
            'label' => 'Motivation',
            'rules' => 'required',
        )
        
    );
    $this->form_validation->set_rules($validate_data);
    if (!$this->form_validation->run()) {
        $validator = array();
        $validator['success'] = false;
        foreach ($_POST as $key => $value) {
            if(form_error($key) && form_error($key)!=''){
                $validator['message'] = form_error($key); 
            }
        }
        if(isset($validator['message'])){
            throw new Exception($validator['message']);
        }
    }
    																	
    return [
            'business_plan'=>null,
            'id_appel_condidature'=>$this->input->post('id_appel_condidature'),
            'titre'=>$this->input->post('titre'),
            'id_tuteur'=>null,
            'affecte'=>false,
            'date_envoi'=>null,
            'isGroup'=>isset($_POST['members'])&&count($_POST['members'])?true:false,
             'besoin_project'=>$this->input->post('besoin_project'),
            'solution_project'=>$this->input->post('solution_project'),
            'clients_potentiels'=>$this->input->post('clients_potentiels'),
            'offre'=>$this->input->post('offre'),
            'genre_project'=>$this->input->post('genre_project'),
            'link_vid'=>$this->input->post('link_vid'),
            'creation_step'=>$this->input->post('creation_step'),
            'programme_accompagnent'=>$this->input->post('programme_accompagnent'),
            'motivation_letter'=>$this->input->post('motivation_letter'),
            'etudiant_id'=>$this->getIdEtudiant(),
    ];
   }
    private function uploadCv(){
        $cvFile = $_FILES['cv_porter'];
        if(!$cvFile){
            throw new Exception('le cv est requis');
        }
        if(isset($_FILES['cv_porter']['name'])){
            $path = './assets/assets/images/'.$_FILES['cv_porter']['name'];
            move_uploaded_file($_FILES['cv_porter']['tmp_name'], $path);
            return  $_FILES['cv_porter']['name'];
        }
        else{
            throw new Exception('le cv est requis');
        
        }


    }
    public function add_project(){
        try{
            $members = array();
            $project = $this->validateProjectForm();
            $project_id = $this->model_projet->createProject($project);
            if(!$project_id){
                throw new Exception('Echec De L\'opération veuillez Réessayer');
            }
            $project_domaines = array();
            $domaines_ids = $this->input->post('domaines');
            foreach($domaines_ids as $d_id){
                $project_domaines[]=[
                    'project_id'=>$project_id,
                    'domaine_id'=>intval($d_id)
                ];
    
    
            }
            $test = $this->model_projet->setProjectDomaines($project_domaines);
            $cv = $this->uploadCv();
            $prime_member=[
                'cv'=>$cv,
                'porteur_project'=>true,
                'etudiant_id'=>$this->getIdEtudiant(),
                'project_id'=>$project_id,
                'old_promotion'=>null,
                'old_niveau'=>null
            ]; 
            
            if($this->input->post('old_promotion_porter')!='aucune'){
                $prime_member['old_promotion'] = $this->input->post('old_promotion_porter');
                $prime_member['old_niveau'] = $this->input->post('old_niveau_porter');
                
            }
            $created_members = $this->model_projet->createProjetMember(intval($this->input->post('id_appel_condidature')),$this->getIdEtudiant() ,$project_id,$prime_member);
            if(!$created_members){
                throw new Exception('on ne peut pas crér les membres');
            }
            echo json_encode([
                'success'=>true,
                'message'=>'Le Project est crée avec succés'
            ]);
       
       
        }catch(Exception $e){
            echo json_encode([
                'success'=>false,
                'message'=>$e->getMessage()
            ]);
        }
        
        return ;
    }
   public function update_project($iserted_data_id){
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
            'titre'=>$this->input->post('titre'),
            'description'=>$this->input->post('description'),
            'montant_total_investe'=>$this->input->post('montant_total_investe'),
            'taux_finoncement'=>$this->input->post('taux_finoncement'),
            'id_appel_condidature'=>intval($this->input->post('id_appel_condidature')),
            'montant_credit'=>$this->input->post('montant_credit'),
            'vehicule'=>$this->input->post('vehicule')=='1'?true:false,
            'etudiant_id'=>$this->getIdEtudiant()
            
    ];
    $errors = $this->validateProject($inserted_data);
    if(count($errors)){
        echo json_encode([
            'success'=>false,
            'message'=>'vérifier vos champs',
            'messages'=>$errors  
        ]);
        return ;
    }
    $business_plan_file = $_FILES['business_plan'];
    if($business_plan_file && isset($_FILES['business_plan']['name'])){
        $path = './assets/assets/images/'.$_FILES['business_plan']['name'];
        move_uploaded_file($_FILES['business_plan']['tmp_name'], $path);
        $inserted_data['business_plan']= $_FILES['business_plan']['name'];
    }
   
    $test = $this->model_projet->updateProject($iserted_data_id,$this->getIdEtudiant(),$inserted_data);
    if(!$test){
        echo json_encode([
            'success'=>false,
            'message'=>'Erreur De Mis à Jour veuillez Réessayer',
            
        ]);
        return;
    }

    $files = $_FILES;
    if(isset($_FILES['pieces_jointes'])){
        $cpt = count($_FILES['pieces_jointes']['name']);
        $pieces_jointes =array();
        for($i=0; $i<$cpt; $i++)
        {           
            $_FILES['pieces_jointes']['name']= $files['pieces_jointes']['name'][$i];
            $_FILES['pieces_jointes']['type']= $files['pieces_jointes']['type'][$i];
            $_FILES['pieces_jointes']['tmp_name']= $files['pieces_jointes']['tmp_name'][$i];
            $_FILES['pieces_jointes']['error']= $files['pieces_jointes']['error'][$i];
            $_FILES['pieces_jointes']['size']= $files['pieces_jointes']['size'][$i];    
    
            
            $uploadPath = './assets/assets/images/'.$_FILES['pieces_jointes']['name'];
            move_uploaded_file($_FILES['pieces_jointes']['tmp_name'], $uploadPath);
            $pieces_jointes[]=[
                'path'=>$_FILES['pieces_jointes']['name'],
                'type'=>$_FILES['pieces_jointes']['type'],
                'project_id'=>$iserted_data_id
            ];    
        }
        $test = $this->model_projet->setProjectPiecesJointes($pieces_jointes);
        if(!$test){
            echo json_encode([
                'success'=>false,
                'message'=>'Erreur De Création veuillez Réessayer',
                
            ]);
            return;      
    
        }
    }
    
    $project_domaines = array();
    $domaines_ids = $this->input->post('domaines');
    foreach($domaines_ids as $d_id){
        $project_domaines[]=[
            'project_id'=>$iserted_data_id,
            'domaine_id'=>intval($d_id)
        ];


    }
    $this->model_projet->deleteAllProjectDomaines($iserted_data_id);
    $test = $this->model_projet->setProjectDomaines($project_domaines);
    if(!$test){
        echo json_encode([
            'success'=>false,
            'message'=>'Erreur De Modification veuillez Réessayer',
            
        ]);
        return;
    }
    
    echo json_encode([
        'success'=>true,
        'message'=>'le project est Modifié avec succés'
    ]);
    return ;
    }
   public function getDetailsProjects($project_id){
        $p = $this->model_projet->getDetailsProjects($project_id);   
        echo json_encode($p);
   }
   public function fetchProjetEtudiant()
    {
        $moduleData = $this->model_projet->getProjectsEtudiant($this->getIdEtudiant());
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';
           
             $updateButton='<div class="actions">
                            <a href="'.base_url().'update_project?project_id='.$value['id'].'" class="btn btn-sm btn-success action-button"><i class="fas fa-edit"></i></a>
                        </div>';
                        if(!$value['porteur_project']){
                            $updateButton='<div class="actions">
                            <a  class="btn btn-sm btn-danger action-button"><i class="fas fa-close"></i></a>
                        </div>';

                        }  
             $niveau = $value['niveau'];              
             if($niveau=='non'){
                $niveau='refusé';       

             }      
            // $deletebutton = ' <div class="actions"> 
            //                 <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
            //                 </button>
            //             </div>';
           
            $result['data'][$key] = array(
                $value['id'],
                $value['titre'],
                $niveau,
                $viewbutton,
                $updateButton
                // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function getProjectsForEnsignants(){
            
        $moduleData = $this->model_projet->getProjetsNonAffecte();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';

          
                $acceptation =   '<div class="actions">
                            <button class="btn btn-sm btn-success action-button" onclick="acceptProject('.$value['id'].')"><i class="fas fa-check"></i></button>
                        </div';
                        
           
            $result['data'][$key] = array(
                $value['titre'],
                $value['domaine_names'],
                $viewbutton,
                $acceptation               // $deletebutton
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    public function fetchProjetEnseignant()
    {
        $moduleData = $this->model_projet->getProjectsAffectesEnsignants($this->getIdEnseignant());
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                            <a href="'.base_url().'details_projects_etudiant?project_id='.$value['id'].'" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                        </div';

            $chatButton = '<div class="actions">
                            <a href="'.base_url().'echange_enseignant?project_id='.$value['id'].'" class="btn btn-sm btn-success action-button"><i class="fas fa-messages"></i></a>
                        </div';
            
           
            $result['data'][$key] = array(
                $value['id'],
                $value['titre'],
                $viewbutton,
                $chatButton, 
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    private function getFullAsset($path_asset){
        return base_url('assets/assets/images/').''.$path_asset;


    }
    public function deletePiecesJointes($id){
        $deleted =  $this->model_projet->deletePiecesJointes($id);
        if($deleted){
            echo json_encode([
                'success'=>true,
                'message'=>'piece jointe supprimé avec succés'
            ]);
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Erreur De Supprission'
            ]);
        }
    }
    public function loadPiecesJointesHtml($project_id){
        $pieces_jointes = $this->model_projet->getPiecesJointesParProject($project_id);
        $html ='';
        foreach($pieces_jointes as $p){
            $html .='<div class="jquery-uploader-card" id="72076b60-487d-4c10-8f37-55eea0519c6b" style="box-shadow: rgb(248, 172, 89) 0px 0px 3px 1px inset;">
            <div class="jquery-uploader-preview-main">
                <div class="jquery-uploader-preview-action">
                    <ul>
                    <!-- <li class="file-detail"><i class="fa fa-eye"></i></li> !-->
                        <li class="file-delete">
                            <button onclick="removePieceJointe('.$p['id'].')">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                    
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="jquery-uploader-preview-progress" style="display: none;">
                    <div class="progress-mask"></div>
                    <div class="progress-loading">
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                </div>
                <div class="file_other '.$this->getFileType($p).'"></div>
                
            </div>
        </div>';

        }
        echo $html;


    }
    private function getFileType($file){
        $type = $file['type'];
        if(strpos($type,'video')){
            return 'video';
        }
        if(strpos($type,'doc')){
            return 'doc';
        }
        if(strpos($type,'pdf')){
            return 'pdf';
        }
    
        return '';
    }

    public function getTuteursByRole()
    {
        $role = $this->input->post('role_tut'); // Get the selected role from POST data
        $evaluateurs = $this->model_projet->getTuteur($role); // Fetch evaluators based on the role
        echo json_encode($evaluateurs); // Return the result as JSON
    }
    
    public function affecterProjetHtml($id){
        $result = $this->model_projet->getProjet($id);
        $enseignantsAffectes = $this->model_projet->getEnseignantsAffectes($id);
        $result['enseignants_affectes'] = array();
        $evaluateurs = $this->model_projet->getTuteur(); 

        $html = "<h4 style='text-align: center; font-weight: bold;'>Informations d'Affectation</h4>";
        $html = $html."<br><br>";
        
        $html = $html . "<div class='form-group'>";
        $html .= "<label for='liste' style='color: black;font-weight: 600;margin-top: 20px;text-align: center;font-size: large;'>Liste des référents : </label>";
        

        $html .= "<select class='form-control' id='student_id' name='intervenant_id' style='font-size:large;'>";
        $html .= "<option value=''>Sélectionner un référent</option>";
        foreach($evaluateurs as $e){
            $html .= "<option value='". $e['id'] ."'>" . $e['nom'] . ' ' . $e['prenom'] . " (". $e['domaines'] .")"."</option>";
        }
        $html .= "</select></div>";
        if($result['affecte'] == 0) {
            $html = $html."<button class='rts-btn btn-primary' style='width:100% !important;max-width:100% !important' onclick='affecterTuteur(".$result['id'].")'>Affecter</button><br>";
            $html = $html."<div id='nomEvaluateur'></div>";
        }
        
        
        if($enseignantsAffectes && count($enseignantsAffectes) > 0){
            $html.= "<h4 style='margin-top:20px;text-align' class='custom-header'>Tuteurs affectés :</h4>";
            $html.= "<table class='table-reviews quiz mb--0'>";
            $html.= '<thead><tr><th>ID</th><th>Nom</th><th> Date D\'envoie </th><th>Etat d\'acceptation </th><th> Etat </th> <th>Date évaluation</th><th>Évaluation</th> <th> dernier rapport </th><th> Actions </th> </tr></thead>';
           $html.= "<tbody>";    
            foreach($enseignantsAffectes as $e){
                $status = $e['status'];
            if ($status == 0) {

                $statusText = '<span class="btn btn-warning"> En attente</span>';
            } elseif ($status == 1) {
                $statusText = '<span class="btn btn-success">Accepté</span>';
                // $statusClass = 'text-success';
            } elseif ($status == 2) {
                $statusText = '<span class="btn btn-danger">Refusé</span>';
                // $statusClass = 'text-danger';
            }
            elseif ($status == 3) {
                $statusText = '<span class="btn btn-secondary">A reviser</span>';
                // $statusClass = 'text-danger';
            }
            $acceptationStatus = $e['acceptation_status'];
            if ($acceptationStatus == 0) {

                $acceptationStatusText = '<span class="btn btn-warning"> En attente</span>';
            } elseif ($acceptationStatus == 1) {
                $acceptationStatusText = '<span class="btn btn-success">Accepté</span>';
                // $statusClass = 'text-success';
            }
            elseif ($acceptationStatus == 2) {
                    $statusText = '<span class="btn btn-danger">Refusé</span>';
                // $statusClass = 'text-success';
            }
            $rapport_path = ' <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSoumission"><i class="far fa-close"></i></button>';
            if($e['rapport']){
                $rapport_path = ' <a type="button" href="'.base_url('assets/assets/images/' . $e['rapport']).'" download="'.$e['rapport'].'" class="btn btn-sm btn-success action-button" data-toggle="modal"><i class="fa fa-download"></i></a>';
                
            }
                $html = $html."<tr>";
                 $html = $html."<td>" . $e['id'] . "</td>";
                 $html = $html."<td>" .$e['nom'] .' ' .$e['prenom'] . "(". $e['domaines'] .")"."</td>";
                 $html = $html."<td>". $e['date_envoi'] . "</td>";
                 $html = $html."<td>" . $acceptationStatusText . "</td>";
                
                 $html = $html."<td>" . $statusText . "</td>";
                 $html = $html."<td></td>";
                 $html = $html."<td></td>";
                 $html = $html."<td>" . $rapport_path . "</td>";
                 $actions = '<div class="actions">
        <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSoumission" onclick="removeEnseignant('.$e['id_es'].')"><i class="far fa-trash-alt"></i></button>
        <button type="button" class="btn btn-sm btn-warning action-button" data-toggle="modal" data-target="#removeSoumission" onclick="emailEnseignant('.$e['id_es'].')"><i class="far fa-envelope"></i></button>
        </div>
        ' ;  
                 $html .= '<td>'.$actions."</td>";
                 $html = $html."</tr>";


            }



        }
        $html.="</tbody>";
        $html.="</table>";
      
        echo $html;
    }

    public function affecterTuteur()
    {
        $module_id = $this->input->post('module_id');
        $enseignant_id = $this->input->post('id_enseignant');

        // Appelez la méthode du modèle pour enregistrer l'affectation
        $affected =     $this->model_projet->affecterTuteur($module_id, $enseignant_id);
        if($affected){
            echo json_encode([
                'success'=>true,
                'message'=>'le project est maintenant pris en charge par ce referent'
            ]);
        }
        else{
            echo json_encode([
                'success'=>true,
                'message'=>'le project est maintenant pris en charge par ce referent'
            ]);
        }
        // Récupérez les informations de l'évaluateur pour renvoyer au client
    
    }
    public function chooseProject($projectId){

        
        // Appelez la méthode du modèle pour enregistrer l'affectation
        $choice = $this->model_projet->affecterTuteur($projectId, $this->getIdEnseignant());
        if($choice){
            echo json_encode([
                'success'=>true,
                'message'=>'vous avez Choisit Ce Project'
            ]);
        }
        else{
            echo json_encode([
                'success'=>false,
                'message'=>'Echec De l\'opération veuillez Réessayer'
            ]);
        }    
    }
    public function verifierAffectation($module_id, $id_enseignant)
    {
        $estDejaAffecte = $this->model_projet->verifierAffectation($module_id, $id_enseignant);

        // Renvoyer la réponse (1 si affecté, 0 sinon)
        echo $estDejaAffecte ? "1" : "0";
    }


    public function remindEnseignant($id_es){
        $row =  $this->model_projet->remindEnseignant($id_es);
        if(!$row){
            echo json_encode(array('success'=> false,'message'=> 'on ne peut pas trouver cet élement'));
            return;
        }
        $this->load->library('email');
        $validator = array();
        $this->email->set_mailtype('html'); // Définir le type de contenu comme HTML
        $this->email->from('votre@email.com', 'PEESO');
        $this->email->to($row['email']);
        $this->email->subject('Relance projet');
    
        $this->email->message("<h1>Prière de consulter le projet en attente d'être évalué <a href='".base_url()."'>cliquer ici</a>.</h1>");
    
        $mail = $this->email->send();
    
        log_message('debug', 'Tentative d\'envoi d\'e-mail');
        if ($mail == true) {
            log_message('debug', 'E-mail envoyé avec succès');
        } else {
            log_message('error', 'Erreur lors de l\'envoi d\'e-mail: ' . $this->email->print_debugger());
        }
        if($mail){
            echo json_encode(array('success'=> true,'message'=> 'L\'opération est faite avec succès'));
        }
        else{
            echo json_encode(array('success'=> false,'message'=> 'Quelque chose s\'est mal passé, veuillez appeler l\'administrateur'));
        }
        
    }
    
    public function removeEnseignantFromList($id_es){
        $res = $this->model_projet->removeEnseignantFromList($id_es);
        echo json_encode($res);
    }   
    public function publishProjet(){
        $result = $this->model_projet->publishProjet();
        if($result){
            echo json_encode(['success'=> true,'message'=> 'le projet est finaliser']);
        }
        else{
            echo json_encode(['success'=> false,'message'=> 'Un problème est survenu au cours de la finalisation du projet']);
        }
        return;
    }

    private function getRapportHtml($rapport)
    {   
        $html = '';
        if($rapport!=null && $rapport!=''){
            $html = '<div class="jquery-uploader">
            <div class="jquery-uploader-preview-container">
                <div class="jquery-uploader-card" id="72076b60-487d-4c10-8f37-55eea0519c6b" style="box-shadow: rgb(248, 172, 89) 0px 0px 3px 1px inset;">
                    <div class="jquery-uploader-preview-main">
                        <div class="jquery-uploader-preview-action">
                            <ul>
                               <!-- <li class="file-detail"><i class="fa fa-eye"></i></li> !-->
                                <li class="file-delete">
                                    <a href="'.base_url('assets/assets/images/').''.$rapport.'" download="'.$rapport.'">
                                          <i class="fa fa-download" aria-hidden="true"></i>
                              
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="jquery-uploader-preview-progress" style="display: none;">
                            <div class="progress-mask"></div>
                            <div class="progress-loading">
                                <i class="fa fa-spinner fa-spin"></i>
                            </div>
                        </div>
                        <div class="file_other pdf"></div>
                        
                    </div>
                 </div>
            
    </div>    
               
            </div>';

        }
        return $html;
        


       /* */


    }
    public function acceptProject($projectId){
            $test = $this->model_projet->acceptProject($projectId,$this->getIdEnseignant());
            if($test){
                echo json_encode([
                    'success'=>true,
                    'message'=>'le project est accepté avec succés'
                ]);
            }
            else{
                echo json_encode([
                    'success'=>false,
                    'message'=>'échec de l\'opération'
                ]);
            }
    }
    public function fetchFormationsHtml($idEtudiant){
        $html = '';
        $formations = $this->model_fiche->getFormationsEtudiant($idEtudiant);
        foreach($formations as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['date_debut'].'</td>';
            $html .= '<td>'.$f['date_fin'].'</td>';
         
            $html .= '</tr>';
        }
        echo $html;
    }
    public function fetchCertificatsHtml($idEtudiant){
        $html = '';
        $formations = $this->model_fiche->getCertificatsEtudiant($idEtudiant);
        foreach($formations as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['date_debut'].'</td>';
            $html .= '<td>'.$f['date_fin'].'</td>';
            
             
            $html .= '</tr>';
        }
        echo $html;
    }

    public function fetchParcoursHtml($idEtudiant){
        $html = '';
        $parcours = $this->model_fiche->getParcoursEtudiant($idEtudiant);
        foreach($parcours as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['etablissement'].'</td>';
            $html .= '<td>'.$f['date_debut'].'</td>';
            $html .= '<td>'.$f['date_fin'].'</td>';
            $html .= '<td>'.$f['diplome'].'</td>';

            $html .= '</tr>';
        }
        echo $html;
    }
    public function fetchLanguesHtml($idEtudiant){
        $html = '';
        $langues = $this->model_fiche->getLanguesEtudiant($idEtudiant);
        foreach($langues as $f){
            $html .= '<tr>';
            $html .= '<td>'.$f['nom'].'</td>';
            $html .= '<td>'.$f['niveau'].'</td>';
            
            $html .= '</tr>';
        }
        
        echo $html;
    }
    public function getGrille(){
        $this->load->view('pdf/grille-de-selection-peeso');
    }
    public function downloadGrille($projectId,$etudiantId){
        $grille = $this->model_projet->getGrille(intval($projectId),intval($etudiantId));
        if(!$grille){
            show_404();
        }
        else{
            $this->load->view('pdf/grille-de-selection-peeso',['info'=>$grille]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('grille_evaluation_'.$grille['nom_etud'].'_'.$grille['prenom_etud'].'.pdf', array('Attachment'=>1));
            exit();
        }
    }
    public function viewGrille($projectId,$etudiantId){
        $grille = $this->model_projet->getGrille(intval($projectId),intval($etudiantId));
        if(!$grille){
            show_404();
        }
        else{
            $this->load->view('pdf/grille-de-selection-peeso',['info'=>$grille]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('grille_evaluation_'.$grille['nom_etud'].'_'.$grille['prenom_etud'].'.pdf', array('Attachment'=>false));
            
        }
    }
    public function downloadFicheAccompagnement($seanceId,$etudiantId){
        $info = $this->model_projet->getSeanceForFicheAccompagnement($seanceId,$etudiantId);
       
        if(!$info){
            show_404();
            return ;
        }
       echo json_encode($info);
        /* else{
            $etudiant = $info['etudiant'];
            $numero_seance = $info['seance']['numero_seance'];
            $this->load->view('pdf/fiche-d-accompagnement',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_accompagnement'.$etudiant['nom'].'_'.$etudiant['prenom'].'_seance_'.$numero_seance.'.pdf', array('Attachment'=>1));
            exit();
        }*/

    }
    public function downloadFicheAccompagnementInnovateur($seanceId,$etudiantId){
        $info = $this->model_projet->getSeanceInnovateurForFicheAccompagnement($seanceId,$etudiantId);
       
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $numero_seance = $info['seance']['numero_seance'];
            $this->load->view('pdf/fiche-d-accompagnement-innovateur',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_accompagnement'.$etudiant['nom'].'_'.$etudiant['prenom'].'_seance_'.$numero_seance.'.pdf', array('Attachment'=>1));
            exit();
        }

    }
    public function downloadFicheAccompagnementPromoteur($seanceId,$etudiantId){
        $info = $this->model_projet->getSeancePromoteurForFicheAccompagnement($seanceId,$etudiantId);
       
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $numero_seance = $info['seance']['numero_seance'];
            $this->load->view('pdf/fiche-d-accompagnement-promoteur',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_accompagnement'.$etudiant['nom'].'_'.$etudiant['prenom'].'_seance_'.$numero_seance.'.pdf', array('Attachment'=>1));
            exit();
        }

    }
    public function viewFicheAccompagnementPromoteur($seanceId,$etudiantId){
        $info = $this->model_projet->getSeancePromoteurForFicheAccompagnement($seanceId,$etudiantId);
       
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $numero_seance = $info['seance']['numero_seance'];
            $this->load->view('pdf/fiche-d-accompagnement-promoteur',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_accompagnement'.$etudiant['nom'].'_'.$etudiant['prenom'].'_seance_'.$numero_seance.'.pdf', array('Attachment'=>0));
          
        }

    }
    public function viewFicheAccompagnement($seanceId,$etudiantId){
        $info = $this->model_projet->getSeanceForFicheAccompagnement($seanceId,$etudiantId);
       
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $numero_seance = $info['seance']['numero_seance'];
            $this->load->view('pdf/fiche-d-accompagnement',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_accompagnement'.$etudiant['nom'].'_'.$etudiant['prenom'].'_seance_'.$numero_seance.'.pdf', array('Attachment'=>0));
            
        }

    }
    public function viewFicheAccompagnementInnovateur($seanceId,$etudiantId){
        $info = $this->model_projet->getSeanceInnovateurForFicheAccompagnement($seanceId,$etudiantId);
       
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $numero_seance = $info['seance']['numero_seance'];
            $this->load->view('pdf/fiche-d-accompagnement-innovateur',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_accompagnement'.$etudiant['nom'].'_'.$etudiant['prenom'].'_seance_'.$numero_seance.'.pdf', array('Attachment'=>0));
            
        }

    }
    public function downloadFicheSuivie($projectId,$etudiantId){
        $info = $this->model_projet->getSeancesForFicheSuivie($projectId,$etudiantId);
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $this->load->view('pdf/fiche-de-suivi',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_suivie_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.pdf', array('Attachment'=>1));
            exit();
        }

    }
    public function viewFicheSuivie($projectId,$etudiantId){
        $info = $this->model_projet->getSeancesForFicheSuivie($projectId,$etudiantId);
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $this->load->view('pdf/fiche-de-suivi',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_suivie_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.pdf', array('Attachment'=>0));
        }

    }
    public function downloadFicheSuivieInnovateur($projectId,$etudiantId){
        $info = $this->model_projet->getSeancesForFicheSuivieInnovateur($projectId,$etudiantId);
        if(!$info){
            show_404();
            return ;
        }
        
        else{
            $etudiant = $info['etudiant'];
            $this->load->view('pdf/fiche-de-suivi-innovateur',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_suivie_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.pdf', array('Attachment'=>1));
            exit();
        }

    }
    public function viewFicheSuivieInnovateur($projectId,$etudiantId){
        $info = $this->model_projet->getSeancesForFicheSuivieInnovateur($projectId,$etudiantId);
        if(!$info){
            show_404();
            return ;
        }
        else{
            $etudiant = $info['etudiant'];
            $this->load->view('pdf/fiche-de-suivi',['info'=>$info]);
            $html = $this->output->get_output();
            $this->domPdf->setPdfOptions('isRemoteEnabled', value: true);
            $this->domPdf->loadHtml($html);
            $this->domPdf->setPaper('A4', 'potrait');
            $this->domPdf->render();
            $this->domPdf->stream('fiche_suivie_'.$etudiant['nom'].'_'.$etudiant['prenom'].'.pdf', array('Attachment'=>0));
        }

    }
    public function getExcelFicheSuivieProject($projectId){
       try{
        $excelUtils = new Excel();
        $spreadsheet = $excelUtils->loadFile('assets/excel/Fiche-suivi-SNEE.xlsx');
        
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'New Value');
//write it again to Filesystem with the same name (=replace)
        $writer =  $excelUtils->getWriter($spreadsheet);
        header('Content-Disposition: attachment; filename=Fiche-suivi.xlsx');
       
        $writer->save('php://output');

        
       }catch(Exception $e){
            echo json_encode([
                'success'=>false,
                'message'=>$e->getMessage()
            ]);
       }
        /*$data = $this->model_projet->getDataForFicheSuivieForProject($projectId);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Fiche de suivi des étudiants ayant le SNEE pour l'année 2022")->setCreator("ALA ROMDHANI")->setLastModifiedBy("ALA ROMDHANI");
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setCellValue('B9:B10', 'Nom De L\'étudiant');
        $seancesWithPhases =$data['seances'];
        $objPHPExcel->getActiveSheet()->setCellValue('C9:D9', 'Phase I : Profiling');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="SEANCES.xls"');
        header('Cache-Control: max-age=0');

        // Create the Excel writer and output the file
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');*/

        /* $phases = $seancesWithPhases['phases'];
        $seances = $seancesWithPhases['seances'];
        $indexToStart = 
        foreach($seances as)*/
    }
  
    

    public function validateProjet($id){
        $validate = $this->model_projet->validateProjet($id);
        if($validate){
            $validator['success'] = true;
            $validator['messages'] = "Projet validé avec succès";
        } else {
            $validator['success'] = false;
            $validator['messages'] = "Echec lors de la validation du projet";
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
  

    public function getProjectsForEnsignantsProfessionnel() {
        $moduleData = $this->model_projet->getProjetsNonAffecteValide();
        $result = array('data' => array());
    
        foreach ($moduleData as $key => $value) {
            $viewbutton = '<div class="actions">
                                <a href="' . base_url() . 'details_projects_etudiant?project_id=' . $value['id'] . '" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                           </div>'; // corrected closing div
    
            // $acceptation = '<div class="actions">
            //                     <button class="btn btn-sm btn-success action-button" onclick="acceptProject(' . $value['id'] . ')"><i class="fas fa-check"></i></button>
            //                 </div>'; 
    
            $evaluer = '<div class="actions">
                            <div style="
                                background-color: #0eee86; 
                                border: 1px solid #0eee86; 
                                border-radius: 50%;
                                width: 36px;
                                height: 36px;
                                display: flex;
                                align-items: center;
                                cursor: pointer;
                                justify-content: center;
                                transition: 0.3s;
                            ">
                                <a href="' . base_url() . 'grille_evaluation?project_id=' . $value['id'] . '&referent_id='.$this->session->userdata()['logged']['id'].'">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>'; // corrected closing divs and concatenation
    
            $result['data'][$key] = array(
                $value['titre'],
                $value['domaine_names'],
                $viewbutton,
                // $acceptation,
                $evaluer
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function getProjectNonAffecte($niveau){
        $projects = $this->model_projet->getProjectsNonEffectue($niveau,$this->getEtablissementEnseignant());
        $result = array('data' => array());
        $x=0;
        foreach ($projects as $key => $value) {
            $viewbutton = '<div class="actions">
                                <a href="' . base_url() . 'details_projects_etudiant?project_id=' . $value['id'] . '" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                           </div>'; // corrected closing div
    
            // $acceptation = '<div class="actions">
            //                     <button class="btn btn-sm btn-success action-button" onclick="acceptProject(' . $value['id'] . ')"><i class="fas fa-check"></i></button>
            //                 </div>'; 
            $affectation ='<button  class="btn btn-sm btn-success action-button" onclick="choisirProject('.$value['id'].')" >
                <img src="'.base_url().'/public/new/images/icons/access.png"> 
            </button>';
           
      
            $x++;
            $result['data'][$key] = array(
                $x,
                $value['titre'],
                $value['domaine_names'],
                $affectation,
                $viewbutton,
                // $acceptation,
             
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }

       public function getProjectNonAffecteAdmin($niveau){
        $projects = $this->model_projet->getProjectsNonEffectueAdmin($niveau);
        $result = array('data' => array());
        $x=0;
        foreach ($projects as $key => $value) {
            $viewbutton = '<div class="actions">
                                <a href="' . base_url() . 'details_projects_etudiant?project_id=' . $value['id'] . '" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                           </div>'; // corrected closing div
    
            // $acceptation = '<div class="actions">
            //                     <button class="btn btn-sm btn-success action-button" onclick="acceptProject(' . $value['id'] . ')"><i class="fas fa-check"></i></button>
            //                 </div>'; 
            // $affectation ='<button  class="btn btn-sm btn-success action-button" onclick="choisirProject('.$value['id'].')" >
            //     <img src="'.base_url().'/public/new/images/icons/access.png"> 
            // </button>';
           
      
            $x++;
            $result['data'][$key] = array(
                $x,
                $value['titre'],
                $value['domaine_names'],
                // $affectation,
                $viewbutton,
                // $acceptation,
             
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }
    public function getProjectNonAffecteForEnseignant($niveau){
        $ensignantId = $this->getIdEnseignant();
        $projects = $this->model_projet->getProjectEffectue($niveau,$ensignantId);
        $result = array('data' => array());
        $x=0;
        foreach ($projects as $key => $value) {
            $viewbutton = '<div class="actions">
                                <a href="' . base_url() . 'details_projects_etudiant?project_id=' . $value['id'] . '" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                           </div>'; // corrected closing div
    
            // $acceptation = '<div class="actions">
            //                     <button class="btn btn-sm btn-success action-button" onclick="acceptProject(' . $value['id'] . ')"><i class="fas fa-check"></i></button>
            //                 </div>'; 
    
      
            $x++;
            $result['data'][$key] = array(
                $x,
                $value['titre'],
                
                $viewbutton,
                // $acceptation,
             
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }

    public function fetchCommite()
    {
        $moduleData = $this->model_projet->fetchCommite();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $checkBoxButton = '<div class="check-box">
                               <input type="checkbox" id="projet_'.$value['id'].'" name="projEtab" value="'.$value['id'].'">
                               <label for="projet_'.$value['id'].'"></label>
                               <br>
                               </div>'; 

            $result['data'][$key] = array(
                $value['titre'],
                $value['nom_etab'],
                $checkBoxButton,
            );
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchCommiteCalendar($date){



    }


    public function invitecomite(){
        $validator = array('success' => false, 'messages' => '');
    
        $referentMails = $this->input->post('referent'); // Array of referent emails
        $projets = json_decode($this->input->post('selectedProjects'), true); // Decode JSON string into an array
        $date_comite = $this->input->post('date_comite');
        $heure_comite = $this->input->post('heure_comite');
        $lieu_comite = $this->input->post('lieu_comite');
        
        // Check if $projets is an array
        if (!is_array($projets)) {
            $validator['success'] = false;
            $validator['messages'] = 'Les projets sélectionnés ne sont pas valides.';
            echo json_encode($validator);
            return;
        }
    
        // Prepare batch data for insertion
        $batchInsertData = [];
        foreach ($projets as $projet) {
            $batchInsertData[] = array(
                'id_projet' => $projet,
                'date_comite' => $date_comite,
                'heure_comite' => $heure_comite,
                'lieu_comite' => $lieu_comite,
            );
        }
        
        // Insert all records in comite_rende_vous
        $status = $this->model_projet->inviteComite($batchInsertData);
    
        // Collect project leader emails and names
        $projectLeaderEmails = [];
        $projectNames = [];
        foreach ($projets as $projet) {
            $result = $this->db->select('e.email, p.titre')
                               ->from('etudiants e')
                               ->join('projects p', 'e.id = p.etudiant_id')
                               ->where('p.id', $projet)
                               ->get()
                               ->row_array();
            
            if ($result) {
                $projectLeaderEmails[] = $result['email'];
                $projectNames[] = $result['titre'];
            }
        }
    
        // List of selected project names for the email
        $allSelectedProjects = implode(' | ', $projectNames);
    
        // Merge referent and project leader emails
        $mails = array_merge($referentMails, $projectLeaderEmails);
        $this->load->library('email');
        // Send email invitation
        $this->email->set_mailtype('html');
        $this->email->from('votre@email.com', 'PEESO');
        $this->email->to($mails);
        $this->email->subject('Comité de sélection');
        $this->email->message(
            "<p>Bonjour,<br>Vous êtes conviés à la réunion de sélection qui aura lieu le ".$date_comite." à ".$heure_comite." à ".$lieu_comite.
            "<br> pour évaluer les projets suivants :<br> <strong>".$allSelectedProjects."</strong>.
             <br><span style='font-weight: bold; color:red; font-size: 12px;'> 
             NB: Les porteurs des projets doivent inviter leurs équipe si leurs projets sont en groupe! 
             </span>
             <br><br>Cordialement,<br>PEESo</p>"
        );
    
        $mailSent = $this->email->send();
    
        // Validate insertion and email status
        if ($mailSent && $status) {
            $validator['success'] = true;
            $validator['messages'] = 'Invitation envoyée avec succès!';
        } else {
            $validator['success'] = false;
            $validator['messages'] = 'Échec lors de l\'envoi de l\'invitation!';
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    

    public function fetchComiteRendezVous()
    {
        $moduleData = $this->model_projet->fetchComiteRendezVous();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $heureDate = $value['date_comite']. ' à '. $value['heure_comite']; 

            $result['data'][$key] = array(
            
                $value['titre'],
                $value['nom_etab'],
                $heureDate,
                $value['lieu_comite'],
            );
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function getRandezVousComiteByDate($date,$etablissmentId=null){
       $randezVous = $this->model_projet->fetchComiteRendezVousByDate($date,$etablissmentId);
            $html = '' ;
            foreach($randezVous as $r){
                 $html .= '
                     <div class="assignment-list" onclick="detailRandezVous('.$r['id'].')">
                                         <div class="left">
                                             <i class="fa-regular fa-calendar-lines-pen"></i>
                                             
                                             <span>'.$r['titre'].'</span>
                                         </div>
                                         <div class="right">
                                             <span>'.$r['heure_comite'].'</span>
                                         </div>
                                     </div>
                 ';
             }
             echo $html;
 
    }
    public function getProjectNonAffecteForAdmin($niveau) {
        $referent_id = $this->input->get('referent_id'); // Get referent_id from the request
    
        // Fetch projects based on niveau and optional referent_id
        $projects = $this->model_projet->getProjectEffectueAdmin($niveau, $referent_id);
        
        $result = array('data' => array());
        $x = 0;
        foreach ($projects as $key => $value) {
            $viewbutton = '<div class="actions">
                               <a href="' . base_url() . 'details_projects_etudiant?project_id=' . $value['id'] . '" class="btn btn-sm btn-primary action-button"><i class="fas fa-eye"></i></a>
                           </div>';
    
            $x++;
            $result['data'][$key] = array(
                $x,
                $value['titre'],
                $viewbutton,
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    

 
    
    
}