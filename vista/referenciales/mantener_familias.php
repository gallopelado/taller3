<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php include PARTIALS_PATH . "menu.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mantener Familias</h1>
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
                                Nueva Familia
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
                                  <h4 class="modal-title">Gestionar Familia</h4>
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
                                                  <label for="nombre">Nombre</label>
                                                  <input type="text" class="form-control" id="nombre" name="txtNombre" aria-describedby="nombre" placeholder="" required pattern="[A-Z]" onpaste="return false" autofocus/>
                                                  <p class="help-block" id="avNombre"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="cbocalle">Elegir Direccion</label>
                                                  <select class="form-control" id="cbocalle"></select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cbociudad">Elegir Ciudad</label>
                                                    <select class="form-control" id="cbociudad"></select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="nombre">Codigo Postal</label>
                                                  <input type="text" class="form-control" id="postal" name="txtCodpostal" aria-describedby="postal" placeholder="" onpaste="return false" autofocus/>
                                                  <p class="help-block" id="avPostal"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="telefono">Telefono </label>
                                                  <input type="tel" class="form-control" id="telefono" aria-describedby="telefono" placeholder="" onpaste="return false">
                                                  <p class="help-block" id="avTelefono"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cboorigen">Elegir Origen</label>
                                                    <select class="form-control" id="cboorigen"></select>
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
            <div class="row" id="verReg">
              <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">Ver registro</div>
                  <div class="panel-body">
                      <div class="col-lg-6">
                          <div class="panel-body">
                            <ul class="list-group">
                              <li class="list-group-item list-group-item-info"><span><strong>Familia: </strong></span><span id="lblnombre"></span></li>
                              <li class="list-group-item"><span><strong>Direccion: </strong></span><span id="lblcalle"></span></li>
                              <li class="list-group-item"><span><strong>Ciudad: </strong></span><span id="lblciudad"></span></li>
                              <li class="list-group-item"><span><strong>Codigo Postal: </strong></span><span id="lblpostal"></span></li>
                              <li class="list-group-item"><span><strong>Telefono: </strong></span><span id="lbltelefono"></span></li>
                              <li class="list-group-item"><span><strong>Originarios de: </strong></span><span id="lblorigen"></span></li>
                            </ul>
                          </div>
                      </div>
                  </div>
                  <div class="panel-footer">
                    <button type="button" class="btn btn-primary" onclick="volverMenu()">Volver</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper del menu -->

<?php include PARTIALS_PATH . "footer.php" ?>
<script src="<?php echo DIR_RAIZ."recursos/js/familia.js" ?>"></script>
</body>
</html>
