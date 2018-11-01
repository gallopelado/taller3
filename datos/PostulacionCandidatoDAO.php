<?php

include 'Conexion.php';
include '../../entidades/PostulacionCandidato.php';

class PostulacionCandidatoDAO extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    public static function getListaAsignados($idpostulacion) {
        try {
            $query = "SELECT pc.pos_id idpostulacion, 
            pc.candi_id idcandidato, pe.per_nombre||' '||pe.per_apellidop||' '||pe.per_apellidom postulante,
            pc.fecha_agregado
            FROM postulacion_candidato pc
            join postulaciones pos on pc.pos_id = pos.pos_id
            join candidatos can on pc.candi_id = can.candi_id
            join miembros mi on can.mie_id = mi.mie_id
            join personas pe on mi.per_id = pe.per_id
            where pc.pos_id = ?";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $resultado->execute(array($idpostulacion));
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        } catch (Exception $e) {
//            die($e->getMessage());
            $e->getCode();
        } finally {
            self::desconectar();
        }
    }

    public static function persistir($obj) {
        try {
            $query = "select public.sp_postulacion_candidato(:op, :idpostulacion, :idcandidato)";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $op = $obj->getOp(); 
            $idpostulacion = $obj->getIdpostulacion(); 
            $idpostulante = $obj->getIdcandidato();
            
            $resultado->bindParam(":op", $op);
            $resultado->bindParam(":idpostulacion", $idpostulacion);
            $resultado->bindParam(":idcandidato", $idpostulante);
            
            if($resultado->execute()) {
                echo "true";
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getCode();
//            echo $exc->getMessage();
        } finally {
            self::desconectar();
        }
    }
    
    public static function analizaFecha() {
        try {
            $query = "select sp_analizafechapostulacion()";
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            if($resultado->execute()) {
                echo "true";
                return true;
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        } finally {
            self::desconectar();
        }
        }

}
