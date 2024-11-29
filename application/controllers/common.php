<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session'); // Ensure the session library is loaded
    }

    // Method to store etab_id in session
    public function setEtabId() {
        $id = $this->input->post('id');
        if ($id) {
            $this->session->set_userdata('etab_id', $id);
            echo json_encode(['status' => 'success', 'message' => 'Etab ID stored in session']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid ID']);
        }
    }
}
