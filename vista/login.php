<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingreso</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php //echo DIR_RAIZ . "validaciones/gestionar_usuarios/revisarUsuario.php"; ?>">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ingrese su usuario" name="nick" id="nick" type="text" autofocus style="text-transform: lowercase" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ingrese su clave" name="clave" id="clave" type="password" value="" style="text-transform: lowercase">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Recordar
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <!--<a href="#" class="btn btn-lg btn-success btn-block">Iniciar Sesión</a>-->
                                <button type="button" class="btn btn-success btn-block btn-lg" id="btnIniciaSesion">Iniciar Sesión</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- alertas -->
                <?php include VALIDACIONES . "alertas/alertas.php" ?>
            </div>
        </div>
    </div>
    <?php include PARTIALS_PATH . "footer.php" ?>
    <script src="<?php echo DIR_RAIZ . "recursos/js/usuarios.js" ?>"></script>
</body>
</html>