<?php

class Candidato {
    private $op;
    private $idcandidato;
    private $idmiembro;
    private $cualidades;
    private $actiministerial;
    private $antecedentes;
    private $fecha;
    private $servir;
    
    function getOp() {
        return $this->op;
    }

    function getIdcandidato() {
        return $this->idcandidato;
    }

    function getIdmiembro() {
        return $this->idmiembro;
    }

    function getCualidades() {
        return $this->cualidades;
    }

    function getActiministerial() {
        return $this->actiministerial;
    }

    function getAntecedentes() {
        return $this->antecedentes;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getServir() {
        return $this->servir;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setIdcandidato($idcandidato) {
        $this->idcandidato = $idcandidato;
    }

    function setIdmiembro($idmiembro) {
        $this->idmiembro = $idmiembro;
    }

    function setCualidades($cualidades) {
        $this->cualidades = $cualidades;
    }

    function setActiministerial($actiministerial) {
        $this->actiministerial = $actiministerial;
    }

    function setAntecedentes($antecedentes) {
        $this->antecedentes = $antecedentes;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setServir($servir) {
        $this->servir = $servir;
    }


}
