<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/13/16
 * Time: 9:34 AM
 */
class search_controller extends base_controller
{
    function view()
    {
        if (!isset($_SESSION['admin'])) {
            header("location:" . BASE_PATH . "/admin/login");
        } else {

            if (!isset($_GET['s'])) {
                $this->loadAdminView('search');
            } else {
                $key = $_GET['s'];

                $this->loadModel('search_admin');

                $result = $this->model->getDataByKey($key);

                $this->loadAdminView('search',array(
                    'data' => $result
                ));


            }


        }


    }

}