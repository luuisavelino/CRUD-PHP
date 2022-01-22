<?php

namespace App\Infrastructure\Repository;

use App\Infrastructure\Persistence\Conexao;

class EstatisticasDao {

    public function read($where = null, $order = null, $limit = null) {

        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT * FROM produtos '.$where.' '.$order.' '.$limit;

        echo "<pre>"; print_r($query); echo "</pre>"; exit;

        $stmt = Conexao::getConn()->prepare($query);
        $stmt->execute();

        return $stmt->rowCount();

    }
}