<?php

include '../../datos/TelefonoDao.php';

class TelefonoControlador {

  public function obtenerTelefono() {
    return TelefonoDao::getTelefono();
    TelefonoDao::desconectar();
  }

  public function obtenerAllTelefono() {
    return TelefonoDao::getAllTelefono();
    TelefonoDao::desconectar();
  }

  public function registrarTelefono($op, $id, $tipo, $telefono, $idpersona) {
    $obj_telefono = new Telefono();
    $obj_telefono->setOp($op);
    $obj_telefono->setId($id);
    $obj_telefono->setTipo($tipo);
    $obj_telefono->setTelefono($telefono);
    $obj_telefono->setPersona($idpersona);

    return TelefonoDao::altaTelefono($obj_telefono);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_telefono =  new Telefono();
    $obj_telefono->setTelefono($descripcion);

    return TelefonoDao::getDescripcion($obj_telefono);
  }

}
?>
