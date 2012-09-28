<?php

include_once 'UserModel.php';

class TaskModel {

    protected $db;
    protected $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new UserModel($db);
    }

    public function getTaskList($username, $duedate) {

        if (!$this->user->isActiveUser($username)) {

            return NULL;
        } else {

            $duedate = $this->db->escape($duedate);
            $userInfo = $this->user->getUserByUsername($username);
            $userId = $userInfo['userid'];

            $sql = "    SELECT task.taskid,name,address,contactno,description,duedate,duetime,comments,longitude,latitude,status
                        FROM task                  
                        INNER JOIN user_task
                        ON task.taskid=user_task.taskid
                        WHERE user_task.userid='$userId' AND task.duedate='$duedate' 
                        ORDER BY task.status 
                   ";

            return $this->db->sql($sql)
                            ->many();
        }
    }

    public function getTaskHistory($username) {

        if (!$this->user->isActiveUser($username)) {
            return NULL;
        }


        $userInfo = $this->user->getUserByUsername($username);
        $userid = $userInfo['userid'];

        $sql = "   SELECT * FROM task 
                    INNER JOIN user_task
                    ON task.taskid=user_task.taskid
                    WHERE user_task.userid='$userid'
                    ORDER BY task.status
                ";

        return $this->db->sql($sql)
                        ->many();
    }

    public function submitReport($username, $taskId, $report) {

        return $this->db->from('task')
                        ->where('taskid', $taskId)
                        ->update($report)
                        ->execute();
    }

}

?>
