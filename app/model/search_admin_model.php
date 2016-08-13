<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/13/16
 * Time: 10:06 AM
 */
class search_admin_model extends base_model
{
    function getDatabyKey($key)
    {
        $sql = 'SELECT posts.*, users.user_name as author, categories.category_name
                FROM posts
                INNER JOIN users ON posts.user_ID = users.id
                INNER JOIN categories ON posts.category_ID = categories.id
                WHERE title LIKE ?
        ';
        $key = '%' . $key . '%';


        try {
            $this->stmt = $this->conn->prepare($sql);
            $this->stmt->bindParam(1, $key);
            $this->stmt->execute();

        } catch (PDOException $e) {
            die($e->getMessage());
        }


        return $this->stmt->fetchAll();

    }

}