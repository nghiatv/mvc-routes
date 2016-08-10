<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/10/16
 * Time: 3:02 PM
 */
class dashboard_admin_model extends base_model
{
    public function getTotalPosts()
    {
        return count($this->getAll('posts'));

    }
    public function getTotalUsers(){
        return count($this->getAll('users'));
    }
}