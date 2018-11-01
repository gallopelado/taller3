<?php
include '../../controlador/MinisterioControlador.php';
// include '../helps/helps.php';

header('Content-type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion']?$_POST['descripcion']:0;
    // echo "descripcion= ".$descripcion;
    $fila = MinisterioControlador::obtenerDescripcion($descripcion);
    print json_encode($fila);
  }
}

?>
