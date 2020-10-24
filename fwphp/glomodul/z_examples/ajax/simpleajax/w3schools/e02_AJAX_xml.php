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

<h2>The XMLHttpRequest Object</h2>

<button type="button" onclick="loadDoc()">Links</button>
<br><br>



<table id="ajax_links_tbl"></table>



<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      myFunction(this);
    }
  };
  xhttp.open("GET", "e02_ajax_links.xml", true); //ajax_search.xml, cd_catalog.xml
  xhttp.send();
}
function myFunction(xml) {
  var i;
  var xmlDoc = xml.responseXML;

  //var table="<tr><th>Artist</th><th>Title</th></tr>"; //Get my CD collection
  var table="<tr><th>Title</th><th>Link</th></tr>";

  var x = xmlDoc.getElementsByTagName("link"); // CD
  for (i = 0; i <x.length; i++) {
    var v_lnk = x[i].getElementsByTagName("url")[0].childNodes[0].nodeValue ;
    table += "<tr><td>" +
    x[i].getElementsByTagName("title")[0].childNodes[0].nodeValue + "</td><td>"
    + '<a href="'+ v_lnk + '">' + v_lnk + "</a></td></tr>"
    ;
  }

  document.getElementById("ajax_links_tbl").innerHTML = table;

}
</script>

</body>
</html>
