<?php
// http://dev1:8083/fwphp/glomodul4/lsweb/lsweb.php/?cmd=J:/awww/www/fwphp/glomodul4/help_sw//test/AJAX
$status = session_status(); //no active session :
if ($status == PHP_SESSION_NONE) {session_start();}

                if ('0') { echo '<pre>'.__FILE__ .', lin='. __LINE__
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
  .error{display:none; color:red;}
 input, textarea, button {
    box-sizing: border-box;
    margin: .5em 0;
    width: 100%;
}
</style>
</head>

<body>
<h1>Enter -> Tab, focused is selected, validation</h1>
<p>Works on Windows 10 64 bit on MS Edge, MS IE 11, PORTABLE (SyMenu): Firefox 61.0.2, G.Chrome 70.0.3538.77, K-Meleon/76.0, Pale Moon 28.2.1, Cyberfox 52.9.1 </p>

<form action="validator.php" method="POST" name="myform" id="myformid">
  <table width="100%">
  <tr><td width="25%">Name:</td><td><input autofocus type="text" class="form-group" name="name">
      <span class="error-name error">Missing Name</span></td></tr>

  <tr><td>Email:</td><td><input type="email" class="form-group" name="email">
    <span class="error-email error">Missing Email</span></td></tr>

  <tr><td colspan="2"><button type="submit">
     <span style="color:green; background:#fff;">Submit or F10</span> (Pošalji podatke serveru)
     </button>
     <!--input type="submit" value="sumbmit" /-->
  </td></tr>
  </table>

</form>
  <!--
  There are three types of buttons:
     submit - Submits the current form data. (This is default.)
     reset  - Resets data in the current form.
     button - Just a button. Its effects must be controlled by JavaScript
  
  --------------------------------------
  Both <button type="submit"> and <input type="submit"> display as buttons and cause the form data to be submitted to the server.

  The difference is that <button> can have HTML content, whereas <input> cannot (it is a null element). While the button-text of an <input> can be specified, you cannot add markup to the text or insert a picture. So <button> has a wider array of display options.

  There are some problems with <button> on older, non-standard browsers (such as Internet Explorer 6), but the vast majority of users today will not encounter them.
  
  --------------------------------------
  <input type="button" /> buttons will not submit a form - they don't do anything by default. They're generally used in conjunction with JavaScript as part of an AJAX application.
  Can be used anywhere, not just within form and they do not submit form if they are in one.

  <input type="submit"> buttons will submit the form they are in when the user clicks on them, unless you specify otherwise with JavaScript.
  Should be used in forms only and they will send a request (either GET or POST) to specified URL. 
  -->


<div id="message"></div>
<!--script src="/zinc/themes/bootstrap/js/zepto.min.js"></script-->
<!--script src="/zinc/themes/bootstrap/js/jquery.min.js"></script-->

<script>
    //function EnterToTab(e) { //alert('e.keyCode='+e.keyCode);
      var ii = 0; // 0 IF input type="submit" IS LAST, 1 IF IS FIRST
      // "textarea, input[type=text], select"
      var els = myform.getElementsByTagName('input').length ; // =4 input flds + btn
      //var els = myform.getElementsByName('nameofbox').length ; // =3 input flds
      //window.onkeypress = function(e) {
      document.onkeydown = function(e) {
        e = e || window.event;
        switch(e.keyCode) 
        {
          case 13: //1. enter key pressed :
              ii++;
              ii > els - 1 ? ii = 0 : ii = ii; //ii = 1; // 0,1,2
              document.myform[ii].focus();
              document.myform[ii].select();
              return false; //ignore keypressed ee RETURN KEY IS NOT SAME AS CLICK SAVE BUTTON
          case 121: //2. F10  ctrl+s = alt+s *** open new tab & continue with PHP
            //document.write('<h2>Save page... click key BACKSPACE to return to previous page</h2>');
            //window.location.href="validator.php" //NOT SUBMITING
            document.getElementById("myformid").submit();  //myform.name.submit();
            return false;

          default:       // all other keys
            return true; // standard ibrowser key pressed processing
            // FOR TESTING WHICH KEY IS PRESSED : comment above statement !!
        }; // e n d  s w i t c h  key pressed
      }
    //}
          /*
          case 116: // F5 ***
          case 8:   // backspace ***
          case 9:   // tab
          case 16:  // shift
          case 17:  // ctrl
          case 18:  // alt
            return true; // standard ibrowder key pressed processing
            //break;
          */
</script>

</body></html>

