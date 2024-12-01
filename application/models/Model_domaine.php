<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_domaine extends CI_Model
{
    protected $table = '28_2024_domaine';
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    // Fetch all records
    public function get_all_domaines()
    {
        $query = $this->db->get($this->table);
        log_message('debug', $this->db->last_query()); // Log the query
        return $query->result_array();
    }

    // Fetch a single record by ID
    public function get_domaine_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    // Fetch domaines by etab_id
    public function get_domaines_by_etab($etab_id)
    {
        return $this->db->get_where($this->table, ['etab_id' => $etab_id])->result_array();
    }

    // Insert a new record
    public function insert_domaine($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update an existing record by ID
    public function update_domaine($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    // Delete a record by ID
    public function delete_domaine($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }
}
