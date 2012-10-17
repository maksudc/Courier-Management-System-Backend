<?php

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function tasks() {
        if (!$this->session->userdata('admin_id')) {
            redirect('authentication/admin_login');
            exit;
        }

        $this->load->model('task_model');

        $this->load->view('templates/header');
        $this->load->view('task/tasks', array(
            'unassigned_tasks' => $this->task_model->get_unassigned_tasks(),
            'unreported_tasks' => $this->task_model->get_unreported_tasks(),
            'reported_tasks' => $this->task_model->get_reported_tasks()
        ));
        $this->load->view('templates/footer');
    }

    public function index($taskid = null) {

        if ($taskid == null) {
            return;
        }
        if (!$this->session->userdata('admin_id')) {
            redirect('authentication/admin_login');
            return;
        }

        $this->load->model('task_model');

        $this->load->view('templates/header');
        $this->load->view('task/profile', array(
            'user' => $this->task_model->get_user($taskid),
            'task' => $this->task_model->get_task($taskid)
        ));
        $this->load->view('templates/footer');
    }

    public function map($taskid) {
        $this->load->model('task_model');
        //var_dump($this->task_model->get_task($taskid));
        $this->load->view('task/map', array(
            'task' => $this->task_model->get_task($taskid)
        ));
    }

    public function show_map($latitude, $longitude) {

        $this->load->view('task/address_map', array(
            'longitude' => $longitude,
            'latitude' => $latitude
        ));
    }

    public function create() {

        if (!$this->session->userdata('admin_id')) {
            redirect('authentication/admin_login');
            exit;
        }

        $this->form_validation->set_rules('name', '', 'required');
        $this->form_validation->set_rules('address', '', 'required');
        $this->form_validation->set_rules('duedate', '', 'reuqired');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('task/create_form');
            $this->load->view('templates/footer');
        } else {

            $this->load->model('task_model');

            if ($taskid = $this->task_model->create(array(
                'name' => $this->input->post('name', true),
                'address' => $this->input->post('address', true),
                'contactno' => $this->input->post('contactno', true),
                'description' => $this->input->post('description', true),
                'duedate' => $this->input->post('duedate', true),
                'duetime' => $this->input->post('duetime', true),
                'longitude' => $this->input->post('longitude', true),
                'latitude' => $this->input->post('latitude', true),
                'comments' => '',
                'status' => 0,
                'reasontype' => NULL,
                'reasondetails' => NULL,
                'reportlongitude' => NULL,
                'reportlatitude' => NULL,
                'signaturefile' => NULL
                    ))) {

                $this->session->set_userdata('flash_message', 'task Successfulyy Created');
                redirect('task/index/' . $taskid);
            } else {
                $this->session->set_userdata('flash_message', 'Database Error');
                redirect('task/create_form');
            }
        }
    }

}

?>
