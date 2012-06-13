<?php

class Moderator_model extends CI_Model {

    var $user_id;

    public function __construct() {
        parent::__construct();
    }

    public function create($user_id) {
        $this->user_id = $user_id;

        $this->db->insert('moderator', $this);
    }

    public function delete($user_id) {

        $this->user_id = $user_id;

        if ($this->db->where('user_id', $this->user_id)
                        ->delete('moderator')) {
            return true;
        }
        return false;
    }

}

?>
