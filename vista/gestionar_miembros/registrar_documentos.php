<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registrar Documentos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- Carga de formulario de ingreso -->
            <?php include VALIDACIONES."registrar_documentos/formulario_registro.php" ?>

            <!-- Carga tabla de requisitos -->
            <?php include VALIDACIONES."registrar_documentos/lista_documentos.php" ?>

            <!-- alertas -->
            <?php include VALIDACIONES."alertas/alertas.php" ?>

            <!-- Carga botonera -->
            <?php include VALIDACIONES."registrar_documentos/botones_registro.php" ?>

            <!-- Inicio de la tabla personas -->
            <?php include VALIDACIONES."registrar_documentos/lista_personas.php" ?>

            <!-- Inicio visor historico -->
            <?php include VALIDACIONES."registrar_documentos/visor_historico.php" ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper del menu -->

<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ."recursos/vendor/jquery-ui/jquery-ui.min.js" ?>"></script>
<script src="<?php echo DIR_RAIZ.'recursos/vendor/datatable/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ.'recursos/vendor/datatable/dataTables.bootstrap.js' ?>"></script>
<script src="<?php echo DIR_RAIZ.'recursos/vendor/datatable/dataTables.buttons.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ.'recursos/vendor/datatable/buttons.bootstrap.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ."recursos/js/registrar_documentos.js" ?>"></script>
</body>
</html>
