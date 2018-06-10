<?php

class Conexion {

  public static function conectar() {
    try {
      $cn = new PDO("pgsql:host=localhost; dbname=iglesia_iec", "juandba", "admin");
      return $cn;
    } catch (PDOException $e) {
      die($e->getMessage());
    }

  }
}

?>
