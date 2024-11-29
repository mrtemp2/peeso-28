<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_user'); // Load User model
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->library('session');
    }

    public function fetchAdministrateurEtab() {
        $usersData = $this->Model_user->getUsersByCondition(['type' => 'Administrateur_etab']);
        $result = array('data' => array());

        foreach ($usersData as $key => $value) {
            $button = '
            <div class="actions d-flex align-items-center">
                
                <button type="button" class="btn btn-sm btn-danger action-button m-2" 
                    data-toggle="modal" data-target="#removeSoumission" onclick="removeSubject(' . $value->id . ')">
                    <i class="icofont-trash"></i>
                </button>
                <button type="button" class="btn btn-sm btn-warning action-button m-2" 
                    data-target="#editModal" onclick="editSubject(' . $value->id . ')">
                    <i class="icofont-edit"></i>
                </button>
            </div>
        ';
            $result['data'][$key] = array(
                $value->id,
                $value->username,
                $button
            );
        }

        echo json_encode($result);
    }
    public function get_User($id)
    {
        $user = $this->Model_user->getUsers($id);
        echo json_encode($user);
    }
    public function update_User($module_id)
    {

        $validator = array('success' => false, 'message' => '');

        // Utilisez la bibliothèque de validation CodeIgniter pour valider les données
        // Ajoutez des règles de validation pour les autres champs si nécessaire
        $this->form_validation->set_rules('edit_nom_fr', 'Nom', 'required|trim');
        $this->form_validation->set_rules('edit_pwd_fr', 'Mot de passe', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('etab_id', 'Establishment', 'required|integer');
        
        if ($this->form_validation->run() === true) {
            // Validation passed, proceed to update
            $update_data = array(
                'username' => $this->input->post('edit_nom_fr'),
                'password' => $this->input->post('edit_pwd_fr'),
                'etab_id' => $this->input->post('etab_id'),
            );
        
            $update_result = $this->Model_user->updateUser($module_id, $update_data);
            if ($update_result === true) {
                $validator['success'] = true;
                $validator['message'] = "Modifiée avec succès";
            } else {
                $validator['message'] = "Erreur lors de la mise à jour";
            }
        } else {
            // Validation failed, log errors
            $validator['message'] = validation_errors();
        }

        // Renvoyez la réponse JSON
        header('Content-Type: application/json');
        echo json_encode($validator);
    }
    public function removeUser($id)
    {
        $is_deleted = $this->Model_user->deleteUser($id);
        
        if ($is_deleted) {
            echo json_encode(['success' => true, 'messages' => 'supprimé avec success']);
        } else {
            echo json_encode(['success' => false, 'messages' => 'probleme de supprission']);
        }

    }
}
