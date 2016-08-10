<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 10/08/2016
 * Time: 9:41 CH
 */
class post_controller extends base_controller
{
    function create(){
        $this->loadModel('post_admin');

        $this->loadAdminView('editor',array(
            'listCategories' => $this->model->getListCategories()
        ));
    }
    function view(){

    }


    // xu ly load anh
//    public function ckeditor($a = 0){
//        include dirname(PATH_APPLICATION).'/public/vendor/AdminLTE/plugins/ckeditor/plugins/imageuploader/imgbrowser.php';
//    }
}