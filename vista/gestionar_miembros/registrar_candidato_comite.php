<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Registrar candidatos</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- Carga de formulario de ingreso -->
    <?php include VALIDACIONES . "registrar_candidato_comite/formulario_registro.php" ?>
    
    <!--Buscador-->
    <?php include VALIDACIONES . "registrar_candidato_comite/modal_miembro.php" ?>

    <!-- alertas -->
    <?php include VALIDACIONES . "alertas/alertas.php" ?>

    <!-- Carga botonera -->
    <?php include VALIDACIONES . "registrar_candidato_comite/botones_registro.php" ?>

    <!-- Inicio de la tabla personas -->
    <?php include VALIDACIONES . "registrar_candidato_comite/botones_cabecera.php" ?>
    <?php include VALIDACIONES . "registrar_candidato_comite/lista_candidato.php" ?>

    <!-- Inicio visor historico -->
    <?php include VALIDACIONES . "registrar_candidato_comite/visor.php" ?>
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
<script src="<?php echo DIR_RAIZ . "recursos/js/registrar_candidato_comite.js" ?>"></script>
</body>
</html>
