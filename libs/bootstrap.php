<?php
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 10:23 AM
 */


function __autoload($class)
{
    include_once __DIR__ . "/" . $class . ".php";
}

