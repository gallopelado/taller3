<div class="row" id="panelFormularioRegistro">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Formulario de ingreso
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal">
                    
                    <div class="row" id="" style="display:none">
                        <div class="form-group">
                            <label for="txtId" class="col-lg-2 control-label">id:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" id="txtId" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="" style="display:none">
                        <div class="form-group">
                            <label for="txtIdPostulacion" class="col-lg-2 control-label">idPostulacion:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" id="txtIdPostulacion" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="" style="display:visible">
                        <div class="form-group">
                            <label for="txtPostulacion" class="col-lg-2 control-label">Postulación:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="txtPostulacion" disabled>
                            </div>
                        </div>
                    </div>                                         

                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtFinPostu" class="col-lg-2 control-label">Finalizó el:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="txtFinPostu" disabled>
                                <p class="help-block" id="avFinPostu"></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtCupo" class="col-lg-2 control-label">Cupos:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="txtCupo" disabled>
                                <p class="help-block" id="avCupo"></p>
                            </div>
                        </div>
                    </div> 
                    
                     <div class="row" id="ListaAdmitidos" style="display:none">
                        <div class="form-group">
                            <label for="" class="col-lg-2 control-label"></label>
                            <div class="col-lg-2">
                                <button type="button" class="btn btn-primary" id="btnListaAdmitidos" data-toggle="modal" data-target="#modal_admitidos">Ver lista de admitidos</button>                               
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
