<?php

include 'Conexion.php';
include '../../entidades/Telefono.php';

class TelefonoDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  // Obtener
  public static function getTelefono() {
    try {
      $query = "SELECT * FROM v_ultimas_cinco_telefono";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public static function getAllTelefono() {
    try {
      $query = "SELECT * FROM v_todo_telefono";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  // Obtener por nombre
  public static function getDescripcion($telefono) {
    try {
      $query = "SELECT * FROM v_todo_telefono WHERE nombre ILIKE ? or apellidom ILIKE ?";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $descripcion_obtenido = $telefono->getTelefono();
      $descripcion_obtenido = "%".$descripcion_obtenido."%";

      // $resultado->bindParam(":descripcion", $descripcion_obtenido);
      // $resultado->execute();
      $resultado->execute(array($descripcion_obtenido, $descripcion_obtenido));
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }

  }

  public static function altaTelefono($telefono) {
    try {
      $query = "select public.sp_abmtelefono(:op,	:id, :tipo, :numero, :perid )";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $op = $telefono->getOp();
      $id = $telefono->getId();
      $tipo = $telefono->getTipo();
      $numero = $telefono->getTelefono();
      $idpersona = $telefono->getPersona();

      $resultado->bindParam(":op", $op);
      $resultado->bindParam(":id", $id);
      $resultado->bindParam(":tipo", $tipo);
      $resultado->bindParam(":numero", $numero);
      $resultado->bindParam(":perid", $idpersona);

      if($resultado->execute()) {
        echo "exito";
        return true;
      }
      return false;
    } catch (Exception $e) {
      //die($e->getMessage());
      if($e->getCode()==23503){
        echo $e->getCode();
      }else{
        echo $e->getCode();
        echo $e->getMessage();
      }
      return false;
    }
  }


}

?>
