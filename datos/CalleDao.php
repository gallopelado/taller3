<?php

include 'Conexion.php';
include '../../entidades/Calle.php';

class CalleDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  // Obtener las ultimas cinco calles
  public static function getCalle() {
    try {
      $query = "SELECT * FROM v_ultimas_cinco_calles";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Obtener todas las calles
  public static function getAllCalle() {
    try {
      $query = "SELECT * FROM v_todo_calles";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Obtener calles por nombre
  public static function getDescripcion($calle) {
    try {
      $query = "SELECT * FROM v_todo_calles WHERE calle ILIKE ?";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $descripcion_obtenido = $calle->getDescripcion();
      $descripcion_obtenido = "%".$descripcion_obtenido."%";

      // $resultado->bindParam(":descripcion", $descripcion_obtenido);
      // $resultado->execute();
      $resultado->execute(array($descripcion_obtenido));
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  // Funcion que sirve para abm de calles
  public static function abmCalle($calle) {
    try {
      $query = "SELECT public.sp_abmcalles(:op, :id, :descripcion, :idbarrio)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $op_obtenido = $calle->getOp();
      $id_obtenido = $calle->getId();
      $descripcion_obtenido = $calle->getDescripcion();
      $idbarrio_obtenido = $calle->getIdBarrio();

      $resultado->bindParam(":op", $op_obtenido);
      $resultado->bindParam(":id", $id_obtenido);
      $resultado->bindParam(":descripcion", $descripcion_obtenido);
      $resultado->bindParam(":idbarrio", $idbarrio_obtenido);

      if($resultado->execute()) {
        echo "exito";
        return true;
      }
      return false;
    } catch (Exception $e) {
      //die($e->getMessage());
      if($e->getCode()==23503){
        echo $e->getCode();
      }
      return false;
    }
  }


}

?>
