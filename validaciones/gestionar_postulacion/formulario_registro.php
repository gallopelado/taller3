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
                            <label for="txtIdPostulacion" class="col-lg-2 control-label">id:</label>
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
                            <label for="txtVacancia" class="col-lg-2 control-label">Vacancias:</label>
                            <div class="col-lg-2">
                                <input type="number" class="form-control" id="txtVacancia" disabled>
                                <p class="help-block" id="avVacancia"></p>
                            </div>
                        </div>
                    </div>                    

                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtFinPostu" class="col-lg-2 control-label" onkeypress="return false">Finaliza el:</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" id="txtFinPostu" disabled>
                                <p class="help-block" id="avFinPostu"></p>
                            </div>
                        </div>
                    </div>                                          

                    <div class="row" id="" style="display:Visible">
                        <div class="form-group">
                            <label for="txtPostulante" class="col-lg-2 control-label">Buscar Postulante: </label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" class="form-control" id="txtIdPostulante" style="display:none" disabled>
                                    <input type="text" class="form-control" id="txtPostulante" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarPostulante" data-target="#modal_postulante" onclick="listar_busqueda_postulantes()"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                                <p class="help-block" id="avPostulante"></p>
                            </div>
                        </div>
                    </div>  

                    <div class="row" id="" style="display:none">
                        <div class="form-group">
                            <label for="txtContador" class="col-lg-2 control-label" onkeypress="return false">Registros encontrados:</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" id="txtContador" disabled>                                
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
