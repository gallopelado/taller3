<div class="row" id="verReg">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Ver registro</div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><span><strong>Postulación: </strong></span><span id="lblpostulacion"></span></li> 
                            <li class="list-group-item"><span><strong>Vacancia: </strong></span><span id="lblvacancia"></span></li>                                            
                            <li class="list-group-item"><span><strong>Finaliza el: </strong></span><span id="lblfin"></span></li>
                            <li class="list-group-item"><span><strong>Estado: </strong></span><span id="lblestado"></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="tblVisor" cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Agregado el:</th>                
                                    </tr>
                                </thead>
                                <tbody id="tbody_visor"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-primary" onclick="volverMenu()">Volver</button>
            </div>
        </div>
    </div>
</div>
