<?php
/* lấy từ URL_HOST (file .env) - sử dụng khi chỉ cấu hình cho 1 domain, ip */
// define('BASE_URL', $_ENV['URL_HOST']);

/* cấu hình url($base_url) có thể sử dụng với nhiều tên miền, ip khác nhau */
$base_url = "http://" . $_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('BASE_URL', $base_url);
/**
 * Navigate the this framework route.
 * @param mixed $name
 * @return string
 */
function route($name)
{
    return BASE_URL . "?u=" . $name;
}
