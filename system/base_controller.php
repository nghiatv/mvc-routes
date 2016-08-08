<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:53 PM
 */
class base_controller
{
    protected $model;
    protected $view;


    public function __construct()
    {

    }

    public function loadView($view)
    {
        if (!file_exists(dirname(PATH_APPLICATION) . "/resources/views/" . $view . ".php")) {
            die("View not found");
        }
        include dirname(PATH_APPLICATION) . "/resources/views/__template/header.php";
        include dirname(PATH_APPLICATION) . "/resources/views/" . $view . ".php";
        include dirname(PATH_APPLICATION) . "/resources/views/__template/footer.php";

    }

    public function loadModel($model)
    {
        $model = strtolower($model) . "_model";
        if (!file_exists(PATH_APPLICATION . "/model/" . $model . ".php")) {
            die("Model not Found");
        }
        $this->model = new $model();
    }
}