<div class="row" id="panelFormularioRegistro">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Formulario de ingreso
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#panelFormulario" data-toggle="tab">Ingreso de Datos</a></li>
          <li class=""><a href="#panelListaMinisteriosTrabaja" data-toggle="tab">Ministerios donde trabaja</a></li>
          <li class=""><a href="#panelClasesCursadas" data-toggle="tab">Clases Cursadas</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane fade in active" id="panelFormulario">
            <form action="" class="form-horizontal">
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
                  <label for="optRequisito" class="col-lg-2 control-label">Elegir requisito:</label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" id="txtRequisitoAnt" style="display:NONE" disabled>
                    <select class="form-control" name="optRequisito" id="optRequisito"></select>
                    <p class="help-block" id="avRequisito"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="form-group">
                    <label for="txtFechaCompletado" class="col-lg-2 control-label">Fecha completado:</label>
                    <div class="col-lg-3" id="">
                      <input type="text" class="form-control" name="txtFechaCompletado" id="txtFechaCompletado" autofocus>
                      <p class="help-block" id="avFecha"></p>
                    </div>
                  </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <label for="" class="col-lg-2 control-label">Completado:</label>
                  <div class="col-lg-3" id="">
                    <label for="" class="radio-inline">
                      <input type="radio" name="rdbCompletado" id="rdbCompletadoSi" value="SI" checked>SI
                    </label>
                    <label for="" class="radio-inline">
                      <input type="radio" name="rdbCompletado" id="rdbCompletadoNo" value="NO">NO
                    </label>
                  </div>
                </div>
              </div>
            </form>
          </div><!--Fin del tab formulario -->
          <?php include VALIDACIONES."gestionar_historico_afiliante/ministerios_donde_trabaja.php" ?>
          <?php include VALIDACIONES."gestionar_historico_afiliante/clases_cursadas.php" ?>
        </div>
      </div>
    </div>
  </div>
</div>
