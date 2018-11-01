<?php
include "../../controlador/PostulacionCandidatoControlador.php";

$op = PostulacionCandidatoControlador::analizarNulos($_POST["op"]);
$idpostulacion = PostulacionCandidatoControlador::analizarNulos($_POST["idpostulacion"]);
$idpostulante = PostulacionCandidatoControlador::analizarNulos($_POST["idpostulante"]);

//echo "PHP opcion ".$op."\n";
//echo "PHP idpostulacion ".$idpostulacion."\n" ;
//echo "PHP idpostulante ".$idpostulante."\n";

return PostulacionCandidatoControlador::persistir($op, $idpostulacion, $idpostulante); 

/*
 *          op: opcion,
            idpostulacion: testeaNULL(this.idpostulacion.val()),
            postulacion: testeaNULL(this.postulacion.val()),
            idpostulante: testeaNULL(this.idpostulante.val()),
            postulante: testeaNULL(this.postulante.val()),
            fecha: testeaNULL(this.fecha.val())
 */
?>
