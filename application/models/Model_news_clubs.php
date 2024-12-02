<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_news_clubs extends CI_Model {

    // Constructor to load the database
    public function __construct() {
        parent::__construct();
        $this->load->database();  // Load the database
    }

    // Insert news club record
    public function insert_news($data) {
        $this->db->insert('news_clubs', $data);
        return $this->db->insert_id();  // Return the inserted ID
    }

    // Update news club record
    public function update_news($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('news_clubs', $data);
        return $this->db->affected_rows();  // Return the number of affected rows
    }

    // Get news club by club ID
    public function get_news_by_club($id_club) {
        $this->db->where('id_club', $id_club);
        $query = $this->db->get('news_clubs');
        return $query->result_array();  // Return result as an array
    }

    // Get a specific news record by ID
    public function get_news_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('news_clubs');
        return $query->row_array();  // Return a single result
    }

    // Delete news club record by ID
    public function delete_news($id) {
        $this->db->where('id', $id);
        $this->db->delete('news_clubs');
        return $this->db->affected_rows();  // Return the number of affected rows
    }
    public function getNews($id){
        return $this->db->select('
                    news_clubs.titre,
                    news_clubs.image,
                    news_clubs.id,
                    news_clubs.content,
                    news_clubs.created_at,
                    clubs.nom_du_club,
                    clubs.id as id_club
                ')
                ->from('news_clubs')
                ->join('clubs', 'clubs.id = news_clubs.id_club', 'inner') // Join news_clubs with clubs
                ->where('news_clubs.id', $id)
                ->get()
                ->row_array();
    }
    public function getNewsAdmin(){
        return $this->db->select('
                    news_clubs.titre,
                    news_clubs.image,
                    news_clubs.id,
                    news_clubs.content,
                    news_clubs.created_at,
                    clubs.nom_du_club,
                    clubs.id as id_club
                ')
                ->from('news_clubs')
                ->join('clubs', 'clubs.id = news_clubs.id_club', 'inner') // Join news_clubs with clubs
                ->get()
                ->row_array();
    }
    public function add_news_club($insert_data){
        return $this->db->insert('news_clubs', $insert_data);
    }
}
