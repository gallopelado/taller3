<?php

include '../../datos/BarrioDao.php';

class BarrioControlador {

  public function obtenerTodoBarrio() {
    return BarrioDao::getAllBarrio();
    BarrioDao::desconectar();
  }

  public function obtenerBarrio() {
    return BarrioDao::getAllBarrio();
    BarrioDao::desconectar();
  }

  public function registrarBarrio($op, $id, $descripcion, $idciudad) {
    $obj_barrio = new Barrio();
    $obj_barrio->setOp($op);
    $obj_barrio->setId($id);
    $obj_barrio->setDescripcion($descripcion);
    $obj_barrio->setIdCiudad($idciudad);

    return BarrioDao::altaBarrio($obj_barrio);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_barrio =  new Barrio();
    $obj_barrio->setDescripcion($descripcion);

    return BarrioDao::getDescripcion($obj_barrio);
  }

}
?>
