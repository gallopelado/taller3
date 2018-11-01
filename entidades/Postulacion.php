<?php

class Postulacion {
    private $op;
    private $idpostulacion;
    private $idministerio;
    private $descripcion;
    private $documento;
    private $vacancia;
    private $idcargo;
    private $iniciopostulacion;
    private $finpostulacion;
    private $estado;
    
    function getOp() {
        return $this->op;
    }

    function getIdpostulacion() {
        return $this->idpostulacion;
    }

    function getIdministerio() {
        return $this->idministerio;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getDocumento() {
        return $this->documento;
    }

    function getVacancia() {
        return $this->vacancia;
    }

    function getIdcargo() {
        return $this->idcargo;
    }

    function getIniciopostulacion() {
        return $this->iniciopostulacion;
    }

    function getFinpostulacion() {
        return $this->finpostulacion;
    }

    function getEstado() {
        return $this->estado;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setIdpostulacion($idpostulacion) {
        $this->idpostulacion = $idpostulacion;
    }

    function setIdministerio($idministerio) {
        $this->idministerio = $idministerio;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setDocumento($documento) {
        $this->documento = $documento;
    }

    function setVacancia($vacancia) {
        $this->vacancia = $vacancia;
    }

    function setIdcargo($idcargo) {
        $this->idcargo = $idcargo;
    }

    function setIniciopostulacion($iniciopostulacion) {
        $this->iniciopostulacion = $iniciopostulacion;
    }

    function setFinpostulacion($finpostulacion) {
        $this->finpostulacion = $finpostulacion;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}

