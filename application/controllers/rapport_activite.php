<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapport_Activite extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Add this line to explicitly load the database
        $this->load->model('model_rapport_activite');
        $this->load->model('model_clubs');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->library('form_validation');

    }

    // Display a list of rapports
    public function index($id_club = null) {
        $data['rapports'] = $this->Model_Rapport_Activite->get_all_rapports($id_club);
        $data['clubs'] = $this->Model_Clubs->get_all_clubs(); // Get all clubs for filtering
        $this->load->view('rapports/list', $data); // Load the view with data
    }

    // Add a new rapport
    public function add() {
        if ($this->input->post()) {
            $data = array(
                'nom' => $this->input->post('nom'),
                'pdf' => $this->upload_pdf('pdf'), // Handle PDF upload
                'annee' => $this->input->post('annee'),
                'description' => $this->input->post('description'),
                'id_club' => $this->input->post('id_club'),
            );

            if ($this->Model_Rapport_Activite->insert_rapport($data)) {
                $this->session->set_flashdata('success', 'Rapport ajouté avec succès');
            } else {
                $this->session->set_flashdata('error', 'Échec de l’ajout du rapport');
            }
            redirect('rapport_activite');
        }

        $data['clubs'] = $this->Model_Clubs->get_all_clubs(); // For the club dropdown
        $this->load->view('rapports/add', $data);
    }

    // Edit an existing rapport
    public function edit($id) {
        $data['rapport'] = $this->Model_Rapport_Activite->get_rapport_by_id($id);

        if ($this->input->post()) {
            $update_data = array(
                'nom' => $this->input->post('nom'),
                'annee' => $this->input->post('annee'),
                'description' => $this->input->post('description'),
                'id_club' => $this->input->post('id_club'),
            );

            // If a new PDF is uploaded
            if ($_FILES['pdf']['name']) {
                $update_data['pdf'] = $this->upload_pdf('pdf');
            }

            if ($this->Model_Rapport_Activite->update_rapport($id, $update_data)) {
                $this->session->set_flashdata('success', 'Rapport mis à jour avec succès');
            } else {
                $this->session->set_flashdata('error', 'Échec de la mise à jour du rapport');
            }
            redirect('rapport_activite');
        }

        $data['clubs'] = $this->Model_Clubs->get_all_clubs();
        $this->load->view('rapports/edit', $data);
    }

    // Delete a rapport
    public function removeActiviteClub($id)
    {
        $is_deleted = $this->model_rapport_activite->delete_rapport($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec success']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'probleme de supprission']);
        }

    }

    // Handle file upload
    private function upload_pdf($field_name) {
        $config['upload_path'] = './uploads/rapports/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048; // Max size in KB
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($field_name)) {
            $data = $this->upload->data();
            return 'uploads/rapports/' . $data['file_name'];
        } else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('rapport_activite');
        }
    }
    public function fetchDataNewsactivite()
{
    $id_user = $this->session->userdata()['logged']['id'];
    $clubs = $this->model_clubs->get_clubs_by_user($id_user);
    $moduleData = []; // Initialize an empty array to collect news data

    if (!empty($clubs)) {
        foreach ($clubs as $club) {
            if (isset($club['id'])) {
                // Fetch news for the current club
                $news = $this->model_rapport_activite->get_rapport_by_club($club['id']);
                // Check if $news is not empty
                if (!empty($news)) {
                    // If $news is a single associative array (one row)
                    if (isset($news['id']) && !is_array(reset($news))) {
                        $moduleData[] = $news;
                    } 
                    // If $news is already an array of multiple rows
                    elseif (is_array(reset($news))) {
                        foreach ($news as $single_news) {
                            $moduleData[] = $single_news;
                        }
                    }
                }
            }
        }
    }

    $result = array('data' => array());
    
    foreach ($moduleData as $value) {
        
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
        
        $result['data'][] = array(
            $value['nom'],
            $value['annee'],
            $value['nom_du_club'],
            $button
        );
    }
    
    echo json_encode($result);

    }
    public function fetchDataNewsactiviteAdmin()
    {
        $clubs = $this->model_clubs->get_clubs_by_Admin();
        $moduleData = []; // Initialize an empty array to collect news data
    
        if (!empty($clubs)) {
            foreach ($clubs as $club) {
                if (isset($club['id'])) {
                    // Fetch news for the current club
                    $news = $this->model_rapport_activite->get_rapport_by_club($club['id']);
                    // Check if $news is not empty
                    if (!empty($news)) {
                        // If $news is a single associative array (one row)
                        if (isset($news['id']) && !is_array(reset($news))) {
                            $moduleData[] = $news;
                        } 
                        // If $news is already an array of multiple rows
                        elseif (is_array(reset($news))) {
                            foreach ($news as $single_news) {
                                $moduleData[] = $single_news;
                            }
                        }
                    }
                }
            }
        }
    
        $result = array('data' => array());
        
        foreach ($moduleData as $value) {
            
            $button = '
                <div class="actions d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-primary action-button m-2" 
                        data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                        <i class="icofont-eye"></i>
                    </button>
                </div>
            ';
            
            $result['data'][] = array(
                $value['nom'],
                $value['annee'],
                $value['nom_du_club'],
                $button
            );
        }
        
        echo json_encode($result);
    
        }
    public function add_activite_club()
    {
            // Existing validation and file upload checks
            $adder_id = $this->session->userdata['logged']['id'];
        
            // Validation rules
            $this->form_validation->set_rules('titre-fr', 'Titre En Français', 'trim|required|max_length[255]');
            $this->form_validation->set_rules('content-fr', 'Contenu En Français', 'trim|required');
            $this->form_validation->set_rules('annee', 'Année', 'trim|required|exact_length[4]|numeric');

            $response = ['success' => false, 'message' => ''];
        
            if ($this->form_validation->run() === true) {
                // Check file upload
                $soumissionFile = $_FILES['image'];
                if (empty($soumissionFile['name'])) {
                    $response = [
                        'success' => false, 
                        'message' => 'Vous n\'avez pas sélectionné de fichier à télécharger.'
                    ];
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode($response));
                    return;
                }
        
                // File upload configuration
                $config = [
                    'upload_path' => './assets/assets/images', // Directory where PDFs will be uploaded
                    'allowed_types' => 'pdf', // Only allow PDF files
                    'max_size' => 240000, // Maximum file size in kilobytes (240 MB in this case)
                    'encrypt_name' => true // Generates a random encrypted filename to prevent duplicates
                ];
                $this->load->library('upload', $config);
        
                // Prepare insert data
                $insert_data = [
                    'description' => $this->input->post('content-fr'),
                    'nom' => $this->input->post('titre-fr'),
                    'annee' => $this->input->post('annee'),
                    'date_creation' => date("Y-m-d"),
                    'id_club' => $this->input->post('club_id')
                ];
        
                // Upload file
                if ($this->upload->do_upload('image')) {
                    $upload_data = $this->upload->data();
                    $insert_data['pdf'] = $upload_data['file_name'];
        
                    // Save to database
                    $success = $this->model_rapport_activite->insert_rapport($insert_data);
        
                    if ($success) {
                        $response = [
                            'success' => true,
                            'message' => 'Ajouté avec succès'
                        ];
                    } else {
                        $response = [
                            'success' => false, 
                            'message' => 'Échec de l\'ajout'
                        ];
                    }
                } else {
                    $response = [
                        'success' => false, 
                        'message' => $this->upload->display_errors()
                    ];
                }
            } else {
                // Validation errors
                $response = [
                    'success' => false, 
                    'message' => validation_errors()
                ];
            }
        
            // Send JSON response
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
        
        public function get_activite_club($id)
        {
            $news = $this->model_rapport_activite->get_rapport_by_id($id);
            echo json_encode($news);
        }

        public function update_activite($module_id)
        {

            $validator = array('success' => false, 'message' => '');

            // Utilisez la bibliothèque de validation CodeIgniter pour valider les données
            $this->form_validation->set_rules('edit_titre_fr', 'Titre', 'required');
            // Ajoutez des règles de validation pour les autres champs si nécessaire

            if ($this->form_validation->run() === true) {
                $update_data = array(
                    'description' => $this->input->post('edit_content_fr'),
                    'nom' => $this->input->post('edit_titre_fr'),
                    'annee' => $this->input->post('annee'),
                    'date_creation' => date("Y-m-d"),
                    'id_club' => $this->input->post('club_id')
                );

                // Gérez le fichier de soumission s'il est présent dans la requête
                if (!empty($_FILES['edit_image']['name'])) {
                    // Gérez l'upload du fichier ici et mettez à jour le chemin dans la base de données
                    // Assurez-vous de vérifier la sécurité et le type de fichier pendant l'upload
                    $upload_path = './assets/assets/images';
                    $config['allowed_types'] = 'pdf';
                    $config['upload_path'] = $upload_path;
                    $config['max_size'] = 240000;
                    $config['encrypt_name'] = true; // Taille maximale du fichier en kilo-octets

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('edit_image')) {
                        $upload_data = $this->upload->data();
                        $update_data['pdf'] = $upload_data['file_name'];
                    } else {
                        $validator['message'] = $this->upload->display_errors();
                        echo json_encode($validator);
                        return;
                    }
                }

                // Effectuez la mise à jour dans le modèle
                $update_result = $this->model_rapport_activite->update_rapport($module_id, $update_data);
                if ($update_result === true) {
                    $validator['success'] = true;
                    $validator['message'] = "Modifiée avec succès";
                } else {
                    $validator['message'] = "Erreur lors de la mise à jour";
                }
            } else {
                $validator['message'] = validation_errors(); // Erreurs de validation
            }

            // Renvoyez la réponse JSON
            header('Content-Type: application/json');
            echo json_encode($validator);
        }

}
