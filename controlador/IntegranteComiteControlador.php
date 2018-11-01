<?php
include '../../datos/IntegranteComiteDAO.php';

class IntegranteComiteControlador {
    public static function getListaComitesRegistrados() {
        return IntegranteComiteDAO::getListaComitesRegistrados();
    }
    
    public static function persistir($op, $idcomitecab, $idministerio, $idlider, $idsuplente, $descripcion, $obs) {
        $obj = new IntegranteComite();
        $obj->setOp($op);
        $obj->setIdcomitecab($idcomitecab);
        $obj->setIdministerio($idministerio);
        $obj->setIdlider($idlider);
        $obj->setIdsuplente($idsuplente);
        $obj->setDescripcion($descripcion);
        $obj->setObs($obs);
        return IntegranteComiteDAO::persistir($obj);
    }
    
    public static function analizarNulos($dato) {
        if ($dato === "" || $dato === null) {
            return null;
        } else {
            return $dato;
        }
    }
    
    //Metodos del detalle
    public static function getListaIntegrantesComite($idcomitecab) {
        return IntegranteComiteDAO::getListaIntegrantesComite($idcomitecab);
    }
    
    public static function persistirIntegrantes($op, $idcomitecabecera, $idcandidato, $idcargo, $ob, $entrenamiento) {
        $obj = new IntegranteComite();
        $obj->setOp($op);
        $obj->setIdcomitecabecera($idcomitecabecera);
        $obj->setIdcandidato($idcandidato);
        $obj->setIdcargo($idcargo);
        $obj->setOb($ob);
        $obj->setEntrenamiento($entrenamiento);        
        return IntegranteComiteDAO::persistirIntegrantes($obj);
    }
}

