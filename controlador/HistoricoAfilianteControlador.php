<?php

include '../../datos/HistoricoAfilianteDAO.php';

class HistoricoAfilianteControlador {

  public function cargaRequisitos($id) {
    return HistoricoAfilianteDAO::cargaRequisitos($id);
  }

  public function persistir($op, $idpersona, $idrequisito,
  $estado, $fecha, $ant_idrequisito){
    $obj = new HistoricoAfiliante();
    $obj->setOp($op);
    $obj->setIdpersona($idpersona);
    $obj->setIdrequisito($idrequisito);
    $obj->setEstado($estado);
    $obj->setFechacompletado($fecha);
    $obj->setAntIdRequisito($ant_idrequisito);
    return HistoricoAfilianteDAO::persistir($obj);
  }

}
 ?>
