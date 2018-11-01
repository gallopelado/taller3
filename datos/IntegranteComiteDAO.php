<?php

include 'Conexion.php';
include '../../entidades/IntegranteComite.php';

class IntegranteComiteDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    public static function getListaComitesRegistrados() {
        try {
            $query = "SELECT * FROM lista_comites_registrados WHERE estado=true";

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
        } finally {
            self::desconectar();
        }
    }

    public static function persistir($obj) {
        try {
            $query = "select public.sp_cabe_comite(:op,	:comcabid, :minid, :liderid, :suplenteid, :descri, :obs )";
            self::getConexion();
            $rs = self::$cnx->prepare($query);
            $op = $obj->getOp();
            $idcomitecab = $obj->getIdcomitecab();
            $idministerio = $obj->getIdministerio();
            $idlider = $obj->getIdlider();
            $idsuplente = $obj->getIdsuplente();
            $descripcion = $obj->getDescripcion();
            $obs = $obj->getObs();
            $rs->bindParam(":op", $op);
            $rs->bindParam(":comcabid", $idcomitecab);
            $rs->bindParam(":minid", $idministerio);
            $rs->bindParam(":liderid", $idlider);
            $rs->bindParam(":suplenteid", $idsuplente);
            $rs->bindParam(":descri", $descripcion);
            $rs->bindParam(":obs", $obs);
            if ($rs->execute()) {
                echo "true";
                //return true;
            }
        } catch (Exception $exc) {
            echo $exc->getCode();
            return false;
        } finally {
            self::desconectar();
        }
    }

    // Metodos para el detalle

    public static function getListaIntegrantesComite($idcomitecab) {
        try {
            $query = "SELECT * FROM lista_integrantes_comite WHERE idcomitecab=? and estado='ACTIVO'";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute(array($idcomitecab));
            $rs = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $rs;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    public static function persistirIntegrantes($obj) {
        try {
            $query = "select public.sp_comitedetalle(:op,:comcabid,:candiid,:cargoid,:enentrenamiento,:_observacion )";
            self::getConexion();
            $rs = self::$cnx->prepare($query);
            $op = $obj->getOp();
            $idcomitecabecera = $obj->getIdcomitecabecera();
            $idcandidato = $obj->getIdcandidato();
            $idcargo = $obj->getIdcargo();
            $ob = $obj->getOb();
            $entrenamiento = $obj->getEntrenamiento();            
            $rs->bindParam(":op", $op);
            $rs->bindParam(":comcabid", $idcomitecabecera);
            $rs->bindParam(":candiid", $idcandidato);
            $rs->bindParam(":cargoid", $idcargo);
            $rs->bindParam(":enentrenamiento", $entrenamiento);
            $rs->bindParam(":_observacion", $ob);            
            if ($rs->execute()) {
                echo "true";
                //return true;
            }
        } catch (Exception $exc) {
            echo $exc->getCode();
            return false;
        } finally {
            self::desconectar();
        }
    }


}
