<?php

class Admin_model extends CI_Model {

    var $admin_id;
    var $email;
    var $password;

    public function __construct() {
        parent::__construct();
    }

    public function get_admin($email, $password){
        
        return $this->db->where('email',$email)->where('password',md5($password))->get('admin')->row_array();
    }

}

?>
