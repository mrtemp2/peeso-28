<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Model_user'); // Load User model
    }

    public function fetchAdministrateurEtab() {
        $usersData = $this->Model_user->getUsersByCondition(['type' => 'Administrateur_etab']);
        $result = array('data' => array());

        foreach ($usersData as $key => $value) {
            $button = '
                <div class="actions d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-primary action-button m-2" 
                        onclick="viewUser(' . $value->id . ')">
                        <i class="icofont-eye"></i>
                    </button>
                </div>
            ';

            $result['data'][$key] = array(
                $value->id,
                $value->username,
                $value->role_referent,
                $button
            );
        }

        echo json_encode($result);
    }
}
