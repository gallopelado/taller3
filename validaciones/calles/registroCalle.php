<?php
include '../../controlador/CalleControlador.php';
include '../../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && isset($_POST['descripcion']) && isset($_POST['idbarrio'])) {
    $op = validar_campo($_POST['op']);
    $id = validar_campo($_POST['id']?$_POST['id']:0);
    $descripcion = validar_campo($_POST['descripcion']);
    $idbarrio = validar_campo($_POST['idbarrio']?$_POST['idbarrio']:0);
    echo "recibida opcion= ". $op. " id= ".$id." descri= ".$descripcion." idbarrio= ".$idbarrio;
    CalleControlador::registrarCalle($op, $id, $descripcion, $idbarrio);
  }
}

?>
