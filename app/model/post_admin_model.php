<?php

/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 10/08/2016
 * Time: 11:51 CH
 */
class post_admin_model extends base_model
{
    public function getListCategories()
    {
        return parent::getAll('categories');

    }
}