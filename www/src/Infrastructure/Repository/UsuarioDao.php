<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;
use App\Domain\Model\Usuario;

class UsuarioDao {

    public function create(Usuario $p) {

        if ($p->getPermissao() == '') {
            $p->setPermissao('usuario');
        }

        $query = 'INSERT INTO usuarios (usuario, senha, email, empresa, permissao) VALUES (?,?,?,?,?);';        

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getUsuario());
        $stmt->bindValue(2, md5($p->getSenha()));
        $stmt->bindValue(3, $p->getEmail());
        $stmt->bindValue(4, $p->getEmpresa());
        $stmt->bindValue(5, $p->getPermissao());
        $stmt->execute();

        
    }

    public function read($fields = '*', $where = null, $order = null, $limit = null) {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM usuarios '.$where.' '.$order.' '.$limit;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function readUsuario($id) {
  
        $query = 'SELECT * FROM usuarios WHERE id ='.$id;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }


    public function update(Usuario $p) {

        $query = 'UPDATE usuarios SET usuario = ?, senha = ?, email = ?, empresa = ?, permissao = ? WHERE id = ?';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getUsuario());
        $stmt->bindValue(2, $p->getSenha());
        $stmt->bindValue(3, $p->getEmail());
        $stmt->bindValue(4, $p->getEmpresa());
        $stmt->bindValue(5, $p->getPermissao());
        $stmt->bindValue(6, $p->getId());
        $stmt->execute();
    }



    public function delete($ids) {

        $query = 'DELETE FROM usuarios WHERE id IN ('.implode(',', $ids).')';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();
    
    }


    public function confirmaUsuario($usuario) {
  
        $query = "SELECT usuario FROM usuarios WHERE usuario = '{$usuario}';";      
        
        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }


    public function login($usuario, $senha) {
  
        $query = "SELECT usuario FROM usuarios WHERE usuario = '{$usuario}' and senha = '{$senha}';";    
        
        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();
    }

}