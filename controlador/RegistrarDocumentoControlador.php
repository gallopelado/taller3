<?php

include '../../datos/RegistrarDocumentoDAO.php';

class RegistrarDocumentoControlador {

  public function cargaDocumentos($id) {
    return RegistrarDocumentoDAO::cargaDocumentos($id);
  }

  public function persistir($op, $id, $idpersona, $idtipodocumento, $observacion){
    $obj = new RegistrarDocumento();
    $obj->setOp($op);
    $obj->setId($id);
    $obj->setIdpersona($idpersona);
    $obj->setIdtipodocumento($idtipodocumento);
    // $obj->setArchivo($fecha); //Futura implementacion
    $obj->setObservacion($observacion);
    return RegistrarDocumentoDAO::persistir($obj);
  }

}
?>
