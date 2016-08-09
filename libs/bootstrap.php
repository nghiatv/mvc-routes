<?php
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 10:23 AM
 */


function __autoload($class)
{
    // Load base controller
    if (!file_exists(dirname(PATH_APPLICATION) . "/system/base_controller.php")) {
        die("Base controller not found");
    }
    require dirname(PATH_APPLICATION) . "/system/base_controller.php";

    //Load base model


    if (!file_exists(dirname(PATH_APPLICATION) . "/system/base_model.php")) {
        die("Base model not found");
    }
    require dirname(PATH_APPLICATION) . "/system/base_model.php";

    // auto load cac class nam cung thu muc
    include_once __DIR__ . "/" . $class . ".php";

}

