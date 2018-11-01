<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestionar postulación</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- Carga de formulario de ingreso -->
    <?php include VALIDACIONES . "gestionar_postulacion/formulario_registro.php" ?>
    
    <!--Buscador-->
    <?php include VALIDACIONES . "gestionar_postulacion/modal_postulante.php" ?>

    <!-- alertas -->
    <?php include VALIDACIONES . "alertas/alertas.php" ?>

    <!--Carga asignados-->
    <?php include VALIDACIONES . "gestionar_postulacion/lista_asignados.php" ?>
    
    <!-- Carga botonera -->
    <?php include VALIDACIONES . "gestionar_postulacion/botones_registro.php" ?>

    <!-- Inicio de la tabla -->
    <?php //include VALIDACIONES . "gestionar_postulacion/botones_cabecera.php" ?>
    <?php include VALIDACIONES . "gestionar_postulacion/lista_postulacion.php" ?>

    <!-- Inicio visor historico -->
    <?php include VALIDACIONES . "gestionar_postulacion/visor.php" ?>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper del menu -->

<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ . "recursos/vendor/jquery-ui/jquery-ui.min.js" ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/dataTables.bootstrap.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/dataTables.buttons.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/buttons.bootstrap.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . "recursos/js/gestionar_postulacion.js" ?>"></script>
</body>
</html>
