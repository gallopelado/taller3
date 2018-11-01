<?php

include 'Conexion.php';
include '../../entidades/Postulacion.php';

class PostulacionDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    // Obtener 
    public static function getListaPostulacion() {
        try {
            $query = "SELECT * FROM lista_postulaciones";

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

    public static function getListaPostulacionGeneral() {
        try {
            $query = "SELECT * FROM lista_postulaciones_general";

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
    
    public static function getListaPostulacionGeneralCerradas() {
        try {
            $query = "select * from lista_postulaciones_agrup_cantpostulante where abierto = 'CERRADO'";

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
            $query = "select public.sp_postulaciones(
	:op,	-- put the op parameter value instead of 'op' (varchar)
	:posid,	-- put the posid parameter value instead of 'posid' (int4)
	:minid,	-- put the minid parameter value instead of 'minid' (int4)
	:posdescri,	-- put the posdescri parameter value instead of 'posdescri' (varchar)
	:posdocu,	-- put the posdocu parameter value instead of 'posdocu' (bytea)
	:posvacancia,	-- put the posvacancia parameter value instead of 'posvacancia' (int4)
	:cargoid,	-- put the cargoid parameter value instead of 'cargoid' (int4)
	:posiniciopostu,	-- put the posiniciopostu parameter value instead of 'posiniciopostu' (date)
	:posfinpostu,	-- put the posfinpostu parameter value instead of 'posfinpostu' (date)
	:posestado 	-- put the posestado parameter value instead of 'posestado' (bool)
)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $op = $obj->getOp();
            $idpostulacion = $obj->getIdpostulacion();
            $idministerio = $obj->getIdministerio();
            $descripcion = $obj->getDescripcion();
            $documento = null;
            $vacancia = $obj->getVacancia();
            $idcargo = $obj->getIdcargo();
            $iniciopostulacion = $obj->getIniciopostulacion();
            $finpostulacion = $obj->getFinpostulacion();
            $estado = $obj->getEstado();

            $resultado->bindParam(":op", $op);
            $resultado->bindParam(":posid", $idpostulacion);
            $resultado->bindParam(":minid", $idministerio);
            $resultado->bindParam(":posdescri", $descripcion);
            $resultado->bindParam(":posdocu", $documento);
            $resultado->bindParam(":posvacancia", $vacancia);
            $resultado->bindParam(":cargoid", $idcargo);
            $resultado->bindParam(":posiniciopostu", $iniciopostulacion);
            $resultado->bindParam(":posfinpostu", $finpostulacion);
            $resultado->bindParam(":posestado", $estado);

            if ($resultado->execute()) {
                echo 'true';
                return true;
            }
        } catch (Exception $e) {
//            die($e->getMessage());
            echo $e->getCode();
            return false;
        } finally {
            self::desconectar();
        }
    }

}

?>
