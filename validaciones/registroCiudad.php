<?php
include '../controlador/CiudadControlador.php';
include '../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && isset($_POST['descripcion'])) {
    $op = $_POST['op'];
    $id = $_POST['id']?$_POST['id']:0;
    $descripcion = $_POST['descripcion'];
    echo "recibida opcion= ". $op. " id= ".$id." descri= ".$descripcion;
    CiudadControlador::registrarCiudad($op, $id, $descripcion);
  }
}

?>
