<?php
/**
 * Created by PhpStorm.
 * User: Nimo
 * Date: 07/08/2016
 * Time: 8:01 CH
 */


include "Route.php";

$route = new route( array(
    'BASE_PATH' =>"/mvc-routes"
));


echo $route->getRequestPath();
echo "<pre>"; var_dump($_SERVER); echo "</pre>"; exit;