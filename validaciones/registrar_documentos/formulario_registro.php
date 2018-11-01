<div class="row" id="panelFormularioRegistro">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Formulario de ingreso
      </div>
      <div class="panel-body">
        <form action="" class="form-horizontal">
          <div class="row" id="" style="display:None">
            <div class="form-group">
              <label for="txtId" class="col-lg-2 control-label">id:</label>
              <div class="col-lg-2">
                <input type="number" class="form-control" id="txtId" disabled>
              </div>
            </div>
          </div>
          <div class="row" id="" style="display:None">
            <div class="form-group">
              <label for="txtIdPersona" class="col-lg-2 control-label">id Persona:</label>
              <div class="col-lg-2">
                <input type="number" class="form-control" name="txtIdPersona" id="txtIdPersona" disabled>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="form-group">
                <label for="txtPersona" class="col-lg-2 control-label">Persona:</label>
                <div class="col-lg-6" id="">
                  <input type="text" class="form-control" name="txtPersona" id="txtPersona" disabled autofocus>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="form-group">
                <label for="txtCi" class="col-lg-2 control-label">Cédula:</label>
                <div class="col-lg-3" id="">
                  <input type="text" class="form-control" name="txtCi" id="txtCi" disabled autofocus>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="txtFichero" class="col-lg-2 control-label">Cargar documento:</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" id="txtFichero" >
                <p class="help-block" id="avDocumento"></p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="optTipoDocumento" class="col-lg-2 control-label">Tipo de documento:</label>
              <div class="col-lg-6">
                <select class="form-control" id="optTipoDocumento"></select>
                <p class="help-block" id="avTipoDocumento"></p>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="form-group">
                <label for="txtObs" class="col-lg-2 control-label">Observación:</label>
                <div class="col-lg-6" id="">
                  <textarea class="form-control" id="txtObs" rows="4"></textarea>
                  <p class="help-block" id="avObs"></p>
                </div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
