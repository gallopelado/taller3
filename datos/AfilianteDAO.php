<?php

include 'Conexion.php';
include '../../entidades/Afiliante.php';

class AfilianteDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    public static function buscarMiembro($idmiembro) {
        // Obtener los requisitos
        try {
            $query = "SELECT * FROM lista_miembros where idmiembro=?";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute(array($idmiembro));
            $rs = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public static function obtenerListaMiembros() {
        try {
            $query = "SELECT * FROM lista_miembros";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            if ($resultado) {
                while ($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $data["data"][] = $rs;
                }
                return $data;
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public static function persistir($obj) {
        try {
            $query = "select public.sp_miembros(
	:op,	-- put the op parameter value instead of 'op' (varchar)
	:mieid,	-- put the mieid parameter value instead of 'mieid' (int4)
	:perid,	-- put the perid parameter value instead of 'perid' (int4)
	:razonadmi,	-- put the razonadmi parameter value instead of 'razonadmi' (tipo_admision)
	:clasisocial,	-- put the clasisocial parameter value instead of 'clasisocial' (clasificacion_social)
	:estmembresia,	-- put the estmembresia parameter value instead of 'estmembresia' (estado_membresia)
	:fechaconverso,	-- put the fechaconverso parameter value instead of 'fechaconverso' (date)
	:padresmiembro,	-- put the padresmiembro parameter value instead of 'padresmiembro' (bool)
	:asistiaotraiglesia,	-- put the asistiaotraiglesia parameter value instead of 'asistiaotraiglesia' (bool)
	:otraiglesia,	-- put the otraiglesia parameter value instead of 'otraiglesia' (varchar)
	:iniciadorid,	-- put the iniciadorid parameter value instead of 'iniciadorid' (int4)
	:formacontacto,	-- put the formacontacto parameter value instead of 'formacontacto' (varchar)
	:_esmiembroconyuge,	-- put the _esmiembroconyuge parameter value instead of '_esmiembroconyuge' (bool)
	:conyugeid,	-- put the conyugeid parameter value instead of 'conyugeid' (int4)
	:_nrohijos,	-- put the _nrohijos parameter value instead of '_nrohijos' (int4)
	:_observacion,	-- put the _observacion parameter value instead of '_observacion' (varchar)
	:miefechasalida 	-- put the miefechasalida parameter value instead of 'miefechasalida' (timestamp)
);";

            self::getConexion();
            $resultado = self::$cnx->prepare($query);

            $op = $obj->getOp();
            $mieid = $obj->getIdmiembro();
            $perid = $obj->getIdpersona();
            $razonadmi = $obj->getRazon_admision();
            $clasisocial = $obj->getClase_social();
            $estmembresia = $obj->getEstado_membresia();
            $fechaconverso = $obj->getFecha_converso();
            $padresmiembro = $obj->getPadres_miembros();
            $asistiaotraiglesia = $obj->getAsistia_otra_iglesia();
            $otraiglesia = $obj->getOtra_iglesia();
            $iniciadorid = $obj->getIdiniciador();
            $formacontacto = $obj->getForma_contacto();
            $esmiembroconyuge = $obj->getEs_miembro_conyuge();
            $conyugeid = $obj->getIdconyuge();
            $nrohijos = $obj->getNrohijos();
            $observacion = $obj->getObservacion();
            $miefechasalida = null;

            $resultado->bindParam(":op", $op);
            $resultado->bindParam(":mieid", $mieid);
            $resultado->bindParam(":perid", $perid);
            $resultado->bindParam(":razonadmi", $razonadmi);
            $resultado->bindParam(":clasisocial", $clasisocial);
            $resultado->bindParam(":estmembresia", $estmembresia);
            $resultado->bindParam(":fechaconverso", $fechaconverso);
            $resultado->bindParam(":padresmiembro", $padresmiembro);
            $resultado->bindParam(":asistiaotraiglesia", $asistiaotraiglesia);
            $resultado->bindParam(":otraiglesia", $otraiglesia);
            $resultado->bindParam(":iniciadorid", $iniciadorid);
            $resultado->bindParam(":formacontacto", $formacontacto);
            $resultado->bindParam(":_esmiembroconyuge", $esmiembroconyuge);
            $resultado->bindParam(":conyugeid", $conyugeid);
            $resultado->bindParam(":_nrohijos", $nrohijos);
            $resultado->bindParam(":_observacion", $observacion);
            $resultado->bindParam(":miefechasalida", $miefechasalida);

            if ($resultado->execute()) {
                return true;
            }
        } catch (Exception $e) {
            echo $e->getCode();
//            echo $e->getMessage();
            return false;
        }
    }

}

?>
