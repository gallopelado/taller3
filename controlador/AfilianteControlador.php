<?php

include '../../datos/AfilianteDAO.php';

class AfilianteControlador {

    public function obtenerListaMiembros() {
        return AfilianteDAO::obtenerListaMiembros();
    }

    public function buscarMiembro($id) {
        return AfilianteDAO::buscarMiembro($id);
    }

    public function persistir($op, $idmiembro, $idpersona, $razon_admision, $clase_social, $estado_membresia, $fecha_converso, $padres_miembros, $asistia_otra_iglesia, $otra_iglesia, $idiniciador, $forma_contacto, $es_miembro_conyuge, $idconyuge, $nrohijos, $observacion, $miefechasalida) {
        $obj = new Afiliante();
        $obj->setOp($op);
        $obj->setIdmiembro($idmiembro);
        $obj->setIdpersona($idpersona);
        $obj->setRazon_admision($razon_admision);
        $obj->setClase_social($clase_social);
        $obj->setEstado_membresia($estado_membresia);
        $obj->setFecha_converso($fecha_converso);
        $obj->setPadres_miembros($padres_miembros);
        $obj->setAsistia_otra_iglesia($asistia_otra_iglesia);
        $obj->setOtra_iglesia($otra_iglesia);
        $obj->setIdiniciador($idiniciador);
        $obj->setForma_contacto($forma_contacto);
        $obj->setEs_miembro_conyuge($es_miembro_conyuge);
        $obj->setIdconyuge($idconyuge);
        $obj->setNrohijos($nrohijos);
        $obj->setObservacion($observacion);
        $obj->setMiefechasalida($miefechasalida);
        return AfilianteDAO::persistir($obj);
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
