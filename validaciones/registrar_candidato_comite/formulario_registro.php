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
                            <label for="txtIdMiembro" class="col-lg-2 control-label">id Miembro:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" name="txtIdMiembro" id="txtIdMiembro" disabled>
                                <p class="help-block" id="avIdMiembro"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtMiembro" class="col-lg-2 control-label">Elegir miembro: </label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtMiembro" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarMiembro" data-target="#modal_miembro" onclick="listar_busqueda_miembros()"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <p class="help-block" id="avPersona"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-lg-3">
                            <h4><strong>Cualidades personales</strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8" id="">
                            <textarea class="form-control" id="txtCualidades" rows="4"></textarea>
                            <p class="help-block" id="avCualidades"></p>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-lg-3">
                            <h4><strong>Actitudes ministeriales</strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8" id="">
                            <textarea class="form-control" id="txtActitudes" rows="4"></textarea>
                            <p class="help-block" id="avMinisterial"></p>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-lg-3">
                            <h4><strong>Antecedentes</strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8" id="">
                            <textarea class="form-control" id="txtAntecedentes" rows="4"></textarea>
                            <p class="help-block" id="avAntecedentes"></p>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtFecha" class="col-lg-2 control-label">Fecha:</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="txtFecha" id="txtFecha" disabled>
                                <p class="help-block" id="avFecha"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtServir" class="col-lg-2 control-label">Desea servir en:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="txtServir" id="txtServir">
                                <p class="help-block" id="avServir"></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
