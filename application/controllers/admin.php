<?php

/**
 * Description of Admin
 *
 * @author Md.Maksud Alam Chodhury
 */
class Admin extends CI_Controller {

    public function dashboard() {

        $flash_message = $this->session->userdata('flash_message');
        $this->session->unset_userdata('flash_message');

        $this->load->view('templates/header');
        $this->load->view('admin/dashboard', array(
            'flash_message' => $flash_message,
            'email' => $this->session->userdata('email'),
        ));
        $this->load->view('templates/footer');
    }

    public function track_user() {
        
    }

    public function list_users() {
        
    }

    public function mass_mail() {
        
    }

}

?>
