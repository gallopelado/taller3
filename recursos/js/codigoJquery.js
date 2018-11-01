$(document).ready(function () {
    $('#frmOculto, #msgExitoMiembro').hide();
    $('#btnSeleccion').click(function () {
//       alert('Persona Seleccionada'); 
        $('#tabGeneralMiembros, #btnNuevoMiembro').fadeOut('slow');
        $('#frmOculto').fadeIn('slow');
    });
    $('#btnCancelarMiembro').click(function () {
        $('#tabGeneralMiembros, #btnNuevoMiembro').fadeIn('slow');
        $('#frmOculto').fadeOut('slow');
    });
    $('#btnGuardarMiembro').click(function () {
        
        $('#frmOculto').fadeOut('slow');
        $('#msgExitoMiembro').fadeIn(3000).fadeOut(5000, function () {
            $('#tabGeneralMiembros, #btnNuevoMiembro').fadeIn('slow');
        });
    });
    $('#btnModalSeleccionTipoDocumento').click(function () {
        //$('#tabMantenerCRecom').tab('show'); // Muestra el contenido de la tab
        if($('#opcrecomendacion').is(':checked')){
            $('#tabMantenerCRecom').tab('show');
        }
        if($('#opcbconducta').is(':checked')){
            $('#tabMantenerCBCon').tab('show');
        }
        if($('#opfbauti').is(':checked')){
            $('#tabMantenerFBauti').tab('show');
        }
    });
});