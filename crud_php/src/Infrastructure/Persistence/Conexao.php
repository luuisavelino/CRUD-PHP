<?php

namespace App\Infrastructure\Persistence;

use PDO;

class Conexao {

    private static $instance;

    public static function getConn() {
        $host = getenv("HOST_DB");
        $database = getenv("DATABASE_DB");
        $user = getenv("USER_DB");
        $senha = getenv("PASS_DB");

        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host='. $host .';dbname='. $database .';charset=utf8', $user, $senha);
        }

        return self::$instance;
    }
}

$teste = new Conexao();
$teste->getConn();