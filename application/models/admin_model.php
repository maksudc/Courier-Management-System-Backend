<?php

class Admin_model extends CI_Model {

    var $user_id;
    var $start_date;

    public function __construct() {
        parent::__construct();
    }

    public function create($user_id) {
        $this->user_id = $user_id;
        $this->start_date = date(DATE_RFC1036);

        $this->db->insert('admin', $this);
    }

    public function delete($user_id) {

        $this->user_id = $user_id;

        if ($this->db->where('user_id', $this->user_id)
                        ->delete('admin')) {
            return true;
        }
        return false;
    }

}

?>
