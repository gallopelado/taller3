<?php
include '../../controlador/SedeControlador.php';
include '../../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && 
  isset($_POST['nombre']) && isset($_POST['ruc'])&& 
  isset($_POST['capacidad']) && isset($_POST['telefono1']) 
  && isset($_POST['cbociudad']) && isset($_POST['cbobarrio']) && 
  isset($_POST['cbocalle'])) {
    $op = validar_campo($_POST['op']);
    $id = (int)$_POST['id']?$_POST['id']:0;
    $nombre = validar_campo($_POST['nombre']);
    $ruc = $_POST['ruc'];
    $telefono1 = $_POST['telefono1'];
    $telefono2 = isset($_POST['telefono2'])?$_POST['telefono2']:null;
    $email = isset($_POST['email'])?$_POST['email']:null;
    $pagweb = isset($_POST['pagweb'])?$_POST['pagweb']:null;
    $fanpage = isset($_POST['fanpage'])?$_POST['fanpage']:null;
    $capacidad = (int)$_POST['capacidad'];
    $latitud = isset($_POST['latitud'])?$_POST['latitud']:null;
    $longitud = isset($_POST['longitud'])?$_POST['longitud']:null;
    $idciudad = $_POST['cbociudad'];
    $idbarrio = $_POST['cbobarrio'];
    $idcalle = $_POST['cbocalle'];
    //echo "recibida opcion= ". $op. ", id= ".$id.", nombre= ".$nombre.",ruc= ".$ruc.", telefono1=".$telefono1." telefono2=".$telefono2." email=".$email." web=".$pagweb." fan=".$fanpage." capac".$capacidad." lati=".$latitud." longi=".$longitud." ciu=".$idciudad." ba=".$idbarrio." call=".$idcalle;
    SedeControlador::registrarSede($op, $id, $nombre, $ruc, $telefono1,
    $telefono2, $email, $pagweb, $fanpage, $capacidad, $latitud, $longitud,
    $idciudad, $idbarrio, $idcalle);
  }else {
    echo "error en controlador";
  }
}

?>
