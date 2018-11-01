<?php

include '../../datos/RequisitoDao.php';

class RequisitoControlador {

  public function obtenerRequisito() {
    return RequisitoDao::getAll();
    RequisitoDao::desconectar();
  }

  public function obtenerRequisitoSinCartas() {
    return RequisitoDao::getAllSinCartas();
    RequisitoDao::desconectar();
  }

  public function obtenerTodasCiudad() {
    return CiudadDao::getAllCiudad();
    CiudadDao::desconectar();
  }

  public function registrarCiudad($op, $id, $descripcion) {
    $obj_ciudad = new Ciudad();
    $obj_ciudad->setOp($op);
    $obj_ciudad->setId($id);
    $obj_ciudad->setDescripcion($descripcion);

    return CiudadDao::altaCiudad($obj_ciudad);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_ciudad =  new Ciudad();
    $obj_ciudad->setDescripcion($descripcion);

    return CiudadDao::getDescripcion($obj_ciudad);
  }

}
?>
