<?php
/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 11/24/16
 * Time: 12:05
 */
include 'controller.php';

class about_controller extends controller
{
    function view()
    {
        $this->loadView('about-coroi');
    }
}