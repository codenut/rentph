$(document).ready(function() {
  $("#register").click(function(e) {
    $("#modal-dialog").load($(this).attr("data-url")); 
    $("#ajax-modal").modal('show');
    e.preventDefault(); 
    return false;
  });
  $("#signin").click(function(e) {
    $("#modal-dialog").load($(this).attr("data-url")); 
    $("#ajax-modal").modal('show');
    e.preventDefault(); 
    return false;
  });
  $("#close-alert").click(function(e) {
    $(".alert").hide();
    e.preventDefault();
    return false;
  })
});
