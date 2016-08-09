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

        $all_post = count($this->model->getAll());

        $total_page = ceil($all_post / $limit);

        if (isset($_GET['page'])) {
            $result = $this->model->getData($limit, $_GET['page']);
        } else {
            $result = $this->model->getData($limit,1);
        }
//        echo "<pre>";var_dump($result);echo "</pre>"; exit;
        $this->loadView('index', array(
            'result' => $result,
            'title' => 'Tien cookie cookie',
            'description' => "vai ca lon neh???",
            'current_page' => isset($_GET['page']) ? $_GET['page'] : 1,
            'total_page' => $total_page
        ));


//        echo "<pre>";var_dump($result);echo "</pre>";


    }

}