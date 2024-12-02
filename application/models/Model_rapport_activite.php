<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Rapport_Activite extends CI_Model {
    
    
    // Fetch all rapports, optionally filtered by club ID
    public function get_all_rapports($id_club = null) {
        $this->db->select('ra.id, ra.nom, ra.pdf, ra.date_creation, ra.annee, ra.description, c.nom_du_club');
        $this->db->from('rapport_activite ra');
        $this->db->join('clubs c', 'ra.id_club = c.id', 'left');

        if ($id_club !== null) {
            $this->db->where('ra.id_club', $id_club);
        }

        return $this->db->get()->result_array();
    }

    // Insert a new rapport
    public function insert_rapport($data) {
        return $this->db->insert('rapport_activite', $data);
    }

    // Update an existing rapport
    public function update_rapport($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('rapport_activite', $data);
    }

    // Delete a rapport
    public function delete_rapport($id) {
        $this->db->where('id', $id);
        return $this->db->delete('rapport_activite');
    }

    // Fetch a single rapport by ID
    public function get_rapport_by_id($id) {
        $this->db->select('ra.*, c.nom_du_club');
        $this->db->from('rapport_activite ra');
        $this->db->join('clubs c', 'ra.id_club = c.id', 'left');
        $this->db->where('ra.id', $id);

        return $this->db->get()->row_array();
    }
    public function get_rapport_by_club($id) {
        $this->db->select('ra.*, c.nom_du_club');
        $this->db->from('rapport_activite ra');
        $this->db->join('clubs c', 'ra.id_club = c.id', 'left');
        $this->db->where('ra.id_club', $id);

        return $this->db->get()->result_array();
    }

}