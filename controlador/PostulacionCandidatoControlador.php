<?php

include '../../datos/PostulacionCandidatoDAO.php';

class PostulacionCandidatoControlador {

  public function getListaAsignados($idpostulacion) {
    return PostulacionCandidatoDAO::getListaAsignados($idpostulacion);
  }
  

  public function persistir($op, $idpostulacion, $idpostulante) {
      $obj = new PostulacionCandidato();
      $obj->setOp($op);
      $obj->setIdpostulacion($idpostulacion);
      $obj->setIdcandidato($idpostulante);
      return PostulacionCandidatoDAO::persistir($obj);
  }
  
  public function analizaFecha() {
      return PostulacionCandidatoDAO::analizaFecha();
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
