<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 9:19 AM
 */
class application_admin
{
    private $controller;
    private $action;
    private $param;
    private $request_path = array();

    public function __construct()
    {
        $this->request_path = $this->request_path();
        $this->splitURL();


        $controller = empty($this->controller) ? 'dashboard' : $this->controller;

        $controller = strtolower($controller)."_controller";
        $action = empty($this->action) ? 'view' : $this->action;
        //KIEM TRA FILE CO TON TAI HAY KHONG?
//        echo "<pre>";var_dump($this->param);echo "</pre>"; exit;

        if (!file_exists(PATH_APPLICATION . "/backend/controller/".$controller.".php")){
//            header("Location:".BASE_PATH."/p404");
            die("Controller not found");
        }

        require PATH_APPLICATION."/backend/controller/".$controller.".php";
        // KIEM TRA XEM CLASS CO TON TAI HAY KHONG?
        $controllerObj = new $controller();
        if(!class_exists($controller)){
//            header("Location:".BASE_PATH."/p404");
            die("class controller not found");
        }


        //Kiem tra xem method co ton tai hay ko?
        if(method_exists($controller,$action)){
            if(!empty($this->param)){
                call_user_func_array(array($controllerObj,$action), $this->param);
            }else{
                $controllerObj->{$action}();
            }
        }else{

            die("Method not found");
            header("Location:".BASE_PATH."/p404");
        }


    }
    private function request_path()
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
        if (empty($parts)) {
            return '/';
        }
        $path = implode('/', $parts);
        if (($position = strpos($path, '?')) !== FALSE) {
            $path = substr($path, 0, $position);
        }
        return $path;
    }


    private function splitURL()
    {
        if (empty($this->request_path)) {
            $this->controller = null;
            $this->param = null;
        } else {
            $url = $this->request_path; // truyen $url la doan url cat dc
            $url = filter_var($url, FILTER_SANITIZE_URL); // kiem tra voi filter
            $url = explode("/", $url); // cat theo dau / de lay gia tri
            $this->controller = isset($url[1]) ? $url[1] : null; // dau tien se la controller xu ly
            $this->action = isset($url[2]) ? $url[2] : null; // tiep theo la action
            unset($url[0],$url[1],$url[2]); // cat controller ra khoi mang

            $this->param = array_values($url);
        }

    }
}