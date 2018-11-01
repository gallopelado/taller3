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
                            <label for="txtIdComite" class="col-lg-2 control-label">id Comité:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" name="txtIdComite" id="txtIdComite" disabled>
                                <p class="help-block" id="avIdComite"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtComite" class="col-lg-2 control-label">Elegir Comité: </label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtComite" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarComite" data-target="#modal_comite" onclick="listar_busqueda_comites()"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <p class="help-block" id="avComite"></p>
                            </div>
                        </div>
                    </div>                    
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtDescri" class="col-lg-2 control-label">Descripción:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="txtDescri" id="txtDescri">
                                <p class="help-block" id="avDescri"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtDoc" class="col-lg-2 control-label">Subir Documento: </label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="file" class="form-control btn btn-default" id="txtDoc">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal" id=""><i class="fa fa-save"></i>
                                        </button>
                                    </span>
                                </div>
                                <p class="help-block" id="avDoc"></p>
                            </div>
                        </div>
                    </div> 
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtVacancia" class="col-lg-2 control-label">Vacancias:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" name="txtVacancia" id="txtVacancia">
                                <p class="help-block" id="avVacancia"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="optCargo" class="col-lg-2 control-label">Puesto/Cargo:</label>
                            <div class="col-lg-6">                                
                                <select class="form-control" name="optCargo" id="optCargo"></select>
                                <p class="help-block" id="avCargo"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtInicioPostu" class="col-lg-2 control-label" onkeypress="return false">Inicio Postulación:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="txtInicioPostu" id="txtInicioPostu" disabled>
                                <p class="help-block" id="avInicioPostu"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtFinPostu" class="col-lg-2 control-label" onkeypress="return false">Fin Postulación:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" name="txtFinPostu" id="txtFinPostu" disabled>
                                <p class="help-block" id="avFinPostu"></p>
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
