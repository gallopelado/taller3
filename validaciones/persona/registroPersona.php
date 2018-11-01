<?php
include "../../controlador/PersonaControlador.php";
include "../../helps/helps.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  // echo var_dump($_POST);
  // echo var_dump($_FILES);
  if(isset($_POST["nombres"])) {
    $op                     = $_POST["op"];
    // Seccion 1
    $id                     = (int)$_POST["id"]?$_POST["id"]:0;
    $nombres                 = validar_campo($_POST["nombres"]);
    $apellidoPaterno        = $_POST["apellidoPaterno"];
    $apellidoMaterno        = $_POST["apellidoMaterno"];
    $idfamilia              = $_POST["familia"];
    $relacionfamiliar       = $_POST["relacionfamiliar"];
    $sexo                   = $_POST["sexo"];
    $idcalle                = $_POST["direccion"];
    $idciudad               = $_POST["ciudad"];
    $codigopostal           = $_POST["codigopostal"];
    $idbarrio               = $_POST["barrio"];
    $estadopersonal         = $_POST["estadopersonal"];
    $fechasalida            = $_POST["fechasalida"] == "" ? null : $_POST["fechasalida"];
    $motivosalida           = $_POST["motivosalida"];
    // Seccion 3
    $email                  = $_POST["email"];
    $fechanac               = $_POST["fechanac"];
    $lugarnac               = $_POST["lugarnac"];
    $estadocivil            = $_POST["estadocivil"];
    $idnacionalidad         = $_POST["nacionalidad"];
    $cedula                 = $_POST["cedula"];
    if(isset($_POST["foto"]) == "null") {
      $contenido = null;
    } else {
      $cargarFoto             = $_FILES["foto"]["tmp_name"];
      $tamanho                = $_FILES["foto"]["size"];
      $foto                   = fopen($cargarFoto, "rb");
      $contenido              = fread($foto, $tamanho);
      fclose($foto);
    }
    // Seccion 4
    $idprofesion            = $_POST["profesion"];
    $lugartrabajo           = $_POST["lugartrabajo"];
    $puesto                 = $_POST["puesto"];
    $tipsangre              = $_POST["tipsangre"];
    $alergias               = $_POST["alergias"];
    $capacidades            = $_POST["capacidades"];

    //echo "recibida opcion= ". $op. ", id= ".$id.", nombre= ".$nombre.",ruc= ".$ruc.", telefono1=".$telefono1." telefono2=".$telefono2." email=".$email." web=".$pagweb." fan=".$fanpage." capac".$capacidad." lati=".$latitud." longi=".$longitud." ciu=".$idciudad." ba=".$idbarrio." call=".$idcalle;
    PersonaControlador::registrarPersona($op, $id, $nombres, $apellidoPaterno, $apellidoMaterno, $idfamilia,
    $relacionfamiliar, $sexo, $idcalle, $idciudad, $codigopostal, $idbarrio, $estadopersonal, $email, $fechanac, $lugarnac,
    $estadocivil, $idnacionalidad, $cedula, $contenido, $idprofesion, $lugartrabajo, $puesto, $tipsangre, $alergias, $capacidades,
    $motivosalida, $fechasalida);
  }else {
    echo "error en controlador";
  }
}

?>
