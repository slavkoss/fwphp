$(document).ready(function(){
  $("#login").click(function(){
    $(".signup-cover").hide();
    $(".login-cover").show();
  })

  $("#signup").click(function(){
    $(".signup-cover").show();
    $(".login-cover").hide();
  })
})