<?php

include '../../datos/ProfesionDao.php';

class ProfesionControlador {

  public function obtenerProfesion() {
    return ProfesionDao::getProfesion();
    ProfesionDao::desconectar();
  }

  public function obtenerAllProfesion() {
    return ProfesionDao::getAllProfesion();
    ProfesionDao::desconectar();
  }

  public function registrarProfesion($op, $id, $descripcion) {
    $obj_profesion = new Profesion();
    $obj_profesion->setOp($op);
    $obj_profesion->setId($id);
    $obj_profesion->setDescripcion($descripcion);

    return ProfesionDao::altaProfesion($obj_profesion);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_profesion =  new Profesion();
    $obj_profesion->setDescripcion($descripcion);

    return ProfesionDao::getDescripcion($obj_profesion);
  }

}
?>
