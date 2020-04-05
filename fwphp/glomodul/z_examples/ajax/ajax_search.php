<?php
/**
* J:\awww\www\fwphp\glomodul\z_examples\AJAX\ajax_search.php
*
* When user types character "showResult()" is executed (triggered by "onkeyup" event)
*
* If input field is empty (str.length==0), the function clears the content of the livesearch placeholder and exits the function.
*
* If the input field is not empty, the showResult() function executes the following:
* Create an XMLHttpRequest object
* Create the function to be executed when the server response is ready
* Send the request off to a file on the server
* Notice that a parameter (q) is added to the URL (with the content of the input field)
*/
?>
<html>
<head>
<script>

function showResult(str) 
{
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }

  // code for IE7+, Firefox, Chrome, Opera, Safari
  if (window.XMLHttpRequest) { xmlhttp=new XMLHttpRequest();
  // code for IE6, IE5
  } else { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); }
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        document.getElementById("livesearch").innerHTML=this.responseText;
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
      }
    }

  xmlhttp.open("GET","ajax_search_server.php?q="+str,true);
  xmlhttp.send();
}

</script>
</head>


<body>

<form>
<input type="text" size="30" onkeyup="showResult(this.value)">

<div id="livesearch"></div>
</form>

</body>
</html>