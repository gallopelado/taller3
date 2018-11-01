<?php
include '../../controlador/BarrioControlador.php';
// include '../helps/helps.php';

header('Content-type: application/json');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['descripcion'])) {
    $descripcion = $_POST['descripcion']?$_POST['descripcion']:0;
    // echo "descripcion= ".$descripcion;
    $fila = BarrioControlador::obtenerDescripcion($descripcion);
    print json_encode($fila);
  }
}

?>
