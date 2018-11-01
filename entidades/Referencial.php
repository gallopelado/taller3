<?php

class Referencial {
    private $op;
    private $id;
    private $descripcion;
    
    function getOp() {
        return $this->op;
    }

    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

