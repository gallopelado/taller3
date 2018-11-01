<?php
include '../../controlador/TelefonoControlador.php';
// include '../../helps/helps.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['op']) && isset($_POST['id']) && isset($_POST['telefono'])) {
    $op           = $_POST['op'];
    $id           = $_POST['id']?$_POST['id']:0;
    $tipo         = $_POST['tipo'];
    $telefono     = $_POST['telefono'];
    $id_persona   = $_POST['idpersona'];
    // echo "recibida opcion= ". $op. " id= ".$id." tipo= ".$tipo." telefono= ".$telefono." idpersona= ".$id_persona;
    TelefonoControlador::registrarTelefono($op, $id, $tipo, $telefono, $id_persona);
  } else {
    echo "Error en registrarTelefono";
  }
}

?>
