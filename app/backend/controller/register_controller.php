<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 3:14 PM
 */


include dirname(PATH_APPLICATION) . "/libs/Helper.php";
include dirname(PATH_APPLICATION) . "/libs/Validation.php";


class register_controller extends base_controller
{
    function view()
    {

        $this->loadAdminView('register');
    }

    public function check()
    {

//        echo "<pre>";var_dump($_POST);echo "</pre>"; exit;

        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword']) && isset($_POST['email']) && $_POST['agree'] == 'on') {
//            echo "<pre>";var_dump(1);echo "</pre>"; exit;
            $username = $_POST['username'];
            $password = $_POST['password'];
            $repassword = $_POST['repassword'];

            $email = $_POST['email'];

            Helper::oldInputResgister($username, $password, $repassword, $email);

            $flag = 0; // dat co cho no mau


            if (!Validation::isValidUser($username)) {
                Helper::setError('username', "Sai dinh dang username");
                $flag = 1;
            }
            if (!Validation::isValidPass($password)) {
                Helper::setError('password', "Sai dinh dang password");
                $flag = 1;
            }
            if (!Validation::isValidPass($repassword)) {
                Helper::setError('repassword', "Sai dinh dang repassword");
                $flag = 1;
            }
            if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
                Helper::setError('email', "Email khong hop le");
                $flag = 1;
            }

            if ($password != $repassword) {
                Helper::setError('repassword', "Hai mat khau khong trung nhau");
                $flag = 1;
            }


            if ($flag == 0) {

                $this->loadModel('register_admin');

                if ($this->model->checkExist($username, $email)) {
                    Helper::setError('sys', 'Tài khoản hoặc Email đã tồn tại nhé con chó');
                    header("Location:" . BASE_PATH . "/admin/register");
                } else {
                    $result = $this->model->add($username, $password, $email);

                    if ($result) {
                        $_SESSION['admin'] = $username;
                        header("Location:" . BASE_PATH . "/admin ");
                    } else {
                        Helper::setError('sys', 'Co gi do sai sai');
                        header("Location:" . BASE_PATH . "/admin/register");
                    }
                }


            } else {
                header("Location:" . BASE_PATH . "/admin/register");
            }


        }
    }
}