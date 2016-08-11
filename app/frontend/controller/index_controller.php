<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 08/08/2016
 * Time: 8:23 CH
 */
class index_controller extends base_controller
{
    public function view()
    {
        $limit = 5;
        //load view nao
        $this->loadModel('index');
        // $this->model la 1 object cua cai model dc load

        // xu ly phan trang

        $total_post = $this->model->getTotalPost()['total_post'];


        $total_page = ceil($total_post / $limit);

        if (isset($_GET['page'])) {
            if(!is_numeric($_GET['page'])) {
                $_GET['page'] = $total_page + 1;
            }
            $result = $this->model->getData($limit, $_GET['page']);
        } else {
            $result = $this->model->getData($limit, 1);
        }


        // truyen du lieu vao view

        $this->loadView('index', array(
            'result' => $result,
            'title' => "Nghia's Blog",
            'description' => " Một sản phẩm của Nghĩa nhé!",
            'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'total_page' => $total_page
        ));


    }

}