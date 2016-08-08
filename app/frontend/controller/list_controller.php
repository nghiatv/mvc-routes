<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/8/16
 * Time: 2:35 PM
 */
class list_controller
{
    public function view($param = null)
    {
        if (empty($param)) {
            echo " day la trang list san pham";
        } else {
            echo "day la trang chi tiet san pham " . $param;
        }
    }
}