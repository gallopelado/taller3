<?php

class Usuario {
    private $op;
    private $idusuario;
    private $nick;
    private $clave;
    private $idfuncionario;
    private $idgrupo;
    private $grupo;
    private $nombre_pagina;
    private $url_pagina;
    private $leer;
    private $insertar;
    private $editar;
    private $borrar;
    
    function getUrl_pagina() {
        return $this->url_pagina;
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

    function setUrl_pagina($url_pagina) {
        $this->url_pagina = $url_pagina;
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

        
    function getNombre_pagina() {
        return $this->nombre_pagina;
    }

    function setNombre_pagina($nombre_pagina) {
        $this->nombre_pagina = $nombre_pagina;
    }

        
    function getGrupo() {
        return $this->grupo;
    }

    function setGrupo($grupo) {
        $this->grupo = $grupo;
    }

        
    function getOp() {
        return $this->op;
    }

    function getIdusuario() {
        return $this->idusuario;
    }

    function getNick() {
        return $this->nick;
    }

    function getClave() {
        return $this->clave;
    }

    function getIdfuncionario() {
        return $this->idfuncionario;
    }

    function getIdgrupo() {
        return $this->idgrupo;
    }

    function setOp($op) {
        $this->op = $op;
    }

    function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;
    }

    function setNick($nick) {
        $this->nick = $nick;
    }

    function setClave($clave) {
        $this->clave = $clave;
    }

    function setIdfuncionario($idfuncionario) {
        $this->idfuncionario = $idfuncionario;
    }

    function setIdgrupo($idgrupo) {
        $this->idgrupo = $idgrupo;
    }


}

