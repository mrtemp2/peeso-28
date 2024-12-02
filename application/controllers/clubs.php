<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class clubs extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_clubs');
        $this->load->database();
        $this->load->library('session');

    }
    public function fetchClubData()
    {
        $userid = $this->session->userdata()['logged']['id'];
        $moduleData = $this->model_clubs->get_clubs_by_user($userid);
    
        if (empty($moduleData)) {
            $result = ['data' => [], 'message' => 'No clubs found for the user'];
        } else {
            $result = ['data' => []];
            foreach ($moduleData as $key => $value) {
                $button = '
                    <div class="actions d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-primary action-button m-2" 
                            data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                            <i class="icofont-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger action-button m-2" 
                            data-toggle="modal" data-target="#removeSoumission" onclick="removeSubject(' . $value['id'] . ')">
                            <i class="icofont-trash"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-warning action-button m-2" 
                            data-target="#editModal" onclick="editSubject(' . $value['id'] . ')">
                            <i class="icofont-edit"></i>
                        </button>
                    </div>
                ';
    
                $result['data'][] = [
                    $value['nom_du_club'],
                    $value['activites'],
                    $value['nombre_de_membres'],
                    $value['type'],
                    $button
                ];
            }
        }
    
        echo json_encode($result);
        die;
    }

    public function fetchClubDataAdmin()
    {
        $moduleData = $this->model_clubs->get_clubs();
    
        if (empty($moduleData)) {
            $result = ['data' => [], 'message' => 'No clubs found for the user'];
        } else {
            $result = ['data' => []];
            foreach ($moduleData as $key => $value) {
                $button = '
                    <div class="actions d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-primary action-button m-2" 
                            data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                            <i class="icofont-eye"></i>
                        </button>
                        
                    </div>
                ';
    
                $result['data'][] = [
                    $value['nom_du_club'],
                    $value['activites'],
                    $value['nombre_de_membres'],
                    $value['type'],
                    $button
                ];
            }
        }
    
        echo json_encode($result);
        die;
    }
    public function getUpdateClubForm($id){
        $info = $this->model_clubs->get_clubs($id);
        if(!$info){
            show_404();
            return;

        }
        else{
            $this->load->view('/gestion_club/update_club',[
                'info'=>$info
            ]);
        }

    }
    public function createClubContent(){
        $this->load->view('club/gestion_club/createClub',[]);
    }
    public function createClub()
    {
        $validator = array('success' => false, 'messages' => array());
        
        // Validation rules
        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom Club',
                'rules' => 'required|max_length[255]',
            ),
            array(
                'field' => 'activites',
                'label' => 'Activités',
                'rules' => 'required',
            ),
            array(
                'field' => 'nombre_de_membres',
                'label' => 'Nombre de membres',
                'rules' => 'required|numeric',
            ),
            array(
                'field' => 'adresse_complete',
                'label' => 'Adresse Complète',
                'rules' => 'required',
            ),
            array(
                'field' => 'telephone',
                'label' => 'Téléphone',
                'rules' => 'required|numeric',
            ),
            array(
                'field' => 'adresse_email',
                'label' => 'Adresse Email',
                'rules' => 'required|valid_email',
            ),
            array(
                'field' => 'type_c',
                'label' => 'Type de Club',
                'rules' => 'required|in_list[institutionnelle,Locale]',
            )
        );
        $adder_id = $this->session->userdata['logged']['id'];

        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    
        // Prepare inserted data
        $inserted_data = [
            'nom_du_club' => $this->input->post('nom'),
            'activites' => $this->input->post('activites'),
            'nombre_de_membres' => $this->input->post('nombre_de_membres'),
            'adresse_complete' => $this->input->post('adresse_complete'),
            'telephone' => $this->input->post('telephone'),
            'adresse_email' => $this->input->post('adresse_email'),
            'type' => $this->input->post('type_c'),
            'id_user' => $adder_id
        ];
    
        // Response preparation
        $response = [
            'success' => false,
            'message' => '',
            'errors' => []
        ];
    
        if ($this->form_validation->run() === true) {
            // Handle file upload
            if (!empty($_FILES['thumbnail']['name'])) {
                $config = [
                    'upload_path' => './assets/assets/images/',
                    'allowed_types' => 'png|jpg|jpeg',
                    'max_size' => 2048, // 2MB
                    'encrypt_name' => true
                ];
                $this->load->library('upload', $config);
    
                if ($this->upload->do_upload('thumbnail')) {
                    $upload_data = $this->upload->data();
                    $inserted_data['logo_du_club'] = $upload_data['file_name'];
                } else {
                    $response['success'] = false;
                    $response['message'] = $this->upload->display_errors();
                    echo json_encode($response);
                    return;
                }
            }
    
            // Set created date
            $inserted_data['created_at'] = date('Y-m-d H:i:s');
    
            // Attempt to create club with error catching
            try {
                $created = $this->model_clubs->add_club($inserted_data);
    
                if ($created) {
                    $response['success'] = true;
                    $response['message'] = 'Le Club a été créé avec succès';
                } else {
                    // Get more detailed error information
                    $db_error = $this->db->error();
                    $response['success'] = false;
                    $response['message'] = 'Échec de l\'insertion';
                    $response['error_details'] = [
                        'error_code' => $db_error['code'],
                        'error_message' => $db_error['message']
                    ];
                }
            } catch (Exception $e) {
                // Catch any unexpected exceptions
                $response['success'] = false;
                $response['message'] = 'Erreur lors de l\'insertion du club';
                $response['error_details'] = [
                    'exception_message' => $e->getMessage(),
                    'exception_trace' => $e->getTraceAsString()
                ];
            }
        } else {
            // Validation failed
            $response['success'] = false;
            $response['message'] = 'Erreur de validation';
            $response['errors'] = validation_errors();
        }
    
        // Send JSON response
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
    public function getClubDetails($id)
    {
        $result = $this->model_clubs->get_clubs($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function removeClub($moduleId = null)
    {
        if ($moduleId) {
            $remove = $this->model_clubs->delete_club($moduleId);
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
    public function updateClub()
    {
        // Load the form validation library
        $this->load->library('form_validation');
        
        // Set validation rules
        $this->form_validation->set_rules('edit_club_nom', 'Nom du Club', 'required');
        $this->form_validation->set_rules('edit_club_type', 'Type de Club', 'required');
        $this->form_validation->set_rules('edit_club_adresse', 'Adresse Complète', 'required');
        
        // Validate telephone field to ensure it's numeric and valid
        $this->form_validation->set_rules('edit_club_telephone', 'Téléphone', 'required|numeric|exact_length[8]', array(
            'numeric' => 'Le champ Téléphone doit contenir uniquement des chiffres.',
            'exact_length' => 'Le numéro de téléphone doit être exactement de 10 chiffres.'
        ));

        $this->form_validation->set_rules('edit_club_email', 'Email', 'required|valid_email');

        // Run validation
        if ($this->form_validation->run() === FALSE) {
            // If validation fails, return an error
            $errors = validation_errors();
            $this->output->set_output(json_encode(array('error' => true, 'message' => $errors)));
        } else {
            // If validation is successful, process the form data
            $club_id = $this->input->post('id_club'); // Get club ID (from hidden input or other)
            $data = array(
                'nom_du_club' => $this->input->post('edit_club_nom'),
                'type' => $this->input->post('edit_club_type'),
                'adresse_complete' => $this->input->post('edit_club_adresse'),
                'telephone' => $this->input->post('edit_club_telephone'),
                'adresse_email' => $this->input->post('edit_club_email'),
                'nombre_de_membres' => $this->input->post('edit_nombre_de_membres')
            );
            if (!empty($_FILES['edit_club_photo']['name'])) {
                $upload_path = './assets/assets/images';
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['upload_path'] = $upload_path;
                $config['max_size'] = 2048; // Max file size in KB
            
                $this->load->library('upload', $config);
            
                if ($this->upload->do_upload('edit_club_photo')) {
                    $upload_data = $this->upload->data();
                    $data['logo_du_club'] = $upload_data['file_name'];
                } else {
                    log_message('error', 'File upload failed: ' . $this->upload->display_errors());
                    $validator['message'] = $this->upload->display_errors();
                    echo json_encode($validator);
                    return;
                }
            }
            // Call the model method to update the club
            $result = $this->model_clubs->update_club($club_id, $data);

            if ($result) {
                $this->output->set_output(json_encode(array('success' => true, 'message' => 'Club updated successfully')));
            } else {
                $this->output->set_output(json_encode(array('error' => true, 'message' => 'Failed to update club')));
            }
        }
    }

}