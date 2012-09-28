<?php

class Test_data extends CI_Model {

    public function insert_data($data) {

        if (!$this->db->insert('task', $data)) {

            return false;
        };

        return true;
    }

}

?>
