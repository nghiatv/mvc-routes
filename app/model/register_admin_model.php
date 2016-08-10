<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 3:39 PM
 */
class register_admin_model extends base_model
{
    function checkExist($username, $email)
    {
        $sql = "SELECT * FROM users  WHERE ( user_name = ? OR user_email = ? )";

        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $username);
            $this->stmt->bindParam(2, $email);
            $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }

//        echo "<pre>";var_dump($this->stmt->rowCount());echo "</pre>"; exit;
        if ($this->stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }

    function add($username, $password, $email)
    {
        $sql = "INSERT INTO users (user_name,user_pass,user_email,created_time)
                VALUES (:user_name,:user_pass,:user_email,:created_time)
        ";

        try {


            $password = password_hash($password,PASSWORD_BCRYPT);
//            echo "<pre>"; var_dump($password); echo "</pre>"; exit;
            $this->stmt = $this->conn->prepare($sql);

            $created_time = date('y-m-d');

            $this->stmt->bindParam(":user_name", $username);
            $this->stmt->bindParam(":user_pass", $password);
            $this->stmt->bindParam(":user_email", $email);
            $this->stmt->bindParam(":created_time", $created_time);
            $this->stmt->execute();


        } catch (PDOException $e) {
            die($e->getMessage());
        }

        if ($this->conn->lastInsertId()) {
            return true;
        } else {
            return false;
        }

    }
}