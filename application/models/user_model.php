<?php

class User_model extends CI_Model {

    var $user_id;
    var $name;
    var $password;
    var $email;
    var $phone;
    var $photo;
    var $credit_card_number;
    var $type;
    var $status;

    public function __construct() {
        parent::__construct();
    }

    public function get_users_info() {

        return $this->db->get('user')
                        ->result_array();
    }

    public function create_user($name, $password, $email, $phone, $photo, $credit_card_number) {

        $this->name = $name;
        $this->password = md5($password);
        $this->email = $email;
        $this->phone = $phone;
        $this->photo = $photo;
        $this->credit_card_number = $credit_card_number;
        $this->type = 2;
        $this->status = 0;


        if (!$this->db->insert('user', $this)) {
            return false;
        }
        return true;
    }

    public function update_user($password = '', $email = '', $phone = '', $photo = '', $credit_card_number = '') {

        $user = $this->db->get_where('user', array('user_id' => $this->session->userdata('user_id')))->row_array();

        if ($user) {

            foreach ($user as $key => $value) {

                $this->$key = $value;
            }

            if ($password != '') {
                $this->password = md5($password);
            }
            if ($email != '') {
                $this->email = $email;
            }
            if ($photo != '') {
                $this->photo = $photo;
            }

            if ($phone != '') {
                $this->phone = $phone;
            }

            if ($credit_card_number != '') {
                $this->credit_card_number = $credit_card_number;
            }
        }

        if (!$this->db->where('user_id', $this->user_id)
                        ->update('user', $this)) {
            return false;
        } else {
            return true;
        }
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

        return $this->db->where('user_id', $user_id)
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
