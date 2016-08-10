<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:35 PM
 */
class post_controller extends base_controller
{
    public function view($param = null)
    {
        if (empty($param)) {
            $this->loadView('post');
        } else {

            // xu ly o cho co param truoc nha

            $this->loadModel('post');
            // this->model la mot object cua post_model

            $result = $this->model->getDataById($param);

//            echo "<pre>";var_dump($result);echo "</pre>"; exit;

            $this->loadView('detail-post',array(
                'post' => $result
            ));
        }
    }

    public function index()
    {
//        $this->loadView
    }

}