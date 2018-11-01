<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mantener Telefonos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default" id="panelCentral">
                        <div class="panel-heading">
                            Formulario
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                              <button type="button" class="btn btn-primary btn-block" data-toggle="modal"  data-target="#myModal" onclick="nuevo()" id="btnNueva">
                                Nuevo Telefono
                              </button>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalBusqueda" id="btnModalBuscar">
                                Consultar
                              </button>
                            </div>
                          </div>
                          <!-- Fin de los botones -->
                          <!-- inicio del Modal Formulario -->
                          <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title">Gestionar Telefono</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Ingrese los datos
                                        </div>
                                        <div class="panel-body">
                                          <div class="row">
                                            <div class="col-lg-12">
                                              <form role="form">
                                                <div class="form-group" id="divid">
                                                  <label for="id" id="labelid">id</label>
                                                  <input type="text" class="form-control" id="id" name="txtId" aria-describedby="emailHelp" placeholder="" disabled>
                                                </div>
                                                <div class="form-group">
                                                  <label for="telefono">Numero de telefono</label>
                                                  <input type="text" class="form-control" id="telefono" name="txtTelefono" aria-describedby="telefono" placeholder="" required autofocus/>
                                                  <p class="help-block" id="avTelefono"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="tipotelefono">Elegir tipo de telefono</label>
                                                  <select class="form-control" id="tipotelefono"></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="persona">Elegir Persona</label>
                                                    <select class="form-control" id="persona"></select>
                                                </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                      <button type="button" class="btn btn-primary btn-block" id="btnGuardar" onclick="clickGuardar()">Guardar</button>
                                      <button type="button" class="btn btn-primary btn-block" id="btnMod" onclick="clickMod()" >Modificar</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- Fin del Modal Formulario -->
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
                                  <div class="modal-body jumbotron">
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
                                        <button type="button" class="btn btn-primary btn-block" id="btnBuscar">Buscar en BD</button>
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
                                                    <th>Pertenece a</th>
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
              <!-- Inicio de la tabla ciudades -->
            <div class="row" id="tablaResultados">
              <div class="col-lg-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      Resultados
                  </div>
                  <div class="panel-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="tblNac">
                        <thead class="thead-dark">
                          <tr>
                            <th>Id</th>
                            <th>Tipo</th>
                            <th>Descripcion</th>
                            <th>Pertenece a</th>
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
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper del menu -->

<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ."recursos/js/telefono.js" ?>"></script>
</body>
</html>
