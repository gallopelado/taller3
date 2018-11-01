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
                <p class="help-block" id="avIdPersona"></p>
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
                <label for="txtFecha" class="col-lg-2 control-label">Fecha de bautizo:</label>
                <div class="col-lg-3" id="">
                  <input type="text" class="form-control" id="txtFecha" autofocus>
                  <p class="help-block" id="avFecha"></p>
                </div>
              </div>
          </div>
          <div class="row">
            <button type="button" class="col-lg-2 btn btn-primary" id="btnTutor1" data-toggle="modal" data-target="#modal_tutor1" onclick="listar_tutor1_buscador()">Elegir Tutor1</button>
              <div class="form-group">
                <div class="col-lg-5" id="">
                  <input type="text" class="form-control" id="txtIdTutor1" style="display:None" disabled autofocus>
                  <input type="text" class="form-control" id="txtTutor1" disabled autofocus>
                  <p class="help-block" id="avTutor1"></p>
                </div>
              </div>
          </div>
          <div class="row">
            <button type="button" class="col-lg-2 btn btn-primary" id="btnTutor2" data-toggle="modal" data-target="#modal_tutor2" onclick="listar_tutor2_buscador()">Elegir Tutor2</button>
              <div class="form-group">
                <div class="col-lg-5" id="">
                  <input type="text" class="form-control" id="txtIdTutor2" style="display:None" disabled autofocus>
                  <input type="text" class="form-control" id="txtTutor2" disabled autofocus>
                  <p class="help-block" id="avTutor2"></p>
                </div>
              </div>
          </div>
          <div class="row">
            <button type="button" class="col-lg-2 btn btn-primary" id="btnPastor" data-toggle="modal" data-target="#modal_pastor" onclick="listar_pastor_buscador()">Elegir Pastor</button>
              <div class="form-group">
                <div class="col-lg-5" id="">
                  <input type="text" class="form-control" id="txtIdPastor" style="display:None" disabled autofocus>
                  <input type="text" class="form-control" id="txtPastor" disabled autofocus>
                  <p class="help-block" id="avPastor"></p>
                </div>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
