<?php

/*
Funciona para validar y limpiar $campo
paramentro input $campo tipo post
retorna string
 */
function validar_campo($campo) {
  $campo =  trim($campo);
  $campo =  stripcslashes($campo);
  $campo =  htmlspecialchars($campo);

  return $campo;
}

 ?>
