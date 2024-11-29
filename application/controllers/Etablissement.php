<?php







class Etablissement extends CI_Controller
{



    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_etablissement');
        $this->load->database();
        $this->load->library('session');

    }
    
    public function createEtab()
    {
        $soumissionFile = $_FILES['logo'];
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
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'nom',
                'label' => 'Nom',
                'rules' => 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9\'\- ]+$/]'
            ),
        );
    
    
    
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
    
        if ($this->form_validation->run() === true) {
            if ($this->upload->do_upload('logo')) {
                $logo = $this->upload->data('file_name');
            } else {
                $validator = array('success' => false, 'message' => $this->upload->display_errors());
                echo json_encode($validator);
                return;
            }
            
            $attendance = $this->model_etablissement->createEtab($logo);
            if ($attendance == true) {
                $validator['success'] = true;
                $validator['messages'] = 'Ajout etablissement avec succès.';

            } else {
                $validator['success'] = false;
                $validator['messages'] = 'Erreur lors de l\'ajout';
            }
        } else {
            $validator['success'] = false;
            foreach ($_POST as $key => $value) {
                $validator['messages'][$key] = form_error($key);
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }


    public function fetchEtabData()
    {
        $moduleData = $this->model_etablissement->fetchEtabData();
        $result = array('data' => array());

        foreach ($moduleData as $key => $value) {
            $button = "<!-- Single button -->";
            $button = '
                    <div class="actions d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-primary action-button m-1" data-target="#ViewSubjectModal" onclick="ViewSubject(' . $value['id'] . ')" data-toggle="modal">
                            <i class="icofont-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-warning action-button m-1" data-toggle="modal" data-target="#updateSubjectModal" onclick="updateSubject(' . $value['id'] . ')">
                            <i class="icofont-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger action-button m-1" data-toggle="modal" data-target="#removeSubjectModal" onclick="removeSubject(' . $value['id'] . ')">
                            <i class="icofont-trash"></i>
                        </button>
                    </div>
                ';

                if ($value['active'] == 1) {
                    $button .= '
                        <button type="button" class="btn btn-sm btn-warning  m-1" data-target="#validateSubjectModal" onclick="validateSubject(' . $value['id'] . ',0)" data-toggle="modal">
                            Désactiver
                        </button>';
                } else {
                    $button .= '
                        <button type="button" class="btn btn-sm btn-success  m-1" data-target="#validateSubjectModal" onclick="validateSubject(' . $value['id'] . ',1)" data-toggle="modal">
                            Activer
                        </button>';
                }
            $isActive = '';
            if($value['active'] == 1){
                $isActive = '<span class=" btn btn-success">Activé</span>';
            } 
            else {
                $isActive = '<span class=" btn btn-danger">Désactivé</span>';
            }

            $result['data'][$key] = array(
                // $value['id'],
                $value['nom'],
                $isActive,
                $button
            );
            
        } // /froeach

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function updateEtabData($moduleId = null)
    {
        if ($moduleId) {
            $update = $this->model_etablissement->updateEtabData($moduleId);
            if ($update === true) {
                $validator['success'] = true;
                $validator['messages'] = "Modifé avec succès";
            } else {
                $validator['success'] = false;
                $validator['messages'] = "Erreur lors de la modification des informations";
            }
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($validator);
    }

    public function removeEtab($moduleId = null)
    {
        if ($moduleId) {
            $remove = $this->model_etablissement->removeEtab($moduleId);
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

    public function getEtab($id)
    {
        $result = $this->model_etablissement->getEtab($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function validateEtab($id)
    {
            $update_data = array(
                'active' => $this->input->post('active')
            );
            $update_result = $this->model_etablissement->validateEtab($id, $update_data);
            if ($update_result === true) {
                $validator['success'] = true;
                $validator['messages'] = "Modifiée avec succès";
            } else {
                $validator['messages'] = "Erreur lors de la mise à jour";
            }
        // Renvoyez la réponse JSON
        header('Content-Type: application/json');
        echo json_encode($validator);
    }

}