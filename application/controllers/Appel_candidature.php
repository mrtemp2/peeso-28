<?php



defined('BASEPATH') or exit('No direct script access allowed');

error_reporting(0);

class Appel_candidature extends CI_Controller
{
    function __construct()
    {
       parent::__construct();
       $this->load->helper('url');
       $this->load->library('form_validation');
       $this->load->library('session');
       $this->load->model('model_appel_candidature');
       $this->load->database();
    }


    public function createNewAppelcandidature()
    {
        $validator = ['success' => false, 'messages' => 'Aucun fichier n\'a été téléchargé']; // Default response
    
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
            $upload_config = array(
                'upload_path' => './assets/assets/images',
                'allowed_types' => 'png|jpg|jpeg',
                'max_size' => 4000
            );
    
            $this->load->library("upload", $upload_config);
    
            if ($this->upload->do_upload('photo')) {
                $upload_data = $this->upload->data();
                $photo = base_url('assets/assets/images/' . $upload_data['file_name']);
    
                // Insert into the database
                $status = $this->model_appel_candidature->createNewAppelcandidatureDept($photo);
    
                if ($status['success']) {
                    $validator = ['success' => true, 'messages' => 'Appel à candidature soumis avec succès'];
                } else {
                    $validator = ['success' => false, 'messages' => $status['message'] ?? 'Erreur lors de la soumission de l\'appel'];
                }
            } else {
                $validator = ['success' => false, 'messages' => $this->upload->display_errors()];
            }
        } else {
            $validator = ['success' => false, 'messages' => 'Veuillez sélectionner un fichier photo.'];
        }
    
        // Return JSON response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    public function createNewAppelcandidatureDept()
    {
        $validator = ['success' => false, 'messages' => 'Aucun fichier n\'a été téléchargé']; // Default response
    
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != '') {
            $upload_config = array(
                'upload_path' => './assets/assets/images',
                'allowed_types' => 'png|jpg|jpeg',
                'max_size' => 4000
            );
    
            $this->load->library("upload", $upload_config);
    
            if ($this->upload->do_upload('photo')) {
                $upload_data = $this->upload->data();
                $photo = base_url('assets/assets/images/' . $upload_data['file_name']);
    
                // Insert into the database
                $status = $this->model_appel_candidature->createNewAppelcandidatureDept($photo);
    
                if ($status['success']) {
                    $validator = ['success' => true, 'messages' => 'Appel à candidature soumis avec succès'];
                } else {
                    $validator = ['success' => false, 'messages' => $status['message'] ?? 'Erreur lors de la soumission de l\'appel'];
                }
            } else {
                $validator = ['success' => false, 'messages' => $this->upload->display_errors()];
            }
        } else {
            $validator = ['success' => false, 'messages' => 'Veuillez sélectionner un fichier photo.'];
        }
    
        // Return JSON response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function getAppelcandidature(){
        $appel_candidature = $this->model_appel_candidature->getAppelcandidature();
        $result = array('data' => array());

        foreach ($appel_candidature as $key => $value) {
            $actionButton = '
                            <div class="actions d-flex">
                                <button type="button" class="btn btn-sm btn-primary action-button me-2" 
                                    data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                                    <i class="icofont-eye-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-warning action-button" 
                                    data-target="#updateSubjectModal" onclick="updateSubject(' . $value['id'] . ')" data-toggle="modal">
                                    <i class="icofont-edit"></i>
                                </button>
                            </div>';


            $result['data'][$key] = array(
                $value['nom'],
                // $value['sujet'],
                $value['date_debut'],
                $value['date_fin'],
                $actionButton,
            );
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function getAppelcandidatureDept(){
        $dept_id = $this->session->userdata()['logged']['etab_id'];
        $appel_candidature = $this->model_appel_candidature->getAppelcandidatureDept($dept_id );
        $result = array('data' => array());

        foreach ($appel_candidature as $key => $value) {
            $actionButton = '
                            <div class="actions d-flex">
                                <button type="button" class="btn btn-sm btn-primary action-button me-2" 
                                    data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                                    <i class="icofont-eye-alt"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-warning action-button" 
                                    data-target="#updateSubjectModal" onclick="updateSubject(' . $value['id'] . ')" data-toggle="modal">
                                    <i class="icofont-edit"></i>
                                </button>
                            </div>';


            $result['data'][$key] = array(
                $value['nom'],
                // $value['sujet'],
                $value['date_debut'],
                $value['date_fin'],
                $actionButton,
            );
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function getAppels($appel_id){
        $validator = array();
        $appel = $this->model_appel_candidature->getAppels($appel_id);

        if($appel){
            $validator['data']=$appel;
            $validator['success']=true;
        }
        else{
            $validator['message']='Appel à candidature n\'existe pas';
            $validator['success']=false;
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    

    public function updateAppelData($moduleId = null)
    {
        $validator = ['success' => false, 'messages' => 'Module ID manquant']; // Default response
    
        if ($moduleId) {
            // Fetch current photo from the database
            $currentAppel = $this->model_appel_candidature->getAppels($moduleId);
            $currentPhoto = $currentAppel ? $currentAppel['photo'] : null;
    
            // Initialize photo variable
            $photo = $currentPhoto; // Start with the current photo
    
            // Check if a new file was uploaded
            if (isset($_FILES['editphoto']['name']) && $_FILES['editphoto']['name'] != '') {
                $upload_config = array(
                    'upload_path' => './assets/assets/images',
                    'allowed_types' => 'png|jpg|jpeg',
                    'max_size' => 4000
                );
    
                $this->load->library("upload", $upload_config);
    
                if ($this->upload->do_upload('editphoto')) {
                    $upload_data = $this->upload->data();
                    // Create the full path to the uploaded image
                    $photo = base_url('assets/assets/images/' . $upload_data['file_name']);
                } else {
                    // If file upload fails, show error and stop
                    $validator['success'] = false;
                    $validator['messages'] = $this->upload->display_errors(); // Show error message
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($validator);
                    return;
                }
            }
    
            // Proceed with updating data using either new or current photo
            $update = $this->model_appel_candidature->updateAppelData($moduleId, $photo);
    
            if ($update['success']) {
                $validator['success'] = true;
                $validator['messages'] = "Modifié avec succès";
            } else {
                $validator['success'] = false;
                // Include the error message from the model
                $validator['messages'] = "Erreur lors de la modification des informations: " . (isset($update['error']) ? $update['error'] : 'Unknown error');
            }
        }
    
        // Return JSON response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    

    public function getDomaines($id)
    {
        $domaines = $this->model_appel_candidature->getDomaines($id);
        echo json_encode($domaines);
    }

    public function updateDomaine($id){
        
        $validator = ['success' => false, 'message' => 'probleme serveur essayer plus tard !'];
        $result = $this->model_appel_candidature->updateDomaine($id);
        if ($result) {
            $validator['success'] = true;
            $validator['message'] = 'Domaine modifié avec succès';
        }
        echo json_encode($validator);
        
    }

    public function updateAppelAndDomaine($moduleId = null)
    {
        $validator = ['success' => false, 'messages' => 'Module ID manquant']; // Default response

        if ($moduleId) {
            // Fetch current photo from the database
            $currentAppel = $this->model_appel_candidature->getAppels($moduleId);
            $currentPhoto = $currentAppel ? $currentAppel['photo'] : null;

            // Initialize photo variable
            $photo = $currentPhoto; // Start with the current photo

            // Check if a new file was uploaded
            if (isset($_FILES['editphoto']['name']) && $_FILES['editphoto']['name'] != '') {
                $upload_config = array(
                    'upload_path' => './assets/assets/images',
                    'allowed_types' => 'png|jpg|jpeg',
                    'max_size' => 4000
                );

                $this->load->library("upload", $upload_config);

                if ($this->upload->do_upload('editphoto')) {
                    $upload_data = $this->upload->data();
                    
                    // Create the full path to the uploaded image
                    $photo = base_url('assets/assets/images/' . $upload_data['file_name']); // Full path to the new uploaded photo
                } else {
                    // If file upload fails, show error and stop
                    $validator['success'] = false;
                    $validator['messages'] = $this->upload->display_errors(); // Show error message
                    header('Content-Type: application/json; charset=utf-8');
                    echo json_encode($validator);
                    return;
                }
            }

            // Proceed with updating the `appel` data
            $update = $this->model_appel_candidature->updateAppelData($moduleId, $photo);

            if ($update === true) {
                // Now, handle the domain update as well
                $resultDomaine = $this->model_appel_candidature->updateDomaine($moduleId);

                if ($resultDomaine) {
                    // If both updates are successful
                    $validator['success'] = true;
                    $validator['messages'] = "Appel et Domaines modifiés avec succès";
                } else {
                    // If domaine update fails
                    $validator['success'] = false;
                    $validator['messages'] = "Appel modifié, mais erreur lors de la mise à jour des domaines";
                }
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Erreur lors de la modification de l'appel à candidature.";
            }
        }

        // Return JSON response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    private function getIdEtudiant(){
        return $this->session->userdata()['logged']['etudiant_id'];


    }
    public function getAppelsDispo(){
        $appel_candidature = $this->model_appel_candidature->getAppelsDispoForStudent($this->getIdEtudiant());
     
        $result = array('data' => array());

        foreach ($appel_candidature as $key => $value) {
            $numberSubscription = intval($value['number_inscription']);
            $afficherButtons = '
                <div class="actions">
                    <button type="button" class="btn btn-sm btn-success action-button" 
                        data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-eye"></i> 
                    </button>
                    
                </div>
                ';
            if($numberSubscription) {
                $registerButton = '<div class="actions">
                        <span class="pass">Déja Inscrit</span>
                    </div>';   
            }
            else{
                $registerButton = '<div class="actions"><a href="'.base_url().'ajout_project?id_appel='.$value['id'].'" class="btn btn-sm btn-primary inscription-button" 
                        <span class="pass">S\'inscrire</span>
                    </a></div>';  

            }
            $result['data'][$key] = array(
                $value['nom'],
               $value['date_debut'],
                $value['date_fin'],
              
                $afficherButtons,
                $registerButton
            );
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function fetchAppelDispo($page)
    {
        $limit = 10;
        $data = $this->model_appel_candidature->fetchAppelDispo($page, $limit);
        $result = $data['data'];
        $lang = $this->session->userdata('lang');
        $html = '';

        foreach ($result as $r) {
            // Determine description based on language
            $desc = $lang == 'en' ? substr($r['description-en'], 0, 200) : substr($r['description'] ?? '', 0, 200);

            $image = $r['photo']; // Assume this holds the image path
            $title = $lang == 'en' ? $r['nom-en'] : $r['nom'];
            $dateFin = date('d', strtotime($r['date_fin']));
            $monthFin = date('M', strtotime($r['date_fin']));

            $html .= '<div class="blog__content__wraper__2" data-aos="fade-up">';
            $html .= '<div class="blogarae__img__2" id="content">';
            $html .= '<img loading="lazy" src="' . $image . '" alt="blog">';
            $html .= '<div class="blogarea__date__2">';
            $html .= '<span style="font-weight:500">Date Fin:</span><span>' . $dateFin . '</span>';
            $html .= '<span class="blogarea__month">' . $monthFin . '</span>';
            $html .= '</div>';
            $html .= '</div>';
            $html .= '<div class="blogarea__text__wraper__2">';
            $html .= '<div class="blogarea__heading__2">';
            $html .= '<h3><a href="' . base_url('blog-details/' . $r['id_appel']) . '">' . $title . '</a></h3>';
            $html .= '</div>';
            $html .= '<div class="blogarea__list__2">';
            $html .= '<ul>';
            $html .= '<li><a href="#"><i class="icofont-eraser-alt"></i> Domaines : '.$r['domaines'].'</a></li>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '<div class="blogarea__paragraph">';
            $html .= '<p>' . $desc . '...</p>';
            $html .= '</div>';
            $html .= '<div class="blogarea__button__2">';
            $html .= '<button onclick="readMore(' . $r['id_appel'] . ')" style="color:blue; background-color: transparent; border: 1px solid transparent;">
                        VOIR PLUS <i class="icofont-double-right"></i>
                      </button>';
            
            // Registration button logic
            if ($this->session->userdata("logged")["type"] == "Etudiant") {
                $html .= '<a href="' . base_url("ajout_project?id_appel=" . $r["id_appel"]) . '">
                            <button class="btn btn-primary">
                                S\'inscrire
                            </button>
                        </a>';
            } else {
                $html .= '<a href="' . base_url("logged") . '">
                            <button class="btn btn-primary">
                                S\'inscrire
                            </button>
                        </a>';
            }

            $html .= '</div>'; // Close blogarea__button__2
            $html .= '</div>'; // Close blogarea__text__wraper__2
            $html .= '</div>'; // Close blog__content__wraper__2
        }

        // Send the response as JSON
        echo json_encode(['html' => $html, 'numberOfPages' => $data['numberOfPages'], 'currentPage' => $data['page']]);
    }

    public function getPrefix(){
        echo $this->model_appel_candidature->bitch();

    }

}

















