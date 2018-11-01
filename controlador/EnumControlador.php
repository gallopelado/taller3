<?php

include '../../datos/Enums.php';

class EnumControlador {

  public function obtenerEnum($entidad) {
    return Enums::getEnum($entidad);
    Enums::desconectar();
  }

}

?>
