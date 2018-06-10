<?php include '../partials/head.php'; ?>



<div id="wrapper">

    <?php include '../partials/menu.php'; ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mantener Ciudades</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Formulario
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal" id="btnNueva">
                            Nueva Ciudad
                          </button>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalBusqueda">
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
                              <h4 class="modal-title">Gestionar Ciudad</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body jumbotron">
                              <form action="" method="post">
                                <div class="row">
                                  <div class="col-12 col-sm-12 col-md-4 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                      <label for="id">id</label>
                                      <input type="text" class="form-control" id="id" name="txtId" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                  </div>
                                  <div class="col-12 col-sm-12 col-md-8 col-lg-9 col-xl-10">
                                    <div class="form-group">
                                      <label for="id">Descripcion</label>
                                      <input type="text" class="form-control" id="descripcion" name="txtDescripcion" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                  <button type="button" class="btn btn-primary btn-block" id="btnGuardar" data-dismiss="modal">Guardar</button>
                                  <button type="button" class="btn btn-primary btn-block" id="btnMod" onclick="clickMod()" data-dismiss="modal">Modificar</button>
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
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">Buscar</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body jumbotron">
                              <form action="">
                                <div class="row">
                                  <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                      <label for="txtbusqueda">Buscar</label>
                                      <input type="text" class="form-control" id="txtbusqueda" aria-describedby="emailHelp" placeholder="">
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                  <button type="button" class="btn btn-primary btn-block">Buscar en BD</button>
                            </div>
                          </div>
                        </div>
                      </div>
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
          <!-- Inicio de la tabla ciudades -->
        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                  Resultados
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="tblCiudad">
                    <thead class="thead-dark">
                      <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="tabla_ciudad_body">
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
<!-- /#wrapper -->

<?php include '../partials/footer.php'; ?>
<?php include '../jsOperacionales/ciudadOperacional.php'; ?>
<?php include '../partials/finalizador.php'; ?>
