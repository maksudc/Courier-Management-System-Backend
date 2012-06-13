<?php

class Pending_user_model extends CI_Model {

    var $user_id;
    var $link;
    var $confirmed;
    var $date;

    public function __construct() {
        parent::__construct();
    }

    public function create($user_id, $link) {

        $this->user_id = $user_id;
        $this->link = $link;
        $this->confirmed = 0;
        $this->date = date(DATE_RFC1036);

        if (!$this->db->insert('pending_user', $this)) {

            return false;
        }

        return true;
    }

    public function update($user_id, $link, $confirmed) {

        $this->user_id = $user_id;
        $this->link = $link;
        $this->confirmed = $confirmed;
        $this->date = date(DATE_RFC1123);

        if (!$this->db->where('user_id', $this->user_id)
                        ->where('link', $this->link)
                        ->where('confirmed', 0)
                        ->update('pending_user', $this)) {
            return false;
        }

        return true;
    }

    public function delete($user_id) {

        if (!$this->db->where('user_id', $user_id)
                        ->delete('pending_user')) {

            return false;
        }

        return true;
    }

    public function get_pending_users() {
        
        return $this->db->distinct()
                        ->get('pending_user')
                        ->result_array();
        
    }

}

?>
