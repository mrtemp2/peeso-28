<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_clubs extends CI_Model {

    private $table = '28_2024_clubs';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Get all clubs or a single club by ID
     *
     * @param int|null $id
     * @return array
     */
    public function get_clubs($id = null) {
        if ($id !== null) {
            $this->db->where('id', $id);
            return $this->db->get($this->table)->row_array();
        }
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Add a new club
     *
     * @param array $data
     * @return bool
     */
    public function add_club($data)
    {
        try {
            // Add detailed logging or error checking
            $result = $this->db->insert('clubs', $data);
            
            if (!$result) {
                // Log the specific database error
                log_message('error', 'Club insertion failed: ' . $this->db->error()['message']);
                return false;
            }
            
            return $this->db->insert_id(); // Return the inserted ID
        } catch (Exception $e) {
            // Log the exception details
            log_message('error', 'Exception in add_club: ' . $e->getMessage());
            return false;
        }
    }
    
    // Optional: method to get the last error message
    public function get_error_message()
    {
        return $this->error_message ?? 'Unknown error';
    }

    /**
     * Update an existing club by ID
     *
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update_club($club_id, $data) {
        $this->db->where('id', $club_id);
        $this->db->update('clubs', $data);
    
        // Log the query to check if it's correct
        log_message('debug', 'Update query: ' . $data);
    
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            log_message('error', 'Failed to update club. Affected rows: ' . $this->db->affected_rows());
            return false;
        }
    }

    /**
     * Delete a club by ID
     *
     * @param int $id
     * @return bool
     */
    public function delete_club($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Get clubs by user ID
     *
     * @param int $id_user
     * @return array
     */
    public function get_clubs_by_user($id_user) {
        $this->db->where('id_user', $id_user);
        return $this->db->get($this->table)->result_array();
    }
    public function get_clubs_by_Admin() {
        return $this->db->get($this->table)->result_array();
    }
    /**
     * Get clubs of type 'institutionnelle'
     *
     * @return array
     */
    public function get_clubs_by_type_institutionnelle() {
        $this->db->where('type', 'institutionnelle');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Get clubs of type 'locale'
     *
     * @return array
     */
    public function get_clubs_by_type_locale() {
        $this->db->where('type', 'locale');
        return $this->db->get($this->table)->result_array();
    }
    public function fetchClubData(){
        return  $this->db->select('f.*')
                  ->from('clubs f')
                  ->get()
                  ->result_array()  
                    ;       
    }
}
