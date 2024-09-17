<?php
/* 
    + dd(): gỡ lỗi biến với hàm dd() thay thế var_dump()
    + session(): thay thế từ $_SESSION[], khi unset sẽ khai báo session('','unset')
*/
class DebugConfig
{
    public static function dd(...$vars)
    {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
        exit;
    }
    public static function session($key = null, $default = null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if ($key === null) {
            return $_SESSION;
        }
        if ($default === 'unset') {
            unset($_SESSION[$key]);
            return;
        }

        return $_SESSION[$key] ?? $default;
    }
    
}
if (!function_exists('dd')) {
    /**
     * Dump and die. Can be use to debug variables or array.
     * @param array $vars
     * @return void
     */
    function dd(...$vars)
    {
        DebugConfig::dd(...$vars);
    }
}
if (!function_exists('session')) {
    /**
     * The session() function can replace the $_SESSION environment variable. When unset use: session('','unset').
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    function session($key = null, $default = null)
    {
        return DebugConfig::session($key, $default);
    }
}
