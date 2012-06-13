<?php

class User_session_model extends CI_Model {

    var $session_id;
    var $user_id;
    var $ip;
    var $location;
    var $device;

    public function __construct() {
        parent::__construct();
    }

    public function create($user_id, $ip, $location, $device) {

        $this->session_id = $this->session->userdata('session_id');
        $this->user_id = $user_id;
        $this->ip = $ip;
        $this->location = $location;
        $this->device = $device;

        if (!$this->db->insert('user_session', $this)) {

            return false;
        }

        return true;
    }

    public function update($user_id, $ip, $location, $device) {

        $this->session_id = $this->session->userdata('session_id');
        $this->user_id = $user_id;
        $this->ip = $ip;
        $this->location = $location;
        $this->device = $device;

        if (!$this->db->where('user_id', $this->user_id)
                        ->update('user_session', $this)) {

            return false;
        }
        return true;
    }

    public function delete($user_id) {

        if (!$this->db->where('user_id', $user_id)
                        ->delete('user_session_model')) {

            return false;
        }

        return true;
    }

    public function get_user_sessions() {

        return $this->db->distinct()
                        ->get('user_session')
                        ->result_array();
    }

}

?>
