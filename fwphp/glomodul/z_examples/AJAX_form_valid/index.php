<!DOCTYPE HTML>
<!-- 
http://dev/test/tema/utl/ajax/r r.php
    http://localhost/ajax/
J:\dev_web\htdocs\test\tema\utl\ajax\r r.php

http://dev:8082/apl/t1/ajax/ballard/Ch23/r r.php
H:\dev_web\htdocs\apl\t1\ajax\ballard\Ch23\r r.php
-->
<html>
<head>
   <title>Ajax test</title>
   <link rel="stylesheet" href="ajax.css" type="text/css">
<style>
</style>   

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<script Language="JavaScript" src="request_lib.js"></script>

<script Language="JavaScript"> 
    function msg(txt_srvgen) { 
    // onClick= "r eqsend('show_ phpparam.php','param=hello&p ar2=drugi param','msg','get','0')"
       document.getElementById('div_srvgen').innerHTML = txt_srvgen; 
       alert("U poruci na dnu stranice je tekst"
              + "\nkoji bi ovdje bio nepregledan."
              + "\n...\nF5 (refresh) ukloni poruku"          
              ); 
       // radi: onClick="msg('yyyyyyy')"
    } 

    function AJAX_help(txt_srvgen) {
       document.getElementById('div_srvgen').innerHTML = txt_srvgen; 
    }

    function servertime_xml(txt_srvgen) {
       var timeValue = txt_srvgen.getElementsByTagName("timenow")[0].childNodes[0].nodeValue
       document.getElementById('div_srvgen').innerHTML = timeValue;
    }

    function otv_zatv_xml(id) { // setFullDesc (artid) - Vasiliev
       var thisDivMast = document.getElementById('div'    + id); 
       var thisDivDet  = document.getElementById('divdet' + id); 

        if (!thisDivDet) { // obrisan detalj
            // ***********************************************
            // ne postoji 'divdet' + id -> stvoriti ga
            // ***********************************************        
          var rrobj = crr();
                                    // ovo ne ide jer r eqsend zove otv_zatv_xml2 koji ne zna 
                                    // stvoriti / obrisati div detalja !!!!!!!!! :      
                                    //r eqsend(url, urlqry, callfn, reqtype, getxml)
                                    //r eqsend('div_ detalj.php','','otv_zatv_xml2','post','1') 
                                    //if(reqtype=='post') { reqpost(url,urlqry,rrobj); }
                                    //else { reqget(url,urlqry,rrobj); }        
          rrobj.open(
               "POST" // php vraca html u p o s t var.
             , "div_open_close.php?temp=" + new Date().getTime()
             , true // asinhr.request 
          );  
          rrobj.onreadystatechange = function(){
           if (rrobj.readyState == 4) {  
             var DivDetHTML = rrobj.responseText; 
             var newDivDet  = document.createElement("div");
             newDivDet.setAttribute("id", "divdet" + id);
             newDivDet.innerHTML=DivDetHTML;
             thisDivMast.appendChild(newDivDet);
            } // status 4
           }; 
           rrobj.setRequestHeader("Content-Type",
               "application/x-www-form-urlencoded");
           // id txt odsjecka ciji detalj vraca php ("artid="+artid):
           rrobj.send("id=" + id); // G E T  param php-a
         } else { 
            // ***********************************************
            // postoji 'divdet' + id -> obrisati ga
            // ***********************************************
              thisDivMast.removeChild(thisDivDet); 
           }
    }

</script>

</head>




<body style=”background-color:#cccccc; text-align:center”>
<h3>Ajax test:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; JS poziva  PHP iz html-a klijent-serverskim načinom (refresh promjenjenog)<br>
</h3>
<form name="form1">
  <!--p>Testovi : </p-->
  <table width="100%" border="1" 
  cellspacing="2">

    <tr>
      <th style="text-align: right">Rbr</th>
      <th width="30%">Naredba</th>
      <th>Šta radi</th>
    </tr>
<!-- *************** row01 AJAX_help.php   reqsend(url, urlqry, callfn, reqtype, getxml)  --> 
    <tr>
      <td style="text-align: right">1.</td>
      
      <td ><input type="button" 
          class="btn30" value= "?" 
    onClick="reqsend('AJAX_help.php','','AJAX_help','get','0')"
      >
      HELP (F5 ukloni HELP poruku)
      </td>
      
      <td> php-om printan txt/html kojega js ubaci u div/span element ove html stranice (L1 Ballard)</td>
      
    </tr>
    <tr>       

<!-- *************** row02 show_ phpparam.php -->    
    <tr>
      <td width="31" style="text-align: right">2.</td>
      
      <td width="398"><input type="button"
           class="btn60" value= "MSG" 
           onClick="reqsend('show_phpparam.php','param=hello&par2=drugi param','msg','get','0')"
      >
      show_phpparam.php i alert
      </td>
      
      <td>php-ovom print naredbom generiran html (print svojih parametara)  kojega js prikaže u prozoru &quot;alert&quot; 
      (html ne ide u js alert). (L1 Ballard)</td>
      
    </tr>

<!-- *************** row03 show_ servertime.php -->    
    <tr>
      <td style="text-align: right">3.</td>
      
      <td><input type="button" class="btn300" value=
          "Serversko vrijeme" onClick="reqsend('show_servertime.php','','servertime_xml','post','1')"
          >
      </td>
      
      <td>PHP generira XML, JS ga ispiše u div/span (L1 Ballard)</td>
    
    </tr>

<!-- ***************************************** -->    
    
    <!--tr>
      <td style="text-align: right">4.</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr-->
 
  </table>
</form>


<br>
<!-- "r eqsend('otv_zatv01.php','','otv_zatv01_xml','post','1')" 
  di v 01               = master txt
  otv_ zatv_ xml('01') = divx detalj txt od div01 (02,03...)
          kreirati i napuniti php o utputom ili obrisati
-->

<!-- 
          OTVORIVI TXT
-->
<div id="div01">OBJAŠNJENJE PORUKE<strong> 
   u kontajneru <strong>div_srvgen</strong>
   <a href="#" onclick="otv_zatv_xml('01')"
               class = "link_txtdetalj"
   >POKAŽI_SAKRIJ</a></strong>&nbsp; (L2 Vasiliev)
</div>

<!-- 
    div_srvgen kontajner  -  JS poziva PHP iz html-a klijent-serverskim načinom (za refresh promjenjenog)
-->
<div id="div_srvgen" class="displaybox"> 
   Ispisala skripta: <?php echo basename(__FILE__) ; ?>&nbsp;&nbsp; šđčćž
   <br><br>PORUKA u kontajneru <strong>div_srvgen</strong>. 
   TU SE ISPISUJU AJAX PORUKE 1, 2 i 3 u tablici gore.<br>
</div>
  
  

<p>&nbsp;</p>
<hr />   
L1: Phil Ballard, Michael Moncur: Teach Yourself Ajax, JavaScript, and PHP All in One Copyright © 2009 by Sams Publishing June 2008&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ISBN-13: 978-0-672-32965-4  &nbsp;&nbsp; ISBN-10: 0-672-32965-4<br>
Ispisala
skripta: <?php echo __FILE__ ; ?> <br />


</body>
</html>
