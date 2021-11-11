<?php
require_once 'app/db_config.php';

if (!function_exists('is_logged_in')) {

    function is_logged_in()
    {
        return isset($_SESSION['user_id']);
    }
}

if (!function_exists('redirect_auth')) {

    function redirect_auth($redirect_if_loggedin = true, $location = './')
    {
        if (
            $redirect_if_loggedin &&  is_logged_in() ||
            !$redirect_if_loggedin && !is_logged_in()
        ) {
            header("location: $location");
            exit();
        }
    }
}

if (!function_exists('field_errors')) {

    function field_errors($field_name)
    {
        global $errors;

        if (isset($errors) && !empty($errors[$field_name])) {
            return "<span class='text-danger form-text'>$errors[$field_name]</span>";
        }
    }
}

if (!function_exists('posted_value')) {
    /**
     * @param 
     * 
     */
    function posted_value($field_name)
    {
        return isset($_REQUEST) && !empty($_REQUEST[$field_name]) ? $_REQUEST[$field_name] : '';
    }
}

if (!function_exists('ago')) {
    /**
     * Expresses given timestamp as how long ago
     * 
     * @param string $time
     * 
     * @return string with exspretion of how long ago 
     */
    function ago($time)
    {
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();
        $time = strtotime($time);

        $difference     = $now - $time;
        $tense         = "ago";

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$j] .= "s";
        }

        return "$difference $periods[$j] ago";
    }
}

if (!function_exists('active_nav_link')) {
    /**
     * 
     * @param string $item_title
     * 
     * @return string 
     */
    function active_nav_item($item_title)
    {
        global $page_title;
        $class_str = '';

        if (isset($page_title) && $page_title === $item_title) {
            return ' active';
        }
        return $class_str;
    }
}