<?php
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 10:23 AM
 */


function __autoload($class)
{
    if (!file_exists(dirname(PATH_APPLICATION) . "/system/base_controller.php")) {
        die("Base controller not found");
    }
    require dirname(PATH_APPLICATION) . "/system/base_controller.php";

    include_once __DIR__ . "/" . $class . ".php";



}

