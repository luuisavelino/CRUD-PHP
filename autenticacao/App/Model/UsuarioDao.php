<?php

namespace App\Model;


class UsuarioDao {

    public function create(Cliente $p) {

        $query = 'INSERT INTO login (usuario,senha) VALUES (?,?)';        
        

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getSenha());
        $stmt->execute();
    }

}