<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 10/08/2016
 * Time: 9:41 CH
 */


include dirname(PATH_APPLICATION) . "/libs/Helper.php";


class post_controller extends base_controller
{
    function create()
    {
        if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['category']) && isset($_POST['status'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            $status = $_POST['status'];
            $status = filter_var($status, FILTER_SANITIZE_NUMBER_INT);
            $category = filter_var($category, FILTER_SANITIZE_NUMBER_INT);

//            var_dump(empty($status));

            if (empty($title) || empty($content) || empty($status) || empty($category)) {
                Helper::setError('edit', "Something wrong");
            } else {
                $this->loadModel('post_admin');

                if ($this->model->insertPost($title, $content, $category, $status)) {
                    header('location:' . BASE_PATH . '/admin ');

                }else{
                    Helper::setError('insert',"Không thể thêm bài viết");
                }


            }


        } else {
            $this->loadModel('post_admin');

            $this->loadAdminView('create', array(
                'listCategories' => $this->model->getListCategories()
            ));
        }
    }

    function edit($id)
    {
        $this->loadModel('post_admin');

        $this->model->getPostById($id);

        $this->loadAdminView('edit',array(
           'listCategories' => $this->model->getListCategories(),
            'oldData' => $this->model->getPostById($id)
        ));

//        $this->loadModel()

    }


    // xu ly load anh
//    public function ckeditor($a = 0){
//        include dirname(PATH_APPLICATION).'/public/vendor/AdminLTE/plugins/ckeditor/plugins/imageuploader/imgbrowser.php';
//    }
}