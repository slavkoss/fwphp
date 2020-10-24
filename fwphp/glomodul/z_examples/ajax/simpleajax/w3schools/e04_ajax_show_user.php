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

<form action=""> 
  <select name="emps" onchange="showUser(this.value)">
    <option value="">Select a user:</option>
    <option value="a">a user</option>
    <option value="w ">w user</option>
    <option value="jazeb">Jazeb</option>
  </select>
</form>
<br>



<div id="txtHint">Employee info will be listed here...</div>



<script>
function showUser(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "e04_ajax_getuser.php?q="+str, true);
  xhttp.send();
}
</script>
</body>
</html>