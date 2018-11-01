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
                            <label for="txtIdPersona" class="col-lg-2 control-label">id Persona:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" name="txtIdPersona" id="txtIdPersona" disabled>
                                <p class="help-block" id="avIdPersona"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtPersona" class="col-lg-2 control-label">Elegir persona: </label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtPersona" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarPersona" data-target="#modal_persona" onclick="listar_Persona_buscador()"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <p class="help-block" id="avPersona"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">                        
                        <div class="col-lg-3">
                            <h4><strong>Razones de la alta</strong></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="" class="col-lg-1 control-label"></label>
                            <div class="col-lg-5" id="">
                                <label for="rdbBautismo" class="radio-inline">
                                    <input type="radio" name="rdbAlta" id="rdbBautismo" value="BAUTISMO" checked>BAUTISMO
                                </label>
                                <label for="rdbTestimonio" class="radio-inline">
                                    <input type="radio" name="rdbAlta" id="rdbTestimonio" value="TESTIMONIO">TESTIMONIO
                                </label>
                                <label for="rdbTransferencia" class="radio-inline">
                                    <input type="radio" name="rdbAlta" id="rdbTransferencia" value="TRANSFERENCIA">TRANSFERENCIA
                                </label>
                                <p class="help-block" id="avRazonAlta"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="optClasificacionSocial" class="col-lg-2 control-label">Clasificacion social:</label>
                            <div class="col-lg-4">                                
                                <select class="form-control" name="optClasificacionSocial" id="optClasificacionSocial"></select>
                                <p class="help-block" id="avClasificacionSocial"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="optEstadoMembresia" class="col-lg-2 control-label">Estado de membresia:</label>
                            <div class="col-lg-4">                                
                                <select class="form-control" name="optEstadoMembresia" id="optEstadoMembresia"></select>
                                <p class="help-block" id="avEstadoMembresia"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtFechaConversion" class="col-lg-2 control-label">Fecha de conversion:</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="txtFechaConversion" id="txtFechaConversion">
                                <p class="help-block" id="avFechaConversion"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtInicioMembresia" class="col-lg-2 control-label">Fecha de inicio de membresia:</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="txtInicioMembresia" id="txtInicioMembresia" disabled>
                                <p class="help-block" id="avInicioMembresia"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-4"> 
                            <div class="form-group">
                                <label for="chkAsisIglesia" class="col-lg-7 control-label"> Asistia a otra iglesia ?:</label>
                                <label for="chkAsisIglesia" class="checkbox-inline col-lg-2"> 
                                    <input type="checkbox" id="chkAsisIglesia">
                                </label>                            
                            </div>
                        </div>
                        <div class="col-lg-4"> 
                            <div class="form-group">
                                <label for="chkPadresMiembros" class="col-lg-7 control-label"> Padres son miembros ?:</label>
                                <label for="chkPadresMiembros" class="checkbox-inline col-lg-2"> 
                                    <input type="checkbox" id="chkPadresMiembros">
                                </label>                            
                            </div>
                        </div>
                    </div>
                    <div class="row" id="divIglesia" style="display:None">
                        <div class="form-group">
                            <label for="txtIglesia" class="col-lg-2 control-label">A cual?</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="txtIglesia" id="txtIglesia">
                                <p class="help-block" id="avglesia"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtIniciador" class="col-lg-2 control-label">Invitado por ?</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtIdIniciador" style="display:none" disabled>
                                    <input type="text" class="form-control" id="txtIniciador" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="btnBuscarIniciador" data-toggle="modal" data-target="#modal_iniciador" onclick="listar_iniciador_buscador()"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtFormaContacto" class="col-lg-2 control-label">Forma en la que fue contactado:</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="txtFormaContacto" id="txtFormaContacto">
                                <p class="help-block" id="avFormaContacto"></p>
                            </div>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-lg-4"> 
                            <div class="form-group">
                                <label for="chkConyuge" class="col-lg-7 control-label"> Conyuge es miembro ?:</label>
                                <label for="chkConyuge" class="checkbox-inline col-lg-2"> 
                                    <input type="checkbox" id="chkConyuge">
                                </label>                            
                            </div>
                        </div>
                        <div class="col-lg-4"> 
                            <div class="form-group">
                                <label for="txtNumHijos" class="col-lg-6 control-label"> Numero de hijos :</label>
                                <div class="col-lg-3">
                                    <input type="text" class="form-control" name="txtNumHijos" id="txtNumHijos">
                                    <p class="help-block" id="avNumHijos"></p>
                                </div>                           
                            </div>
                        </div>
                    </div>
                    <div class="row" id="divElegirConyuge" style="display:None">
                        <div class="form-group">
                            <label for="txtConyuge" class="col-lg-2 control-label">Elegir Conyuge:</label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtIdConyuge" style="display:none" disabled>
                                    <input type="text" class="form-control" id="txtConyuge" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" id="btnBuscarConyuge" data-toggle="modal" data-target="#modal_conyuge" onclick="listar_conyuge_buscador()"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
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
