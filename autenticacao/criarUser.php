<?php

class Conexao {
    
    private static $instance;

    public static function getConn() {
        if(!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname=challenge;charset=utf8','root','mariadb@password!');
        endif;
        
        return self::$instance;
    }
}

class Usuario {

    public function create(Usuario $p) {

        $query = 'INSERT INTO login (usuario,senha) VALUES (?,?)';        
             
        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getEmail());
        $stmt->execute();
    }
}