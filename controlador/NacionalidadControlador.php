<?php

include '../../datos/NacionalidadDao.php';

class NacionalidadControlador {

  public function obtenerNacionalidad() {
    return NacionalidadDao::getNacionalidad();
    NacionalidadDao::desconectar();
  }

  public function obtenerAllNacionalidad() {
    return NacionalidadDao::getAllNacionalidad();
    NacionalidadDao::desconectar();
  }

  public function registrarNacionalidad($op, $id, $descripcion) {
    $obj_nacionalidad = new Nacionalidad();
    $obj_nacionalidad->setOp($op);
    $obj_nacionalidad->setId($id);
    $obj_nacionalidad->setDescripcion($descripcion);

    return NacionalidadDao::altaNacionalidad($obj_nacionalidad);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_nacionalidad =  new Nacionalidad();
    $obj_nacionalidad->setDescripcion($descripcion);

    return NacionalidadDao::getDescripcion($obj_nacionalidad);
  }

}
?>
