<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 10:53 AM
 */
class login_admin_model extends base_model
{
    private $table = 'users';

    public function checkLogin($user, $pass)
    {
        $sql = " SELECT user_pass FROM " . $this->table . " WHERE user_name = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $user);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        $hash = $this->stmt->fetch()['user_pass'];
        if ($hash) {

            if (password_verify($pass, $hash)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function getIdByName($name){
        return parent::getByName('users',$name,'user_name');
    }

}