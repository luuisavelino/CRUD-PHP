<?php

namespace App\Infrastructure\Persistence;

use PDO;

class Conexao {
    
    private static $instance;


    public static function getConn() {

        if(!isset(self::$instance)):
            self::$instance = new PDO('mysql:host=mysql;dbname=challenge;charset=utf8','root','admin');
        endif;
        
        return self::$instance;
    }
}