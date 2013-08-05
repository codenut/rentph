$(document).ready(function() {
  $("#register").click(function(e) {
    $("#signin-register").load("/users/register"); 
    e.preventDefault(); 
    return false;
  });
  $("#signin").click(function(e) {
    $("#signin-register").load("/users/signin"); 
    e.preventDefault(); 
    return false;
  });
  $("#close-alert").click(function(e) {
    $(".alert").hide();
    e.preventDefault();
    return false;
  })
});
