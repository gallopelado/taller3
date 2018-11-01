<?php

include 'Conexion.php';
include '../entidades/Ciudad.php';

class CiudadDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  // Obtener ciudades
  public static function getCiudad() {
    try {
      $query = "SELECT * FROM v_ultimas_cinco_ciudades";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Obtener ciudades por nombre
  public static function getDescripcion($ciudad) {
    try {
      $query = "SELECT * FROM v_todo_ciudades WHERE ciu_descri ILIKE ?";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $descripcion_obtenido = $ciudad->getDescripcion();
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

  public static function altaCiudad($ciudad) {
    try {
      $query = "SELECT public.sp_abmciudades(:op, :id,	:descripcion)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $op_obtenido = $ciudad->getOp();
      $id_obtenido = $ciudad->getId();
      $descripcion_obtenido = $ciudad->getDescripcion();

      $resultado->bindParam(":op", $op_obtenido);
      $resultado->bindParam(":id", $id_obtenido);
      $resultado->bindParam(":descripcion", $descripcion_obtenido);

      if($resultado->execute()) {
        return true;
      }
      return false;
    } catch (Exception $e) {
      die($e->getMessage());
      return false;
    }
  }


}

?>