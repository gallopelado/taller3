<?php

class Conexion {

  public static function conectar() {
    try {
      $cn = new PDO("pgsql:host=localhost; dbname=iglesia_iec", "juandba", "admin");
      $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $cn;
    } catch (PDOException $e) {
      die($e->getMessage());
    }

  }
}

?>
