<?php

include '../../datos/CandidatoDAO.php';

class CandidatoControlador {

  public function getListaCandidatos() {
    return CandidatoDAO::getListaCandidatos();    
  }
  
  public function getListaCandidatosById($idcandidato) {
    return CandidatoDAO::getListaCandidatosById($idcandidato);    
  }

  public function persistir($op, $idcandidato, $idmiembro,$cualidades, $actitudes, $antecedentes, $fecha, $servir) {
      $obj = new Candidato();
      $obj->setOp($op);
      $obj->setIdcandidato($idcandidato);
      $obj->setIdmiembro($idmiembro);
      $obj->setCualidades($cualidades);
      $obj->setActiministerial($actitudes);
      $obj->setAntecedentes($antecedentes);
      $obj->setFecha($fecha);
      $obj->setServir($servir);
      return CandidatoDAO::persistir($obj);
  }
  
  public function analizarNulos($dato) {
        if ($dato === '' || $dato === null) {
            return null;
        } else {
            return $dato;
        }
    }

}
?>
