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
        $port = getenv("PORT_DB");

        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='. $host .';port='. $port .';dbname='. $database .';charset=utf8', $user, $senha);
            } catch (\PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        return self::$instance;
    }
}