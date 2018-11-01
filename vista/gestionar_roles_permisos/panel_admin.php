<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php
//session_start();
//if (isset($_SESSION["usuario"])) {
//    if ($_SESSION["usuario"]["grupo"] == "ADMINISTRADOR") {
//        header("location:".DIR_RAIZ."index.php");
//    }
//} else {
//    header("location:".DIR_RAIZ."vista/login.php");
//}
//
?>
<?php include PARTIALS_PATH . "menu.php" ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Administrar Roles y Permisos</h1>
            <h2 class="page-header">Bienvenido <?php echo $_SESSION["usuario"]["nombre"] ?></h2>
            <p>Panel de Control | <label class="label label-info"><?php echo $_SESSION["usuario"]["grupo"] ?></label></p>
        </div>
        <!-- /.col-lg-12 -->
    </div>    
    <!-- alertas -->
<?php //include VALIDACIONES . "alertas/alertas.php"    ?>
    <div class="row">
        <!-- Carga botonera -->
<?php include VISTA_PATH . "gestionar_roles_permisos/botones_cabecera.php" ?>

        <!-- Inicio de la tabla -->    
<?php include VISTA_PATH . "gestionar_roles_permisos/tabla_permisos.php" ?>
    </div>
    <div class="row">
        <?php include VISTA_PATH . "gestionar_roles_permisos/modal_formulario.php" ?>
    </div>

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
<script src="<?php echo DIR_RAIZ . "recursos/js/roles_permisos.js" ?>"></script>
</body>
</html>
