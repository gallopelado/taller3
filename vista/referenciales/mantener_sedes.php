<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/iec_copia/dirs.php"; ?>
<?php include PARTIALS_PATH . "head.php" ?>
<?php

if(isset($_SESSION["usuario"])) {
    if($_SESSION["usuario"]["grupo"] == "ADMINISTRADOR") {
        
    } else {
        header("location:".DIR_RAIZ."vista/login.php");
    }
} else {
    header("location:".DIR_RAIZ."vista/login.php");
}

?>
<?php include PARTIALS_PATH . "menu.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mantener Sede</h1>
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
                                Nueva Sede
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
                                  <h4 class="modal-title">Gestionar Sede</h4>
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
                                                  <label for="ruc">RUC</label>
                                                  <input type="text" class="form-control" id="ruc" aria-describedby="ruc" placeholder="">
                                                  <p class="help-block" id="avRuc"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="capacidad">Capacidad</label>
                                                  <input type="number" class="form-control" id="capacidad" aria-describedby="capacidad" placeholder="" onkeypress="return validarNumericos(event)" onpaste="return false">
                                                  <p class="help-block" id="avCapacidad"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="tel01">Telefono 1</label>
                                                  <input type="tel" class="form-control" id="tel01" aria-describedby="tel01" placeholder="" onpaste="return false">
                                                  <p class="help-block" id="avTelefono1"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="tel02">Telefono 2</label>
                                                  <input type="tel" class="form-control" id="tel02" aria-describedby="tel02" placeholder="" onpaste="return false">
                                                  <p class="help-block" id="avTelefono2"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="email">Email</label>
                                                  <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="" onpaste="return false">
                                                  <p class="help-block" id="avEmail"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="paweb">Pagina web</label>
                                                  <input type="url" class="form-control" id="paweb" aria-describedby="paweb" placeholder="" onpaste="return false">
                                                  <p class="help-block" id="avPagweb"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="fpage">Fan Page</label>
                                                  <input type="url" class="form-control" id="fpage" aria-describedby="fpage" placeholder="" onpaste="return false">
                                                  <p class="help-block" id="avFanpage"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="latitud">Latitud</label>
                                                  <input type="number" class="form-control" id="latitud" aria-describedby="latitud" placeholder="" onkeypress="return validarNumericos(event)">
                                                  <p class="help-block" id="avLatitud"></p>
                                                </div>
                                                <div class="form-group">
                                                  <label for="longitud">Longitud</label>
                                                  <input type="number" class="form-control" id="longitud" aria-describedby="longitud" placeholder="" onkeypress="return validarNumericos(event)">
                                                  <p class="help-block" id="avLongitud"></p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="cbociudad">Elegir Ciudad</label>
                                                    <select class="form-control" id="cbociudad"></select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="cbobarrio">Elegir Barrio</label>
                                                  <select class="form-control" id="cbobarrio"></select>
                                                </div>
                                                <div class="form-group">
                                                  <label for="cbocalle">Elegir Calle</label>
                                                  <select class="form-control" id="cbocalle"></select>
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
                              <li class="list-group-item list-group-item-info"><span><strong>Nombre: </strong></span><span id="lblnombre"></span></li>
                              <li class="list-group-item"><span><strong>RUC: </strong></span><span id="lblruc"></span></li>
                              <li class="list-group-item"><span><strong>Capacidad: </strong></span><span id="lblcapacidad"></span></li>
                              <li class="list-group-item"><span><strong>Telefono1: </strong></span><span id="lbltel01"></span></li>
                              <li class="list-group-item"><span><strong>Telefono2: </strong></span><span id="lbltel02"></span></li>
                              <li class="list-group-item"><span><strong>Email: </strong></span><span id="lblemail"></span></li>

                            </ul>
                          </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="panel-body">
                            <ul class="list-group">
                            <li class="list-group-item"><span><strong>Pagina Web: </strong></span><span id="lblpagweb"></span></li>
                              <li class="list-group-item"><span><strong>Fan Page: </strong></span><span id="lblfpage"></span></li>
                              <li class="list-group-item"><span><strong>Latitud: </strong></span><span id="lbllatitud"></span></li>
                              <li class="list-group-item"><span><strong>Longitud: </strong></span><span id="lbllongitud"></span></li>
                              <li class="list-group-item"><span><strong>Ciudad: </strong></span><span id="lblciudad"></span></li>
                              <li class="list-group-item"><span><strong>Barrio: </strong></span><span id="lblbarrio"></span></li>
                              <li class="list-group-item"><span><strong>Calle: </strong></span><span id="lblcalle"></span></li>
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
<script src="<?php echo DIR_RAIZ."recursos/js/sede.js" ?>"></script>
</body>
</html>
