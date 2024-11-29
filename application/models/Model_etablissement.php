<?php







class Model_etablissement extends CI_Model
{



    public function __construct()
    {



        parent::__construct();
    }
    public function getEtablissementActive(){
        return $this->db->select('*')
                        ->from('etablissements')
                        ->where('active=true')
                        ->get()
                        ->result_array();    
    }

    public function createEtab($logo){
        $insert_data = array(
            'nom' => $this->input->post('nom'),
            'logo' => $logo
        );

        $query = $this->db->insert('etablissements', $insert_data);

        if($query){
            return ['success' => true,'message' => "Ajout de l'etablissement avec succès"];
        }
        else {
            return ['success' => false,'message' => "Erreur lors d'ajout de l'etablissement"];
        }
    }
  
    public function getEtab($id){
        return $this->db->select('*')
                        ->from('etablissements')
                        ->where('id', $id)
                        ->get()
                        ->row_array();    
    }

    public function fetchEtabData(){
        return $this->db->select('*')
                        ->from('etablissements')
                        ->get()
                        ->result_array();    
    }

    public function updateEtabData($id){
        $soumissionFile = $_FILES['edit_logo'];
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
        $validator = array('success' => false, 'message' => array());

        $this->form_validation->set_rules('editnom','Nom','regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.]+$/u]');
        
        if ($this->form_validation->run() === true) {
            if ($this->upload->do_upload('edit_logo')) {
                $logo = $this->upload->data('file_name');
            } else {
                $validator = array('success' => false, 'message' => $this->upload->display_errors());
                echo json_encode($validator);
                return;
            }

            $update_data_etab = array(
                'nom' => $this->input->post('editnom'),
                'logo' => $logo
            );
            $this->db->where('id', $id);
            $status_etab = $this->db->update('etablissements', $update_data_etab);

            if ($status_etab) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la mise à jour de l\'établissement.';
                return false;
            }
        } else {
            $validator['message'] = validation_errors();
            return false;
        }
    }

    public function removeEtab($subjectId){
        if ($subjectId) {
            $this->db->where('id', $subjectId);
            $result = $this->db->delete('etablissements');
            return ($result === true ? true : false);
        }
    }

    public function updateEtat($id){
        $validator = array('success' => false, 'message' => array());
        $update_data_etab = array(
            'active' => $this->input->post('editnom'),
        );
        $this->db->where('id', $id);
        $status_etab = $this->db->update('etablissements', $update_data_etab);

        if ($status_etab) {
            $validator['success'] = true;
            return true;
        } else {
            $validator['message'] = 'Échec de la mise à jour de l\'établissement.';
            return false;
        }
    }

    public function validateEtab($id, $update_data) {
        $this->db->where('id', $id);
        $status = $this->db->update('etablissements', $update_data);
    
        if ($this->db->affected_rows() > 0) {
            return true; // Return true when the update is successful
        } else {
            $error = $this->db->error(); // Get the database error
            log_message('error', 'Database Error: ' . $error['message']);
            return false; // Return false when there's an error or no rows were affected
        }
    }

    public function getAllActiveEtabs(){
        return $this->db->select('*')->from('etablissements')
                        ->where('active', 1)
                        ->get()->result_array();
    }
}