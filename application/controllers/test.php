<?php

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function create_user() {

        $this->load->model('user_model');
    }

    public function see_spec() {
        
        $content = file_get_contents('http://test.sentisol.com/cwc/index.php/android/getTaskHistory?username=cwcuser1&returnType=json');
        
        $content = json_decode($content,true);
        
        print_r($content[0]);
        
    }

}

?>
