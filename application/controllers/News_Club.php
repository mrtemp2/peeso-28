<?php
class News_Club extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_news_clubs');
        $this->load->model('model_clubs');
        $this->load->database();
        $this->load->library('session');
    }

    public function fetchDataNewsClub()
    {
        $id_user = $this->session->userdata()['logged']['id'];
        $clubs = $this->model_clubs->get_clubs_by_user($id_user); // Get all clubs for the user
        $moduleData = []; // Initialize an empty array to collect news data

        if (!empty($clubs)) {
            foreach ($clubs as $club) {
                if (isset($club['id'])) {
                    // Fetch news for the current club
                    $news = $this->model_news_clubs->get_news_by_club($club['id']);
                    $moduleData = array_merge($moduleData, $news); // Merge results
                }
            }
        }

        $result = array('data' => array());

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

            $result['data'][$key] = array(
                $value['id'],
                $value['titre'],
                $button
            );
        }

        echo json_encode($result);
    }
    public function fetchDataNewsClubAdmin()
    {
        $clubs = $this->model_clubs->get_clubs_by_Admin(); // Get all clubs for the user
        $moduleData = []; // Initialize an empty array to collect news data

        if (!empty($clubs)) {
            foreach ($clubs as $club) {
                if (isset($club['id'])) {
                    // Fetch news for the current club
                    $news = $this->model_news_clubs->get_news_by_club($club['id']);
                    $moduleData = array_merge($moduleData, $news); // Merge results
                }
            }
        }

        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $button = '
                <div class="actions d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-primary action-button m-2" 
                        data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                        <i class="icofont-eye"></i>
                    </button>
                    
                </div>
            ';

            $result['data'][$key] = array(
                $value['id'],
                $value['titre'],
                $button
            );
        }

        echo json_encode($result);
    }
    public function get_news_club($id)
    {
        $news = $this->model_news_clubs->getNews($id);
        echo json_encode($news);
    }
    public function get_news_clubAdmin()
    {
        $news = $this->model_news_clubs->getNewsAdmin();
        echo json_encode($news);
    }
    public function removeNewsClub($id)
    {
        $is_deleted = $this->model_news_clubs->delete_news($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec success']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'probleme de supprission']);
        }

    }
    public function add_news_club()
    {
        // Existing validation and file upload checks
        $adder_id = $this->session->userdata['logged']['id'];
    
        // Validation rules
        $this->form_validation->set_rules('titre-fr', 'Titre En Français', 'trim|required|max_length[255]');
        $this->form_validation->set_rules('content-fr', 'Contenu En Français', 'trim|required');
    
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
                'upload_path' => './assets/assets/images',
                'allowed_types' => 'png|jpg|jpeg',
                'max_size' => 240000,
                'encrypt_name' => true // Generates a random encrypted filename
            ];
            $this->load->library('upload', $config);
    
            // Prepare insert data
            $insert_data = [
                'content' => $this->input->post('content-fr'),
                'titre' => $this->input->post('titre-fr'),
                'publie' => true,
                'created_at' => date("Y-m-d"),
                'id_club' => $this->input->post('club_id')
            ];
    
            // Upload file
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $insert_data['image'] = $upload_data['file_name'];
    
                // Save to database
                $success = $this->model_news_clubs->add_news_club($insert_data);
    
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

}