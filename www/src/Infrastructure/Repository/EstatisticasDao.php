<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;
use App\Domain\Model\{Estatisticas, AtualizarCodigo};

class EstatisticasDao {

    public function create(Estatisticas $p) {

        $p->data = date('Y-m-d H:i:s');

        $query = 'INSERT INTO estoque (data, codigo, preco, quantidade) VALUES (?,?,?,?)';        
        


        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getData());
        $stmt->bindValue(2, $p->getCodigo());
        $stmt->bindValue(3, $p->getpreco());
        $stmt->bindValue(4, $p->getQuantidade());
        $stmt->execute();
    }

    public function read($fields = '*', $where = null, $order = null, $limit = null) {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM produtos '.$where.' '.$order.' '.$limit;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount()>0){
            $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $resultado;
        }
        return [];
    }

    public function update(AtualizarCodigo $p) {
        $query = 'UPDATE estoque SET codigo = ? WHERE codigo = ?';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->bindValue(1, $p->getCodigo());
        $stmt->bindValue(2, $p->getCodigoAntigo());        
        $stmt->execute();
    }

    public function delete($codigo) {

        $query = 'DELETE FROM estoque WHERE codigo IN ('.implode(',', $codigo).')';

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();
    }
}