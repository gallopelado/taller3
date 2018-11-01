<?php

include '../../controlador/PersonaControlador.php';

// echo var_dump($_POST);
// echo var_dump($_FILES);
$id = $_POST['id'];

PersonaControlador::eliminaFoto($id);


?>
