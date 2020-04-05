//dbcrud_ajax_func.php was profile.php
             //data : {'add_address': address} is $_POST['add_address']
function add_ed_address(address) {
                       //alert( "f r m.j s SAYS: add_ ed_ address : begin" ) ;
  var address = $.trim(address);
  if(address.length == ""){
    $(".address-error").html("Address is required");
    $("#autocomplete").css("border-color","red");
  } else 
  {
          //alert( "f r m.j s SAYS: add_ ed_ address : bef P OST to dbcrud_ ajax_ func.php" ) ;
    $.ajax({
      type : 'POST',
      url  : 'dbcrud_ajax_func.php?address=true',
      data : {'add_address': address},
      dataType : 'JSON'
      ,success : function(feedback){
        if(feedback['error'] == "success"){
          location = "index.php";
        } else {alert(feedback['error']);}
      }

    })
  }
}

function add_bio(bio){
  var bio = $.trim(bio);
  if(bio.length == ""){
    $(".bio-error").html("Bio is required");
  } else {
    $.ajax({
      type : 'POST',
      url  : 'dbcrud_ajax_func.php?bio=true',
      data : {'bio' : bio},
      dataType : 'JSON',
      success : function(feedback){
        if(feedback['error'] == 'success'){
          location = 'index.php';
        }
      }
    })
  }
}


function add_facebook_account(facebook_val){
  var facebook_val = $.trim(facebook_val);
  var facebook_url = /^(http|https)\:(\/\/)(www)\.facebook\.com(\/)[a-zA-Z0-9]+$/;
  if(facebook_val.length == ""){
    $(".facebook-error").html('Facebook Field is required');
    $("#add_facebook").css("border-color","red");
  } else if(facebook_url.test(facebook_val)){
    $.ajax({
      type : 'POST',
      url  : 'dbcrud_ajax_func.php?add_facebook=true',
      data : {'facebook_val': facebook_val},
      dataType : 'JSON',
      success : function(feedback){
        if(feedback['error'] == 'success'){
          location = 'index.php';
        }
      }
    })

  } else {
    $(".facebook-error").html('Invalid Facebook URL');
    $("#add_facebook").css("border-color","red");
  }
}


// === Add Linkedin ===  
function add_linkedin_url(linkedin_val){
  var linkedin_val = $.trim(linkedin_val);
  var linkedin_url = /^(http|https)\:(\/\/)(www)\.linkedin\.com(\/)[a-zA-Z0-9]+$/;
  if(linkedin_val.length == ""){
    $(".linkedin-error").html('Linkedin Field is required');
    $("#add_linkedin").css("border-color","red");
  } else if(linkedin_url.test(linkedin_val)){
    $.ajax({
      type : 'POST',
      url  : 'dbcrud_ajax_func.php?add_linkedin=true',
      data : {'linkedin_val': linkedin_val},
      dataType : 'JSON',
      success : function(feedback){
        if(feedback['error'] == 'success'){
          location = 'index.php';
        }
      }
    })

  } else {
    $(".linkedin-error").html('Invalid Linkedin URL');
    $("#add_linkedin").css("border-color","red");
  }
}


function change_password(current_pwd, new_pwd){
  var current_pwd = $.trim(current_pwd);
  var new_pwd     = $.trim(new_pwd);
  if(current_pwd.length == ""){
    $(".current-error").html("Current Password is required");
    $("#current").css("border-color", "red");
  } else {
    $(".current-error").html("");
    $("#current").css("border-color", "green");
  }

  if(new_pwd.length == ""){
    $(".new-error").html("New Password is required");
    $("#new_password").css("border-color", "red");
  } else {
    $(".new-error").html("");
    $("#new_password").css("border-color", "green");
  }

  if(current_pwd.length != "" && new_pwd.length != ""){
    $.ajax({
      type : 'POST',
      url  : 'dbcrud_ajax_func.php?password=true',
      data : {'current_password': current_pwd, 'new_password': new_pwd},
      dataType : 'JSON',
      success : function(feedback){
        // alert(feedback);
              if(feedback['error'] == 'success'){
                location = "index.php";
              } else if(feedback['error'] == "pattren"){
                $(".new-error").html(feedback['msg']);
                $("#new_password").css('border-color',"red");
              } else if(feedback['error'] == "current_password_wrong"){
                $(".current-error").html(feedback['msg']);
                $("#current").css("border-color","red");
              }
      }
    })

  }

}


function change_name(name){
  var name = $.trim(name);
  if(name.length == ""){
    $('.name-error').html('Name is required');
    $("#update_name").css('border-color',"red");
  } else {
    $('.name-error').html('');
    $("#update_name").css('border-color',"green");
  }
  if(name.length != ""){
    $.ajax({
      type : 'POST',
      url  : 'dbcrud_ajax_func.php?change_name=true',
      data : {'change_name' :name},
      dataType : 'JSON',
      success : function(feedback){
        if(feedback['error'] == 'success'){
          location = "index.php";
        } else if(feedback['error'] == 'pattren'){
          $('.name-error').html(feedback['msg']);
    $("#update_name").css('border-color',"red");
        }
      }

    })
  }
}


