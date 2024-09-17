<?php
// require_once 'config/Dotenv.php';
// require_once 'config/DDdebug.php';
// require_once 'config/UrlConf.php';
// require_once 'config/SessionConf.php';

foreach (glob('config/*.php') as $file) {
    require_once $file;
}
