<?php

class Model_emploi_stage extends CI_Model
{
    public function __construct()
    {
       parent::__construct();
    }

    public function createOffre(){
        $insert_data = array(
            'titre' => $this->input->post('titre'),
            'entreprise' => $this->input->post('entreprise'),
            'adresse' => $this->input->post('adresse'),
            'description'=>$this->input->post('description'),
            'date_publication'=> date('Y-m-d'),
            'type'=> $this->input->post('type')
        );

        $query = $this->db->insert('stage_emploi', $insert_data);

        if($query){
            return ['success' => true,'message' => "Ajout de l'offre avec succès"];
        }
        else {
            return ['success' => false,'message' => "Erreur lors d'ajout de l'offre"];
        }
    }

    public function fetchOffreData($offer_type) {
        $this->db->select('*')->from('stage_emploi');
    
        if (!empty($offer_type)) {
            $this->db->where('type', $offer_type);
        }
    
        $query = $this->db->get();
    
        return $query->result_array();
    }
    public function fetchOffreDataDept($offer_type, $dept_id) {
        // Select all columns from the 'stage_emploi' table
        $this->db->select('*')->from('stage_emploi');
    
        // Add a condition for the 'dept_id' field (mandatory filter)
        $this->db->where('etab_id', $dept_id);
        
        // Add a condition for the 'type' field if $offer_type is provided
        if (!empty($offer_type)) {
            $this->db->where('type', $offer_type);
        }
    
        // Execute the query
        $query = $this->db->get();
    
        // Return the result as an array
        return $query->result_array();
    }
    

    public function getAllOffres() {
        $this->db->select('*')->from('stage_emploi');
    
        // if (!empty($offer_type)) {
        //     $this->db->where('type', $offer_type);
        // }
    
        $query = $this->db->get();
    
        return $query->result_array();
    }
    

    public function getOffre($id){
        return $this->db->select('*')
                        ->from('stage_emploi')
                        ->where('id', $id)
                        ->get()
                        ->row_array();    
    }

    public function updateOffreData($id){
        
        $validator = array('success' => false, 'message' => array());

        $this->form_validation->set_rules('edit_titre','titre','regex_match[/^[a-zA-ZÀ-ÿ0-9\s@_.]+$/u]');
        
        if ($this->form_validation->run() === true) {

            $update_data_offre = array(
                'titre' => $this->input->post('edit_titre'),
                'entreprise' => $this->input->post('edit_entreprise'),
                'adresse' => $this->input->post('edit_adresse'),
                'description'=>$this->input->post('edit_description'),
                'date_publication'=> date('Y-m-d'),
                'type'=> $this->input->post('edit_type')
            );
            $this->db->where('id', $id);
            $status_offre = $this->db->update('stage_emploi', $update_data_offre);

            if ($status_offre) {
                $validator['success'] = true;
                return true;
            } else {
                $validator['message'] = 'Échec de la mise à jour de l\'offre.';
                return false;
            }
        } else {
            $validator['message'] = validation_errors();
            return false;
        }
    }

    public function removeOffre($subjectId){
        if ($subjectId) {
            $this->db->where('id', $subjectId);
            $result = $this->db->delete('stage_emploi');
            return ($result === true ? true : false);
        }
    }
}
