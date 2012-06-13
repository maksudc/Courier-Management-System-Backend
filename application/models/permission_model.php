<?php

class Permission_model extends CI_Model {

    var $permission_id;
    var $task;

    public function __construct() {
        parent::__construct();
    }

    public function create($task) {

        $this->permission_id = NULL;
        $this->task = $task;

        if (!$this->db->insert('permission', $this)) {
            return false;
        }
        return true;
    }

    public function update($permission_id = '', $task = '') {

        $this->permission_id = $permission_id;
        $this->task = $task;

        if (($this->task != '') && ($this->permission_id != '')) {

            if ($this->db->where('permission', $this->permission_id)
                            ->update('permission', $this)) {

                return true;
            }
        }
        return false;
    }

    public function delete($permission_id) {

        $this->permission_id = $permission_id;

        if ($this->db->where('permission_id', $this->permission_id)
                        ->delete('permission')) {
            return true;
        }

        return false;
    }

    public function get_all_permissions() {

        return $this->db->get('permission')
                        ->result_array();
    }

    public function get_user_permissions($user_id) {

        return $this->db->select('*')
                        ->from('permission')
                        ->join('moderator_permission', 'permission.permission_id=moderator_permission.permission_id', 'inner')
                        ->where('moderator_permission.user_id', $user_id)
                        ->result_array();
    }

}

?>
