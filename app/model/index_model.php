<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 08/08/2016
 * Time: 10:05 CH
 */


if (!file_exists(dirname(PATH_APPLICATION) . "/system/base_model.php")) {
    die("Base model not found");
}
require dirname(PATH_APPLICATION) . "/system/base_model.php";

class index_model extends base_model
{
    private $table = "post";
}