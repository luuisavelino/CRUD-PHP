<?php

namespace App\Domain\Model;

class Estatisticas {

    public $id, $codigo, $nome, $preco;

    public function getId() {
        return $this->id;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

}