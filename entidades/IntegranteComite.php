<?php

class IntegranteComite {
    private $op;
    private $idcomitecab;
    private $idministerio;
    private $idlider;
    private $idsuplente;
    private $descripcion;
    private $obs;
    
    //atributos del detalle
    private $idcomitecabecera;
    private $idcandidato;
    private $idcargo;
    private $ob;
    private $entrenamiento;
    
    //metodos detalle
    function getIdcomitecabecera() {
        return $this->idcomitecabecera;
    }

    function getIdcandidato() {
        return $this->idcandidato;
    }

    function getIdcargo() {
        return $this->idcargo;
    }

    function getOb() {
        return $this->ob;
    }

    function getEntrenamiento() {
        return $this->entrenamiento;
    }

    function setIdcomitecabecera($idcomitecabecera) {
        $this->idcomitecabecera = $idcomitecabecera;
    }

    function setIdcandidato($idcandidato) {
        $this->idcandidato = $idcandidato;
    }

    function setIdcargo($idcargo) {
        $this->idcargo = $idcargo;
    }

    function setOb($ob) {
        $this->ob = $ob;
    }

    function setEntrenamiento($entrenamiento) {
        $this->entrenamiento = $entrenamiento;
    }

    //metodos cabecera    
    function getOp() {
        return $this->op;
    }

    function getIdcomitecab() {
        return $this->idcomitecab;
    }

    function getIdministerio() {
        return $this->idministerio;
    }

    function getIdlider() {
        return $this->idlider;
    }

    function getIdsuplente() {
        return $this->idsuplente;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getObs() {
        return $this->obs;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setIdcomitecab($idcomitecab) {
        $this->idcomitecab = $idcomitecab;
    }

    function setIdministerio($idministerio) {
        $this->idministerio = $idministerio;
    }

    function setIdlider($idlider) {
        $this->idlider = $idlider;
    }

    function setIdsuplente($idsuplente) {
        $this->idsuplente = $idsuplente;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setObs($obs) {
        $this->obs = $obs;
    }




}
