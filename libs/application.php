<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 11:26 AM
 */
class application
{
    private $controller;
    private $action = 'view';
    private $param;
    private $request_path = array();

    public function __construct()
    {

        $this->request_path = $this->request_path();
        $this->splitURL();


        $controller = empty($this->controller) ? 'index' : $this->controller;

        $controller = strtolower($controller)."_controller";

        //KIEM TRA FILE CO TON TAI HAY KHONG?
//        echo "<pre>";var_dump($this->param);echo "</pre>"; exit;

        if (!file_exists(PATH_APPLICATION . "/frontend/controller/".$controller.".php")){
          header("Location:".BASE_PATH."/p404");
        }

        require PATH_APPLICATION."/frontend/controller/".$controller.".php";
        // KIEM TRA XEM CLASS CO TON TAI HAY KHONG?
        $controllerObj = new $controller();
        if(!class_exists($controller)){
            header("Location:".BASE_PATH."/p404");
        }


        //Kiem tra xem method co ton tai hay ko?
        if(method_exists($controller,$this->action)){
          if(!empty($this->param)){
              call_user_func_array(array($controllerObj,$this->action), $this->param);
          }else{
              $controllerObj->{$this->action}();
          }
        }else{
            header("Location:".BASE_PATH."/p404");
        }


    }
    private function request_path()
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
        if (empty($parts) && empty($parts[0])) {
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
            $this->controller = isset($url[0]) ? $url[0] : null; // dau tien se la controller xu ly
//            $this->action = isset($url[1]) ? $url[0] : null; // tiep theo la action
            unset($url[0]); // cat controller ra khoi mang

            $this->param = array_values($url);
        }

    }
}