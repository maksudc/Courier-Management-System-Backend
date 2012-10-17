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
        ));
        $this->load->view('templates/footer');
    }
    public function users() {

        $this->load->model('user_model');

        $this->load->view('templates/header');
        $this->load->view('admin/users', array(
            'users' => $this->user_model->get_users()
        ));
        $this->load->view('templates/footer');
    }

    public function assign_task() {
        if (!$this->session->userdata('admin_id')) {
            redirect('authentication/admin_login');
            exit;
        }

        $this->form_validation->set_rules('userid', '', 'required');
        $this->form_validation->set_rules('taskid','','required');

        if ($this->form_validation->run() == False) {
            $this->load->model('user_model');
            $this->load->model('task_model');

            $this->load->view('templates/header');
            $this->load->view('admin/assign_task', array(
                'users' => $this->user_model->get_users(),
                'tasks' => $this->task_model->get_unassigned_tasks()
            ));
            $this->load->view('templates/footer');
        } else {

            $this->load->model('user_model');
            if ($this->user_model->assign_task(
                            $this->input->post('userid', true), $this->input->post('taskid', true)
            )) {
                $this->session->set_userdata('flash_message', 'Successfully Assigned Te task');
           
                redirect('admin/assign_task');
                exit;
            }
        }
    }
}

?>
