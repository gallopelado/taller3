$(document).ready(function () {
  $('#seccionlista').hide()
  $('#btnelegir').click(function () {
    if ($('#radevtvariable').is(':checked')) {
      $('#botones, #tblGeneral, #evt_fijo').hide()
      $('#seccionlista, #evt_variable').show()
      $('#btnCancelar').click(function () {
        $('#botones, #tblGeneral, #evt_fijo').show()
        $('#seccionlista, #evt_variable').hide()
      })
    }else if ($('#radevtfijo').is(':checked')) {
      $('#botones, #tblGeneral, #evt_variable').hide()
      $('#seccionlista, #evt_fijo').show()
      $('#btnCancelar').click(function () {
        $('#botones, #tblGeneral, #evt_variable').show()
        $('#seccionlista, #evt_variable').hide()
      })
    }
  })
})
