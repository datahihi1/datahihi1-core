<?php

namespace App\Common;

use PDO;
use PDOException;
use PDOStatement;
class Model
{
    public $pdo;
    /**
     * Connect mySQL database using PDO.
     *
     * @var string
     */
    public function __construct()
    {
        $host   = env('DB_HOST');
        $db     = env('DB_NAME');
        $user   = env('DB_USER');
        $pass   = env('DB_PASS');
        $dns    = "mysql:host=$host;dbname=$db";
        try {
            $this->pdo = new PDO($dns, $user, $pass);
            if ($this->pdo) {
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            throw $e;
        }
    }
}
