<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:53 PM
 */
abstract class base_model
{
    protected $conn;
    protected $stmt;

    function __construct()
    {
        try {
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
            $this->conn = new PDO(DB_TYPE . ":host=" . DB_HOST . ";dbname=" . DB_DBNAME . ";charset=utf8", DB_USER, DB_PASS, $options);

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }

    public function getAll($table)
    {
        $sql = "SELECT  * FROM " . $table;
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->stmt->fetchAll();
    }

    public function getById($table, $id)
    {
        $sql = "SELECT * FROM " . $table . " WHERE id = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $id, PDO::PARAM_INT);
            $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return $this->stmt->fetch();

    }

    public function deleteById($table, $id)
    {
        $sql = "DELETE FROM " . $table . " WHERE id = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindValue(1, $id, PDO::PARAM_INT);
            $this->stmt->execute();
        } catch (PDOException $e) {
            echo "<pre>";
            var_dump($e->getMessage());
            echo "</pre>";
            exit;
        }
        if ($this->getById($table, $id) !== false) {
            return false;
        } else {
            return true;
        }
    }

    public function getByName($table, $name, $column)
    {
        $sql = "SELECT * FROM " . $table . " WHERE " . $column . " = ?";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindValue(1, $name);
            $this->stmt->execute();
        } catch (PDOException $e) {
            echo "<pre>";
            var_dump($e->getMessage());
            echo "</pre>";
            exit;
        }
        $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

}