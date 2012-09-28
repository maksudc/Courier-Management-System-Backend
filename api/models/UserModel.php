<?php

class UserModel {

    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insert($user) {

        return $this->db->from('user')
                        ->insert($user)
                        ->execute();
    }

    public function unsetActiveUser($username) {

        $userInfo = $this->getUserByUsername($username);

        $this->db->from('session')
                ->where(array('userid =' => $userInfo['userid']))
                ->delete()
                ->execute();
    }

    public function getUser($username, $password) {

        return $this->db->from('user')
                        ->where(array('username =' => $username, 'password =' => $password))
                        ->select()
                        ->one();
    }

    public function isValidUser($username, $password) {

        return count($this->getUser($username, $password)) > 0;
    }

    public function isValidUsername($username) {

        if ($this->db->from('user')->where(array('username =' => $username))->select()->one()) {

            return true;
        }
        return false;
    }

    public function setActiveUser($username, $password) {

        $user = $this->getUser($username, $password);

        $this->db->from('session')
                ->insert(array('userid' => $user['userid']))
                ->execute();
    }

    public function isActiveUser($username) {
        $user = $this->getUserByUsername($username);
        return count(
                        $this->db->from('session')
                                ->where(array('userid =' => $user['userid']))
                                ->one()
                ) > 0;
    }

    public function removeActiveUser($username) {

        $user = $this->getUserByUsername($username);
        $this->db->from('session')
                ->where(array('userid =' => $user['userid']))
                ->delete()
                ->execute();
    }

    public function getUserByUsername($username) {

        return $this->db->from('user')
                        ->where(array('username =' => $username))
                        ->one();
    }

}

?>
