<div class="col-lg-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Reporte de personas registradas por fecha
        </div>
        <div class="panel-body">
            <p>Obtiene  todas las personas registradas según el parámetro de fecha</p>
            <form action="mostrarReportePorFecha.php" class="form-horizontal">
                <div class="form-group">
                    <label for="text">Fecha de inicio:</label>
                    <input type="text" class="form-control" id="txtFechaInicio" onkeypress="return false">
                </div>
                <div class="form-group">
                    <label for="text">Fecha de fin:</label>
                    <input type="text" class="form-control" id="txtFechaFin" onkeypress="return false">
                </div>
            </form>
        </div>
        <div class="panel-footer">
            <button type="button" class="btn btn-outline btn-primary" id="btnRepFecha">Enviar</button>
            <button type="reset" class="btn btn-outline btn-primary" id="btnRepFechaLimpiar">Limpiar</button>
        </div>
    </div>
</div>
