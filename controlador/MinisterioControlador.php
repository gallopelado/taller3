<?php

include '../../datos/MinisterioDao.php';

class MinisterioControlador {

  public function obtenerMinisterio() {
    return MinisterioDao::getMinisterio();    
  }
  
  public function listaMinisterio() {
      return MinisterioDao::listaMinisterios();      
  }

  public function registrarMinisterio($op, $id, $descripcion) {
    $obj_ministerio = new Ministerio();
    $obj_ministerio->setOp($op);
    $obj_ministerio->setId($id);
    $obj_ministerio->setDescripcion($descripcion);

    return MinisterioDao::altaMinisterio($obj_ministerio);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_ministerio =  new Ministerio();
    $obj_ministerio->setDescripcion($descripcion);

    return MinisterioDao::getDescripcion($obj_ministerio);
  }

}
?>
