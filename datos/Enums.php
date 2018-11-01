<?php

include 'Conexion.php';

class Enums extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  public static function getEnum($entidad) {
    $entidad = "v_".$entidad;
    try {
      $query = "SELECT descripcion FROM $entidad";

      self::getConexion();


      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      // $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}

?>
