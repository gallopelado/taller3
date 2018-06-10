<?php

include '../datos/CiudadDao.php';

class CiudadControlador {
  public function obtenerCiudad() {
    return CiudadDao::getCiudad();
    // CiudadDao::desconectar();
  }

  public function registrarCiudad($op, $id, $descripcion) {
    $obj_ciudad = new Ciudad();
    $obj_ciudad->setOp($op);
    $obj_ciudad->setId($id);
    $obj_ciudad->setDescripcion($descripcion);

    return CiudadDao::altaCiudad($obj_ciudad);
  }


}
?>
