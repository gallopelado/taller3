<?php

include 'Conexion.php';
include '../../entidades/Nacionalidad.php';

class NacionalidadDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  // Obtener ciudades
  public static function getNacionalidad() {
    try {
      $query = "SELECT * FROM v_ultimas_cinco_nacionalidades";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public static function getAllNacionalidad() {
    try {
      $query = "SELECT * FROM v_todo_nacionalidades";

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
  public static function getDescripcion($nacionalidad) {
    try {
      $query = "SELECT * FROM v_todo_nacionalidades WHERE nac_descri ILIKE ?";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $descripcion_obtenido = $nacionalidad->getDescripcion();
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

  public static function altaNacionalidad($nacionalidad) {
    try {
      $query = "SELECT public.sp_abmnacionalidades(:op, :id,	:descripcion)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $op_obtenido = $nacionalidad->getOp();
      $id_obtenido = $nacionalidad->getId();
      $descripcion_obtenido = $nacionalidad->getDescripcion();

      $resultado->bindParam(":op", $op_obtenido);
      $resultado->bindParam(":id", $id_obtenido);
      $resultado->bindParam(":descripcion", $descripcion_obtenido);

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
