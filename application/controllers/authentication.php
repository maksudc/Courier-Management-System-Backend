<?php

class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function register() {

        $this->form_validation->set_rules('name', 'name', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header');
            $this->load->view('register');
            $this->load->view('templates/footer');
        } else {

            $name = $this->input->post('name', true);
            $password = $this->input->post('password', true);
            $email = $this->input->post('email', true);
            $phone = $this->input->post('phone', true);
            $photo = '';
            $credit_card_number = $this->input->post('credit_card_number', true);

            $this->load->model('user_model');
            $this->user_model->create_user($name, $password, $email, $phone, $photo, $credit_card_number);
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
    }

    public function login() {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {


            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {

            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            $this->load->model('user_model');

            if (!$this->user_model->exists($email, $password)) {

                $this->load->view('templates/header');
                $this->load->view('login');
                $this->load->view('templates/footer');
            } else {

                $this->load->model('user_model');
                $user_info = $this->user_model->get_user_info_by_email($email);

                $this->session->set_userdata('user_id', $user_info['user_id']);
                $this->session->set_userdata('name', $user_info['name']);
                $this->session->set_userdata('email', $user_info['email']);
                $this->session->set_userdata('phone', $user_info['phone']);
                $this->session->set_userdata('credit_card_number', $this->encrypt->encode($user_info['credit_card_number']));

                redirect('user/profile');
            }
        }
    }

    public function admin_login() {

        if ($this->session->userdata('admin_id')) {
            redirect('admin/dashboard');
            exit;
        }
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {


            $this->load->view('templates/header');
            $this->load->view('admin/standalone_login');
            $this->load->view('templates/footer');
        } else {

            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            $this->load->model('admin_model');
            $admin = $this->admin_model->get_admin($email, $password);
            if (!$admin) {
                $this->load->view('templates/header');
                $this->load->view('admin/login');
                $this->load->view('templates/footer');
            } else {

                $this->session->set_userdata('admin_id', $admin['admin_id']);
                $this->session->set_userdata('email', $admin['email']);

                $this->session->set_userdata('flash_message', 'Welcome ' . $admin['email'] . '  <br/> to Your Dashboard');
                redirect('admin/dashboard');
            }
        }
    }

    public function logout() {

        if ($this->session->userdata('admin_id')) {

            $this->session->sess_destroy();

            redirect('authentication/admin_login');
        }
    }

    public function fblogin() {
        
    }

    public function email_verify() {
        
    }

}

?>
