<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>




<div id='showCD'></div><br>

<input type="button" onclick="previous()" value=" < ">
<input type="button" onclick="next()" value=" > ">
 &nbsp;  &nbsp; or Click on a CD to display album information.


<br><br>
<button type="button" onclick="loadXMLCDtbl()">Get my CD collection</button>


<br><br>
<table id="cd_list"></table>




<script>
var x,xmlhttp,xmlDoc

function loadXMLCDtbl() {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      loadXMLCDtbl2(this);
    }
  };
  xmlhttp.open("GET", "e02_cd_catalog.xml", true);
  xmlhttp.send();
}

function loadXMLCDtbl2(xml) {
  var i;
  xmlDoc = xml.responseXML;
  var table="<tr><th>Artist</th><th>Title</th></tr>";
  x = xmlDoc.getElementsByTagName("CD");

for (i = 0; i < x.length; i++) { 
  table += "<tr onclick='displayCD(" + i + ")'><td>";
  table += x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue;
  table += "</td><td>";
  table +=  x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue;
  table += "</td></tr>";
}
              
              /*for (i = 0; i <x.length; i++) { 
                table += "<tr><td>" +
                x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
                "</td><td>" +
                x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
                "</td></tr>";
              } */


  document.getElementById("cd_list").innerHTML = table;
}









var i = 0, len;
displayCD(i);

function displayCD(i) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      displayCD2(this, i);
    }
  };
  xmlhttp.open("GET", "e02_cd_catalog.xml", true);
  xmlhttp.send();
}

function displayCD2(xml, i) {
  var xmlDoc = xml.responseXML; 
  x = xmlDoc.getElementsByTagName("CD");
  len = x.length;
  document.getElementById("showCD").innerHTML =
  "Artist: " +
  x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
  "<br>Title: " +
  x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
  "<br>Year: " + 
  x[i].getElementsByTagName("YEAR")[0].childNodes[0].nodeValue;
}




function next() {
  if (i < len-1) {
    i++;
    displayCD_nxt_prv(i);
  }
}

function previous() {
  if (i > 0) {
    i--;
    displayCD_nxt_prv(i);
  }
}



function displayCD_nxt_prv(i) {
  document.getElementById("showCD").innerHTML =
  "Artist: " +
  x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue +
  "<br>Title: " +
  x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue +
  "<br>Year: " + 
  x[i].getElementsByTagName("YEAR")[0].childNodes[0].nodeValue;
}


</script>

</body>
</html>
