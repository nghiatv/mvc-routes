<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/17/16
 * Time: 9:49 AM
 */
class user_admin_model extends base_model
{
    function getAllUser()
    {
        return parent::getAll('users');
    }


    function getUserById($id)
    {
        return parent::getById('users', $id);
    }

    function deleteUserById($id)
    {
        return parent::deleteById('users', $id);
    }

    function checkUserExist($username)
    {
        $sql = "SELECT * FROM users WHERE user_name = ?";

        try {
            $this->stmt = $this->conn->prepare($sql);

            $this->stmt->bindParam(1, $username);

            $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        $result = $this->stmt->fetch();

        if ($result) {
            return true;
        } else {
            return false;
        }


    }

    function checkEmailExist($email)
    {
        $sql = "SELECT * FROM users WHERE user_email = ?";

        try {
            $this->stmt = $this->conn->prepare($sql);

            $this->stmt->bindParam(1, $email);

            $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        $result = $this->stmt->fetch();

        if ($result) {
            return true;
        } else {
            return false;
        }


    }


    function updateUser($user_name, $user_pass, $user_email, $id)
    {

        $sql = "UPDATE users SET user_name = :user_name,user_pass = :user_pass,user_email =  :user_email WHERE id = :id";

        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":user_name",$user_name);
            $this->stmt->bindParam(":user_pass",$user_pass);
            $this->stmt->bindParam(":user_email",$user_email);
            $this->stmt->bindParam(":id",$id,PDO::PARAM_INT);
            $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if($this->stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }

    }
}