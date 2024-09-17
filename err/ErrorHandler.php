<?php

namespace Error;

class ErrorHandler
{
    public function __construct()
    {
        set_error_handler([$this, 'handleError']);
    }
    public static function handleError($errno, $errstr, $errfile, $errline)
    {
        echo "<div style='font-family: arial; background-color: #e4e4e4; border: 1px;'>";
        echo "<b>(Error) [$errno] $errstr</b>";
        echo " -> Error on line $errline in $errfile<br>";
        $lines = file($errfile);
        $start = max($errline - 3, 0);
        $end = min($errline + 3, count($lines));
        echo "<pre style='background-color: #fff; padding: 10px; border: 1px solid #ccc;'>";
        for ($i = $start; $i < $end; $i++) {
            $lineNum = $i + 1;
            $line = htmlspecialchars($lines[$i]);
            switch ($lineNum) {
                case $errline:
                    echo "<span style='background-color: #ff9f9f;'>$lineNum: $line</span>";
                    break;
                default:
                    echo "$lineNum: $line";
                    break;
            }
        }
        echo "</pre></div>";
        if (error_reporting() & $errno) {
            exit(1);
        }
    }
}

