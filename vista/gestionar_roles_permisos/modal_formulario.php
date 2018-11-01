<!-- Modal -->
<div id="modal_formulario" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Formulario</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12"> 
                        <form action="" role="form">
                            <div class="form-group">
                                <label><i class="fa fa-bookmark fa-fw"></i> Página</label>
                                <input class="form-control" disabled id="txtIdPagina" style="display:none">
                                <input class="form-control" disabled id="txtPagina">
                                <p class="help-block">Grupo y permisos</p>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-bookmark fa-fw"></i> Leer</label>
                                <select class="form-control" id="optLeer">
                                    <option value=true>TRUE</option>
                                    <option value=false>FALSE</option>                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-check fa-fw"></i> Insertar</label>
                                <select class="form-control" id="optInsertar">
                                    <option value="true">TRUE</option>
                                    <option value="false">FALSE</option>                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa  fa-edit fa-fw"></i> Editar</label>
                                <select class="form-control" id="optEditar">
                                    <option value="true">TRUE</option>
                                    <option value="false">FALSE</option>                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label><i class="fa fa-times fa-fw"></i> Borrar</label>
                                <select class="form-control" id="optBorrar">
                                    <option value="true">TRUE</option>
                                    <option value="false">FALSE</option>                                    
                                </select>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-lg-6"> 
                        <button type="button" class="btn btn-outline btn-success" data-dismiss="modal" onclick="persistir()"><i class="fa  fa-save fa-fw"></i> Guardar Cambios</button>
                    </div>
                    <div class="col-lg-6"> 
                        <button type="button" class="btn btn-outline btn-default" data-dismiss="modal"><i class="fa  fa-reply fa-fw"></i> Cerrar</button>
                    </div>                    
                </div>                
            </div>

        </div>
    </div>
