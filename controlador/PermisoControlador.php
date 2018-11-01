<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php";
include DAO_PATH."PermisoDAO.php";

class PermisoControlador {
    public static function getPermisos($idgrupo) {
        $obj = new Permiso();
        $obj->setIdgrupo($idgrupo);
        return PermisoDAO::getPermisos($obj);
    }
   
    public static function persistir($op, $idpagina, $idgrupo, $leer, $insertar, $editar, $borrar) {
        $permiso = new Permiso();
        $permiso->setOp($op);
        $permiso->setIdpagina($idpagina);
        $permiso->setIdgrupo($idgrupo);
        $permiso->setLeer($leer);
        $permiso->setInsertar($insertar);
        $permiso->setEditar($editar);
        $permiso->setBorrar($borrar);
        //enviar al DAO
        return PermisoDAO::persistir($permiso);
    }
}
