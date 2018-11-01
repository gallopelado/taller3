<?php
include '../../controlador/FamiliaControlador.php';
include '../../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && isset($_POST['nombre'])
  && isset($_POST['nombre']) && isset($_POST['nombre'])) {
    $op = validar_campo($_POST['op']);
    $id = (int)$_POST['id'];
    $nombre = validar_campo($_POST['nombre']);
    $idcalle = $_POST['cbodireccion'];
    $idciudad =  $_POST['cbociudad'];
    $codpostal = $_POST['codpostal'];
    $telefono = $_POST['telefono'];
    $idorigen = $_POST['cboorigen'];
    // echo "recibida opcion= ". $op. " id= ".$id." descri= ".$nombre;
    FamiliaControlador::registrarFamilia($op, $id, $nombre, $idcalle, $idciudad,
    $codpostal, $telefono, $idorigen);
  } else {
    echo "error en controlador";
  }
}

?>
