<?php

include 'Conexion.php';
include '../../entidades/Sede.php';

class SedeDao extends Conexion {

    protected static $cnx;
  
    private static function getConexion() {
      self::$cnx = Conexion::conectar();
    }
  
    private static function desconectar() {
      self::$cnx = null;
    }
  
    // Obtener ciudades
    public static function getSede() {
      try {
        $query = "SELECT * FROM v_ultimas_cinco_sedes";
  
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
    public static function getDescripcion($sede) {
      try {
        $query = "SELECT * FROM v_todo_sedes WHERE nombre ILIKE ?";
  
        self::getConexion();
  
        $resultado = self::$cnx->prepare($query);
  
        $descripcion_obtenido = $sede->getNombre();
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
  
    public static function altaSede($sede) {
      try {
        $query = "SELECT public.sp_abmsedes(
            :op, :id, :nombre, :ruc, :telefono1,	
            :telefono2,	:email,	:pagweb, :fanpage,	
            :capacidad,	:latitud, :longitud, :idciudad,	:idbarrio, :idcalle )";
  
        self::getConexion();
  
        $resultado = self::$cnx->prepare($query);
  
        $op             = $sede->getOp();
        $id             = (int)$sede->getId();
        $nombre         = $sede->getNombre();
        $ruc            = $sede->getRuc();
        $telefono1      = $sede->getTelefono1();
        $telefono2      = !empty($sede->getTelefono2())?$sede->getTelefono2():null;
        $email          = !empty($sede->getEmail())?$sede->getEmail():null;
        $pagweb         = !empty($sede->getPagweb())?$sede->getPagweb():null;
        $fanpage        = !empty($sede->getFanpage())?$sede->getFanpage():null;
        $capacidad      = $sede->getCapacidad();
        $latitud        = !empty($sede->getLatitud())?$sede->getLatitud():null;
        $longitud       = !empty($sede->getLongitud())?$sede->getLongitud():null;
        $idciudad       = $sede->getIdciudad();
        $idbarrio       = $sede->getIdbarrio();
        $idcalle        = $sede->getIdcalle();
  
        $resultado->bindParam(":op", $op);
        $resultado->bindParam(":id", $id);
        $resultado->bindParam(":nombre", $nombre);
        $resultado->bindParam(":ruc", $ruc);
        $resultado->bindParam(":telefono1", $telefono1);
        $resultado->bindParam(":telefono2", $telefono2);
        $resultado->bindParam(":email", $email);
        $resultado->bindParam(":pagweb", $pagweb);
        $resultado->bindParam(":fanpage", $fanpage);
        $resultado->bindParam(":capacidad", $capacidad);
        $resultado->bindParam(":latitud", $latitud);
        $resultado->bindParam(":longitud", $longitud);
        $resultado->bindParam(":idciudad", $idciudad);
        $resultado->bindParam(":idbarrio", $idbarrio);
        $resultado->bindParam(":idcalle", $idcalle);
  
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
          echo $e->getMessage();
        }
        return false;
      }
    }
  
  
  }

?>