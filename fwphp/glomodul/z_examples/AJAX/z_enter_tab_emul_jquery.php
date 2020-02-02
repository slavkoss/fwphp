<?php
// http://dev1:8083/fwphp/glomodul4/lsweb/lsweb.php/?cmd=J:/awww/www/fwphp/glomodul4/help_sw//test/AJAX
                if ('1') { echo '<pre>'.__FILE__ .', lin='. __LINE__
                .'<br />     <b>*** '.__METHOD__ .'  SAYS ***</b>';
                //.'<br />===========I N P U T (p a r a m e t e r s) :'
                echo '<br /><h3>$ _POST=</h3>'; print_r($_POST) ;
                //echo '<br />===========O U T P U T (c a l c u l a t e d) :' ;
                  echo '</pre><br />';
                 }
?>
<!doctype htm1>
<html>
<head>
  <title>AJAX form Check</title>
  <meta charset="UTF-8">
  <link href="/zinc/themes/site/simplest.css" media="all" type="text/css" rel="stylesheet">
<style>
 input, textarea {
    box-sizing: border-box;
    margin: .5em 0;
    width: 100%;
}
</style>
</head>

<body>


<form method="post" id="myformid">
    <p>Hitting enter inside the text fields will not submit the form. 
    <br />NOT WORKING onEvent="nextField(this);"</p>
    <textarea rows="10"  autofocus></textarea>
    <input type="text" name="txt1"  />
    <input type="text"  />
    <input type="text"  />
    <select name="sel1">
        <option>opt1</option>
        <option>opt2</option>
    </select>
    <input type="submit" value="sumbmit"  />
</form>


<div id="message"></div>
<script src="/zinc/themes/bootstrap/js/zepto.min.js"></script>
<!--script src="/zinc/themes/bootstrap/js/jquery.min.js"></script-->

<script>
  //working, but ENTER on submit submits :
  $(function () {
      $("form").on("keypress", "textarea, input[type=text], select", function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var $fields = $(this).closest("form").find("textarea, input,select");
              var index = $fields.index(this);
              $fields.eq(index + 1).trigger("focus");
          } 
        /* // NOT WORKING :
        switch(e.which) 
        {
          case 13: //1. enter key pressed :
              e.preventDefault();
              var $fields = $(this).closest("form").find("textarea, input,select");
              var index = $fields.index(this);
              $fields.eq(index + 1).trigger("focus");
              return false;
          case 121: //2. F10  ctrl+s = alt+s *** open new tab & continue with PHP
            //document.write('<h2>Save page... click key BACKSPACE to return to previous page</h2>');
            //window.location.href="validator.php" //NOT SUBMITING
            document.getElementById("myformid").submit();  //myform.name.submit();
            //return false;

          default:       // all other keys
            return true; // standard ibrowser key pressed processing
            // FOR TESTING WHICH KEY IS PRESSED : comment above statement !!
        }; // e n d  s w i t c h  key pressed
        */
      });
  });
  
    /* // NOT WORKING :
  window.onkeypress = function(e) {
      if (e.which == 13) {
         e.preventDefault();
         var nextInput = inputs.get(inputs.index(document.activeElement) + 1);
         if (nextInput) {
            nextInput.focus();
         }
      }
  }; */
    /* // NOT WORKING :
    function nextField(current){
      alert('current.form.elements.length='); // +current.form.elements.length
      for (i = 0; i < current.form.elements.length; i++){
        alert('current.form.elements[i].tabIndex='+current.form.elements[i].tabIndex);
        if (current.form.elements[i].tabIndex == current.tabIndex+1){
            current.form.elements[i].focus();
                
            if (current.form.elements[i].type == "text"){
                current.form.elements[i].select();
            }
        }
      }
    } */
    /* // NOT WORKING :
    function nextField(current){
        var elements = document.getElementById("myformid").elements;
        var exit = false;
        for(i = 0; i < elements.length; i++){   
            if (exit) {
                elements[i].focus();
                if (elements[i].type == 'text'){
                    elements[i].select();
                }   
                break;
            }
            if (elements[i].isEqualNode(current)) { 
                exit = true;
            }       
        }
    } */

  /* // NOT WORKING :
  var inputs = $(':input').keypress(function(e){ 
      if (e.which == 13) {
         e.preventDefault();
         var nextInput = inputs.get(inputs.index(this) + 1);
         if (nextInput) {
            nextInput.focus();
         }
      }
  });
  */
</script>

</body></html>

