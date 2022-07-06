<?php

namespace App\Infrastructure\Persistence;

use PDO;

class Conexao {

    private static $instance;

    private $host = getenv("HOST_DB");
    private $database = getenv("DATABASE_DB");
    private $user = getenv("USER_DB");
    private $senha = getenv("PASS_DB");

    public static function getConn() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host='. $this->$host .';dbname='. $this->$database .';charset=utf8', $this->$user, $this->$senha);
        }

        return self::$instance;
    }
}