<form action="" class="form-horizontal">
    <fieldset>
        <div class="row" id="" style="display:visible;padding-top: 10px;">
            <div class="form-group">
                <label for="txtIdCab" class="col-lg-2 control-label">Comite:</label>
                <div class="col-lg-6">
                    <input type="number" class="form-control" id="txtIdCab" disabled style="display: none">
                    <input type="text" class="form-control" id="txtCab" disabled>
                </div>
            </div>        
        </div> 

        <div class="row" id="" style="display:Visible">
            <div class="form-group">
                <label for="txtLider" class="col-lg-2 control-label">Asignar Integrantes: </label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="number" class="form-control" id="txtIdIntegrante" disabled style="display: none">
                        <input type="text" class="form-control" id="txtIntegrante" disabled>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button"  id="btnBuscarIntegrante" onclick="obtenerListaPostulaciones()"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <p class="help-block" id="avComite"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="optCargo" class="col-lg-2 control-label">Cargo/Función:</label>
                <div class="col-lg-6">                
                    <select class="form-control" name="optCargo" id="optCargo">
                        <option value="">Elegir</option>
                    </select>
                    <p class="help-block" id="avCargo"></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="txtOb" class="col-lg-2 control-label">Observación :</label>
                <div class="col-lg-6">                
                    <input type="text" class="form-control" id="txtOb">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label for="chkEntrenamiento" class="col-lg-2 control-label">En entrenamiento ?:</label>
                <div class="col-lg-6">                
                    <label class="checkbox-inline"><input type="checkbox" id="chkEntrenamiento" value="true">Si</label>
                </div>
            </div>
        </div>
    </fieldset>
</form>