<?php

namespace App\Model;

class Usuario {

    public $id, $nome, $senha;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getsenha() {
        return $this->senha;
    }

    public function setsenha($email) {
        $this->senha = $senha;
    }
}