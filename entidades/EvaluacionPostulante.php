<?php

class EvaluacionPostulante {
    private $id_admicabe;
    private $idpostulacion;
    private $idpostulante;
    private $fecha;
    private $estado;
    
    function getId_admicabe() {
        return $this->id_admicabe;
    }

    function getIdpostulacion() {
        return $this->idpostulacion;
    }

    function getIdpostulante() {
        return $this->idpostulante;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getEstado() {
        return $this->estado;
    }

    function setId_admicabe($id_admicabe) {
        $this->id_admicabe = $id_admicabe;
    }

    function setIdpostulacion($idpostulacion) {
        $this->idpostulacion = $idpostulacion;
    }

    function setIdpostulante($idpostulante) {
        $this->idpostulante = $idpostulante;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }


}
