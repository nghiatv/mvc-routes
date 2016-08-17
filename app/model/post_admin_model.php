<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 10/08/2016
 * Time: 11:51 CH
 */
class post_admin_model extends base_model
{
    public function getListCategories()
    {
        return parent::getAll('categories');

    }

    public function insertPost($title, $content, $category, $status)
    {
        $created_time = date('y-m-d');
        $views = 0;
        $user_id = $_SESSION['admin_id'];

        $sql = "INSERT INTO posts (title, content,created_time,last_edit,views, user_ID,category_ID,status)
                        VALUES  (:title, :content,:created_time,:last_edit,:views, :user_ID, :category_ID,:status)";
        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":title", $title);
            $this->stmt->bindParam(":content", $content);
            $this->stmt->bindParam(":created_time", $created_time);
            $this->stmt->bindParam(":last_edit", $created_time);
            $this->stmt->bindParam(":views", $views, PDO::PARAM_INT);
            $this->stmt->bindParam(":user_ID", $user_id, PDO::PARAM_INT);
            $this->stmt->bindParam(":category_ID", $category, PDO::PARAM_INT);
            $this->stmt->bindParam(":status", $status, PDO::PARAM_INT);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        if ($this->conn->lastInsertId() > 0) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }

    }

    public function updatePost($id, $title, $content, $category, $status)
    {
        $last_edit = date('y-m-d');

        $sql = "UPDATE posts SET title = :title , content = :content,last_edit = :last_edit, category_ID = :category_ID, status =:status WHERE id =:id ";

        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(":title", $title);
            $this->stmt->bindParam(":content", $content);
            $this->stmt->bindParam(":last_edit", $last_edit);
            $this->stmt->bindParam(":category_ID", $category, PDO::PARAM_INT);
            $this->stmt->bindParam(":status", $status, PDO::PARAM_INT);
            $this->stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $this->stmt->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
        }

        return $this->stmt->rowCount() > 0 ? true : false;
    }

    public function getPostById($id)
    {
        $sql = "SELECT posts.*, users.user_name, categories.category_name, categories.id as cate_id
                FROM posts
                INNER JOIN users ON users.id = posts.user_ID
                INNER JOIN categories ON categories.id = posts.category_ID
                WHERE posts.id = ?
        ";

        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$id,PDO::PARAM_INT);
            $this->stmt->execute();
        } catch(PDOException $e){
            die($e->getMessage());
        }
        return $this->stmt->fetch();
    }
    public function getAllPost(){
        $sql = "SELECT posts.*, users.user_name, categories.category_name, categories.id as cate_id
                FROM posts
                INNER JOIN users ON users.id = posts.user_ID
                INNER JOIN categories ON categories.id = posts.category_ID
                ORDER BY posts.created_time DESC
        ";

        try{
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1,$limit,PDO::PARAM_INT);
            $this->stmt->execute();
        } catch(PDOException $e){
            die($e->getMessage());
        }
        return $this->stmt->fetchAll();
    }

}