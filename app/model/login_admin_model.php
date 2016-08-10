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
        $sql = " SELECT count(*) as num FROM " . $this->table . " WHERE user_name = ?  AND user_pass = ? ";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $user);
            $this->stmt->bindParam(2, $pass);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
//        return $this->stmt->fetch();
        if ($this->stmt->fetch()['num']) {
            return true;
        } else {
            return false;
        }
    }

}