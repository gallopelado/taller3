<?php

class Permiso {
    private $op;
    private $idpagina;
    private $idgrupo;
    private $leer;
    private $insertar;
    private $editar;
    private $borrar;
    
    function getOp() {
        return $this->op;
    }

    function setOp($op) {
        $this->op = $op;
    }
        
    function getIdpagina() {
        return $this->idpagina;
    }

    function getIdgrupo() {
        return $this->idgrupo;
    }

    function getLeer() {
        return $this->leer;
    }

    function getInsertar() {
        return $this->insertar;
    }

    function getEditar() {
        return $this->editar;
    }

    function getBorrar() {
        return $this->borrar;
    }

    function setIdpagina($idpagina) {
        $this->idpagina = $idpagina;
    }

    function setIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
    }

    function setLeer($leer) {
        $this->leer = $leer;
    }

    function setInsertar($insertar) {
        $this->insertar = $insertar;
    }

    function setEditar($editar) {
        $this->editar = $editar;
    }

    function setBorrar($borrar) {
        $this->borrar = $borrar;
    }


}
