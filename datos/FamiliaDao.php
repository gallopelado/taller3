<?php

include 'Conexion.php';
include '../../entidades/Familia.php';

class FamiliaDao extends Conexion {

  protected static $cnx;

  private static function getConexion() {
    self::$cnx = Conexion::conectar();
  }

  private static function desconectar() {
    self::$cnx = null;
  }

  // Obtener ultimas 5 ciudades
  public static function getFamilia() {
    try {
      $query = "SELECT * FROM v_ultimas_cinco_familias";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);
      $resultado->execute();
      $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

      return $fila;

    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public static function getAllFamilia(){
    try {
      $query = "SELECT * FROM v_todo_familias";

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
  public static function getDescripcion($familia) {
    try {
      $query = "SELECT * FROM v_todo_familias WHERE nombre ILIKE ?";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $descripcion_obtenido = $familia->getNombre();
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

  public static function altaFamilia($familia) {
    try {
      $query = "SELECT public.sp_abmfamilia(:op, :famid, :famnombre, :calleid, :ciucod, :famcodpostal, :famtel,	:origenid)";

      self::getConexion();

      $resultado = self::$cnx->prepare($query);

      $op         = $familia->getOp();
      $id         = (int)$familia->getId();
      $nombre     = $familia->getNombre();
      $idcalle    = $familia->getIdcalle();
      $idciudad   = $familia->getIdciudad();
      $codpostal  = $familia->getCodpostal();
      $telefono   = $familia->getTelefono();
      $idorigen   = $familia->getIdorigen();

      $resultado->bindParam(":op", $op);
      $resultado->bindParam(":famid", $id);
      $resultado->bindParam(":famnombre", $nombre);
      $resultado->bindParam(":calleid", $idcalle);
      $resultado->bindParam(":ciucod", $idciudad);
      $resultado->bindParam(":famcodpostal", $codpostal);
      $resultado->bindParam(":famtel", $telefono);
      $resultado->bindParam(":origenid", $idorigen);

      if($resultado->execute()) {
        echo "exito";
        return true;
      }
      return false;
    } catch (Exception $e) {
      //die($e->getMessage());
      if($e->getCode()==23503){
        echo $e->getCode();
      }else {
        echo $e->getMessage();
      }
      return false;
    }
  }


}
?>
