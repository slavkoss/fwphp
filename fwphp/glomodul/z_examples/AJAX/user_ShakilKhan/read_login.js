//J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\read_login.js
$(document).ready(function(){

  // *************************************
  // === 1. Validations
  // *************************************
  var email    = "";
  var password = "";
  // === Email Validations ===
  $("#login-email").focusout(function(){
    var email_entered = $.trim($("#login-email").val());
    if(email_entered.length == ""){
      $("#login-email").addClass("border-red");
      $("#login-email").removeClass("border-green");
      $(".login-email-error").html("Email is required (validation)!");
      email = "";
    }else{
      $("#login-email").addClass("border-green");
      $("#login-email").removeClass("border-red");
      $(".login-email-error").html("");
      email = email_entered;
    }
  })//close email validations

    // === Password Validations ===
  $("#login-password").focusout(function(){
    var password_store = $.trim($("#login-password").val());
    if(password_store.length == ""){
      $("#login-password").addClass("border-red");
      $("#login-password").removeClass("border-green");
      $(".login-password-error").html("Password is required!");
      password = "";
    }else{
      $("#login-password").addClass("border-green");
      $("#login-password").removeClass("border-red");
      $(".login-password-error").html("");
      password = password_store;
    }
  });//Password validation close


  // *************************************
  // === 2. Submit login form ===
  // *************************************
  $("#login-submit").click(function(){
                           //alert('psw='+password);
    if(email.length == ""){
      $("#login-email").addClass("border-red");
      $("#login-email").removeClass("border-green");
      $(".login-email-error").html("Email is required (submit)!");
      email = "";  
    }
    if(password.length == ""){
        $("#login-password").addClass("border-red");
      $("#login-password").removeClass("border-green");
      $(".login-password-error").html("Password is required!");
      password = "";  
    }
    if(password.length != "" && email.length != ""){
                           //alert($("#login-submit-form").serialize());
        //async: true,
      $.ajax({
        type : 'POST',
        url  : 'read_login_ajax.php?login_form=true',
        data : $("#login-submit-form").serialize(),
        dataType : "json",
      })
      .done(function ajaxDone(feedback) {
                            //alert('AJAX POST succeded '+feedback['msg']);
          // Whatever feedback is :
          if(feedback['error'] == 'success'){
            $(".login-error").html("");
            $("#login-password").addClass("border-green");
            $("#login-email").addClass("border-green");
            $("#login-password").removeClass("border-red");
            $("#login-email").removeClass("border-red");
            $(".login-error").addClass("login-progress");
            //http://dev1:8083/fwphp/glomodul4/help_sw/test/login/user/%7B%22login_email%22:%22z@z.z%22,%22login_password%22:%22Pozega141%22%7D
            setTimeout(function(){
               location = feedback['msg'];
            },2000);
            
          }else if(feedback['error'] == 'no_password'){
            $("#login-password").addClass("border-red");
            $("#login-password").removeClass("border-green");
            $(".login-error").html(feedback['msg']);
          }else if(feedback['error'] == 'no_email'){
            $("#login-email").removeClass("border-green");
            $("#login-email").addClass("border-red");
            $(".login-error").html(feedback['msg']);
          }
                                  /* 
                                  if(feedback.redirect !== undefined) {
                                    window.location = feedback.redirect;
                                  } else if(feedback.error !== undefined) {
                                    _error
                                      .text(feedback.error)
                                      .show();
                                  } */
      })
      .fail(function ajaxFailed(e) {
          // This failed
          alert('******* AJAX POST failed *******');
      })
      .always(function ajaxAlwaysDoThis(feedback) {
          // Always do
          console.log('feedback[\'msg\']='+ feedback['msg']);
      })
                /* $.ajax({
                  type : 'POST',
                  url  : 'read_ login_ajax.php?login_form=true',
                  data : $("#login-submit-form").serialize(),
                  dataType : "JSON",
                  success : function(feedback){
                                     alert('aaaaaaaaa');
                    if(feedback['error'] == 'success'){
                      $(".login-error").html("");
                      $("#login-password").addClass("border-green");
                      $("#login-email").addClass("border-green");
                      $("#login-password").removeClass("border-red");
                      $("#login-email").removeClass("border-red");
                      $(".login-error").addClass("login-progress");
                      setTimeout(function(){
                                    location = feedback['msg'];
                      },2000);
                      
                    }else if(feedback['error'] == 'no_password'){
                      $("#login-password").addClass("border-red");
                      $("#login-password").removeClass("border-green");
                      $(".login-error").html(feedback['msg']);
                    }else if(feedback['error'] == 'no_email'){
                      $("#login-email").removeClass("border-green");
                      $("#login-email").addClass("border-red");
                      $(".login-error").html(feedback['msg']);
                    }
                  }
                }) */
    }
  })

});