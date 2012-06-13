<?php

/**
 *
 * @author Md.Maksud Alam  Chowdhury
 * 
 */
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     *
     * @method update
     * @param user_id
     * @access signed in user 
     */
    public function update() {
        
    }

    /**
     *
     * @method profile
     * @param user_id
     * @access signed in user 
     */
    public function profile() {

        if (!$this->session->userdata('user_id')) {

            redirect('authentication/login');
        } else {

            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'name' => $this->session->userdata('name'),
                'email' => $this->session->userdata('email'),
                'phone' => $this->session->userdata('phone')
            );

            $this->load->view('templates/header');
            $this->load->view('profile', $data);
            $this->load->view('templates/footer');
        }
    }

    /**
     *
     * @method home
     * @param user_id
     * @access signed in user/ unsigned users
     */
    public function home() {
        
    }

    public function find_people() {
        
    }

    public function send_message() {
        
    }

    public function test() {

        $this->form_validation->set_rules('field','FIELD','required');
        if ($this->form_validation->run() == FALSEF) {
            $this->load->view('service');
        }
    }

}
