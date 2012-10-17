<?php

class User_model extends CI_Model {

    var $user_id;
    var $username;
    var $password;
    var $email;

    public function __construct() {
        parent::__construct();
    }

    public function get_users() {

        return $this->db->get('user')
                        ->result_array();
    }
    
    public function assign_task($userid,$taskid){
        
        return $this->db->insert('user_task',array(
            'taskid'=>$taskid,
            'userid'=>$userid
        ));        
    }

    public function create_user($name, $password, $email) {

        $this->name = $name;
        $this->password = md5($password);
        $this->email = $email;

        if (!$this->db->insert('user', $this)) {
            return false;
        }
        return true;
    }

    public function delete_user($user_id) {

        if (!$this->db->where('user_id', $user_id)
                        ->delete('user')) {
            return false;
        } else {
            return true;
        }
    }

    public function get_user_info($user_id) {

        return $this->db->where('userid', $user_id)
                        ->get('user')
                        ->row_array();
    }

    public function exists($email, $password) {

        $password = md5($password);

        if (count($this->db->select('*')
                                ->where('email', $email)
                                ->where('password', $password)
                                ->from('user')
                ) > 0) {

            return true;
        }

        return false;
    }

    public function get_user_info_by_email($email) {

        $email = $this->db->escape($email);
        $sql = "SELECT * FROM user WHERE email=$email";

        return $this->db->query($sql)->row_array();
    }

}

?>
