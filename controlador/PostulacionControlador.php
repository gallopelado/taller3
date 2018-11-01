<?php

include '../../datos/PostulacionDAO.php';

class PostulacionControlador {

  public function getListaPostulacion() {
    return PostulacionDAO::getListaPostulacion();    
  }
  
  public function getListaPostulacionGeneral() {
    return PostulacionDAO::getListaPostulacionGeneral();
  }
  
  public function getListaPostulacionGeneralCerradas() {
    return PostulacionDAO::getListaPostulacionGeneralCerradas();
  }

  public function persistir($op, $idpostulacion, $idministerio, $descripcion, $documento, $vacancia,
          $idcargo, $iniciopostulacion, $finpostulacion, $estado) {
      $obj = new Postulacion();
      $obj->setOp($op);
      $obj->setIdpostulacion($idpostulacion);
      $obj->setIdministerio($idministerio);
      $obj->setDescripcion($descripcion);
      $obj->setDocumento($documento);
      $obj->setVacancia($vacancia);
      $obj->setIdcargo($idcargo);
      $obj->setIniciopostulacion($iniciopostulacion);
      $obj->setFinpostulacion($finpostulacion);
      $obj->setEstado($estado);
      return PostulacionDAO::persistir($obj);
  }
  
  public function analizarNulos($dato) {
        if ($dato === "" || $dato === null) {
            return null;
        } else {
            return $dato;
        }
    }
}
?>
