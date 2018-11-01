<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; 
session_start();
session_destroy();
session_unset();

header("location:".DIR_RAIZ."vista/login.php");

