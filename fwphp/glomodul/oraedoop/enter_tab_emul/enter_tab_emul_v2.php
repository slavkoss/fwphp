<?php
// Routing info : see J:\awww\apl\dev1\08ls\info_php.php 
$curpgpath = __FILE__ ; require_once( 
  $_SERVER['DOCUMENT_ROOT'].'/zinc/utl/utls.php'); //or /../zinc/
//$dbi = 'pdo'; // or E. Rangel's pdooci = PDO sintax for oci8 dbi fns
//require_once($CNFGD.$DS.'db'.$DS.'db_conn.php'); // needs c n f variables  

//$ngjs = 'angular.min.js'; $ngapp = 'angularApp'; 
//    $ngctr = 'app.js'; //$ngctr = $curpgd.$DS.'app.js';
//$nginit = 'salary=0;percentage=0';
$title = 'enter_tab_emul';
$title2 = 'enter_tab_emul';
$basecss = $CNFGD.$DS.'cssfmt'.$DS.'style00.css'; 
//$addcss = '<link rel="stylesheet" type="text/css" href="msgboard.css">';
//$addcss2 = ...
require_once($CNFGD.$DS.'hdr.php');
?>

<noscript>Your browser does not support JavaScript!</noscript>

<table>
  <tr>
<td>
<center>

<h3>Emulation: Tab -> Enter :&nbsp; JAVASCRIPT</h3>

<!-- novalidate = disable HTML5 automatic form validation,
     so JS can do validation  
     <SCRIPT LANGUAGE='JavaScript'>console.log(flds[0]);</script>
     (onFocus="nextfield ='box002';")
-->
<form name=yourform  id="testform" 
      action="" 
      novalidate />
          <SCRIPT LANGUAGE="JavaScript">
            var fldids = new Array(
               'box001','box002','box003'
          );</script>
 <fieldset><legend>f o r m  name=yourform  id="testform" </legend>
 
  <div><label for=box001>Box 1 </label><input type=text 
     name="nameofbox001"
     id="box001" 
     onkeydown="return myKeyAct(this,event);"
     autofocus /></div>
  
  <div><label for=box002>Box 2 </label><input type=text 
      name=nameofbox002 id="box002" onkeydown="return myKeyAct(this,event);"
  /></div>

  <div><label for=box003>Box 3 </label><input type=text 
     name=nameofbox003 id="box003" onkeydown="return myKeyAct(this,event);"
     required /></div>
  
   
  <div><label for=submit>Spremi tipkom F10 bla, bla </label><input type=submit name=done id="done" value="Spremi (F10)" accesskey="s" title="Klik za bla, bla [F10]" /></div>
  
 
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
          //eval('document.yourform.b1.focus()');
  
  http://dev1:8083/my_dev/test/books/a03ullman/modernjs/ch06/employee.html
  J:\awww\apl\dev1\my_dev\test\books\a03ullman\modernjs\ch06
  file:///J:/awww/apl/dev1/my_dev/test/books/predlozak/predlozak02_PgBreak_OpenClose.html
-->






<a href="http://dev1:8083/oraed/enter_tab_emul/enter_tab_emul2.html">This page URL</a>
 is script on disk: 
  J:\\awww\\apl\\dev1\\oraed\\enter_tab_emul\\enter_tab_emu2l.html'
 
 
 <br /><br /><p><a href="http://stackoverflow.com/questions/5347857/how-do-i-convert-enter-to-tab-with-focus-change-in-ie9-it-worked-in-ie8">Ronnie T. Moore, Web Site:  The JavaScript Source </a>:
<h2>Code</h2>
<pre>&lt;!DOCTYPE html&gt;<br>&lt;html lang="HR"&gt;<br>&lt;head&gt;<br>&lt;meta http-equiv="Content-Type" content="text/html; <br>      charset=utf-8" /&gt;<br><br>      &lt;title&gt;enter_tab_emul&lt;/title&gt;  <br>&lt;!-- <br>HTML5 shiv library is open sourced<br>JS generate elements of the new types, which making MS IE 
prior version 9 recognize, and style them appropriately.<br>--&gt;<br>&lt;!--[if lt IE 9]&gt;<br>&lt;script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"&gt; <br>p &lt;/script&gt;<br>&lt;![endif]--&gt;<br><br>      &lt;link rel="stylesheet" href="./css/style01.css"&gt;<br>      &lt;link rel="stylesheet" href="./css/xxstyle02_tabs.css"&gt;<br>      &lt;link rel="stylesheet" href="./css/xxstyle02.css"&gt;<br><br><strong>&lt;script src="key_pressed.js"&gt;&lt;/script&gt;</strong><br><br>&lt;SCRIPT LANGUAGE="JavaScript"&gt;<br>&lt;!-- Begin<br>// End --&gt;<br>&lt;/script&gt;<br><br>&lt;/head&gt;<br><br>&lt;body&gt;<br>&lt;noscript&gt;Your browser does not support JavaScript!&lt;/noscript&gt;<br>&lt;table&gt;<br>&lt;tr&gt;<br>&lt;td&gt;<br>&lt;center&gt;<br><br>&lt;h3&gt;Emulation: Tab -&gt; Enter, version 2&lt;/h3&gt;<br><br>&lt;!-- novalidate = disable HTML5 automatic form validation,<br>     so JS can do validation  <br>     &lt;SCRIPT LANGUAGE='JavaScript'&gt;console.log(flds[0]);&lt;/script&gt;<br>     (onFocus="nextfield ='box2';")<br>--&gt;<br>&lt;form name=<strong>yourform</strong>  id="testform" <br>action="file:///J:\awww\apl\dev1\my_dev\enter_tab_emul\enter_tab_emul.html"<br>novalidate&gt;<br>          &lt;SCRIPT LANGUAGE="JavaScript"&gt;<strong>var flds = new Array</strong><br>               'box1','box2','box3'<br>          );&lt;/script&gt;<br> &lt;fieldset&gt;&lt;legend&gt;f o r m  name=yourform  id="testform" &lt;/legen <br>  &lt;div&gt;&lt;label for=box1&gt;Box 1 &lt;/label&gt;&lt;input type=text <br>     name="box1"<br>     id="box1" <br>     <strong>onkeydown="return myKeyAct(this,event)"</strong><br>     autofocus /&gt;&lt;/div&gt;<br>  <br>  &lt;div&gt;&lt;label for=box2&gt;Box 2 &lt;/label&gt;&lt;input type=text <br>      name=box2 id="box2" onkeydown="return myKeyAct(this,event)"<br>  /&gt;&lt;/div&gt;<br><br>  &lt;div&gt;&lt;label for=box1&gt;Box 3 &lt;/label&gt;&lt;input type=text <br>     name=box3 id="box3" onkeydown="return myKeyAct(this,event)"<br>     required /&gt;&lt;/div&gt;<br>  <br>   <br>  &lt;div&gt;&lt;label for=submit&gt;Spremi bla, bla &lt;/label&gt;&lt;input 
     type=submit name=<strong>done</strong> id="done" value="Spremi (F10)" 
     accesskey="s" title="Klik za bla, bla [F10]" /&gt;&lt;/div&gt;<br>  <br> <br>  &lt;/fieldset&gt;<br>&lt;/form&gt;<br>&lt;/center&gt;<br>&lt;!-- <br>  http://dev1:8083/oraed/enter_tab_emul/<strong>enter_tab_emul_v2.html</strong>
  J:\awww\apl\dev1\oraed\enter_tab_emul\enter_tab_emul_v2.html<br>     &lt;a href=""&gt;&lt;/a&gt;<br>     &lt;a href="#anchor_name"&gt;&lt;/a&gt; TO JUMP TO &lt;a name="anchor_name"&gt;&lt;/a&gt;<br>          // set cursor to some form field:<br>          // SEE autofocus to set cursor to some form field:<br>          //eval('document.yourform.b1.focus()');<br>  <br>  http://dev1:8083/my_dev/test/books/a03ullman/modernjs/ch06/employee.html<br>  J:\awww\apl\dev1\my_dev\test\books\a03ullman\modernjs\ch06<br>  file:///J:/awww/apl/dev1/my_dev/test/books/predlozak/predlozak02_PgBreak_OpenClose.html<br>--&gt;<br>  &lt;/td&gt;<br>  &lt;/tr&gt;<br>&lt;/table&gt;<br>&lt;/body&gt;<br>&lt;/html&gt;<br></pre>&nbsp;&nbsp;
<pre>// J:\awww\apl\dev1\oraed\enter_tab_emul\<strong>key_pressed.js</strong><br>  //var flds = new Array('box1','box2','box3');<br>  <br>    function <strong>msg</strong>(t1,t2,t3,t4,t5,t6,txt_srvgen) { <br>       //document.getElementById('div_srvgen').innerHTML = txt_srvgen; <br>       alert(t1+"\n"+t2+"\n"+t3+"\n"+t4+"\n"+t5+"\n"+t6+"\n"+txt_srvgen); <br>    } <br><br>  function <strong>myKeyAct</strong>(field, evt) <br>  {<br>    if (evt.keyCode === 13) {<br>       // keypressed is ***enter key : goto next/first form field*** :<br>       if (evt.preventDefault) evt.preventDefault(); <br>       else if (evt.stopPropagation) evt.stopPropagation(); <br>       else evt.returnValue = false;<br><br>       var fname      = field.name; //var fieldid = field.id;<br>       var fnamenxt   = '0';<br>       var fcount     = flds.length;<br>       var flastordno = fcount - 1 ;<br>       <br>      for ( var ii = 0; ii &lt; fcount; ii++) {<br>         //msg('fname=',fname,'ii=',ii,'flds[ii]=',flds[ii],'') ;<br>      <br>        if (fname == flds[ii]) {<br>           <strong>// 1. all before last jump on NEXT :</strong><br>           if (ii &lt; flastordno) {fnamenxt = flds[++ii]; break; }<br>           <strong>// 2. last jumps on FIRST:</strong><br>           else { fnamenxt = flds[0]; break; }<br>        } <strong>// e n d  f o u n d  cur.fld.name  i n  f o r m  f l d s  a r r</strong> <br>      } <strong>// e n d  through f l d s</strong><br>       <br>               // ***UNCOMMENT THIS FOR TESTING*** :<br>               //document.write('&lt;hr /&gt;2. JS SAYS:&lt;br/&gt;' <br>               //  +'fname='+fname+'&lt;br/&gt;'+' nxtfname='+nxtfname+'&lt;hr/&gt;' <br>               //);<br>      if (fnamenxt) document.getElementById(fnamenxt).focus(); <br>      return false; // ignore keypressed<br>    //<br>    } <br>    else {<br>       // keypressed is ***not enter key*** :<br>       return true; // standard browser processing of keypressed<br>    }<br>  } // e n d  f n  my Key Action<br><br></pre>
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
<script src="/zinc/js/key_pressed.js"></script>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
// End -->
</script>

</body>
</html>
