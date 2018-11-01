<?php

include 'Conexion.php';
include '../../entidades/Persona.php';

class PersonaDao extends Conexion {

    protected static $cnx;

    private static function getConexion() {
        self::$cnx = Conexion::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    // Obtener
    public static function getPersona() {
        try {

            // $query = "SELECT per_id, per_nombre, encode(per_foto,'base64') as foto FROM personas";
            $query = "SELECT id, nombres, apellidop, apellidom, sexo, ci, fechanac, ecivil,
        estadopersonal, idciudad, ciudad, idnac, nacionalidad, idbarrio, barrio, idcalle,
        calle, email, idprofesion, profesion, idfamilia, familia, relacionfamiliar,
        lugarnacimiento, lugarestudio, puesto, tiposangre, alergia, capacidades, codigopostal
        FROM public.v_ultimos_cinco_personas";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            // $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ); //Carga en un array

            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    //Retorna las personas con un array de objetos
    public static function getAllPersona() {
        try {

            // $query = "SELECT per_id, per_nombre, encode(per_foto,'base64') as foto FROM personas";
            $query = "SELECT id, nombres, apellidop, apellidom, sexo, ci, fechanac, ecivil,
        estadopersonal, idciudad, ciudad, idnac, nacionalidad, idbarrio, barrio, idcalle,
        calle, email, idprofesion, profesion, idfamilia, familia, relacionfamiliar,
        lugarnacimiento, lugarestudio, puesto, tiposangre, alergia, capacidades, codigopostal
        FROM public.v_todo_personas";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            // $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    //Retorna las personas con un array asociativo
    public static function getTodoPersona() {
        try {
            $query = "SELECT id, concat(nombres, ' ',apellidop, ' ',apellidom) as persona ,nombres, apellidop, apellidom, sexo, ci, fechanac, ecivil,
        estadopersonal, idciudad, ciudad, idnac, nacionalidad, idbarrio, barrio, idcalle,
        calle, email, idprofesion, profesion, idfamilia, familia, relacionfamiliar,
        lugarnacimiento, lugarestudio, puesto, tiposangre, alergia, capacidades, codigopostal
        FROM public.v_todo_personas";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            if ($resultado) {
                while ($rs = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    $data["data"][] = $rs;
                }
                return json_encode($data);
            } else {
                return false;
            }
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    // Obtener  por nombre
    public static function getDescripcion($persona) {
        try {
            $query = "SELECT * FROM v_todo_personas WHERE nombres ILIKE ? or ci ILIKE ?";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $descripcion_obtenido = $persona->getNombres();
            $descripcion_obtenido = "%" . $descripcion_obtenido . "%";

            // $resultado->bindParam(":descripcion", $descripcion_obtenido);
            // $resultado->execute();
            $resultado->execute(array($descripcion_obtenido, $descripcion_obtenido));
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    public static function getPersonatelefono($persona) {
        try {
            $query = "SELECT id, tipo, telefono, idpersona, nombre, apellidop, apellidom FROM public.v_todo_telefono where idpersona=?";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $descripcion_obtenido = $persona->getNombres();

            $resultado->execute(array($descripcion_obtenido));
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);
            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    public static function getFoto($persona) {
        try {
            $query = "SELECT encode(per_foto, 'base64') as foto
        FROM personas where per_id=:perid";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $id = (int) $persona->getId();
            $resultado->bindParam(":perid", $id);

            $resultado->execute();
            $fila = $resultado->fetchAll(PDO::FETCH_OBJ);

            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

    public static function updateFoto($persona) {
        try {
            $query = "UPDATE personas set per_foto=:perfoto where per_id=:perid";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $id = (int) $persona->getId();
            $foto = $persona->getFoto();

            $resultado->bindParam(":perid", $id);
            $resultado->bindParam(":perfoto", $foto, PDO::PARAM_LOB);

            if ($resultado->execute()) {
                // echo "exito";
                return true;
            }
            return false;
        } catch (Exception $e) {
            // die($e->getMessage());
            echo $e->getMessage();
            return false;
        } finally {
            self::desconectar();
        }
    }

    public static function deleteFoto($persona) {
        try {
            $query = "UPDATE personas set per_foto=null where per_id=:perid";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $id = (int) $persona->getId();

            $resultado->bindParam(":perid", $id);

            if ($resultado->execute()) {
                // echo "exito";
                return true;
            }
            return false;
        } catch (Exception $e) {
            die($e->getMessage());
            // echo $e->getMessage();
            return false;
        } finally {
            self::desconectar();
        }
    }

    public static function altaPersona($persona) {
        try {
            $query = "select public.sp_abmpersonas(:op, :perid, :pernombre, :perapellidop, :perapellidom,
	      :persexo, :perci, :perfechanac, :percivil, :perfechasalida, :estado_personal, :ciucod,
	      :nacid, :barid, :calleid, :peremail, :perfoto, :profid, :famid, :perrelacionfamiliar, :perlugarnacimiento,
	      :perlugarestudio, :perpuesto, :pertiposangre, :peralergia, :percapdif, :percodigopostal, :motivosalida)";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);

            $op = $persona->getOp();
            $id = (int) $persona->getId();
            $nombres = $persona->getNombres();
            $apellidoPaterno = $persona->getApellidoPaterno();
            $apellidoMaterno = $persona->getApellidoMaterno();
            $idfamilia = $persona->getIdfamilia();
            $relacionfamiliar = $persona->getRelacionfamiliar();
            $sexo = $persona->getSexo();
            $idcalle = $persona->getIdcalle();
            $idciudad = $persona->getIdciudad();
            $codigopostal = $persona->getCodigopostal();
            $idbarrio = $persona->getIdbarrio();
            $estadopersonal = $persona->getEstadopersonal();
            $email = $persona->getEmail();
            $fechanac = $persona->getFechanac();
            $lugarnac = $persona->getLugarnac();
            $estadocivil = $persona->getEstadocivil();
            $idnacionalidad = $persona->getIdnacionalidad();
            $cedula = $persona->getCedula();
            $foto = $persona->getFoto();
            $idprofesion = $persona->getIdprofesion();
            $lugartrabajo = $persona->getLugartrabajo();
            $puesto = $persona->getPuesto();
            $tipsangre = $persona->getTipsangre();
            $alergias = $persona->getAlergias();
            $capacidades = $persona->getCapacidades();
            $motivosalida = $persona->getMotivosalida();
            $fechasalida = $persona->getFechasalida();

            $resultado->bindParam(":op", $op);
            $resultado->bindParam(":perid", $id);
            $resultado->bindParam(":pernombre", $nombres);
            $resultado->bindParam(":perapellidop", $apellidoPaterno);
            $resultado->bindParam(":perapellidom", $apellidoMaterno);
            $resultado->bindParam(":persexo", $sexo);
            $resultado->bindParam(":perci", $cedula);
            $resultado->bindParam(":perfechanac", $fechanac, PDO::PARAM_STR);
            $resultado->bindParam(":percivil", $estadocivil);
            $resultado->bindParam(":perfechasalida", $fechasalida);
            $resultado->bindParam(":estado_personal", $estadopersonal);
            $resultado->bindParam(":ciucod", $idciudad);
            $resultado->bindParam(":nacid", $idnacionalidad);
            $resultado->bindParam(":barid", $idbarrio);
            $resultado->bindParam(":calleid", $idcalle);
            $resultado->bindParam(":peremail", $email);
            $resultado->bindParam(":perfoto", $foto, PDO::PARAM_LOB);
            $resultado->bindParam(":profid", $idprofesion);
            $resultado->bindParam(":famid", $idfamilia);
            $resultado->bindParam(":perrelacionfamiliar", $relacionfamiliar);
            $resultado->bindParam(":perlugarnacimiento", $lugarnac);
            $resultado->bindParam(":perlugarestudio", $lugartrabajo);
            $resultado->bindParam(":perpuesto", $puesto);
            $resultado->bindParam(":pertiposangre", $tipsangre);
            $resultado->bindParam(":peralergia", $alergias);
            $resultado->bindParam(":percapdif", $capacidades);
            $resultado->bindParam(":percodigopostal", $codigopostal);
            $resultado->bindParam(":motivosalida", $motivosalida);

            if ($resultado->execute()) {
                echo "exito";
                return true;
            }
            return false;
        } catch (Exception $e) {
            //die($e->getMessage());
            if ($e->getCode() == 23503) {
                echo $e->getCode();
            } else {
                echo $e->getMessage();
            }
            return false;
        } finally {
            self::desconectar();
        }
    }

    //Metodos para los reportes
    public static function getTotalPersonasRep() {
        try {

            // $query = "SELECT per_id, per_nombre, encode(per_foto,'base64') as foto FROM personas";
            $query = "SELECT id, nombres, apellidop, apellidom, sexo, ci, fechanac, ecivil,
        estadopersonal, idciudad, ciudad, idnac, nacionalidad, idbarrio, barrio, idcalle,
        calle, email, idprofesion, profesion, idfamilia, familia, relacionfamiliar,
        lugarnacimiento, lugarestudio, puesto, tiposangre, alergia, capacidades, codigopostal
        FROM public.v_todo_personas";

            self::getConexion();

            $resultado = self::$cnx->prepare($query);
            $resultado->execute();            
            $fila = $resultado->fetchAll(PDO::FETCH_ASSOC); //Como array

            return $fila;
        } catch (Exception $e) {
            die($e->getMessage());
        } finally {
            self::desconectar();
        }
    }

}

?>
