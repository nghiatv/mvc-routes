<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/17/16
 * Time: 9:17 AM
 */
class user_controller extends base_controller
{   //De hien thi ra danh sach nguoi dung
    function view()
    {

        if (isset($_SESSION['admin'])) {

            //goi cai model day ra (user_admin_model)
            $this->loadModel('user_admin');

            $data = $this->model->getAllUser();

//            echo "<pre>";var_dump($data);echo "</pre>"; exit;


            $this->loadAdminView('list_users', array(
                'data' => $data
            ));// load view de xem co load dc view hay khong?


        }
    }

    function create()
    {

    }

    function edit($id) // load du lieu cua nguoi dung + form de chinh sua
    {
        if (isset($_SESSION['admin'])) {

            $this->loadModel('user_admin');

            $result = $this->model->getUserById($id);

//            echo "<pre>";var_dump($result);echo "</pre>"; exit;

            $this->loadAdminView('edit_user', array(
                'data' => $result
            ));
        } else {
            header('location:' . BASE_PATH . '/admin/login');
        }
    }


    function update($id)
    { // chinh sua thong tin cua nguoi dung vao database


        if (isset($_SESSION['admin'])) {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//                echo "<pre>";var_dump($_POST);echo "</pre>"; exit;

                if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['repassword'])) {
                    // dieu kien dung o day
                    $flag = 1; // Co` dung la 1 con khac 1 la sai

                    // Kiem tra dau vao cua username
                    if (Validation::isValidUser($_POST['username'])) {
                        $username = $_POST['username'];
                    } else {
                        $flag = 0;
                        Helper::setError('username', "Username deo dung chuan");
                    }

                    //Kiem tra dau vao cua email

                    if (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) {
                        $email = $_POST['email'];
                    } else {
                        $flag = 0;
                        Helper::setError('email', "Email nhu cec");
                    }

                    // Kiem tra password

                    if (Validation::isValidPass($_POST['password'])) {
                        $password = $_POST['password'];
                    } else {
                        $flag = 0;
                        Helper::setError('password', 'PAss kieu deo gi the');
                    }

                    //Kiem tra repassword

                    if (Validation::isValidPass($_POST['repassword'])) {
                        $repassword = $_POST['repassword'];
                    } else {
                        $flag = 0;
                        Helper::setError('repassword', 'Repassword danh ngu nhu cho');
                    }

                    if ($_POST['password'] !== $_POST['repassword']) {
                        $flag = 0;
                        Helper::setError('repassword', "Khong biet danh mat khau giong nhau a");
                    }


                    if ($flag != 1) {
                        header('location:' . BASE_PATH . '/admin/user/edit/' . $id . '');
                    } else {
                        $this->loadModel('user_admin');

                        $data = $this->model->getUserById($id);

                        $check = 1;

                        // Kiem tra username ton tai
                        if ($username !== $data['user_name']) {
                            if ($this->model->checkUserExist($username)) {
                                $check = 0; // neu co thang nao day co username giong roi thi chuyen co
                                Helper::setError('username', "Trung roi username nhe!");
                            }
                        }
                        // Kiem tra email ton tai hay khong?
                        if ($email !== $data['user_email']) {
                            if ($this->model->checkEmailExist($email)) {
                                $check = 0;
                                Helper::setError('email', "Trung roi email nhe!");
                            }
                        }

                        if ($check != 1) {
                            header("location:" . BASE_PATH . "/admin/user/edit/" . $id);
                        } else {

                            $password = password_hash($password,PASSWORD_BCRYPT);

                            $result = $this->model->updateUser($username, $password, $email, $id);
                            if ($result) {
                                Helper::setMes('update', "Thanh cong gan la thanh roi nhe");
                            } else {
                                Helper::setError('update', "XIt roi, deo hieu vi sao");
                            }
                            header('location:' . BASE_PATH . '/admin/user/edit/' . $id);
                        }


//
                    }


                } else {
                    // dieu kien sai o day
                    die("Thieu input roi anh");
                }


            } else {
                die('Wrong request method');
            }

        } else {
            header("Location:" . BASE_PATH . "/admin/login");
        }
    }


    function delete($id) // xoa nguoi dung
    {
        if (isset($_SESSION['admin'])) {

            $this->loadModel('user_admin');
            $result = $this->model->deleteUserById($id);

            if ($result) {
//                echo "<pre>";var_dump("Xoa duoc roi nhe");echo "</pre>"; exit;

                Helper::setMes('delete', "Em đã xóa thành công thằng có ID là " . $id . " ");

                header('location:' . BASE_PATH . '/admin/user');

            } else {
                echo "<pre>";
                var_dump("Xoa xit roi nhe");
                echo "</pre>";
                exit;
            }


        } else {
            header('location:' . BASE_PATH . '/admin/login'); // Neu khong phai la admin thi day ra trang dang ki
        }
    }
}