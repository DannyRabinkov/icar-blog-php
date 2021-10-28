<?php
require_once 'app/db_config.php';

if (!function_exists('is_Logged_in')) {

    function is_Logged_in()
    {
        return isset($_SESSION['user_id']);
    }
}

if (!function_exists('redirect_auth')) {


    function redirect_auth($redirect_if_logged_in = true, $location = './')
    {
        if ($redirect_if_logged_in && is_Logged_in() || !$redirect_if_logged_in && !is_Logged_in()) {
            header("location: $location");
            exit();
        }
    }
}


if (!function_exists('field_error')) {
    function field_errors($field_name)
    {
        global $errors;

        if (isset($errors) && !empty($errors[$field_name])) {
            return "<span class='text-danger form-text'>$errors[$field_name] </span>";
        }
    }
}

if (!function_exists('posted_value')) {
    /* 
    param
    */

    function posted_value($field_name)
    {
        return isset($_REQUEST) && !empty($_REQUEST[$field_name]) ? $_REQUEST[$field_name] : '';
    }
}