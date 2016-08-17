<?php
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 10:23 AM
 */


function __autoload($class)
{

    $filename = __DIR__ . "/" . $class . ".php";
//    if (is_file($filename) && !class_exists($class)) {
    require_once $filename;
//    }

    //Load PHPMailler package
//    require_once dirname(PATH_APPLICATION) . "/libs/PHPMailer/PHPMailerAutoload.php";

    // Load base controller
    if (!file_exists(dirname(PATH_APPLICATION) . "/system/base_controller.php")) {
        die("Base controller not found");
    }
    require_once dirname(PATH_APPLICATION) . "/system/base_controller.php";

    //Load base model
    if (!file_exists(dirname(PATH_APPLICATION) . "/system/base_model.php")) {
        die("Base model not found");
    }
    require_once dirname(PATH_APPLICATION) . "/system/base_model.php";


    // auto load cac class nam cung thu muc


//    require_once __DIR__ . "/" . $class . ".php";


}

