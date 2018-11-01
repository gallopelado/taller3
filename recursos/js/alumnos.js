$(document).ready(function () {
  $('#btnModalOpciones').click(function () {
    if($('#radpersona').is(':checked')){
      $('#modalformulario').modal('show')
      $('#optper').show()
      $('#optfun').hide()
    }else if($('#radfuncionario').is(':checked')) {
      $('#modalformulario').modal('show')
      $('#optfun').show()
      $('#optper').hide()
    }
  })
})
