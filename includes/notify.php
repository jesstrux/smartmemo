<?php
function session_started()
{
    if (php_sapi_name() !== 'cli') {
        if (version_compare(phpversion(), '5.4.0', '>=')) {
            return session_status() === PHP_SESSION_ACTIVE ? true : false;
        } else {
            return session_id() === '' ? false : true;
        }
    }
    return false;
}

if (session_started() === false)
    session_start();

class Notify
{
    public static function set_crucial_message($message, $type = "error")
    {
        $_SESSION['sm_crucial_message'] = [
            "content" => $message,
            "type" => $type
        ];
    }

    public static function get_crucial_message()
    {
        if (isset($_SESSION['sm_crucial_message']))
            return $_SESSION['sm_crucial_message'];
    }

    public static function has_crucial_message()
    {
        return isset($_SESSION['sm_crucial_message']);
    }

    public static function set_error($message)
    {
        $_SESSION['sm_error'] = $message;
    }

    public static function set_success($message)
    {
        $_SESSION['sm_success'] = $message;
    }

    public static function get_error()
    {
        return $_SESSION['sm_error'];
    }

    public static function get_success()
    {
        return $_SESSION['sm_success'];
    }

    public static function restore()
    {
        unset($_SESSION['sm_error']);
        unset($_SESSION['sm_success']);
        unset($_SESSION['sm_crucial_message']);
    }

    public static function has_error()
    {
        return array_key_exists('sm_error', $_SESSION) && !empty($_SESSION['sm_error']);
    }

    public static function has_success()
    {
        return array_key_exists('sm_success', $_SESSION) && !empty($_SESSION['sm_success']);
    }
}
?>