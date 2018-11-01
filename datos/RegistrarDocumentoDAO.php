<?php

include 'Conexion.php';
include '../../entidades/RegistrarDocumento.php';

class RegistrarDocumentoDAO extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  public static function verificaDocumentos($id) {
    try {
      // Ver si la persona posee algun requisito
      $query = "SELECT verifica_documentos(?)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      //$persona = $id;
      $resultado->execute(array($id));
      $rs = $resultado->fetch(PDO::FETCH_ASSOC);
      if($rs["verifica_documentos"] != null) {
        //return print_r($rs);
        return true;
      } else {
        return false;
      }

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public static function cargaDocumentos($idpersona) {
    if(RegistrarDocumentoDAO::verificaDocumentos($idpersona)) {
      // Obtener los requisitos
      try {
        $query = "SELECT * FROM v_lista_documentos_registrados where idpersona=?";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute(array($idpersona));
        $rs = $resultado->fetchAll(PDO::FETCH_OBJ);
        return $rs;
      } catch (Exception $e) {
        echo $e->getMessage();
        return false;
      }
    } else {
      // No Buscar y retornar false
      return false;
    }
  }

  public static function persistir($obj) {
    try {
      $query = "select public.sp_documentos(
      	:op,
      	:docid,
      	:docarchivo,
      	:docobs,
      	:perid,
      	:idtipdoc
      )";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);

      $id = (int)$obj->getId();
      $op = $obj->getOp();
      $idpersona = (int)$obj->getIdpersona();
      $archivo = null;
      $idtipodocumento = (int)$obj->getIdtipodocumento();
      $observacion = $obj->getObservacion();

      $resultado->bindParam(":op", $op);
      $resultado->bindParam(":docid", $id);
      $resultado->bindParam(":docarchivo", $archivo);
      $resultado->bindParam(":docobs", $observacion);
      $resultado->bindParam(":perid", $idpersona);
      $resultado->bindParam(":idtipdoc", $idtipodocumento);

      if($resultado->execute()){
        return true;
      }

    } catch (Exception $e) {
      // echo $e->getCode();
      echo $e->getMessage();
      return false;
    }

  }

}

?>
