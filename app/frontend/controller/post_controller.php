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
            $this->loadView('detail-post');
        }
    }


    public function index()
    {
//        $this->loadView
    }
}