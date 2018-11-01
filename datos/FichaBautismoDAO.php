<?php

include 'Conexion.php';
include '../../entidades/FichaBautismo.php';

class FichaBautismoDAO extends Conexion {

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
      $query = "select verifica_fichabautismo(?)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      //$persona = $id;
      $resultado->execute(array($id));
      $rs = $resultado->fetch(PDO::FETCH_ASSOC);
      if($rs["verifica_fichabautismo"] != null) {
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
    if(FichaBautismoDAO::verificaDocumentos($idpersona)) {
      // Obtener los requisitos
      try {
        $query = "SELECT * FROM lista_fichabautismo where idpersona=?";
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

  public static function obtenerListaPastores() {
      try {
        $query = "SELECT idpersona, persona, cedula FROM lista_pastores";

        self::getConexion();

        $resultado = self::$cnx->prepare($query);
        $resultado->execute();
        if($resultado) {
          while($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $data["data"][] = $rs;
          }
          return json_encode($data);
        } else {
          return false;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
  }

  public static function persistir($obj) {
    try {
      $query = "select public.sp_fichabautismo(
      	:op,
      	:bauid,
      	:baufecha,
      	:idpadre,
      	:idmadre,
      	:perid,
      	:pastorid
      )";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);

      $op = $obj->getOp();
      $bauid = (int)$obj->getIdbautismo();
      $baufecha = $obj->getFechabautismo();
      $idpadre = (int)$obj->getIdtutor1();
      $idmadre = (int)$obj->getIdtutor2();
      $perid = (int)$obj->getIdpersona();
      $pastorid = (int)$obj->getIdpastor();

      $resultado->bindParam(":op", $op);
      $resultado->bindParam(":bauid", $bauid);
      $resultado->bindParam(":baufecha", $baufecha);
      $resultado->bindParam(":idpadre", $idpadre);
      $resultado->bindParam(":idmadre", $idmadre);
      $resultado->bindParam(":perid", $perid);
      $resultado->bindParam(":pastorid", $pastorid);

      if($resultado->execute()){
        return true;
      }

    } catch (Exception $e) {
      echo $e->getCode();
      // echo $e->getMessage();
      return false;
    }

  }

}

?>
