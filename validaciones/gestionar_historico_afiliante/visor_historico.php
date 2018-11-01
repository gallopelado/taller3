<div class="row" id="verReg">
  <div class="col-lg-12">
  <div class="panel panel-primary">
    <div class="panel-heading">Ver registro</div>
      <div class="panel-body">
          <div class="col-lg-12">
              <div class="panel-body">
                <ul class="list-group">
                  <li class="list-group-item"><span><strong>Persona: </strong></span><span id="lblpersona"></span></li>
                  <li class="list-group-item"><span><strong>Documento: </strong></span><span id="lblcedula"></span></li>
                </ul>
              </div>
          </div>
          <div class="col-lg-12">
              <div class="panel-body">
                <table class="table table-striped" id="tblVisorRequisitos" cellspacing="0" width="100%">
                  <thead class="thead-dark">
                    <tr>
                      <th>Id</th>
                      <th>Requisito</th>
                      <th>Estado completado</th>
                      <th>Fecha</th>
                    </tr>
                  </thead>
                  <tbody id="tbodyVisorRequisito">
                  </tbody>
                </table>
              </div>
          </div>
      </div>
      <div class="panel-footer">
        <button type="button" class="btn btn-primary" onclick="volverMenu()">Volver</button>
      </div>
    </div>
  </div>
</div>
