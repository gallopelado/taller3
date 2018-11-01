<form action="" class="form-horizontal">
    <fieldset>
        <div class="row" id="" style="display:none">
            <div class="form-group">
                <label for="txtId" class="col-lg-2 control-label">id:</label>
                <div class="col-lg-2">
                    <input type="number" class="form-control" id="txtId" disabled>
                </div>
            </div>
        </div>

        <div class="row" id="" style="display:Visible;padding-top: 10px;">
            <div class="form-group">
                <label for="txtComite" class="col-lg-2 control-label">Elegir Comité: </label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="number" class="form-control" name="txtIdComite" id="txtIdComite" disabled style="display:none">
                        <input type="text" class="form-control" id="txtComite" disabled>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarComite" data-target="#modal_comite" onclick="listarMinisterios()"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <p class="help-block" id="avComite"></p>
                </div>
            </div>
        </div>

        <div class="row" id="" style="display:Visible">
            <div class="form-group">
                <label for="txtLider" class="col-lg-2 control-label">Elegir Lider: </label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="number" class="form-control" name="txtIdComite" id="txtIdLider" disabled style="display:none">
                        <input type="text" class="form-control" id="txtLider" disabled>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarLider" data-target="#modal_lider" onclick="listarLideres()"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <p class="help-block" id="avComite"></p>
                </div>
            </div>
        </div>

        <div class="row" id="" style="display:Visible">
            <div class="form-group">
                <label for="txtSuplente" class="col-lg-2 control-label">Elegir Suplente: </label>
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="number" class="form-control" id="txtIdSuplente" disabled style="display:none">
                        <input type="text" class="form-control" id="txtSuplente" disabled>
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button" data-toggle="modal" id="btnBuscarSuplente" data-target="#modal_suplente" onclick="listarSuplentes()"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <p class="help-block" id="avComite"></p>
                </div>
            </div>
        </div>

        <div class="row" id="" style="display:Visible">
            <div class="form-group">
                <label for="txtDescri" class="col-lg-2 control-label">Descripción: </label>
                <div class="col-lg-6">
                    <input type="text" class="form-control" id="txtDescri"> 
                    <p class="help-block" id="avDescri"></p>
                </div>
            </div>
        </div>

        <div class="row" id="" style="display:Visible">
            <div class="form-group">
                <label for="txtObs" class="col-lg-2 control-label">Observación: </label>
                <div class="col-lg-6">
                    <div class="input-group">                    
                        <textarea class="form-control" rows="7" cols="57" id="txtObs"></textarea>
                    </div>                
                </div>
            </div>
        </div>
    </fieldset>
</form>