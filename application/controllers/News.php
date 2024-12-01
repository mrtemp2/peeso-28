<?php
class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_news');
        $this->load->database();
        $this->load->library('session');
    }
    public function add_news()
    {
        $adder_id = $this->session->userdata['logged']['id'];
        $soumissionFile = $_FILES['image'];
        if (empty($soumissionFile['name'])) {
            $validator = array('success' => false, 'message' => 'Vous n\'avez pas sélectionné de fichier à télécharger.');
            echo json_encode($validator);
            return;
        }
        $bind = array(
            'upload_path' => './assets/assets/images',
            'allowed_types' => 'png|jpg|jpeg',
            'max_size' => 240000
        );
        $this->load->library("upload", $bind);

        $validator = array('success'=>false, 'message'=>array());
        $this->form_validation->set_rules('titre-fr','Titre En Français','regex_match[/^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\'\/]+$/u]');
        // $this->form_validation->set_rules('content-fr','Contenu En Français','regex_match[#^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\'\/]+$#u]');
        // $this->form_validation->set_rules('content-en','Contenu En Anglais','regex_match[#^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\'\/]+$#u]');
        $this->form_validation->set_rules('titre-en','Titre En Anglais','regex_match[/^[a-zA-ZÀ-ÿ0-9\s!,?@:;.*()"\'\/]+$/u]');

        if($this->form_validation->run()===true){
            $insert_data = array(
                'content' => $this->input->post('content-fr'),
                'titre' => $this->input->post('titre-fr'),
                // 'content-en' => $this->input->post('content-en'),
                'publie' => true,
                // 'titre-en' => $this->input->post('titre-en'),
                'created_at' => date("Y-m-d"),
    
            );
    
            // Upload the file
            if ($this->upload->do_upload('image')) {
                $insert_data['image'] = $this->upload->data('file_name');
            } else {
                $validator = array('success' => false, 'message' => $this->upload->display_errors());
                echo json_encode($validator);
                return;
            }
    
            // Call the model to save the data in the database
            $success = $this->model_news->add_news($insert_data);
    
            if ($success) {
                $validator = array(
                    'success' => true,
                    'message' => 'Ajouté avec succès',
                    //'redirect' => site_url('list_soumission'),
                );
            } else {
                $validator = array('success' => false, 'message' => 'Échec de l\'ajout');
            }
        } else {
            $validator = array('success' => false, 'message' => validation_errors());
        }
       

        // Encode the response as JSON
        header('Content-Type: application/json');
        echo json_encode($validator);


    }
    public function add_newsDept()
    {
        // Existing validation and file upload checks
        $adder_id = $this->session->userdata['logged']['id'];
        $dept_id = $this->session->userdata()['logged']['etab_id'];
    
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
                'etab_id' => $dept_id
            ];
    
            // Upload file
            if ($this->upload->do_upload('image')) {
                $upload_data = $this->upload->data();
                $insert_data['image'] = $upload_data['file_name'];
    
                // Save to database
                $success = $this->model_news->add_newsDept($insert_data);
    
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
    
    public function createCompetitionDept()
    {
        // Initialize the response
        $validator = array('success' => false, 'messages' => array());
    
        // Validate inputs
        $this->form_validation->set_rules('nom', 'Nom Compétition', 'required');
        $this->form_validation->set_rules('date_debut', 'Date début', 'required');
        $this->form_validation->set_rules('date_fin', 'Date fin', 'required');
        
        if ($this->form_validation->run() === true) {
            // Check if a file is uploaded
            if (isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
                // Configure file upload settings
                $upload_config = array(
                    'upload_path' => './assets/assets/images',
                    'allowed_types' => 'png|jpg|jpeg',
                    'max_size' => 4000,
                    'file_name' => uniqid() . '_' . $_FILES['photo']['name'] // Generate a unique file name
                );
    
                $this->load->library("upload", $upload_config);
    
                if ($this->upload->do_upload('photo')) {
                    // Get the uploaded file's data
                    $upload_data = $this->upload->data();
                    $photo = base_url('assets/assets/images/' . $upload_data['file_name']);
    
                    // Prepare the data to insert
                    $insert_data = array(
                        'nom' => $this->input->post('nom'),
                        'date_debut' => $this->input->post('date_debut'),
                        'date_fin' => $this->input->post('date_fin'),
                        'description' => $this->input->post('description'),
                        'photo' => $photo,
                        'created_at' => date("Y-m-d")
                    );
    
                    // Insert data into the database
                    $status = $this->model_news->createCompetitionDept($insert_data);
    
                    if ($status) {
                        $validator = array('success' => true, 'messages' => 'Compétition soumise avec succès');
                    } else {
                        $validator = array('success' => false, 'messages' => 'Erreur lors de la soumission de la compétition');
                    }
                } else {
                    // If the file upload fails, return the error message
                    $validator = array('success' => false, 'messages' => $this->upload->display_errors());
                }
            } else {
                // If no file is selected, return an error message
                $validator = array('success' => false, 'messages' => 'Veuillez sélectionner un fichier photo.');
            }
        } else {
            // If validation fails, return the validation errors
            $validator = array('success' => false, 'messages' => validation_errors());
        }
    
        // Return the response as JSON
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
        exit;  // Ensure no further code executes
    }
    

    public function fetchDataNews()
    {
        $moduleData = $this->model_news->fetchDataNews();
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
                //$nom . ' ' . $prenom,
                $value['titre'],
                $button


            );

        }
        echo json_encode($result);
    }
    public function fetchDataNewsDept()
    {
        $dept_id = $this->session->userdata()['logged']['etab_id'];
        $moduleData = $this->model_news->fetchDataNewsDept($dept_id);
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
                //$nom . ' ' . $prenom,
                $value['titre'],
                $button


            );

        }
        echo json_encode($result);
    }

    public function get_news($id)
    {
        $news = $this->model_news->getNews($id);
        echo json_encode($news);
    }
    public function removeNews($id)
    {
        $is_deleted = $this->model_news->removeNews($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec success']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'probleme de supprission']);
        }

    }
    public function update_news($module_id)
    {

        $validator = array('success' => false, 'message' => '');

        // Utilisez la bibliothèque de validation CodeIgniter pour valider les données
        $this->form_validation->set_rules('edit_titre_fr', 'Titre', 'required');
        // Ajoutez des règles de validation pour les autres champs si nécessaire

        if ($this->form_validation->run() === true) {
            $update_data = array(
                'titre' => $this->input->post('edit_titre_fr'),
                // 'titre-en' => $this->input->post('edit_titre_en'),
                'content' => $this->input->post('edit_content_fr'),
                // 'content-en' => $this->input->post('edit_titre_en'),


                //'Auteur2' => $this->input->post('edit_Auteur2'),
                // 'type' => $this->input->post('edit_typeselect'),
            );

            // Gérez le fichier de soumission s'il est présent dans la requête
            if (!empty($_FILES['edit_image']['name'])) {
                // Gérez l'upload du fichier ici et mettez à jour le chemin dans la base de données
                // Assurez-vous de vérifier la sécurité et le type de fichier pendant l'upload
                $upload_path = './assets/assets/images';
                $config['allowed_types'] = 'png|jpg|jpeg';
                $config['upload_path'] = $upload_path;
                $config['max_size'] = 2048; // Taille maximale du fichier en kilo-octets

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('edit_image')) {
                    $upload_data = $this->upload->data();
                    $update_data['image'] = $upload_data['file_name'];
                } else {
                    $validator['message'] = $this->upload->display_errors();
                    echo json_encode($validator);
                    return;
                }
            }

            // Effectuez la mise à jour dans le modèle
            $update_result = $this->model_news->update_news($module_id, $update_data);
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
    public function get_others_sections($id)
    {
        $news = $this->model_news->get_others_sections($id);
        echo json_encode($news);

    }
    public function fetchDataNewsFront($page)
    {
        $limit = 10;
        $data = $this->model_news->fetchDataNewsFront($page, $limit);
        $result = $data['data'];
        $lang = $this->session->userdata('lang');
        $html = '';
    
        foreach ($result as $r) {
            // Determine description based on language and strip HTML tags
            $desc = $lang == 'en' ? 
                    substr(strip_tags($r['content-en']), 0, 200) : 
                    substr(strip_tags($r['content'] ?? ''), 0, 200);
            $desc = (strlen($desc) > 200) ? substr($desc, 0, 197) . '...' : $desc;
    
            $image = base_url('assets/assets/images/' . $r['image']); // Assume this holds the image path
            $title = $lang == 'en' ? $r['titre-en'] : $r['titre'];
    
            $html .= '<div class="blog__content__wraper__2" data-aos="fade-up">';
            $html .= '<div class="blogarae__img__2" id="content">';
            $html .= '<img loading="lazy" src="' . $image . '" alt="blog">';
            $html .= '</div>';
            $html .= '<div class="blogarea__text__wraper__2">';
            $html .= '<div class="blogarea__heading__2">';
            $html .= '<h3><a href="' . base_url('blog-details/' . $r['id']) . '">' . $title . '</a></h3>';
            $html .= '</div>';
            $html .= '<div class="blogarea__paragraph">';
            $html .= '<p>' . $desc . '</p>';
            $html .= '</div>';
            $html .= '<div class="blogarea__button__2">';
            $html .= '<button onclick="readMore(' . $r['id'] . ')" style="color:blue; background-color: transparent; border: 1px solid transparent;">
                        VOIR PLUS <i class="icofont-double-right"></i>
                    </button>';
            $html .= '</div>'; // Close blogarea__button__2
            $html .= '</div>'; // Close blogarea__text__wraper__2
            $html .= '</div>'; // Close blog__content__wraper__2
        }
    
        // Send the response as JSON
        echo json_encode(['html' => $html, 'numberOfPages' => $data['numberOfPages'], 'currentPage' => $data['page']]);
    }
    
    public function getActualite($id){
        $validator = array();
        $news = $this->model_news->getActualite($id);
        if($news){
            $validator['data']=$news;
            $validator['success']=true;
        }
        else {
            $validator['message']='News n\'existe pas';
            $validator['success']=false;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function getCondition($id)
    {
        $condition = $this->model_news->getCondition($id);
        
        echo json_encode($condition);
    }

    public function updateCondition($module_id){
        $validator = array('success' => false, 'message' => '');
    
        $update_data_fr = array(
            'contenu' => $this->input->post('edit_contenu')
        );

        $update_data_en = array(
            'contenu' => $this->input->post('edit_contenu_en')
        );
    
        $update_result_fr = $this->model_news->updateCondition($module_id, $update_data_fr);
        $update_result_en = $this->model_news->updateCondition($module_id, $update_data_en);
    
        if ($update_result_fr || $update_result_en) {
            $validator['success'] = true;
            $validator['message'] = 'Succès';
        } else {
            $validator['success'] = false;
            $validator['message'] = 'Échoué';
        }
    
        echo json_encode($validator);
    }

    
    public function getEvenement($id){
        $act = $this->model_news->getEvenement($id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($act);

    }

    public function fetchEvenementDispo($page)
    {
        $limit = 10;
        $data = $this->model_news->fetchEvenementDispo($page, $limit);
        $result = $data['data'];
        $lang = $this->session->userdata('lang');
        $html = '';

        foreach ($result as $r) {
            if ($lang == 'en') {
                $desc = substr($r['description-en'], 0, 200);
            } else {
                if ($r['description']) {
                    $desc = substr($r['description'], 0, 200);
                }
            }

            $image = $r['photo'];
            $html .= '<div class="col-lg-12">
                        <div class="single-blog-style-one blog">
                            <a href="blog-details.html" class="thumbnail">
                                <img src="' . $image . '" alt="blog">
                            </a>
                            <div class="blog-top-area">
                                <div class="single">
                                    <i class="fa-light fa-calendar-days"></i>
                                    <p>' . $r['date_debut'] . ' / ' . $r['date_fin'] . '</p>
                                </div>
                            </div>
                            <a>
                                <h5 class="title">' . ($lang == 'en' ? $r['nom-en'] : $r['nom']) . '</h5>
                            </a>
                            <p class="desc">' . $desc . '...</p>
                            <div class="button-area" style="display: flex;gap: 10px;">
                                <button onclick="readMore(' . $r['id'] . ')" class="rts-btn btn-primary readmore-btn">' . ($lang == "en" ? "Read More" : "Voir plus") . ' <i class="fa-regular fa-arrow-right"></i></button>';
                                
                $html .= '<a href="' . base_url("sinscrire_evenement?id_evenement=" . $r["id"])  . '" class="rts-btn btn-success readmore-btn" style="display: inline-block;margin: 0;color:white;"> 
                            S\'inscrire <i class="fa-regular fa-arrow-right"></i>
                        </a>';
           

            $html .= '    </div>
                        </div>
                    </div>';
        }

        echo json_encode(['html' => $html, 'numberOfPages' => $data['numberOfPages'], 'currentPage' => $data['page']]);
    }

    public function createEvenement()
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
                $photo = base_url('assets/assets/images/' . $upload_data['file_name']); // Full path to the new uploaded photo

                // Insert into the database with validation
                $status = $this->model_news->createEvenement($photo);

                if ($status['success']) {
                    $validator = ['success' => true, 'messages' => 'Événement soumis avec succès'];
                } else {
                    $validator = ['success' => false, 'messages' => $status['message']]; // Return validation error from model
                }
            } else {
                // File upload error
                $validator = ['success' => false, 'messages' => $this->upload->display_errors()];
            }
        } else {
            $validator = ['success' => false, 'messages' => 'Veuillez sélectionner un fichier photo.'];
        }

        // Return JSON response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }




    public function fetchDataEvents()
    {
        $moduleData = $this->model_news->fetchDataEvents();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $button = '
               <div class="actions">
                <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-eye"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSoumission" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
                </button>
                 <button class="btn btn-sm btn-warning action-button" data-target="#editModal" onclick="editSubject(' . $value['id'] . ')"><i class="fas fa-edit"></i></button>
             
               </div>
            ';

            $subscribers = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersModal" onclick="ViewSubscribers(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-eye"></i>
                    </button>
                </div>';



            $result['data'][$key] = array(
                $value['id'],
                //$nom . ' ' . $prenom,
                $value['nom'],
                $subscribers,
                $button


            );

        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function fetchSubscribers($id)
    {
        $moduleData = $this->model_news->fetchSubscribers($id);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($moduleData);
    }
    
    public function update_events($module_id)
    {

        $validator = array('success' => false, 'message' => '');

        $this->form_validation->set_rules('nom', 'Nom', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$/]');
        $this->form_validation->set_rules('description', 'Description', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$/]');

        if ($this->form_validation->run() === true) {
            $update_data = array(
                'nom' => $this->input->post('edit_nom'),
                'date_debut' => $this->input->post('edit_date_debut'),
                'date_fin' => $this->input->post('edit_date_fin'),
                'description' => $this->input->post('edit_description'),
            );

            // Gérez le fichier de soumission s'il est présent dans la requête
            if (!empty($_FILES['edit_photo']['name'])) {
                // Gérez l'upload du fichier ici et mettez à jour le chemin dans la base de données
                // Assurez-vous de vérifier la sécurité et le type de fichier pendant l'upload
                $upload_path = './assets/assets/images';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] ='png|jpg|jpeg';
                $config['max_size'] = 4000; // Taille maximale du fichier en kilo-octets

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('edit_photo')) {
                    $upload_data = $this->upload->data();
                    $update_data['photo'] = './assets/assets/images/'. $upload_data['file_name'];
                } else {
                    $validator['message'] = $this->upload->display_errors();
                    echo json_encode($validator);
                    return;
                }
            }

            // Effectuez la mise à jour dans le modèle
            $update_result = $this->model_news->update_events($module_id, $update_data);
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

    function subscribeMail()
    {
        $validator = array('success' => false, 'messages' => array());

        // Setting validation rules
        $this->form_validation->set_rules('mail', 'Email *', 'trim|required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
        $this->form_validation->set_rules('name', 'FullName *', 'trim|required|regex_match[/^[a-zA-ZÀ-ÿ\s\-\_\'\.]+$/u]');
        $this->form_validation->set_rules('message', 'Message *', 'trim|required|regex_match[/^[\p{L}\p{N}\s,.!?\'"-]+$/u]');

        if ($this->form_validation->run() === true) {
            // Load email library and gather input data
            $this->load->library('email');
            $nom = $this->input->post('name');
            $email = $this->input->post('mail');
            $message = $this->input->post('message');
            $id_evenement = $this->input->post('id_evenement');

            // Prepare data for database insertion
            $insert_data = array(
                'nom_prenom' => $nom,
                'email' => $email,
                'message' => $message,
                'id_evenement' => $id_evenement
            );

            // Configure and send email
            $this->email->set_mailtype('html');
            $this->email->from('votre@email.com', 'PEESO');
            $this->email->to($email);
            $this->email->subject('Événement PEESo');
            $this->email->message("<p>Bonjour ".$nom.",<br>Merci pour votre inscription à l'événement<br><br>Cordialement,<br>PEESo</p>");

            $mailSent = $this->email->send();
            $insert = $this->model_news->subscribeMail($insert_data);

            if ($mailSent && $insert) {
                $validator['success'] = true;
                $validator['messages'] = 'Envoyé avec succès';
            } else {
                $validator['messages'] = 'Échec de l\'envoi';
            }
        } else {
            // Collect validation errors to send back
            $validator['messages'] = validation_errors();
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function createCompetition()
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
                $photo = base_url('assets/assets/images/' . $upload_data['file_name']); // Full path to the new uploaded photo

                // Insert into the database
                $status = $this->model_news->createCompetition($photo);

                if ($status['success']) {
                    $validator = ['success' => true, 'messages' => 'Compétition soumis avec succès'];
                } else {
                    $validator = ['success' => false, 'messages' => $status['message'] ?? 'Erreur lors de la soumission de la compétition'];
                }
            } else {
                // File upload error
                $validator = ['success' => false, 'messages' => $this->upload->display_errors()];
            }
        } else {
            $validator = ['success' => false, 'messages' => 'Veuillez sélectionner un fichier photo.'];
        }

        // Return JSON response
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }
    
      
    function subscribeCompMail()
    {
        $validator = array('success' => false, 'messages' => array());
        if (isset($_FILES['pdf_cv']['name']) && $_FILES['pdf_cv']['name'] != '') {
                $upload_config = array(
                    'upload_path' => './assets/assets/images',
                    'allowed_types' => 'pdf',
                    'max_size' => 4000
                );

                $this->load->library("upload", $upload_config);

            if ($this->upload->do_upload('pdf_cv')) {

                $upload_data = $this->upload->data();
                $pdf = base_url('assets/assets/images/' . $upload_data['file_name']);
                // Setting validation rules
                $this->form_validation->set_rules('mail', 'Email *', 'trim|required|valid_email|regex_match[/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/]');
                $this->form_validation->set_rules('name', 'FullName *', 'trim|required|regex_match[/^[a-zA-ZÀ-ÿ\s\-\_\'\.]+$/u]');
                $this->form_validation->set_rules('message', 'Message *', 'trim|required|regex_match[/^[\p{L}\p{N}\s,.!?\'"-]+$/u]');

                if ($this->form_validation->run() === true) {
                    // Load email library and gather input data
                    $this->load->library('email');
                    $nom = $this->input->post('name');
                    $email = $this->input->post('mail');
                    $message = $this->input->post('message');
                    $id_competition = $this->input->post('id_competition');
                    $signature = $this->input->post('signature');

                    // Prepare data for database insertion
                    $insert_data = array(
                        'nom_prenom' => $nom,
                        'email' => $email,
                        'message' => $message,
                        'cv' => $pdf,
                        'id_competition' => $id_competition,
                        'signature' => $signature,
                        'is_accepted' =>'en_attente'
                    );

                    // Configure and send email
                    $this->email->set_mailtype('html');
                    $this->email->from('votre@email.com', 'PEESO');
                    $this->email->to($email);
                    $this->email->subject('Compétition PEESo');
                    $this->email->message(
                                    "<p>Bonjour ".$nom.",<br>Merci pour votre participation à la compétition.<br>
                                    Nous somme entrain d'étudier votre condidature.<br>
                                    Merci d'attendre notre réponse :)<br><br>
                                    Cordialement,<br>
                                    PEESo</p>"
                                );

                    $mailSent = $this->email->send();
                    $insert = $this->model_news->subscribeCompMail($insert_data);

                    if ($mailSent && $insert) {
                        $validator['success'] = true;
                        $validator['messages'] = 'Envoyé avec succès';
                    } else {
                        $validator['messages'] = 'Échec de l\'envoi';
                    }
                } else {
                    // Collect validation errors to send back
                    $validator['messages'] = validation_errors();
                }

            } else {
                // File upload error
                $validator = ['success' => false, 'messages' => $this->upload->display_errors()];
            }
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function getCompetition($id){
        $validator = array();
        $competition = $this->model_news->getCompetition($id);
        if($competition){
            $validator['data']=$competition;
            $validator['success']=true;
        }
        else{
            $validator['message']='Compétition n\'existe pas';
            $validator['success']=false;
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);

    }


    public function fetchCompetitionDispo($page)
    {
        $limit = 10;
        $data = $this->model_news->fetchCompetitionDispo($page, $limit);
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
            $html .= '<h3><a href="' . base_url('blog-details/' . $r['id']) . '">' . $title . '</a></h3>';
            $html .= '</div>';
            $html .= '<div class="blogarea__list__2">';
            $html .= '<ul>';
            $html .= '</ul>';
            $html .= '</div>';
            $html .= '<div class="blogarea__paragraph">';
            $html .= '<p>' . $desc . '...</p>';
            $html .= '</div>';
            $html .= '<div class="blogarea__button__2">';
            $html .= '<button onclick="readMore(' . $r['id'] . ')" style="color:blue; background-color: transparent; border: 1px solid transparent;">
                        VOIR PLUS <i class="icofont-double-right"></i>
                    </button>';
            
            // Registration button logic
        
            $html .= '<a href="' . base_url("sinscrire_competition?id_competition=" . $r["id"]) . '">
                        <button class="btn btn-primary">
                            S\'inscrire
                        </button>
                    </a>';
            

            $html .= '</div>'; // Close blogarea__button__2
            $html .= '</div>'; // Close blogarea__text__wraper__2
            $html .= '</div>'; // Close blog__content__wraper__2
        }

        // Send the response as JSON
        echo json_encode(['html' => $html, 'numberOfPages' => $data['numberOfPages'], 'currentPage' => $data['page']]);
    }

    public function fetchCompetitionSubscribers($id)
    {
        $moduleData = $this->model_news->fetchCompetitionSubscribers($id);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($moduleData);
    }

    public function fetchDataCompetitons()
    {
        $moduleData = $this->model_news->fetchDataCompetitons();
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
        

            $subscribers = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersModal" onclick="ViewSubscribers(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                    </button>
                </div>';



            $result['data'][$key] = array(
                $value['id'],
                //$nom . ' ' . $prenom,
                $value['nom'],
                $subscribers,
                $button


            );

        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function fetchDataCompetitonsDept()
    {
        $dept_id = $this->session->userdata()['logged']['etab_id'];

        $moduleData = $this->model_news->fetchDataCompetitonsDept( $dept_id);
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
        

            $subscribers = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersModal" onclick="ViewSubscribers(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                    </button>
                </div>';



            $result['data'][$key] = array(
                $value['id'],
                //$nom . ' ' . $prenom,
                $value['nom'],
                $subscribers,
                $button


            );

        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function removeEvents($id)
    {
        $is_deleted = $this->model_news->removeEvents($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec success']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'probleme de supprission']);
        }

    }
    public function removeCompetitions($id)
    {
        $is_deleted = $this->model_news->removeCompetitions($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec success']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'probleme de supprission']);
        }

    }

    public function update_competitions($module_id)
    {

        $validator = array('success' => false, 'message' => '');

        $this->form_validation->set_rules('nom', 'Nom', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$/]');
        $this->form_validation->set_rules('description', 'Description', 'regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9_\.\'\-@:/]+$/]');

        if ($this->form_validation->run() === true) {
            $update_data = array(
                'nom' => $this->input->post('edit_nom'),
                'date_debut' => $this->input->post('edit_date_debut'),
                'date_fin' => $this->input->post('edit_date_fin'),
                'description' => $this->input->post('edit_description'),
            );

            // Gérez le fichier de soumission s'il est présent dans la requête
            if (!empty($_FILES['edit_cv']['name'])) {
                // Gérez l'upload du fichier ici et mettez à jour le chemin dans la base de données
                // Assurez-vous de vérifier la sécurité et le type de fichier pendant l'upload
                $upload_path = './assets/assets/images';
                $config['upload_path'] = $upload_path;
                $config['allowed_types'] ='pdf';
                $config['max_size'] = 4000; // Taille maximale du fichier en kilo-octets

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('edit_cv')) {
                    $upload_data = $this->upload->data();
                    $update_data['cv'] = './assets/assets/images/'. $upload_data['file_name'];
                } else {
                    $validator['message'] = $this->upload->display_errors();
                    echo json_encode($validator);
                    return;
                }
            }

            // Effectuez la mise à jour dans le modèle
            $update_result = $this->model_news->update_competitions($module_id, $update_data);
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

    public function getsubscriber($id){
        $act = $this->model_news->getsubscriber($id);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($act);

    }

    public function accepteSub($id){
        $validator = array('success' => false, 'message' => '');
    
        $update_data = array(
            'is_accepted' => 'oui'
        );
        $update = $this->model_news->accepteSub($id, $update_data);
        
    
        if ($update) {
            $validator['success'] = true;
            $validator['messages'] = 'Succès';
        } else {
            $validator['success'] = false;
            $validator['messages'] = 'Échoué';
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function refuseSub($id){
        $validator = array('success' => false, 'message' => '');
    
        $update_data = array(
            'is_accepted' => 'non'
        );
        $update = $this->model_news->refuseSub($id, $update_data);
        
    
        if ($update) {
            $validator['success'] = true;
            $validator['messages'] = 'Succès';
        } else {
            $validator['success'] = false;
            $validator['messages'] = 'Échoué';
        }
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function fetchDataInscrits()
    {
        $moduleData = $this->model_news->fetchDataCompetitons();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
          
            $info = '
               <div style="justify-content: center !important; display: flex;" class="actions">
                <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                </button>
               </div>
            ';

            $subscribersAccepted = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersAcceptedModal" onclick="ViewSubscribersAccepted(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                    </button>
                </div>';

            $subscribersRefused = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersRefusedModal" onclick="ViewSubscribersRefused(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                    </button>
                </div>';



            $result['data'][$key] = array(
            
                $value['nom'],
                $subscribersAccepted,
                $subscribersRefused,
                $info


            );

        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchDataInscritsDept()
    {
        $dept_id = $this->session->userdata()['logged']['etab_id'];

        $moduleData = $this->model_news->Dept($dept_id);
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
          
            $info = '
               <div style="justify-content: center !important; display: flex;" class="actions">
                <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                </button>
               </div>
            ';

            $subscribersAccepted = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersAcceptedModal" onclick="ViewSubscribersAccepted(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                    </button>
                </div>';

            $subscribersRefused = ' <div style="justify-content: center !important; display: flex;">
                    <button type="button" class="btn btn-sm btn-info action-button" data-target="#ViewSubscribersRefusedModal" onclick="ViewSubscribersRefused(' . $value['id'] . ')" data-toggle="modal"><i class="icofont-eye"></i>
                    </button>
                </div>';



            $result['data'][$key] = array(
            
                $value['nom'],
                $subscribersAccepted,
                $subscribersRefused,
                $info


            );

        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function fetchCompetitionSubscribersAccepted($id)
    {
        $moduleData = $this->model_news->fetchCompetitionSubscribersAccepted($id);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($moduleData);
    }

    public function fetchCompetitionSubscribersRefused($id)
    {
        $moduleData = $this->model_news->fetchCompetitionSubscribersRefused($id);
        
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($moduleData);
    }


}