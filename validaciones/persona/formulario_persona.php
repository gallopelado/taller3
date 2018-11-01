<div class="row" id="grupoFormulario">
  <div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
          Ingrese datos
        </div>
        <div class="panel-body">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#seccion1" data-toggle="tab">Seccion 1</a>
            </li>
            <li id="sector2"><a href="#seccion2" data-toggle="tab" id="enlace2">Seccion 2</a>
            </li>
            <li><a href="#seccion3" data-toggle="tab">Seccion 3</a>
            </li>
            <li><a href="#seccion4" data-toggle="tab">Seccion 4</a>
            </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane fade in active" id="seccion1">
              <br>
              <form class="form-horizontal" role="form" enctype="multipart/form-data" id="form1">
                <div class="row" id="divid">
                    <div class="form-group">
                      <label for="id" class="col-lg-2 control-label">id:</label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control" name="txtId" id="id" disabled>
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                      <label for="nombres" class="col-lg-2 control-label">Nombres:</label>
                      <div class="col-lg-4" id="divnombre">
                        <input type="text" class="form-control" name="txtNombre" id="nombres" autofocus>
                        <p class="help-block" id="avNombres"></p>
                      </div>
                      <label for="familia" class="col-lg-2 control-label">Familia:</label>
                      <div class="col-lg-3">
                        <select class="form-control" name="familia" id="familia"></select>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="apellidoPaterno" class="col-lg-2 control-label">Apellido Paterno:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="txtapellidoPaterno" id="apellidoPaterno" autofocus>
                      <p class="help-block" id="avApellidopaterno"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="apellidoMaterno" class="col-lg-2 control-label">Apellido Materno:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="txtapellidoMaterno" id="apellidoMaterno" autofocus>
                      <p class="help-block" id="avApellidomaterno"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="relacionFamiliar" class="col-lg-2 control-label">Relacion Familiar:</label>
                    <div class="col-lg-3">
                      <select class="form-control" name="relacionfamiliar" id="relacionfamiliar"></select>
                    </div>
                    <label for="sexo" class="col-lg-2 control-label">Sexo:</label>
                    <div class="col-lg-3">
                      <div class="radio-inline">
                        <label>
                            <input type="radio" name="optsexo" id="optM" value="MASCULINO">Masculino
                        </label>
                      </div>
                      <div class="radio-inline">
                        <label>
                            <input type="radio" name="optsexo" id="optF" value="FEMENINO">Femenino
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="direccion" class="col-lg-2 control-label">Direccion:</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="direccion" id="direccion"></select>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="form-group">
                      <label for="ciudad" class="col-lg-2 control-label">Ciudad:</label>
                      <div class="col-lg-4">
                        <select class="form-control" name="ciudad" id="ciudad"></select>
                      </div>
                      <label for="codigopostal" class="col-lg-2 control-label">Codigo Postal:</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control" name="codigopostal" id="codigopostal" autofocus>
                        <p class="help-block" id="avCodigopostal"></p>
                      </div>
                    </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="barrio" class="col-lg-2 control-label">Barrio:</label>
                    <div class="col-lg-4">
                      <select class="form-control" name="barrio" id="barrio"></select>
                    </div>
                    <label for="estadopersonal" class="col-lg-2 control-label">Estado Personal:</label>
                    <div class="col-lg-3">
                      <select class="form-control" name="estadopersonal" id="estadopersonal"></select>
                    </div>
                  </div>
                </div>
                <div class="row" id="divestadopersonal">
                  <div class="form-group">
                    <label for="fsalida" class="col-lg-2 control-label">Fecha de salida:</label>
                    <div class="col-lg-2">
                      <input type="text" class="form-control" name="fsalida" id="fsalida">
                      <p class="help-block" id="avFechasalida"></p>
                    </div>
                    <label for="msalida" class="col-lg-2 control-label">Motivo de Salida:</label>
                    <div class="col-lg-5">
                      <input type="text" class="form-control" name="msalida" id="msalida">
                      <p class="help-block" id="avMotivosalida"></p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="seccion2">
              <h4>Telefonos</h4>
              <div class="panel panel-default">
                <div class="panel-body">
                  <table class="table table-striped" id="telefonos">
                    <thead>
                      <tr>
                        <th>Tipo</th>
                        <th>Telefono</th>
                      </tr>
                    </thead>
                    <tbody id="tbody_telefonos"></tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="tab-pane fade " id="seccion3">
              <h4>Sociales</h4>
              <hr>
              <form class="form-horizontal" role="form">
                <div class="row">
                  <div class="form-group">
                      <label for="foto" class="col-lg-2 control-label">Previsualizacion:</label>
                      <div class="col-lg-4">
                        <div id="cajaimagen"></div>
                      </div>
                  </div>

                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="foto" class="col-lg-2 control-label">Foto:</label>
                    <div class="col-lg-4">
                      <input type="file" class="form-control" name="foto" id="foto" autofocus>
                      <p class="help-block" id="avBotonesimagen"></p>
                    </div>
                    <div class="col-lg-4 btn-group">
                      <button type="button" class="btn btn-success btn-md" onclick="actualizaImagen()">Actualizar foto</button>
                      <button type="button" class="btn btn-danger btn-md" onclick="eliminaImagen()">Eliminar foto</button>
                      <p class="help-block" id=""></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email:</label>
                    <div class="col-lg-8">
                      <input type="email" class="form-control" name="email" id="email" autofocus>
                      <p class="help-block" id="avEmail"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="fechanac" class="col-lg-2 control-label">Fecha de Nacimiento:</label>
                    <div class="col-lg-2 " >
                      <input type="text" class="form-control date" name="fechanac" id="fechanac" autofocus>
                      <p class="help-block" id="avFechanac"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="lugarnac" class="col-lg-2 control-label">Lugar de Nacimiento:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control" name="lugarnac" id="lugarnac" autofocus>
                      <p class="help-block" id="avLugarnac"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="estadocivil" class="col-lg-2 control-label">Estado Civil:</label>
                    <div class="col-lg-3">
                      <select class="form-control" name="estadocivil" id="estadocivil"></select>
                    </div>

                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="nacionalidad" class="col-lg-2 control-label">Nacionalidad:</label>
                    <div class="col-lg-3">
                      <select class="form-control" name="nacionalidad" id="nacionalidad"></select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="cedula" class="col-lg-2 control-label">Cedula/Documento:</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control" name="cedula" id="cedula" autofocus>
                      <p class="help-block" id="avCedula"></p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade " id="seccion4">
              <form class="form-horizontal" role="form">
                <h4>Ocupacion</h4>
                <hr>
                <div class="row">
                  <div class="form-group">
                    <label for="profesion" class="col-lg-2 control-label">Profesion u oficio:</label>
                    <div class="col-lg-5">
                      <select class="form-control" name="profesion" id="profesion"></select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="lugarestudio" class="col-lg-2 control-label">Lugar de trabajo(centro de estudios):</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" name="lugarestudio" id="lugarestudio">
                      <p class="help-block" id="avLugarestudio"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="puesto" class="col-lg-2 control-label">Puesto que ocupa(Nivel Academico):</label>
                    <div class="col-lg-7">
                      <input type="text" class="form-control" name="puesto" id="puesto">
                      <p class="help-block" id="avPuesto"></p>
                    </div>
                  </div>
                </div>
                <hr>
                <h4>Datos de Salud</h4>
                <div class="row">
                  <div class="form-group">
                    <label for="tipsangre" class="col-lg-2 control-label">Tipo de sangre:</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control" name="tipsangre" id="tipsangre">
                      <p class="help-block" id="avTipsangre"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="alergias" class="col-lg-2 control-label">Alergias o indicaciones medicas:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="alergias" id="alergias">
                      <p class="help-block" id="avAlergias"></p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <label for="capacidades" class="col-lg-2 control-label">Capacidades diferentes o Especiales:</label>
                    <div class="col-lg-9">
                      <input type="text" class="form-control" name="capacidades" id="capacidades">
                      <p class="help-block" id="avCapacidades"></p>
                    </div>
                  </div>
                </div>
                <hr>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
