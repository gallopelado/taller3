<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include "Conexion.php";
include DTO_PATH . "Permiso.php";

class PermisoDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    public static function getPermisos($obj) {
        try {
            $query = "SELECT per.pag_id idpagina, pag.pag_nombre pagina, pag.pag_direc direccion, 
            per.gru_id idgrupo, gru.gru_nombre grupo, 
            per.leer, per.insertar, per.editar, per.borrar
            FROM permisos per 
            join grupos gru on per.gru_id = gru.gru_id
            join paginas pag on per.pag_id = pag.pag_id
            where per.gru_id = :idgrupo;";

            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $idgrupo = $obj->getIdgrupo();
            $resultado->bindParam(":idgrupo", $idgrupo);
            $resultado->execute();
            if ($resultado->rowCount() > 0) {
                $rs["data"] = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $rs;
            } else {
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        } finally {
            self::desconectar();
        }
    }

    public static function persistir($permi) {
        try {
            $query = "select public.sp_permisos(:op, :idpagina, :idgrupo, :_leer, :_insertar, :_editar, :_borrar )";
            self::getConexion();
            $rs = self::$cnx->prepare($query);
            
            $op = $permi->getOp();
            $idpagina = $permi->getIdpagina();
            $idgrupo = $permi->getIdgrupo();
            $leer = $permi->getLeer();
            $insertar = $permi->getInsertar();
            $editar = $permi->getEditar();
            $borrar = $permi->getBorrar();  
            
            $rs->bindParam(":op", $op);
            $rs->bindParam(":idpagina", $idpagina);
            $rs->bindParam(":idgrupo", $idgrupo);
            $rs->bindParam(":_leer", $leer);
            $rs->bindParam(":_insertar", $insertar);
            $rs->bindParam(":_editar", $editar);
            $rs->bindParam(":_borrar", $borrar);
            
            $rs->execute();
            
            if($rs->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            self::desconectar();
        }
    }

}
