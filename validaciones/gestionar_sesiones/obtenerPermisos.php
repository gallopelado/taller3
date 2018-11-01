<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
session_start();

include CONTROLADOR_PATH . "UsuarioControlador.php"; //dentro del if por el ambito
//echo $nombre = $_SESSION["usuario"]["nombre"];
$nombre_pagina = $_POST["nombre_pagina"];
$usu = UsuarioControlador::getUsuarioPage($_SESSION["usuario"]["nombre"], $nombre_pagina);

$permisos[] = array(
    "leer"=>$usu->getLeer(),
    "insertar"=>$usu->getInsertar(),
    "editar"=>$usu->getEditar(),
    "borrar"=>$usu->getBorrar()
);
print json_encode($permisos);