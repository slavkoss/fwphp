<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr"> 
<head> 
	<title></title> 
	<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
       <!-- iso-8859-2 windows-1250 -->
	<meta name="description" content="{metadescription}" /> 
	<meta name="keywords" content="{metakeywords}" /> 
  
<style type="text/css">
    body {
	    margin-left: 100px;
	    margin-right: 30px;
    }
    input.right{
      text-align:right;
    } 
    td.right{
      text-align:right;
    } 
</style>
  
<script type="text/javascript">

function RetAsTabFfox(obj,e) {
// poziv: .' onkeypress="return RetAsTabFfox(this,event)"'
   if(! window.event) // not I E:
   {  //alert('Pritisnut je ENTER');
       var e=(typeof event!='undefined')?window.event:e;// IE : Moz 
       if(e.keyCode==13){ 
         var ele = document.forms[0].elements; 
         for(var i=0;i<ele.length;i++)
         { 
           var q=(i==ele.length-1)?0:i+1;
           // if last element : if any other 
           if(obj==ele[i]){
             ele[q].focus();
             break;
           } 
         } 
      return false; 
       } 
  } // e n d  not I E

} // e n d  f n

function RetAsTabIE() {
// poziv: .' onKeyDown="return RetAsTabIE()"'
     //var key;
     if(window.event) // I E:
     {  //alert('IEEEEE Pritisnut je ENTER');
        //key = window.event.keyCode; 
        //if(key==13){window.event.keyCode=9; return 9};
        if(event.keyCode==13){event.keyCode=9; return event.keyCode};
     }
} // e n d  f n

   function go_item(p_event, p_fldid_go) {
    // radi u MS IE  i FFox-u i ...
		if( p_event.keyCode==13 ) {
			var vgo_item = document.getElementById(p_fldid_go);
			vgo_item.focus();
		}        
	//document.write("ispisao JS script u head-u stranice (i slcicu strelice).");
	}
  
function moveEnter() {
   if ( (event.which && event.which == 13) 
       || (event.keyCode && event.keyCode == 13))
   { event.keyCode=9; }
}
//in aspx.cs:
// CtrlTextBox.Attributes.Add("onkeydown", "javascript:moveEnter();");
  
///////////////////////////////////////	
</script>

</head> 


<body>
<hr/>
<p>
</p>


<?php


//subdatot|002_Vtipd|php|H:\dev_web\htdocs\fw\mdl\tipd\view_tipd.php
//H:\dev_web\htdocs\fw\z_test\enter_tab_emul.php
//http://dev:8082/fw/z_test/enter_tab_emul.php
              $wai =  'fn='. __FUNCTION__ .'()'
              .' file=' . __FILE__ . "\n".'cls=' .__CLASS__  .'';
  $t1 = "";
  
//
//$charset = 'utf-8'; //'windows-1250'; //'ISO-8859-2';
$save_gif = '../view/rc/save.gif';
//$save_gif = realpath(FWPATH . 'view/rc/save.gif');
    //nece ovo: H:\dev_web\htdocs\fw\view\rc\save.gif
    //   <title>D:\dev_web\htdocs\oci8test.php</title>
$frm_action = $_SERVER['SCRIPT_NAME'] ;

$t1 .= <<<EOTXT
Izaberite tip dokumenta 
<h2>Tipovi dokumenata</h2>


<!--******************
GLAVA TABLICE
*******************-->
<form name="tipdoc" method="post" action="$frm_action">


<table style="width: 40%; border: 1px solid green;">


<!--******************  
TOOLBAR1  id="f1"  tabindex="1111" onkeyup="go_item(event,'f2')"
*******************-->
<!--*****END TOOLBAR1*****-->


<!--******************
TOOLBAR2   nece ovo: H:\dev_web\htdocs\fw\view\rc\save.gif
hoce ovo: view/rc/save.gif
*******************-->
<tr>

<th style="background: lightgray;" colspan="3" >   

	<form name=frm_numrows" method="post" action="$frm_action">
   <input class="right" type="text" name="numrows" id="idnumrows"
          value="100" size="5" maxlength="15" 
          /> redaka &nbsp; |< &nbsp; < &nbsp; > &nbsp; >|    
	</form>

  <img src="$save_gif" alt="$save_gif" border="0"
       align="right" valign="bottom"  />
</th> 

</tr>
<!--*****END TOOLBAR2*****-->


<tr>
<th style="background: lightgreen;" colspan="3" >

           Izbornik dokumenata (i promjene)
			   
</th>
</tr>

<tr>
<th>Rbr</th><th>Oznaka</th><th>Naziv</th>
</tr>
<tr><td> </td><td>1</td><td>2</td></tr>


EOTXT;


   //
  //$c = oci_connect("hr", "hr", "localhost/XE");
  $c = oci_connect("mercedes", "m1", "localhost/XE");
  $s = oci_parse($c, "select SIFRA_TIP_DOC, OPIS 
                      from T_TIP_DOC order by OPIS");
  oci_execute($s);
  //
  $ii=0;  
//while (($row = $this->utl->oget('db')->row()) != false) 
while ( ($row = oci_fetch_array($s, OCI_ASSOC)) != false) 
{ $jj=0;
            if (0) { echo '<pre> oci_fetch_array($s, OCI_ASSOC)=' ;
              print_r($row);  echo '</pre>'; }
     
     $t1 .= "<tr>";
     
     $t1 .= '<td class="right" width="5%">'. (++$ii) . "</td>";
     ++$jj; $t1 .= '<td width="5%">'.'<input type="text"'
            .' name="SIFRA_TIP_DOC"'
            .' class="right"'
            .' size="3" maxlength="3"'
            .' value="'.htmlentities($row['SIFRA_TIP_DOC']) .'"'
      //id="IDSIFRA_TIP_DOC"
      .' id="f'.$ii.'_'.$jj.'" tabindex="'.$ii.'"'
      //." onkeyup=\"go_item(event,'f00$jj')\" "
      .' onKeyDown="return RetAsTabIE()"'
      .' onkeypress="return RetAsTabFfox(this,event)"'
      .' />'
      ."</td>";
            //.'onKeyPress="return event.keyCode!=13">'
            //.'onKeyPress="If (event.keyCode=13) return 9;">'
      
     ++$jj; $t1 .= '<td width="50%">'.'<input type="text"'
            .' name="OPIS"'
            .' size="30" maxlength="30"'
            //.' class="right"'
            .' value="' //.htmlentities($row['OPIS']) 
            //.($row['OPIS']?htmlspecialchars($row['OPIS']):' ')
            .$row['OPIS']
            .'"'
      .' id="f'.$ii.'_'.$jj.'" tabindex="'.$ii.'"'
      //." onkeyup=\"go_item(event,'f00$jj')\" "
      .' onKeyDown="return RetAsTabIE()"'
      .' onkeypress="return RetAsTabFfox(this,event)"'
      .' />'
      ."</td>";
     
     $t1 .= " </tr>";
} // e n d  w h i l e
    
  $t1 .= "</table></form>";
  
  $t1 .=  ' <script type="text/javascript">
     document.getElementById("f1_1").focus();
  </script>';
  //
  //$this->pageContent = $t1;
  echo $t1;
   
  //
            if (0) { print "<pre>\n" 
               . $wai . ' lin='. __LINE__ ."\n" 
               . '$pgcrepars[\'ctrklasa\']=________' //."\n" 
               .$pgcrepars['ctrklasa']; //. $this->pageContent
                echo '</pre>'; }


?>
</body>
</html>