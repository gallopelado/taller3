$(document).ready(function () {
  $('#BuscaCentral').keyup(function () {
    var value = $(this).val().toLowerCase();
    $('#side-menu > li:not(li.sidebar-search)  *').filter(function () {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
