<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:53 PM
 */
//use Validation;
class base_controller
{
    public $model;
    public $view;

    public function loadView($view,$param = array())
    {
        if (!file_exists(dirname(PATH_APPLICATION) . "/resources/views/" . $view . ".php")) {
            header("Location:".BASE_PATH."/p404");
        }

        extract($param);
        require dirname(PATH_APPLICATION) . "/resources/views/__template/header.php";
        require dirname(PATH_APPLICATION) . "/resources/views/" . $view . ".php";
        require dirname(PATH_APPLICATION) . "/resources/views/__template/footer.php";

    }
    public function loadAdminView($view,$param = array()){
        if (!file_exists(dirname(PATH_APPLICATION) . "/resources/views/admin/" . $view . ".php")) {
            header("Location:".BASE_PATH."/p404");
        }
        extract($param);
        require dirname(PATH_APPLICATION) . "/resources/views/admin/" . $view . ".php";
    }

    public function loadModel($model)
    {
        $model = strtolower($model) . "_model";
        if (!file_exists(PATH_APPLICATION . "/model/" . $model . ".php")) {
            header("Location:".BASE_PATH."/p404");
        }

        include PATH_APPLICATION."/model/".$model.".php";
        $this->model = new $model();
    }

    public function load404()
    {
        if (!file_exists(dirname(PATH_APPLICATION) . "/resources/views/404/404.php")) {
            header("Location:".BASE_PATH."/p404");
        }

        include dirname(PATH_APPLICATION) . "/resources/views/404/404.php";
    }
}