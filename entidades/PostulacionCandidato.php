<?php

class PostulacionCandidato {
    private $op;
    private $idpostulacion;
    private $idcandidato;
    private $fecha_agregado;
    
    function getOp() {
        return $this->op;
    }

    function getIdpostulacion() {
        return $this->idpostulacion;
    }

    function getIdcandidato() {
        return $this->idcandidato;
    }

    function getFecha_agregado() {
        return $this->fecha_agregado;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setIdpostulacion($idpostulacion) {
        $this->idpostulacion = $idpostulacion;
    }

    function setIdcandidato($idcandidato) {
        $this->idcandidato = $idcandidato;
    }

    function setFecha_agregado($fecha_agregado) {
        $this->fecha_agregado = $fecha_agregado;
    }
    
}

