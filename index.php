<?php


session_start();
//echo "<pre>";var_dump($_SESSION);echo "</pre>";
/*
 * Created by PhpStorm.
 * User: Nimo
 * Date: 07/08/2016
 * Time: 8:01 CH
 */
include "config.php";

include "libs/bootstrap.php";

$admin_pattern = "/(\/admin).*$/";

/*
 *  Cai dm tai thang  xammp no build nhu the nen phai chiu nhe.
 *  con de chay binh thuong thi no phai la
 *  $admin_pattern = "/^(\/admin).*$/";
 *  nhe
 */

//echo "<pre>";var_dump(Validation::isValidUser("ahihihihih"));echo "</pre>"; exit;

if (preg_match($admin_pattern, $_SERVER['REQUEST_URI'])) {
    $app = new application_admin();
} else {

    $app = new application();


}
