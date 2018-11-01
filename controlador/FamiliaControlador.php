<?php

include '../../datos/FamiliaDao.php';

class FamiliaControlador {

  public function obtenerFamilia() {
    return FamiliaDao::getFamilia();
    FamiliaDao::desconectar();
  }

  public function obtenerAllFamilia() {
    return FamiliaDao::getAllFamilia();
    FamiliaDao::desconectar();
  }

  public function registrarFamilia($op, $id, $nombre, $idcalle, $idciudad,
  $codpostal, $telefono, $idorigen) {
    $obj_familia = new Familia();
    $obj_familia->setOp($op);
    $obj_familia->setId($id);
    $obj_familia->setNombre($nombre);
    $obj_familia->setIdcalle($idcalle);
    $obj_familia->setIdciudad($idciudad);
    $obj_familia->setCodpostal($codpostal);
    $obj_familia->setTelefono($telefono);
    $obj_familia->setIdorigen($idorigen);

    return FamiliaDao::altaFamilia($obj_familia);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_familia =  new Familia();
    $obj_familia->setNombre($descripcion);

    return FamiliaDao::getDescripcion($obj_familia);
  }

}

?>
