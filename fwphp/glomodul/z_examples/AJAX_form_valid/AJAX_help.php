<!DOCTYPE HTML>
<html>
<!-- 		AJAX iz PHP-a test
Kome: slavko.srakocic@inet.hr i slavko@asg.hr

http://dev1:8083/01apl/04wish/utl/ajax/r r.php
http://dev1:8083/01apl/04wish/utl/ajax/AJAX_help.php

http://dev/test/books/ajax/ballard/Ch23/AJAX_help.php
J:\awww\apl\dev1\01apl\04wish\utl\ajax\AJAX_help.php (2012)

Klijentska skripta poziva serversku (klijent-serversko web pozivanje potprograma) radi :
u ibrowseru
pregaziti dio stranice div_srvgen stringom txt_srvgen
txt_srvgen može biti u 6 oblika: txt / CSV / JSON / html / xml / JS.
JS može: 
    - pozvati serversku skriptu (php) da stvori txt_srvgen 
    - i ubaciti ga u div (span) element stranice ili u dijalog js alert.

Vrijeme na serveru: 20:30:36 I spisala s kripta: J:\dev_web\htdocs\test\books\ajax\ballard\Ch23\div_ detalj.php

Ispis skripte AJAX_help.php (to isto ispiše r r.php): 

HELP: Ovo je sadržaj diva "div_srvgen" napunjen asihronim JS http pozivom serverske skripte.
Korisnik ne čeka kao kod ibrowserovog sinhronog http requesta.
Asihroni JS http request je klijent-serversko pozivanje potprograma iz html-a
tj klient (js) poziva serverski potprogram (php) i prikazuje njegov o utput u div ili span containeru.
To je klijent-serversko web programiranje. 

r r.js = reqest-response proceduralni JS library 
koji sadrži sve programe za:
r r.php koji asinhrono poziva ovaj .php ovako:
1. U r r.php:
   Za txt u div: 
      value= "?" onClick=
      "r eqsend('AJAX_help.php','','AJAX_help','get','0')"   
      function AJAX_help(txt_srvgen) {
        //AJAX_help.php stvori txt_srvgen 
        //get param (u url-u do 255 znakova)
        //0=txt (1=xml)
        document.getElementById('div_srvgen').innerHTML = text; 
      }
   Za JS alert txt-a ili html-a:
      value= "MSG" onClick=
        "r eqsend('show_ phpparam.php'
      ,'param=hello&par2=drugi param','msg','get','0')"
      function msg(txt_srvgen) { 
document.getElementById('div_srvgen').innerHTML = txt_srvgen; 
        alert(txt_srvgen); // radi: onClick="msg('yyyyyyy')"
      }
   Za xml u div:
       value="PHP XML u div/span" onClick=
"r eqsend('show_ servertime.php','','servertime_xml','post','1')"
       function servertime_xml(txt_srvgen) {
         var timeValue = 
txt_srvgen.getElementsByTagName("timenow")[0].childNodes[0].nodeValue
document.getElementById('div_srvgen').innerHTML = timeValue;
       }

2. U r r.js:

// js procedural library: crossbrowser, GET, POST param. php-a
function crr() { 
// new = create request-response object
//document.write('1111111 hhhhhhhhhhhh
')
//document.writeln('222222222222 sss')
//alert('1111111');
try {
     req = new XMLHttpRequest(); // e.g. Firefox 
     } catch(err1) {
       try {
       req = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (err2) {
         try {
         req = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (err3) {
          req = false;
         }
       }
     }
     return req;
}

function cbc(callfn, txt_srvgen) { 
   //doCallback = ime fn je varijabla
   eval(callfn + '(txt_srvgen)');
}

function reqget(url, query, req) {
//alert('2222222');
  // add random number to URL to avoid IE cache problems
  myRand=parseInt(Math.random()*99999999);
  req.open("GET",url+'?'+query+'&rand='+myRand,true);
//document.writeln('aaaaaa')
  req.send(null);
}

function reqpost(url, query, req) {
  req.open("POST", url,true);
  req.setRequestHeader('Content-Type', 
      'application/x-www-form-urlencoded');
  req.send(query);
}

function r eqsend(url, query, callfn, reqtype, getxml) {
   var rrobj = crr();
   
   rrobj.onreadystatechange = function() {
   if(rrobj.readyState == 4) {
      if(rrobj.status == 200) {
        document.getElementById('div_srvgen').innerHTML = '' 
//http.responseXML.getElementsByTagName("timenow")[0]; 
//document.getElementById('showtime').innerHTML = 
//timeValue.childNodes[0].nodeValue;       
         var txt_srvgen = rrobj.responseText;
         if(getxml==1) {
            txt_srvgen = rrobj.responseXML;
         } 
         cbc(callfn, txt_srvgen);
       }
     } else { // nije r ro bj.r eady S tate == 4
           document.getElementById('div_srvgen').innerHTML = 
             '' 
             + ' rrobj.readyState=' + rrobj.readyState
             + ' rrobj.status=' + rrobj.status
             + ' rrobj.statusText=' + rrobj.statusText                          
           ;
              }
   }
   
   if(reqtype=='post') { reqpost(url,query,rrobj); }
   else { reqget(url,query,rrobj); }  
   
//alert('--r s e n d ( ) kraj');
}

ŠĐČĆŽ =&Scaron;&#272;&#268;&#262;&#381;
šđčćž =&scaron;&#273;&#269;&#263;&#382;
I spisala s kripta: J:\dev_web\htdocs\test\books\ajax\ballard\Ch23\AJAX_help.php

-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
<style>
.plava {color: #0000FF} 
.plava_bold {color: #0000FF; font-weight: bold; }
.tzelena_bold {color: darkgreen; font-weight: bold; 
   font:20px
}
.bold_darkblue_yellow {color: #0000A0;
   background-color:#FFFF99;
   font-weight: bold;
}
.bold_violet_white {   color: #800080;
   font-weight: bold;
}
</style>

</head>

<body>


<strong>

<span style="”background-color:#cccccc;">Ispisala skripta: <?php echo basename(__FILE__) ; ?></span>
<br><br>
HELP:</strong> Ovo je sadržaj diva 
"div_srvgen" napunjen <strong>asihronim</strong> JS http pozivom serverske skripte.<br />
Korisnik ne čeka kao kod ibrowserovog <strong>sinhronog</strong> http requesta.<br />
Asihroni JS http request je <span class="bold_violet_white"> klijent-serversko pozivanje potprograma iz html-a</span><br>
tj <strong>klient (js) poziva serverski potprogram (php) i prikazuje njegov o utput u div ili span containeru</strong>.<br>
To je <span class="bold_violet_white">klijent-serversko web programiranje</span>. <br />
<br>
r r.js = reqest-response proceduralni JS library <br>
koji sadrži sve programe za:<br>
r r.php koji asinhrono poziva ovaj .php ovako:
<pre>1. <strong>U <span class="bold_darkblue_yellow"> </span></strong>:
   Za txt u div: 
      value= &quot;<span class="plava_bold">?</span>&quot; onClick=
         <br>&quot;<strong>r eqsend</strong>('AJAX_help.php','','<strong>AJAX_help</strong>','get','0')&quot;   
      function <strong class="tzelena_bold">AJAX_help</strong>(<strong>txt_srvgen</strong>) {
        //AJAX_help.php stvori txt_srvgen <br>        //get param (u url-u do 255 znakova)
        //0=txt (1=xml)<br>        document.getElementById('<strong>div_srvgen</strong>').innerHTML = text; <br>      }
   Za JS alert txt-a ili html-a:<br>      value= &quot;<span class="plava_bold">MSG</span>&quot; 
         onClick=
            <br> &quot;<strong>r eqsend</strong>('show_ phpparam.php'
      ,'param=hello&amp;par2=drugi param',<strong>'msg'</strong>,'get','0')&quot;<br>      function <span class="tzelena_bold">msg</span>(<strong>txt_srvgen</strong>) { <br>document.getElementById('div_srvgen').innerHTML = txt_srvgen; <br>        alert(txt_srvgen); // radi: onClick=&quot;msg('yyyyyyy')&quot;<br>      }<br>   Za xml u div:<br>       value=&quot;<span class="plava_bold">PHP XML u div/span</span>&quot; 
         onClick=<br>&quot;<strong>r eqsend</strong>('show_ servertime.php','','<strong>servertime_xml</strong>','post','1')&quot;<br>       function <span class="tzelena_bold">servertime_xml</span>(txt_srvgen) {<br>         var timeValue = <br>txt_srvgen.getElementsByTagName(&quot;timenow&quot;)[0].childNodes[0].nodeValue<br>document.getElementById('div_srvgen').innerHTML = timeValue;<br>       }

2. <strong>U <span class="bold_darkblue_yellow">r r.js</span></strong>:<br>
// js procedural library: crossbrowser, GET, POST param. php-a<br>function <span class="tzelena_bold">crr</span>() { <br>// new = <strong>create request-response object</strong>
//document.write('1111111 hhhhhhhhhhhh<br />')
//document.writeln('222222222222 sss')
//alert('1111111');
try {
     req = new XMLHttpRequest(); // e.g. Firefox 
     } catch(err1) {
       try {
       req = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (err2) {
         try {
         req = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (err3) {
          req = false;
         }
       }
     }
     return req;
}

function <span class="tzelena_bold">cbc</span>(callfn, txt_srvgen) { <br>   //<strong>doCallback = ime fn je varijabla</strong>
   eval(callfn + '(txt_srvgen)');
}

function <strong>reqget</strong>(url, query, req) {
//alert('2222222');
  // add random number to URL to avoid IE cache problems
  myRand=parseInt(Math.random()*99999999);
  req.open("GET",url+'?'+query+'&rand='+myRand,true);
//document.writeln('aaaaaa')
  req.send(null);
}

function <strong>reqpost</strong>(url, query, req) {
  req.open("POST", url,true);
  req.setRequestHeader('Content-Type', 
      'application/x-www-form-urlencoded');
  req.send(query);
}

function <span class="tzelena_bold">reqsend</span>(url, query, callfn, reqtype, getxml) {
   var rrobj = crr();
   
   rrobj.onreadystatechange = function() {
   if(rrobj.readyState == 4) {
      if(rrobj.status == 200) {
        document.getElementById('div_srvgen').innerHTML = '' 
//http.responseXML.getElementsByTagName("timenow")[0]; 
//document.getElementById('showtime').innerHTML = 
//timeValue.childNodes[0].nodeValue;       
         var txt_srvgen = rrobj.responseText;
         if(getxml==1) {
            txt_srvgen = rrobj.responseXML;
         } 
         cbc(callfn, txt_srvgen);
       }
     } else { // nije r ro bj.r eady S tate == 4
           document.getElementById('div_srvgen').innerHTML = 
             '<img src="lubanja_srednjak.jpg">' 
             + ' rrobj.readyState=' + rrobj.readyState
             + ' rrobj.status=' + rrobj.status
             + ' rrobj.statusText=' + rrobj.statusText                          
           ;
              }
   }
   
   if(reqtype=='post') { reqpost(url,query,rrobj); }
   else { reqget(url,query,rrobj); }  
   
//alert('--r s e n d ( ) kraj');
}

ŠĐČĆŽ =&amp;Scaron;&amp;#272;&amp;#268;&amp;#262;&amp;#381;<br>šđčćž =&amp;scaron;&amp;#273;&amp;#269;&amp;#263;&amp;#382;
</pre>

</body>
</html>
