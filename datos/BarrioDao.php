<?php

include 'Conexion.php';
include '../../entidades/Barrio.php';

class BarrioDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  // Obtener todos los barrios
  public static function getAllBarrio() {
    try {
      $query = "SELECT * FROM v_todo_barrios";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Obtener las ultimas cinco calles
  public static function getBarrio() {
    try {
      $query = "SELECT * FROM v_ultimas_cinco_barrio";

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
      $query = "SELECT * FROM v_todo_barrios WHERE barrio ILIKE ?";

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

  public static function altaBarrio($barrio) {
    try {
      $query = "SELECT public.sp_abmbarrios(:op, :id,	:descripcion, :idciudad)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $op_obtenido = $barrio->getOp();
      $id_obtenido = $barrio->getId();
      $descripcion_obtenido = $barrio->getDescripcion();
      $idciudad_obtenido = $barrio->getIdCiudad();

      $resultado->bindParam(":op", $op_obtenido);
      $resultado->bindParam(":id", $id_obtenido);
      $resultado->bindParam(":descripcion", $descripcion_obtenido);
      $resultado->bindParam(":idciudad", $idciudad_obtenido);

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
      //echo 'Error capturado= '.$e->getMessage();
      //echo 'Codigo capturado ='.$e->getCode();
      return false;
    }
  }


}

?>
