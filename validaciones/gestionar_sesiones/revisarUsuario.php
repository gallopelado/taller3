<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include CONTROLADOR_PATH . "UsuarioControlador.php";

session_start();
header("Content-type: application/json");

$resultado = array();

if (isset($_POST["nick"]) && isset($_POST["clave"])) {
    $nick = $_POST["nick"];
    $clave = $_POST["clave"];
    if (UsuarioControlador::login($nick, $clave)) {

        $resultado = ["estado" => "true"];
        $usuario = UsuarioControlador::getUsuario($nick, $clave);
        $_SESSION["usuario"] = array(
            "idusuario" => $usuario->getIdusuario(),
            "nombre" => $usuario->getNick(),
            "idgrupo" => $usuario->getIdgrupo(),
            "grupo" => $usuario->getGrupo()
        );

        return print(json_encode($resultado));
    } else {
        $resultado = ["estado" => "false"];
        return print(json_encode($resultado));
    }
} else {
    $resultado = ["estado" => "false"];
    return print(json_encode($resultado));
}


