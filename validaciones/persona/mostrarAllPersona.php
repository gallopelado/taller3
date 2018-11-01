<?php

include '../../controlador/PersonaControlador.php';
// echo get_include_path();
// echo "<br>".__DIR__;
header('Content-type: application/json');
// header('Content-type: image/jpeg');


$persona = PersonaControlador::obtenerAllPersona();

// while($fila=$persona->fetch(PDO::FETCH_ASSOC)) {
//   echo "<br>".$fila['per_id']." ".$fila['per_nombre'];
//
//   echo "<img src='data:image/jpeg; base64, " . $fila['foto'] . "'>";
//
// }
// return print json_encode($persona);
return print $persona;

?>
