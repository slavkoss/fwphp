<?php
//J:\awww\www\fwphp\glomodul\z_examples\ajax\simpleajax\w3schools\e01_change_content_read_txt.php
//https://www.w3schools.com/js/js_ajax_intro.asp

//file_get_contents(basename(__FILE__))
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
  // 2. URL_DOM AIN = dev1:8083 :
  . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
$REQUEST_URI = dirname(filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL)) ;

$wsroot_path = str_replace('\\','/', realpath('../../../../../../')) .'/' ;
$module_path = str_replace('\\','/', dirname(__FILE__) .'/');
         //or str_replace('/',DIRECTORY_SEPARATOR,dirname(__FILE__) . '/')

//$module_relpath = rtrim(str_replace($wsroot_path, '', $module_path),'/') ;
$module_relpath = ltrim($REQUEST_URI,'/') ;

$module_url = $wsroot_url.$module_relpath.'/';
?>
<!DOCTYPE html>
<html>
<body>
<!--
J:\awww\www\fwphp\glomodul\z_examples\ajax\simpleajax\w3schools\e01_change_content_read_txt.php
-->
<!--
   (static) information from a server
-->
  <h2>The XMLHttpRequest Object</h2>
  <?='$wsroot_path='. $wsroot_path?>
  <br /><?='$wsroot_url='. $wsroot_url?>
  <br /><?='$REQUEST_URI='. $REQUEST_URI?>
  <br /><?='$module_path='. $module_path?>
  <br /><?='$module_relpath='. $module_relpath?>
  <br /><?='$module_url=$wsroot_url.$module_relpath.\'/\'='. $module_url?>
  <br /><br />

<!--  <div> section is used to display dynamic information from a server.
   1. An event occurs in a web page (the page is loaded, a button is clicked)
 -->
<div id="demo">
  <!-- 
    Any kind of server file, eg .txt, .xml, or server scripting files like .asp and .php (which can perform actions on the server before sending the response back).
  -->
  <button type="button" onclick="loadDoc( '<?=$module_url?>e01_About_AJAX_server_script.php?param1=I am GET param value', response_handler1 )">About AJAX</button>

  <button type="button" onclick='displDoc( "aaaa<br /> bbbbbb<ol><li>LLLL</ol>" )'>Show HTML string</button>
</div>

<script>

function response_handler1(xhttp) { // = myFn1
  /*
  responseText property returns server response as JS string
  or responseXML - using this property you can parse response as an XML DOM object:
        xmlDoc = xhttp.responseXML;
        txt = "";
        x = xmlDoc.getElementsByTagName("ARTIST");
        for (i = 0; i < x.length; i++) {
          txt += x[i].childNodes[0].nodeValue + "<br>";
        }
        document.getElementById("demo").innerHTML = txt;
        xhttp.open("GET", "cd_catalog.xml", true);
        xhttp.send();
  */
  document.getElementById("demo").innerHTML = xhttp.responseText
   + '<br />'
   + '<pre>'+ xhttp.getAllResponseHeaders() + '</pre>'
  ;
}

function loadDoc(
   //possible calls are loadDoc("url-1", myFn1); and loadDoc("url-2", myFn2); :
     p_url_process_script
   , p_response_handler // may be myFn1, myFn2
)
{
  // 2. An XMLHttpRequest object is created by JavaScript
  //Both the web page and file it tries to load, must be located on the same server
  //because modern browsers do not allow access across domains

  // code for modern browsers - XMLHttpRequest object
  if (window.XMLHttpRequest) { xhttp = new XMLHttpRequest(); } 
  // code for old IE browsers (5/6) - ActiveX object
  else { xhttp = new ActiveXObject("Microsoft.XMLHTTP"); }


  //Defines a function to be called when the readyState property changes :
  //    function to be executed when request receives an answer
  //    function is defined IN onreadystatechange property of XMLHttpRequest object
  //Event triggered four times (1-4), one time for each change in the readyState.
  xhttp.onreadystatechange = //response_handler1(xhttp) ; // xhttp or this
  function() {
    if (this.readyState == 4 && this.status == 200) {
      // 5. server sends a response back to the web page
        //0: request not initialized 1: server connection established 2: request received
        //3: processing request 4: request finished and response is ready
        //200: "OK" 403: "Forbidden" 404: "Not Found"...
      //displays from a web server :
      // 6. response is read by JavaScript
      // 7. Proper action (like page update) is performed by JavaScript
            //document.getElementById("demo").innerHTML = this.responseText; //or responseXML
            //displDoc(this.responseText) ;

      //possible calls are loadDoc("url-1", myFn1); and loadDoc("url-2", myFn2); :
      //A callback fn is a fn passed as a parameter to another fn.
      //If you have more than one AJAX task in a website, you should create one fn for executing  XMLHttpRequest object, and one callback fn for each AJAX task.
      //Function call should contain URL and what fn to call when the response is ready.
      p_response_handler(this) ; // xhttp or this

    }
  } ; 


  //requests data from a web server :
  // 3.  XMLHttpRequest object sends a request to a web server
  //     GET is simpler and faster, size limited, less robust and secure
  /*
  xhttp.open("GET", p_url_process_script, true);
  //xhttp.open("POST", p_url_process_script, true); //also works, used when :
        //A cached file is not an option (update a file or database on the server)
        //Sending a large amount of data to the server (POST has no size limitations)
        //Sending user input (which can contain unknown characters)
  xhttp.send(); //or send(string) used for POST
  // 4. server (p_url_process_script) processes the request (here displays HTML help txt)
  */

  //To POST data like an HTML form, add an HTTP header with setRequestHeader(). Specify the data you want to send in the send() method:
  xhttp.open("POST", p_url_process_script, true); //true=Server requests sent asynchronously :
            //JS does not have to wait for the server response, but can instead:
            //  - execute other scripts while waiting for server response
            //  - deal with the response after the response is ready
            //false (to be removed): Since JS code will wait for server completion, there is no need for an onreadystatechange fn, after send is displDoc(this.responseText)
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("post_data1=post data 1&post_data2=post data 2");
}





function displDoc(p_txt) {
  document.getElementById("demo").innerHTML = p_txt ;
}
</script>

</body>
</html>

<?php
echo '<br /><br /><hr />'; include_once($wsroot_path .'/zinc/showsource.php');