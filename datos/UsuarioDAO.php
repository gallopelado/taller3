<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include "Conexion.php";
include DTO_PATH . "Usuario.php";

class UsuarioDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    public static function login($usuario) {
        try {
            $query = "SELECT usu_id, usu_nick, usu_clave, fun_id, gru_id
            FROM usuarios
            where usu_nick = :nick and usu_clave = :clave";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $nick = $usuario->getNick();
            $clave = $usuario->getClave();
            $resultado->bindParam(":nick",$nick);
            $resultado->bindParam(":clave",$clave);
            $resultado->execute();
            if($resultado->rowCount() > 0) {
                $filas = $resultado->fetch();
                if($filas["usu_nick"] == $nick = $usuario->getNick() && $filas["usu_clave"] == $clave = $usuario->getClave()){
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            self::desconectar();
        }
    }
    
    public static function getUsuario($usuario) {
        try {
            $query = "SELECT usu.usu_id idusuario, usu.usu_nick nick, usu.fun_id idfuncionario, usu.gru_id idgrupo, g.gru_nombre grupo
            FROM usuarios usu
            join grupos g on usu.gru_id = g.gru_id
            where usu.usu_nick = :nick and usu.usu_clave = :clave";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $nick = $usuario->getNick();
            $clave = $usuario->getClave();
            $resultado->bindParam(":nick",$nick);
            $resultado->bindParam(":clave",$clave);
            $resultado->execute();
            $rs = $resultado->fetch();
            
            $usu = new Usuario();
            $usu->setIdusuario($rs["idusuario"]);
            $usu->setNick($rs["nick"]);
            $usu->setIdgrupo($rs["idgrupo"]);
            $usu->setGrupo($rs["grupo"]);
            
            return $usu;
            
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            self::desconectar();
        }
    }
    
    public static function getUsuarioPage($usuario) {
        try {
            $query = "SELECT u.usu_id idusuario, u.usu_nick nick, 
            u.fun_id, pe.per_nombre||' '||pe.per_apellidop||' '||pe.per_apellidom funcionario,
            u.gru_id idgrupo, g.gru_nombre grupo,
            pag.pag_nombre pagina, pag.pag_direc pagurl,
            per.leer, per.insertar, per.editar, per.borrar
            FROM usuarios u
            join funcionarios f on u.fun_id = f.fun_id
            join personas pe on f.per_id = pe.per_id
            join grupos g on u.gru_id = g.gru_id
            join permisos per on g.gru_id = per.gru_id
            join paginas pag on per.pag_id = pag.pag_id
            where u.usu_nick = :nick and pag.pag_nombre = :pagina";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $nick = $usuario->getNick();
            $pagina = $usuario->getNombre_pagina();
            $resultado->bindParam(":nick",$nick);
            $resultado->bindParam(":pagina",$pagina);
            $resultado->execute();
            $rs = $resultado->fetch();
            
            $usu = new Usuario();
            $usu->setIdusuario($rs["idusuario"]);
            $usu->setNick($rs["nick"]);
            $usu->setIdgrupo($rs["idgrupo"]);
            $usu->setGrupo($rs["grupo"]);
            $usu->setNombre_pagina($rs["pagina"]);
            $usu->setUrl_pagina($rs["pagurl"]);
            $usu->setLeer($rs["leer"]);
            $usu->setInsertar($rs["insertar"]);
            $usu->setEditar($rs["editar"]);
            $usu->setBorrar($rs["borrar"]);
            
            return $usu;
            
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            self::desconectar();
        }
    }

}
