<?php

include '../../controlador/PersonaControlador.php';

// header('Content-type: application/json');
// echo var_dump($_POST);
// echo var_dump($_FILES);
$id = $_POST['id'];
if(isset($_POST["foto"]) == "null") {
  $contenido = null;
} else {
  $cargarFoto             = $_FILES["foto"]["tmp_name"];
  $tamanho                = $_FILES["foto"]["size"];
  $foto                   = fopen($cargarFoto, "rb");
  $contenido              = fread($foto, $tamanho);
  fclose($foto);
}

PersonaControlador::actualizaFoto($id, $contenido);


?>
