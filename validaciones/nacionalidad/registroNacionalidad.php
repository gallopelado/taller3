<?php
include '../../controlador/NacionalidadControlador.php';
include '../../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && isset($_POST['descripcion'])) {
    $op = validar_campo($_POST['op']);
    $id = validar_campo($_POST['id']?$_POST['id']:0);
    $descripcion = validar_campo($_POST['descripcion']);
    //echo "recibida opcion= ". $op. " id= ".$id." descri= ".$descripcion;
    NacionalidadControlador::registrarNacionalidad($op, $id, $descripcion);
  }
}

?>
