<?php
// http://dev1:8083/fwphp/glomodul4/help_sw/test/AJAX/enter_tab_emul/enter_tab_emul_v2.php
// ?nameofbox001=&nameofbox002=&nameofbox003=&done=Spremi+%28F10%29  method="GET" is default
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

  /* input,
  select,
  textarea {
    box-sizing: border-box;
    margin: .5em 0;
    width: 100%;
  } */
</style>
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
      //var ii = 0;
      //var els = myform.getElementsByTagName('input').length ; // =3 input flds
// End -->
</script>
</head>

<body>
<noscript>Your browser does not support JavaScript!</noscript>

<table>
  <tr>
<td>
<center>

<h3>Emulation: Tab -> Enter :&nbsp; JAVASCRIPT XXX</h3>

<!-- novalidate = disable HTML5 automatic form validation,
     so JS can do validation  
     <SCRIPT LANGUAGE='JavaScript'>console.log(flds[0]);</script>
     (onFocus="nextfield ='box002';")
     onkeydown="return myKeyAct(this,event);"
-->
<form name=myform method="POST"
      action="" 
      novalidate />
          <SCRIPT LANGUAGE="JavaScript">
            var fldids = new Array('box001','box002','box003');
          </script>
 <fieldset><legend>f o r m  name=myform</legend>
 
  <div><label for=box001>Box 1 </label><input type=text 
     name="nameofbox001" id="box001" autofocus /></div>
  
  <div><label for=box002>Box 2 </label><input type=text 
      name=nameofbox002 id="box002" 
  /></div>

  <div><label for=box003>Box 3 </label><input type=text 
     name=nameofbox003 id="box003" 
     required /></div>
  
   
  <div><label for=submit>Spremi tipkom F10 bla, bla </label>
  <input type=submit name=done id="done" value="Spremi (F10)" 
         accesskey="s" title="Klik za bla, bla [F10]" /></div>
  
 
  </fieldset>
</form>
</center>





<!-- http://dev1:8083/zinc/js/lov/
http://dev1:8083/zinc/utl/oraed/enter_tab_emul/enter_tab_emul_v2.html
J:\awww\apl\dev1\zinc\utl\oraed\enter_tab_emul\enter_tab_emul_v2.html
J:\awww\apl\dev1\oraed\enter_tab_emul\enter_tab_emul_v2.html
  file:///J:/awww/apl/dev1/my_dev/enter_tab_emul/enter_tab_emul_v2.html
  
     <a href=""></a>
     <a href="#anchor_name"></a> TO JUMP TO <a name="anchor_name"></a>
          // set cursor to some form field:
          // SEE autofocus to set cursor to some form field:
          //eval('document.myform.b1.focus()');
  
  http://dev1:8083/my_dev/test/books/a03ullman/modernjs/ch06/employee.html
  J:\awww\apl\dev1\my_dev\test\books\a03ullman\modernjs\ch06
  file:///J:/awww/apl/dev1/my_dev/test/books/predlozak/predlozak02_PgBreak_OpenClose.html
-->






<a href="http://dev1:8083/oraed/enter_tab_emul/enter_tab_emul2.html">This page URL</a>
 is script on disk: 
  J:\\awww\\apl\\dev1\\oraed\\enter_tab_emul\\enter_tab_emu2l.html'
 
 
 <br /><br /><p><a href="http://stackoverflow.com/questions/5347857/how-do-i-convert-enter-to-tab-with-focus-change-in-ie9-it-worked-in-ie8">Ronnie T. Moore, Web Site:  The JavaScript Source </a>:
<p>&nbsp;</p>
<h2>Code snippets</h2>
<p>There are <strong>elements</strong> such as &lt;input/&gt; and <strong>containers</strong> like   &lt;form&gt; &lt;/form&gt;  Each element can have <strong>attributes</strong> associated   with it, such as: eg &lt;input/&gt; element has three attributes: <em>type</em>, <em>name</em> and <em>id</em></p>
<pre><strong>var inputs = document.getElementsByTagName("input");</strong><br>var message =<br>"Form has following <strong>input elements with 'type' attribute = 'text'</strong>: \n\n";<br>for (var i=0; i &lt; inputs.length; i++)<br>{<br><br>   if (inputs[i].getAttribute('type') == 'text')<br>   {<br>      message += inputs[i].tagName +<br>      " element with the 'name' attribute = '";<br>      message += inputs[i].getAttribute('name') + "'\n";<br>   }<br>}<br>alert(message);</pre>
<p><br>
  <strong>Toggle  visibility of the form</strong> by accessing  form   element &lt;form&gt;  and setting its <em>display</em> property:</p>
<pre class="brush: jscript; title: ; toolbar: false; notranslate" title="">var frm_element = document.getElementById('subscribe_frm');<br><br>var vis = frm_element.style;<br><br>if (vis.display=='' || vis.display=='none')<br>{<br>    vis.display = 'block';<br>}<br>else<br>{<br>    vis.display = 'none';<br>}
</pre>
<p><br>
  var name_element = document.getElementById (&lsquo;txt_name&rsquo;);</p>
<div>
  <pre class="brush: jscript; title: ; notranslate" title="">if (trim(name_element.value) == '')
  {     alert ('Please enter your name');  } 

function trim (str)  {
       return str.replace (/^\s+|\s+$/g, '');  } </pre>
</div>
<p>&nbsp;</p>
<p>To get a reference to the &lt;select&gt; element with the name attribute <em>mail_format</em>.</p>
<div>
  <pre class="brush: xml; title: ; toolbar: false; notranslate" title="">&lt;select name="mail_format" id="slt_mail_format"&gt;
  &lt;option value="TEXT"&gt;Plain Text&lt;/option&gt;
  &lt;option value="HTML"&gt;HTML&lt;/option&gt;  &lt;/select&gt;  </pre>
</div>
<p>We could access  desired element in this way:</p>
<div>
  <pre class="brush: jscript; title: ; toolbar: false; notranslate" title="">var mail_format_elements = document.getElementsByName('mail_format');  </pre>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>Here is a DIFFERENT IDEA for Tab - Enter: </p>
<ol>
  <li> change <strong>on submit so that it calls fn</strong> instead of processing form </li>
  <li> in function <strong>check all the fields to see if they are blank</strong></li>
  <li> <strong>focus on  next blank field</strong> (that doesn't have a value)</li>
  <li> 1 to 3 when script runs (in runtime) behaves so :<br>
    user types a value into field1 -&gt;
    hit enter -&gt; function runs<br>
    -&gt; Fn sees that field1 is full, 2 isnt, so focus on field 2 <br>
    -&gt; when all fields are full, submit form for processing </li>
</ol>
<p>If form has fields that can be blank, you could use a boolean array 
  that would keep track of which fields received focus using onfocus() event. </p>
  
  </td>
  </tr>
</table>

<!--script src="../key_pressed.js"></script-->
<!--script LANGUAGE="JavaScript" src="/zinc/themes/bootstrap/js/key_pressed.js"></script-->
<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
    //function EnterToTab(e) {
      //alert('e.keyCode='+e.keyCode);
      var ii = 0; // 0 IF BTN IS LAST, 1 IF BTN IS FIRST
      var els = myform.getElementsByTagName('input').length ; // =4 input flds + btn
      //var els = myform.getElementsByName('nameofbox').length ; // =3 input flds
      document.onkeydown = function(e) {
        e = e || window.event;
        /* if (e.keyCode == 13) {
          ii++;
          alert('e.keyCode='+e.keyCode+', els='+els+', ii='+ii);
          ii > els - 1 ? ii = 0 : ii = ii; //ii = 1; // 0,1,2
          document.myform[ii].focus();
          //eval('document.'+'myform'+'[ii]' + '.focus()');
          //eval('document.myform.' + nextfield + '.focus()');
          return false; //ignore keypressed ee RETURN KEY IS NOT SAME AS CLICK SAVE BUTTON
        } */
        switch(e.keyCode) 
        {
          // 1. enter key pressed :
          case 13: 
              ii++;
              ii > els - 1 ? ii = 0 : ii = ii; //ii = 1; // 0,1,2
              document.myform[ii].focus();
              return false; //ignore keypressed ee RETURN KEY IS NOT SAME AS CLICK SAVE BUTTON
              //eval('document.'+'myform'+'[ii]' + '.focus()');
              //eval('document.myform.' + nextfield + '.focus()');
          // standard ibrowser key pressed -> standard processing:
          // 35=end 36=home 33=pgup 34=pgdn 45=ins 46=del
          // 83=ctrl+s=alt+s
          case 121: // F10
          //case 83: // ctrl+s = alt+s *** open new tab & continue with PHP
            document.write('<h2>Save page... click key BACKSPACE to return to previous page</h2>');
            return false;


          case 116: // F5 ***
          case 8:   // backspace ***
          case 9:   // tab
          case 16:  // shift
          case 17:  // ctrl
          case 18:  // alt
            return true; // standard ibrowder key pressed processing
            //break;


          default:       // all other keys
            return true; // standard ibrowser key pressed processing
            /* // FOR TESTING WHICH KEY IS PRESSED : comment above statement !!
            document.write('<h3>Tipka '+e.keyCode+' još nije omogućena u ovom programu (javite informatičaru ako ju trebate za uobičajene browserove aktivnosti). </h3>'
            +'<h3>Kliknite tipku "Backspace" za povratak u prethodnu stranicu' + '</h3>'
            ); */
            //eval('document.yourform.' + nextfield + '.value ='.keypressed);
            return false; 
        }; // e n d  s w i t c h  key pressed
      }
    //}
    //idea is wrong: Don't change enter to tab. Tackle this problem by intercepting the enter key, set the focus on next element and cancel the event. jQuery solution:
    // id="myform"    onkeydown='EnterToTab(event)'
  /*function myKeyAct(field, evt)
  {
    // call from input fld: onkeydown="return myKeyAct(this, event);"
    alert('1. pressed keyCode='+evt.keyCode+', field.id='+field.id);
    var fldobj1 = document.getElementById('box001');
    var fldobj2 = document.getElementById('box002');
    var fldobj3 = document.getElementById('box003');
    if (    evt.keyCode === 13 // ENTER
         //|| evt.keyCode === 40 // DOWN ARROW 
         //|| evt.keyCode === 38 // UP ARROW 
    )
    {
      switch (field.id)
      {
        case 'box001': fldobj2.focus(); break;
        case 'box002': fldobj3.focus(); break;
        case 'box003': fldobj1.focus(); break;
      }
    }
  } */
// End -->
</script>

</body>
</html>
