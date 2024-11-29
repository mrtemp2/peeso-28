<?php
class Capsules extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('model_capsule');
        $this->load->database();

    }
    public function add_capsule(){

        $validator = array('success' => false, 'message' => '');

        $this->form_validation->set_rules('id_video', 'Lien de la Vidéo', 'required');
        $this->form_validation->set_rules('titre-fr', 'Titre en Français', 'trim|regex_match[/^[a-zA-ZÀ-ÿ0-9\s\(\)\'\"\-]+$/u]');
        $this->form_validation->set_rules('titre-en', 'Titre En Anglais', 'trim|regex_match[/^[a-zA-ZÀ-ÿ0-9\s\(\)\'\"\-]+$/u]');

        if ($this->form_validation->run() === true) {
            $insert_data = array(
                'titre'=>$this->input->post('titre-fr'),
                'id_video'=>$this->input->post('id_video'),
                'published'=>true,
                'titre-en'=>$this->input->post('titre-en'),
                'created_at'=>date("Y-m-d"),
                
            );

            // Upload the file
        

            // Call the model to save the data in the database
            $success = $this->model_capsule->add_capsule($insert_data);

            if ($success) {
                $validator = array(
                    'success' => true,
                    'messages' => 'Ajouté avec succès',
                    //'redirect' => site_url('list_soumission'),
                );
                        } else {
                $validator = array('success' => false, 'messages' => 'Échec de l\'ajout');
            }
        } else {
            $validator = array('success' => false, 'messages' => 'Échec de l\'ajout');
        }

        // Encode the response as JSON
        header('Content-Type: application/json');
        echo json_encode($validator);


    }
    public function fetchDataCapsules()
    {
        $moduleData = $this->model_capsule->fetch_data_capsule();
        $result = array('data' => array());
        
        foreach ($moduleData as $key => $value) {
            $button = '
               <div class="actions">
                <button type="button" class="btn btn-sm btn-primary action-button" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal"><i class="fas fa-play"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger action-button" data-toggle="modal" data-target="#removeSoumission" onclick="removeSubject(' . $value['id'] . ')"><i class="far fa-trash-alt"></i>
                </button>
                 <button class="btn btn-sm btn-warning action-button" data-target="#editModal" onclick="editSubject(' . $value['id'] . ')"><i class="fas fa-edit"></i></button>
                
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
    public function getCapsule($id){
        $news =  $this->model_capsule->getCapsule($id);
        echo json_encode($news);
    }
    public function remove_capsule($id){
        $is_deleted = $this->model_capsule->remove_capsule($id);
       
        if($is_deleted){
            echo json_encode(['success'=>true,'messages'=>'supprimé avec success']); 
        }
        else{
            echo json_encode(['success'=>false,'messages'=>'probleme de supprission']); 
        }

    }
    public function update_capsule($module_id)
    {
        $validator = array('success' => false, 'message' => '');

        $this->form_validation->set_rules('edit_id_video', 'Lien de la Vidéo', 'required');
        $this->form_validation->set_rules('edit_titre_fr', 'Titre en Français', 'regex_match[/^[a-zA-ZÀ-ÿ0-9\s]+$/u]');
        $this->form_validation->set_rules('edit_titre_en', 'Titre En Anglais', 'regex_match[/^[a-zA-ZÀ-ÿ0-9\s]+$/u]');

        if ($this->form_validation->run() === true) {        

            $update_data = array(
                'titre' => $this->input->post('edit_titre_fr'),
                'titre-en' => $this->input->post('edit_titre_en'),
                'id_video'=>$this->input->post('edit_id_video'),
            );
            $update_result = $this->model_capsule->update_capsule($module_id, $update_data);
            if ($update_result === true) {
                $validator['success'] = true;
                $validator['message'] = "Modifiée avec succès";
            } else {
                $validator['message'] = "Erreur lors de la mise à jour";
            }
        } else {
            $validator['message'] = "Erreur lors de la mise à jour";
        }
        header('Content-Type: application/json');
        echo json_encode($validator);
    }
    public function fetchDataCapsulesFront($page)
    {
        $limit = 4;
        $data = $this->model_capsule->fetchDataCapsulesFront($page, $limit);
        $result = $data['data'];
        $html = '';
        foreach ($result as $r) {
            $html = $html . ' <div class="flash grid-item-p element-item transition creative col-xl-3 col-lg-4 col-md-6 col-sm-6"
                        data-category="transition">

                        <div class="rts-single-course">
                            <a href="single-course.html" class="thumbnail" style="position:relative;">
                                <img src="https://img.youtube.com/vi/'.$r['id_video'].'/0.jpg" alt="course">

                            </a>
                            <div class="vedio-icone">
                                <a class="video-play-button play-youtube" data-vid="'.$r['id_video'].'" href="#">
                                    <span></span>
                                </a>
                                <div class="video-overlay">
                                    <a class="video-overlay-close">×</a>
                                </div>
                            </div>



                        </div>

                        <!-- rts single course end -->
                    </div>';


        }
        echo json_encode(['html' => $html, 'numberOfPages' => $data['numberOfPages'], 'currentPage' => $data['page']]);

    }
    
    




}