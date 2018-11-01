<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include CONTROLADOR_PATH . "PermisoControlador.php";

if (isset($_POST["op"]) && isset($_POST["idpagina"]) && isset($_POST["idgrupo"]) && isset($_POST["leer"]) && isset($_POST["insertar"]) && isset($_POST["editar"]) && isset($_POST["borrar"])) {
    $op = $_POST["op"];
    $idpagina = $_POST["idpagina"];
    $idgrupo = $_POST["idgrupo"];
    $leer = $_POST["leer"]; 
    $insertar = $_POST["insertar"];
    $editar = $_POST["editar"];
    $borrar = $_POST["borrar"];
    return PermisoControlador::persistir($op, $idpagina, $idgrupo, $leer, $insertar, $editar, $borrar);
} else {
    $resultado["resultado"] = ["error"];
    return json_encode($resultado);
}

    
