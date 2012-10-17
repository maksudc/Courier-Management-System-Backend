<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index($user_id=null){
        
        if($user_id == null){
            return ;            
        }        
        if(!$this->session->userdata('admin_id')){
            redirect('authentication/admin_login');
            exit;
        }
        
        $this->load->model('user_model');
        $this->load->model('task_model');
        
       
        $this->load->view('templates/header');
        $this->load->view('user/profile',array(
            'user'=>$this->user_model->get_user_info($user_id),
            'active_tasks'=>$this->task_model->get_active_tasks($user_id),
            'reported_tasks'=>$this->task_model->get_reported_tasks($user_id)
        ));
        $this->load->view('templates/footer');
        
        
    }
}
?>
