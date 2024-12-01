<?php
class EmploiStage extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('model_emploi_stage');
        $this->load->database();
        $this->load->library('session');
        $this->load->model('model_admin');


    }

    public function createOffre()
    {
       
        $validator = array('success' => false, 'messages' => array());

        $validate_data = array(
            array(
                'field' => 'titre',
                'label' => 'titre',
                'rules' => 'required|regex_match[/^[a-zA-ZÀ-ÖØ-öø-ÿ0-9\'\- ]+$/]'
            ),
        );
    
    
    
        $this->form_validation->set_rules($validate_data);
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_message('required', 'Le champ %s est obligatoire');
    
        if ($this->form_validation->run() === true) {
          
            $attendance = $this->model_emploi_stage->createOffre();
            if ($attendance == true) {
                $validator['success'] = true;
                $validator['messages'] = 'Ajout offre avec succès.';

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
    
    public function fetchOffreData() {
        $offer_type = $this->input->get('offre_type'); // Correct parameter key
    
    
        $moduleData = $this->model_emploi_stage->fetchOffreData($offer_type);
        $result = array('data' => array());
    
        foreach ($moduleData as $key => $value) {
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
    
            $result['data'][$key] = array(
                $value['titre'],
                $value['entreprise'],
                $value['adresse'],
                $value['date_publication'],
                $button
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    public function fetchOffreDataDept() {
        $offer_type = $this->input->get('offre_type'); // Correct parameter key
        $dept_id = $this->session->userdata()['logged']['etab_id']; // Ensure 'dept_id' is set in session
        //echo json_encode($this->session->userdata);
    
        $moduleData = $this->model_emploi_stage->fetchOffreDataDept($offer_type, $dept_id);
        $result = array('data' => array());
    
        foreach ($moduleData as $key => $value) {
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
    
            $result['data'][$key] = array(
                $value['titre'],
                $value['entreprise'],
                $value['adresse'],
                $value['date_publication'],
                $button
            );
        }
    
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }
    

    public function getOffre($id)
    {
        $result = $this->model_emploi_stage->getOffre($id);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);
    }

    public function updateOffreData($moduleId = null)
    {
        if ($moduleId) {
            $update = $this->model_emploi_stage->updateOffreData($moduleId);
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

    public function removeOffre($moduleId = null)
    {
        if ($moduleId) {
            $remove = $this->model_emploi_stage->removeOffre($moduleId);
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
}