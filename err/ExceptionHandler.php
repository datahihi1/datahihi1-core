<?php

namespace Error;

class ExceptionHandler
{
    public function __construct()
    {
        set_exception_handler([$this, 'handleException']);
    }
    public static function handleException($exception)
    {
        echo "<div style='font-family: arial; background-color: #e4e4e4; border: 1px;'>";
        echo "<b>(Exception) " . $exception->getMessage() . "</b><br>";
        echo "Exception on line " . $exception->getLine() . " in " . $exception->getFile() . "<br>";
        $lines = file($exception->getFile());
        $start = max($exception->getLine() - 3, 0);
        $end = min($exception->getLine() + 3, count($lines));
        echo "<pre style='background-color: #fff; padding: 10px; border: 1px solid #ccc;'>";
        for ($i = $start; $i < $end; $i++) {
            $lineNum = $i + 1;
            $line = htmlspecialchars($lines[$i]);
            switch ($lineNum) {
                case $exception->getLine():
                    echo "<span style='background-color: #ff9f9f;'>$lineNum: $line</span>";
                    break;
                default:
                    echo "$lineNum: $line";
                    break;
            }
        }
        echo "</pre></div>";
        exit(1);
    }
}

