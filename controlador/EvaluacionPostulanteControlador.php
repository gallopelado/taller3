<?php

include '../../datos/EvaluacionPostulanteDAO.php';

class EvaluacionPostulanteControlador {

  public static function getListaAdmitidos($idpostulacion) {
       return EvaluacionPostulanteDAO::getListaAdmitidos($idpostulacion);
  }
  
  public static function getListaAdmitidosMinisterio($ministerio) {
       return EvaluacionPostulanteDAO::getListaAdmitidosMinisterio($ministerio);
  }
  
  public static function getDesplegarPostulacion($idcabe) {
       return EvaluacionPostulanteDAO::getDesplegarPostulacion($idcabe);
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
