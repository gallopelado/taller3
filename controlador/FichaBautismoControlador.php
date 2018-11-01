<?php

include '../../datos/FichaBautismoDAO.php';

class FichaBautismoControlador {

  public function obtenerListaPastores() {
    return FichaBautismoDAO::obtenerListaPastores();
  }

  public function cargaDocumentos($idpersona) {
    return FichaBautismoDAO::cargaDocumentos($idpersona);
  }

  public function persistir($op, $bauid, $baufecha, $idpadre, $idmadre, $perid, $pastorid){
    $obj = new FichaBautismo();
    $obj->setOp($op);
    $obj->setIdbautismo($bauid);
    $obj->setFechabautismo($baufecha);
    $obj->setIdtutor1($idpadre);
    $obj->setIdtutor2($idmadre);
    $obj->setIdpersona($perid);
    $obj->setIdpastor($pastorid);
    return FichaBautismoDAO::persistir($obj);
  }

}

?>
