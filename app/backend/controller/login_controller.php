<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 10:49 AM
 */
include dirname(PATH_APPLICATION) . "/libs/Validation.php";
include dirname(PATH_APPLICATION) . "/libs/Helper.php";

class login_controller extends base_controller
{
    public function view()
    {


        if (isset($_SESSION['admin'])) { // kiem tra xem session hay khong?
            header("Location:" . BASE_PATH . "/admin");
        } else {
            $this->loadAdminView('login');
        }
    }


    public function check()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {


            $username = $_POST['username'];
            $password = $_POST['password'];
            Helper::oldInputLogin($username, $password);
            $flag = 0;

            if (!Validation::isValidUser($username)) {
                Helper::setError('username', " Chỉ nhận 5->17 kí tự thôi");
                $flag = 1;
            }
            if (!Validation::isValidPass($password)) {
                Helper::setError('password', 'Sai dinh dang nhe con cho');
                $flag = 1;
            }

            if ($flag != 0) {

                header("Location:" . BASE_PATH . "/admin/login");
            } else {
                $this->loadModel('login_admin');
//                echo "<pre>"; var_dump($this->model->checkLogin($username,$password)); echo "</pre>"; exit;
                if ($this->model->checkLogin($username, $password)) {
//                    Helper::setMes('success', "Đăng nhập thành công");
                    $_SESSION['admin'] = $username;
                    $_SESSION['admin_id'] = $this->model->getIdByName($username)['id'];
                    unset($_SESSION['input']);
//                    unset($_SESSION['admin_id']);
                    header("Location:" . BASE_PATH . "/admin ");
                } else {
                    Helper::setError('system', "Tài khoản mật khẩu không  đúng ");
                    header("Location:" . BASE_PATH . "/admin/login");
                }

            }


        } else {

            header("Location:" . BASE_PATH . "/admin/login");
        }
    }

    public function logout()
    {
        unset($_SESSION['admin']);
        unset($_SESSION['admin_id']);
        header('Location:' . BASE_PATH . '/admin/login');
    }

}