<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/9/16
 * Time: 10:17 AM
 */
class Helper
{
    static function setError($name, $value)
    {
        $_SESSION['error'][$name] = $value;
    }

    static function setInput($name, $value)
    {
        $_SESSION['input'][$name] = $value;
    }


    static function setMes($name, $val)
    {
        $_SESSION['mes'][$name] = $val;
    }

    static function oldInputLogin($username, $password)
    {
        self::setInput('old_username', $username);
        self::setInput('old_password', $password);
    }

    static function oldInputResgister($username, $password, $repassword, $email)
    {
        self::setInput('old_username', $username);
        self::setInput('old_password', $password);
        self::setInput('old_repassword', $repassword);
        self::setInput('old_email', $email);
    }

}