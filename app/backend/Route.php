<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 07/08/2016
 * Time: 8:01 CH
 */
class Route
{
    private $controller;
    private $action;
    private $param;
    private $method;
    private $request_path;
    private $base_path;

    public function __construct(array $config)
    {
        $this->base_path = isset($config['BASE_PATH']) ? $config['BASE_PATH'] : "/";
        $this->request_path = $this->request_path();

    }

    /**
     * @return string
     */
    public function getRequestPath()
    {
        return $this->request_path;
    }

    /**
     * @param string $request_path
     */
    public function setRequestPath($request_path)
    {
        $this->request_path = $request_path;
    }

    public function request_path()
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $script_name = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'));
        $parts = array_diff_assoc($request_uri, $script_name);
//        echo "<pre>";var_dump($parts);echo "</pre>"; exit;
        if (empty($parts) && empty($parts[0]) )
        {
            return '/';
        }
        $path = implode('/', $parts);
        if (($position = strpos($path, '?')) !== FALSE)
        {
            $path = substr($path, 0, $position);
        }
        return $path;

    }



}