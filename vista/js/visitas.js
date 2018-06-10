$(document).ready(function () {
  $('#btnelegir').click(function () {
    if ($('#radevtvariable').is(':checked')) {
      $('#myModal').modal('show')
      $('#evt_fijo').hide()
      $('#evt_variable').show()
    }else if ($('#radevtfijo').is(':checked')) {
      $('#myModal').modal('show')
      $('#evt_fijo').show()
      $('#evt_variable').hide()
    }
  })
})
