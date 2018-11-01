<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reportes de Afiliantes</h1>
        </div>            
    </div>
    <div class="row">
        <?php include VALIDACIONES . "reportes/afiliante/panelAfiliante_reporteTotal.php" ?>
        <?php include VALIDACIONES . "reportes/afiliante/panelAfiliante_reportePorFecha.php" ?>
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper del menu -->

<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ . "recursos/vendor/jquery-ui/jquery-ui.min.js" ?>"></script>
<script src="<?php echo DIR_RAIZ . "recursos/js/reportes/afilianteRep.js" ?>"></script>
</body>
</html>
