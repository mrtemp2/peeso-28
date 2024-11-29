<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

    private $table = '28_2024_users';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all users or a single user by ID
     *
     * @param int|null $id User ID (optional)
     * @return array|object Result as an array or a single object
     */
    public function getUsers($id = null) {
        if ($id) {
            $this->db->where('id', $id);
            return $this->db->get($this->table)->row(); // Single row
        }
        return $this->db->get($this->table)->result(); // All rows
    }

    /**
     * Insert a new user
     *
     * @param array $data User data
     * @return int|bool Insert ID or false on failure
     */
    public function insertUser($data) {
        if ($this->db->insert($this->table, $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    /**
     * Update an existing user
     *
     * @param int $id User ID
     * @param array $data Data to update
     * @return bool True on success, false otherwise
     */
    public function updateUser($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Delete a user
     *
     * @param int $id User ID
     * @return bool True on success, false otherwise
     */
    public function deleteUser($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    /**
     * Get users by a specific condition
     *
     * @param array $conditions Associative array of conditions
     * @return array Resulting rows
     */
    public function getUsersByCondition($conditions) {
        return $this->db->get_where($this->table, $conditions)->result();
    }
}
