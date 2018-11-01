<?php

include 'Conexion.php';
include '../../entidades/Ministerio.php';

class MinisterioDao extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    // Obtener ciudades
    public static function getMinisterio() {
        try {
            $query = "SELECT * FROM v_ultimas_cinco_ministerios";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    public static function listaMinisterios() {
        try {
            $query = "SELECT * FROM v_todo_ministerios";
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
        } catch (Exception $ex) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    // Obtener por nombre
    public static function getDescripcion($ministerio) {
        try {
            $query = "SELECT * FROM v_todo_ministerios WHERE descripcion ILIKE ?";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $descripcion_obtenido = $ministerio->getDescripcion();
            $descripcion_obtenido = "%" . $descripcion_obtenido . "%";

            // $resultado->bindParam(":descripcion", $descripcion_obtenido);
            // $resultado->execute();
            $resultado->execute(array($descripcion_obtenido));
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    public static function altaMinisterio($ministerio) {
        try {
            $query = "SELECT public.sp_abmministerios(:op, :id,	:descripcion)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $op_obtenido = $ministerio->getOp();
            $id_obtenido = $ministerio->getId();
            $descripcion_obtenido = $ministerio->getDescripcion();

            $resultado->bindParam(":op", $op_obtenido);
            $resultado->bindParam(":id", $id_obtenido);
            $resultado->bindParam(":descripcion", $descripcion_obtenido);

            if ($resultado->execute()) {
                echo "exito";
                return true;
            }
            return false;
        } catch (Exception $e) {
            //die($e->getMessage());
            if ($e->getCode() == 23503) {
                echo $e->getCode();
            }
            return false;
        } finally {
            self::desconectar();
        }
    }

}

?>
