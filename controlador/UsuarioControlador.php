<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include DAO_PATH."UsuarioDAO.php";

class UsuarioControlador {
    public static function login($nick, $clave) {
        $usuario = new Usuario();
        $usuario->setNick($nick);
        $usuario->setClave($clave);
        return UsuarioDAO::login($usuario);
    }
    
    public static function getUsuario($nick, $clave) {
        $usuario = new Usuario();
        $usuario->setNick($nick);
        $usuario->setClave($clave);
        return UsuarioDAO::getUsuario($usuario);
    }
    
     public static function getUsuarioPage($nick, $pagina) {
        $usuario = new Usuario();
        $usuario->setNick($nick);
        $usuario->setNombre_pagina($pagina);
        return UsuarioDAO::getUsuarioPage($usuario);
    }
}

