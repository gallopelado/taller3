<?php

include '../../datos/CalleDao.php';

class CalleControlador {

  public function obtenerCalle() {
    return CalleDao::getCalle();
    CalleDao::desconectar();
  }

  public function obtenerTodoCalle() {
    return CalleDao::getAllCalle();
    CalleDao::desconectar();
  }

  public function registrarCalle($op, $id, $descripcion, $idbarrio) {
    $obj_calle = new Calle();
    $obj_calle->setOp($op);
    $obj_calle->setId($id);
    $obj_calle->setDescripcion($descripcion);
    $obj_calle->setIdBarrio($idbarrio);

    return CalleDao::abmCalle($obj_calle);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_calle = new Calle();
    $obj_calle->setDescripcion($descripcion);

    return CalleDao::getDescripcion($obj_calle);
  }

}
?>
