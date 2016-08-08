<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:53 PM
 */
class base_model
{
    private $conn;
    private $stmt;

    function __construct()
    {
        try {

        } catch (PDOException $e) {
            die($e->getMessage());
        }

    }
}