<?php

include '../../datos/TipoDocumentoDao.php';

class TipoDocumentoControlador {

  public function obtenerCiudad() {
    return CiudadDao::getCiudad();
    CiudadDao::desconectar();
  }

  public function obtenerTodas() {
    return TipoDocumentoDao::getAll();
    TipoDocumentoDao::desconectar();
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
