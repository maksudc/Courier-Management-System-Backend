<?php

class Sampler extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function show() {

        echo "Fine";
        $this->load->view('templates/header');
        $this->load->view('templates/slider');
        $this->load->view('templates/footer');
    }

}

?>
