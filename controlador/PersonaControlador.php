<?php

include '../../datos/PersonaDao.php';

class PersonaControlador {

  public function obtenerPersona() {
    return PersonaDao::getPersona();    
  }
  //Retorna las personas con un array de objetos
  public function obtenerTodoPersona() {
    return PersonaDao::getAllPersona();    
  }
  //Retorna las personas con un array asociativo
  public function obtenerAllPersona() {
    return PersonaDao::getTodoPersona();    
  }

  public function registrarPersona($op, $id, $nombres, $apellidoPaterno, $apellidoMaterno, $idfamilia,
  $relacionfamiliar, $sexo, $idcalle, $idciudad, $codigopostal, $idbarrio, $estadopersonal, $email, $fechanac, $lugarnac,
  $estadocivil, $idnacionalidad, $cedula, $foto, $idprofesion, $lugartrabajo, $puesto, $tipsangre, $alergias, $capacidades,
  $motivosalida, $fechasalida) {
    $obj_persona = new Persona();
    $obj_persona->setOp($op);
    $obj_persona->setId($id);
    $obj_persona->setNombres($nombres);
    $obj_persona->setApellidoPaterno($apellidoPaterno);
    $obj_persona->setApellidoMaterno($apellidoMaterno);
    $obj_persona->setIdfamilia($idfamilia);
    $obj_persona->setRelacionfamiliar($relacionfamiliar);
    $obj_persona->setSexo($sexo);
    $obj_persona->setIdcalle($idcalle);
    $obj_persona->setIdciudad($idciudad);
    $obj_persona->setCodigopostal($codigopostal);
    $obj_persona->setIdbarrio($idbarrio);
    $obj_persona->setEstadopersonal($estadopersonal);
    $obj_persona->setEmail($email);
    $obj_persona->setFechanac($fechanac);
    $obj_persona->setLugarnac($lugarnac);
    $obj_persona->setEstadocivil($estadocivil);
    $obj_persona->setIdnacionalidad($idnacionalidad);
    $obj_persona->setCedula($cedula);
    $obj_persona->setFoto($foto);
    $obj_persona->setIdprofesion($idprofesion);
    $obj_persona->setLugartrabajo($lugartrabajo);
    $obj_persona->setPuesto($puesto);
    $obj_persona->setTipsangre($tipsangre);
    $obj_persona->setAlergias($alergias);
    $obj_persona->setCapacidades($capacidades);
    $obj_persona->setMotivosalida($motivosalida);
    $obj_persona->setFechasalida($fechasalida);

    return PersonaDao::altaPersona($obj_persona);
  }

  public function obtenerDescripcion($descripcion) {
    $obj_persona =  new Persona();
    $obj_persona->setNombres($descripcion);

    return PersonaDao::getDescripcion($obj_persona);
  }

  public function obtenerPersonatelefono($descripcion) {
    $obj_persona =  new Persona();
    $obj_persona->setNombres($descripcion);

    return PersonaDao::getPersonatelefono($obj_persona);
  }

  public function obtenerFoto($id) {
    $obj_persona =  new Persona();
    $obj_persona->setId($id);

    return PersonaDao::getFoto($obj_persona);    
  }

  public function actualizaFoto($id, $foto) {
    $obj_persona =  new Persona();
    $obj_persona->setId($id);
    $obj_persona->setFoto($foto);

    return PersonaDao::updateFoto($obj_persona);   
  }

  public function eliminaFoto($id) {
    $obj_persona =  new Persona();
    $obj_persona->setId($id);

    return PersonaDao::deleteFoto($obj_persona);    
  }
  
  //Metodos para reportes
  public static function getTotalPersonasRep() {
      return PersonaDao::getTotalPersonasRep();
  }
}
?>
