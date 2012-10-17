<?php

class task_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_unassigned_tasks() {

        $sql = "SELECT * FROM task 
               WHERE task.status =0 AND taskid NOT IN 
               (SELECT user_task.taskid FROM user_task)";

        return $this->db->query($sql)->result_array();
    }

    public function get_unreported_tasks() {
        $sql = "SELECT * FROM task 
               WHERE task.status = 0 AND taskid  IN 
               (SELECT user_task.taskid FROM user_task)";

        return $this->db->query($sql)->result_array();
    }

    public function get_task($taskid) {

        return $this->db->where('taskid', $taskid)
                        ->get('task')
                        ->row_array();
    }

    public function get_user($taskid) {

        $sql = "SELECT * FROM user 
               WHERE user.userid =
               (
                    SELECT user_task.userid FROM user_task 
                    WHERE user_task.taskid = ?
               )";

        return $this->db->query($sql, array($taskid))
                        ->row_array();
    }

    public function get_active_tasks($user_id = 0) {

        $sql = "SELECT * FROM task WHERE task.status = '0' AND task.taskid 
                 IN 
                 (SELECT user_task.taskid FROM user_task WHERE user_task.userid = ?)
                ";
        return $this->db->query($sql, array($user_id))->result_array();
    }

    public function get_reported_tasks($user_id = 0) {

        $sql = "SELECT * FROM task WHERE task.status = '1' AND task.taskid 
                 IN 
                 (SELECT user_task.taskid FROM user_task WHERE user_task.userid = ?)
                ";
        return $this->db->query($sql, array($user_id))->result_array();
    }

    public function create($data) {

        $this->db->insert('task', $data);
        return $this->db->insert_id();
    }

}

?>
