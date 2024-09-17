<?php
/*
 * Note: In production environments, programmers are advised to delete all files in err/ to avoid problems arising.
 */
namespace Error;

require_once __DIR__ . '/ErrorHandler.php';
require_once __DIR__ . '/ExceptionHandler.php';

use Error\ErrorHandler;
use Error\ExceptionHandler;

new ErrorHandler();
new ExceptionHandler();
