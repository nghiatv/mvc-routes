<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 08/08/2016
 * Time: 8:23 CH
 */
include "controller.php";

class index_controller extends controller
{
    public function view()
    {
        $limit = 5;
        //load view nao
        $this->loadModel('index');
        // $this->model la 1 object cua cai model dc load



        // truyen du lieu vao view

        $this->loadView('index', array(
            'result' => [],
            'title' => "luong's Blog",
            'description' => " Một sản phẩm của Nghĩa nhé!",
            'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'total_page' => 20
        ));


    }

}