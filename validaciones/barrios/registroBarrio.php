<?php
include '../../controlador/BarrioControlador.php';
include '../../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && isset($_POST['descripcion']) && isset($_POST['idciudad'])) {
    $op = validar_campo($_POST['op']);
    $id = validar_campo($_POST['id']?$_POST['id']:0);
    $descripcion = validar_campo($_POST['descripcion']);
    $idciudad = validar_campo($_POST['idciudad']?$_POST['idciudad']:0);
    //echo "recibida opcion= ". $op. " id= ".$id." descri= ".$descripcion." idciudad= ".$idciudad;
    BarrioControlador::registrarBarrio($op, $id, $descripcion, $idciudad);
  }
}

?>
