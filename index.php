<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php
//session_start();

if(isset($_SESSION["usuario"])) {
    
} else {
    header("location:".DIR_RAIZ."vista/login.php");
}

?>
<?php include PARTIALS_PATH . "menu.php" ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Informaciones del Sistema</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php if($_SESSION["usuario"]["grupo"] == "ADMINISTRADOR") { ?>
        <?php include VALIDACIONES . "principal/panelEstado.php" ?>
        <?php } ?>
    </div>

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/jquery.dataTables.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/dataTables.bootstrap.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/dataTables.buttons.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . 'recursos/vendor/datatable/buttons.bootstrap.min.js' ?>"></script>
<script src="<?php echo DIR_RAIZ . "validaciones/principal/principal.js" ?>"></script>
</body>
</html>
