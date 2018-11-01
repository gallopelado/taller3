<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mantener Personas</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row" id="rowBotones">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Formulario
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                          <button type="button" class="nuevo btn btn-primary btn-block" id="btnNueva" onclick="nuevo()">
                            Nueva Persona
                          </button>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                          <button type="button" class="nuevo btn btn-primary btn-block" data-toggle="modal" data-target="#modalBusqueda" id="btnModalBuscar" onclick="buscarDescripcion()">
                            Consultar
                          </button>
                        </div>
                      </div>
                      <!-- Fin de los botones -->
                      <!-- Modal de busqueda -->
                      <div class="modal fade" id="modalBusqueda">
                        <div class="modal-dialog modal-lg">
                          <div class="modal-content">
                              <!-- Modal Header -->
                              <div class="modal-header">
                                <button type="button" class="close" id="" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Buscar</h4>
                              </div>
                              <!-- Modal body -->
                              <div class="modal-body">
                                <form action="">
                                  <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                      <div class="form-group search">
                                        <!-- <label for="txtbusqueda">Buscar</label> -->
                                        <span class="fa fa-circle-o-notch fa-spin" id="cargando"></span>
                                        <input  type="text" class="form-control" id="buscar" name="txtBuscar" aria-describedby="buscar" placeholder="Buscar...">
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <!-- Modal footer -->
                              <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-primary btn-block" id="btnBuscar">Buscar en BD</button> -->
                              </div>
                                <!-- tabla busquedas  -->
                                <div class="row" id="divBusqueda">
                                  <div class="col-lg-12">
                                    <div class="pane panel-default">
                                      <div class="panel-heading">Resultados</div>
                                      <div class="panel-body">
                                        <div class="table-responsive">
                                          <table class="table table-striped" id="tblBusqueda">
                                            <thead class="thead-dark">
                                              <tr>
                                                <th>Id</th>
                                                <th>Descripcion</th>
                                                <th>Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody id="tabla_buscar_body">
                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      <!-- </div> -->
                      <!-- Fin del Modal de busqueda -->
                      <br>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <!-- Formulario  -->
        <?php include VALIDACIONES . "persona/formulario_persona.php" ?>
        <!-- Fin del Formulario -->
        <!-- botones para guardar/modificar -->
        <div class="row" id="operaciones">
          <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">Operaciones</div>
            <div class="panel-body">
              <button type="button" class="btn btn-primary btn-block" id="btnGuardar" onclick="clickGuardar()">Guardar</button>
              <button type="button" class="btn btn-primary btn-block" id="btnModificar" onclick="clickModificar()">Modificar</button>
              <button type="button" class="btn btn-warning btn-block" id="btnCancel" onclick="volverMenu()">Cancelar</button>
            </div>
          </div>
          </div>
        </div>
        <!-- fin de los botones -->
        <!-- alerta -->
        <div class="alert alert-success alert-dismissable" id="alertExito">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Operación exitosa.
        </div>
        <div class="alert alert-danger alert-dismissable" id="alertBaja">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Borraste un registro.
        </div>
        <div class="alert alert-warning alert-dismissable" id="alertReferenciada">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                No se puede borrar, registro esta referenciado.
        </div>
        <br>
          <!-- Inicio de la tabla  -->
        <div class="row" id="rowResultados">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                  Resultados
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="tblPersonas">
                    <thead class="thead-dark">
                      <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Cedula</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="tabla_body">
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin de la tabla ciudades -->
        <!-- Visor de personas -->
        <?php include VALIDACIONES . "persona/visor_persona.php" ?>
        <!-- Fin del visor -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper del menu -->

<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ."recursos/vendor/jquery-ui/jquery-ui.min.js" ?>"></script>
<script src="<?php echo DIR_RAIZ."recursos/js/persona.js" ?>"></script>
</body>
</html>
