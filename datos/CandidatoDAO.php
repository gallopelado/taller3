<?php

include 'Conexion.php';
include '../../entidades/Candidato.php';

class CandidatoDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    // Obtener 
    public static function getListaCandidatos() {
        try {
            $query = "SELECT * FROM lista_candidatos";

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

    public static function getListaCandidatosById($idcandidato) {
        try {
            $query = "SELECT * FROM lista_candidatos where idcandidato=?";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute(array($idcandidato));

            if ($resultado) {
                while ($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $data["data"] = $rs;
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
            $query = "select public.sp_candidatos(
	:op,	-- put the op parameter value instead of 'op' (varchar)
	:candiid,	-- put the candiid parameter value instead of 'candiid' (int4)
	:mieid,	-- put the mieid parameter value instead of 'mieid' (int4)
	:candicualidades,	-- put the candicualidades parameter value instead of 'candicualidades' (varchar)
	:candiactitudesmin,	-- put the candiactitudesmin parameter value instead of 'candiactitudesmin' (varchar)
	:candiantecedentes,	-- put the candiantecedentes parameter value instead of 'candiantecedentes' (varchar)
	:candifechacreacion,	-- put the candifechacreacion parameter value instead of 'candifechacreacion' (date)
	:candiservir 	-- put the candiservir parameter value instead of 'candiservir' (varchar)
)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $op = $obj->getOp();
            $idcandidato = $obj->getIdcandidato();
            $idmiembro = $obj->getIdmiembro();
            $cualidades = $obj->getCualidades();
            $actitudes = $obj->getActiministerial();
            $antecedentes = $obj->getAntecedentes();
            $fecha = null;
            $servir = $obj->getServir();

            $resultado->bindParam(":op", $op);
            $resultado->bindParam(":candiid", $idcandidato);
            $resultado->bindParam(":mieid", $idmiembro);
            $resultado->bindParam(":candicualidades", $cualidades);
            $resultado->bindParam(":candiactitudesmin", $actitudes);
            $resultado->bindParam(":candiantecedentes", $antecedentes);
            $resultado->bindParam(":candifechacreacion", $fecha);
            $resultado->bindParam(":candiservir", $servir);

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
