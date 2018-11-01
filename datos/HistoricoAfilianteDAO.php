<?php

include 'Conexion.php';
include '../../entidades/HistoricoAfiliante.php';

class HistoricoAfilianteDAO extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  public static function verificaRequisitos($id) {
    try {
      // Ver si la persona posee algun requisito
      $query = "SELECT verifica_requisitos(?)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      //$persona = $id;
      $resultado->execute(array($id));
      $rs = $resultado->fetch(PDO::FETCH_ASSOC);
      if($rs["verifica_requisitos"] != null) {
        //return print_r($rs);
        return true;
      } else {
        return false;
      }

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public static function cargaRequisitos($id) {
    if(HistoricoAfilianteDAO::verificaRequisitos($id)) {
      // Obtener los requisitos
      try {
        $query = "SELECT * FROM v_lista_requisitos where idpersona=?";
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->execute(array($id));
        $rs = $resultado->fetchAll(PDO::FETCH_OBJ);
        //return print json_encode($rs);
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
      $query = "select public.sp_perrequisito(
      	:op,
      	:perid,
      	:requiid,
      	:ant_requiid,
      	:perrequiestado,
      	:fechacompletado
      )";

      self::getConexion();
      $resultado = self::$cnx->prepare($query);

      $op = $obj->getOp();
      $ant = $obj->getAntIdRequisito();
      $idpersona = $obj->getIdpersona();
      $idrequisito = $obj->getIdrequisito();
      $estado = $obj->getEstado();
      $fecha = $obj->getFechacompletado();

      $resultado->bindParam(":op", $op);
      $resultado->bindParam(":perid", $idpersona);
      $resultado->bindParam(":requiid", $idrequisito);
      $resultado->bindParam(":ant_requiid", $ant);
      $resultado->bindParam(":perrequiestado", $estado);
      $resultado->bindParam(":fechacompletado", $fecha);

      if($resultado->execute()){
        return true;
      }

    } catch (Exception $e) {
      echo $e->getCode();
      //echo $e->getMessage();
      return false;
    }

  }
}
 ?>
