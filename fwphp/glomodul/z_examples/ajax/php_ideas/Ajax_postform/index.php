<?php
// f o r m script containing jQuery Ajax script to post frm data (10 STEPS)
//      see http://youmightnotneedjquery.com/
//          https://jsfiddle.net/franciscop/mwpcqddj/
//  https://www.npmjs.com/package/cash-dom - Cash is a super small library built for modern browsers (Chrome, Firefox, Safari and Internet Explorer 9+) that provides jQuery style syntax for manipulating the DOM. Utilizing modern browser features to minimize the codebase, developers can use the familiar chainable $ methods at a fraction of the blot. 

//to be able to just include the bits I was using and nothing else, so I wrote Dabby.js, a lightweight modular jQuery clone written in ES6. See npmjs.com/package/dabbyjs.


//include_once('dbconn.php');  //include_once('../includes/config.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajax post</title>
</head>
<body>
<h1>Post Data Using jQuery Ajax</h1>

<form id="form_box" action="" onsubmit="return validateForm()" method="post">

    <h5>Body:</h5>
    <textarea name="body" cols="30" rows="10"></textarea>

    <div>
        <input type="submit" name="sub_post" value="Send frm data to DB CRUD php script">
    </div>

</form>
</body>



    <script>
    //alert('111');
    function validateForm() {
      
      var body = document.forms["form_box"]["body"].value;
      if (body == "") {
        alert("Name must be filled out");
        return false;
      }
      alert("body="+body);
      
    }
    // document ready handler
    //function ready(fn) 
    //{
      if (document.readyState != 'loading'){
        fn();
      } else {
        document.addEventListener('DOMContentLoaded', fn);
      }
    //}
    //$(document).ready(function()
    function fn()
    {
        var request; // recieves requests from f o r m
        alert('222');
      var body = document.forms["form_box"]["body"].value;
      if (body == "") {
        alert("Name must be filled out");
        return false;
      }
      alert("body="+body);
        /* document.querySelectorAll('#form_box').onsubmit(function(event)
        {
          alert('333');
        }) */
/*
        $("#form_box").submit(function(event)
        {
            // clicked submit button ee submit event (trigger) code is here
            // ee 10 STEPS : abort, set, find, serialize, disabled, ajax, done, fail, always, preventDefault
            if(request){
              request.abort();
            }

            var $form=$(this); //set var to handle requests from f o r m
            var $inputs=$form.find("input,textarea"); //list of input flds
            var serializeddata=$form.serialize(); //text string for f o r m data
            $inputs.prop("disabled",true); //disabled before make ajax request
            request= $.ajax({
                //url:"functions/post.php",
                url:"crud.php",
                type:"post",
                data:serializeddata
            });

            request.done(function(response,textStatus,JqXHR){
                alert("--frm_ajaxscript (index.php) SAYS:"+" DB CRUD php script is executed successfully from f o r m script \n\n" + response);
            });

            request.fail(function(JqXHR,testStatus,errorThrown){
                console.error("Error occured"+ testStatus,errorThrown);
            });

            request.always(function(){
                $inputs.prop("disabled",false);
            });

            event.preventDefault();

        })
*/
    }
    //)

               /* $(function () {
                   //$("#dialog-message").dialog({
                   $(response).dialog({
                       modal: true,
                       buttons: {
                           Ok: function () {
                               $(this).dialog("close");
                           }
                       }
                   });
               }); */
                /* alert can use only:
                    \b = Backspace 
                    \f = Form feed 
                    \n = New line 
                    \r = Carriage return 
                    \t = tab
                    \000 = octal character 
                    \x00 = hexadecimal character 
                    \u0000 = hexadecimal unicode character
              */
      </script>
</html>