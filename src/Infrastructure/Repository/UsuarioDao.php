<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;
use App\Domain\Model\Usuario;

class UsuarioDao {

    public function create(Usuario $p) {

        $query = 'INSERT INTO login (usuario,senha) VALUES (?,?)';        
        

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getNome());
        $stmt->bindValue(2, $p->getSenha());
        $stmt->execute();
    }

}