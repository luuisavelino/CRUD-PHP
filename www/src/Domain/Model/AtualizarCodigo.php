<?php

namespace App\Domain\Model;

class AtualizarCodigo {

    public $codigoAntigo, $codigo;
    
    public function getCodigoAntigo() {
        return $this->codigoAntigo;
    }

    public function setCodigoAntigo($codigoAntigo) {
        $this->codigoAntigo = $codigoAntigo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
}