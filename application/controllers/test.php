<?php

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create_user() {
        
        $this->load->model('user_model');
        
    }

}

?>
