/*
J:\awww\www\fwphp\glomodul\z_examples\AJAX_form_valid\request_lib.js (6 hits)
	Line 2:  f unction m sgtest(text) { 
	Line 6:  f unction c re_request_response_obj() { // new = create request - response objest
	Line 26: f unction d oCallback(callfn, txt_srvgen) { // d oCallback = ime fn je varijabla
	Line 30: f unction r eqget(url, urlqry, req) {
	Line 39: f unction r eqpost(url, urlqry, req) {
	Line 46: f unction r eqsend(url, urlqry, callfn, reqtype, getxml) 


function msgtest(text) { 
    alert(text); // radi: onClick="msg('yyyyyyy')"
} 
*/
function cre_request_response_obj() { // new = create request - response objest
//document.write('1111111 hhhhhhhhhhhh<br />')
//document.writeln('222222222222 sss')
//alert('1111111');
//try {
     req = new XMLHttpRequest(); // e.g. Firefox 
     /* NO MORE NEEDED : } catch(err1) {
       try {
       req = new ActiveXObject("Msxml2.XMLHTTP");
       } catch (err2) {
         try {
         req = new ActiveXObject("Microsoft.XMLHTTP");
         } catch (err3) {
          req = false;
         }
       }
     } */
     return req;
}

function doCallback(callfn, txt_srvgen) { // callfn = ime fn je varijabla
   eval(callfn + '(txt_srvgen)');
}

function reqget(url, urlqry, req) {
//alert('2222222');
  // add random number to URL to avoid IE cache problems
  myRand=parseInt(Math.random()*99999999);
  req.open("GET",url+'?'+urlqry+'&rand='+myRand,true);
                             //document.writeln('aaaaaa')
  req.send(null);
}

function reqpost(url, urlqry, req) {
  req.open("POST", url, true);
  req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  req.send(urlqry);
}

function reqsend(url, urlqry, callfn, reqtype, getxml) 
{ // onClick= "reqsend('show_ phpparam.php','param=hello&par2=drugi param','msg','get','0')"
   var rrobj = cre_request_response_obj();
   
   rrobj.onreadystatechange = function() {
       if(rrobj.readyState == 4) 
       {
          if(rrobj.status == 200) {
            document.getElementById('div_srvgen').innerHTML = '' 
             var txt_srvgen = rrobj.responseText;
                            //alert(txt_srvgen); // POKAZE CIJELI txt (X M L...)
             //ne radi: 'cijeli x m l =' + rrobj.responseXML.xml
             if(getxml==1) {
                txt_srvgen = rrobj.responseXML;            
                            //alert( // POKAZE IZNOS CVORA TIMENOW:
                            //rrobj.responseXML.getElementsByTagName("timenow")[0].childNodes[0].nodeValue
                            //);
             } 

             doCallback(callfn, txt_srvgen); // npr m s g  i txt generiran php-om

          }
       } /*else { // nije r ro bj.r eady S tate == 4   '<img src="lubanja_srednjak.jpg">' 
               document.getElementById('div_srvgen').innerHTML = ''
                 + ' rrobj.readyState=' + rrobj.readyState
                 + ' rrobj.status=' + rrobj.status
                 + ' rrobj.statusText=' + rrobj.statusText                          
               ;
                  } */
   }
   //reqsend(url, urlqry, callfn, reqtype, getxml)
   //"reqsend('show_ servertime.php','','servertime_xml','post','1')" 
   if(reqtype=='post') { reqpost(url,urlqry,rrobj); }
   else { reqget(url,urlqry,rrobj); }  
   
                        //alert('--r s e n d ( ) kraj');
}
