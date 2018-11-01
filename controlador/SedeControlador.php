<?php

include '../../datos/SedeDao.php';

class SedeControlador {

  public function obtenerSede() {
    return SedeDao::getSede();
    SedeDao::desconectar();
  }

  public function registrarSede($op, $id, $nombre, $ruc, $telefono1,
  $telefono2, $email, $pagweb, $fanpage, $capacidad, $latitud, $longitud,
  $idciudad, $idbarrio, $idcalle) {
    $obj_sede = new Sede();
    $obj_sede->setOp($op);
    $obj_sede->setId($id);
    $obj_sede->setNombre($nombre);
    $obj_sede->setRuc($ruc);
    $obj_sede->setTelefono1($telefono1);
    $obj_sede->setTelefono2($telefono2);
    $obj_sede->setEmail($email);
    $obj_sede->setPagweb($pagweb);
    $obj_sede->setFanpage($fanpage);
    $obj_sede->setCapacidad($capacidad);
    $obj_sede->setLatitud($latitud);
    $obj_sede->setLongitud($longitud);
    $obj_sede->setIdciudad($idciudad);
    $obj_sede->setIdbarrio($idbarrio);
    $obj_sede->setIdcalle($idcalle);

    return SedeDao::altaSede($obj_sede);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_sede =  new Sede();
    $obj_sede->setNombre($descripcion);

    return SedeDao::getDescripcion($obj_sede);
  }

}
?>