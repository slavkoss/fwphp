<?php
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
        // 2. URL_DOM AIN = dev1:8083 :
      . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Collapsibles</title>

  <link rel="stylesheet" href="<?=$wsroot_url?>zinc/exp_collapse.css">
  <style></style>

</head>


<body>

<h2>Collapsibles (F5 or ctrl+r to close all)</h2>
<p>style="display:none; - without it here works, but all opened in home.php, to be all closed style="display:none; is needed !!!</p>

<button type="button" class="collapsible">Open Collapsible1</button>
<div class="content" style="display:none;">
  <p>1111111111111111</p>
</div> <!-- class="content" Collapsible-->

<button type="button" class="collapsible">Open Collapsible2</button>
<div class="content" style="display:none;">
  <p>222222222222222222222</p>
</div>


   <script src="<?=$wsroot_url?>zinc/exp_collapse.js" 
           language='JScript' type='text/javascript'></script>
<script>
                    /* var coll = document.getElementsByClassName("collapsible");
                    var i;

                    for (i = 0; i < coll.length; i++) {
                      coll[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var content = this.nextElementSibling;
                        if (content.style.display === "block") {
                          content.style.display = "none";
                        } else {
                          content.style.display = "block";
                        }
                      });
                    } */
</script>

                        <!--
                        background-color: #777;


                      .collapsible {
                        background-color: lightgray;
                        color: black;
                        cursor: pointer;
                        padding: 18px;
                        width: 100%;
                        border: none;
                        text-align: left;
                        outline: none;
                        font-size: 15px;
                      }

                      .active, .collapsible:hover {
                        background-color: #555;
                      }

                      .content {
                        padding: 0 18px;
                        display: none;
                        overflow: hidden;
                        background-color: #f1f1f1;
                      } 


                        <p>Collapsible Set:</p>
                        <button type="button" class="collapsible">Open Section 1</button>
                        <div class="content">
                          <p>1111</p>
                        </div>
                        <button type="button" class="collapsible">Open Section 2</button>
                        <div class="content">
                          <p>2222</p>
                        </div>
                        <button type="button" class="collapsible">Open Section 3</button>
                        <div class="content">
                          <p>3333</p>
                        </div>
                        -->
</body></html>


<!DOCTYPE html>
<html>
<head>
           <title>IElementTraversal Example</title>

<script>
  function GetListItems () {
      var list = document.getElementById ("girls");       // find our list
      var results = document.getElementById("results");   // get our results line element
      var oChild = list.lastElementChild;                 // start with the last item in list
      results.innerHTML = "<br />";
      while (oChild) {                                    // get and display each item in list
         results.innerHTML += "<br/>" + oChild.innerHTML;
          oChild = oChild.previousElementSibling;         // get previous element in list
          }
  }
  function GetListItems2 () {
      var list = document.getElementById ("girls");       // find our list
      var results = document.getElementById("results");   // get our results line element
      var oChild = list.firstElementChild;                // start with the first item in list
      results.innerHTML = "<br />";
      while (oChild) {                                    // get and display each item in list
          results.innerHTML += "<br />" + oChild.innerHTML;
          oChild = oChild.nextElementSibling;             // get next element in list
          }
  }
  function refresh()
     {
       window.location.reload( false );           //reload our page
     }

  //****************************************
        function GetListItems () {
            var list = document.getElementById ("myList");

            if ('firstElementChild' in list) {
                var child = list.firstElementChild;
                while (child) {
                    alert (child.innerHTML);
                    child = child.nextElementSibling;
                }
            }
            else {
                var child = list.firstChild;
                while (child) {
                    if (child.nodeType == 1 /*Node.ELEMENT_NODE*/) {
                        alert (child.innerHTML);
                    }
                    child = child.nextSibling;
                }
            }
        }






</script>
</head>




<body>
    <br /><br />
    <ol id="girls">
        <li>Sugar</li>
        <li>Spice</li>
        <li>Everything nice</li>
    </ol>
    <p id="results">Girls have: </p>
    <p>
    <button onclick="GetListItems ();">Get list backwards</button>
    </p>
   <p>
    <button onclick="GetListItems2 ();">Get list forwards</button>
    </p>
    <p>
      <input type="button" value="Refresh page" onclick="refresh()"   />
    </p>


    <br /><br /><br />
    <ol id="myList">
        <li>Apple</li>
        <li>Peach</li>
        <li>Cherry</li>
    </ol>
    <button onclick="GetListItems ();">Get the list items!</button>



</body>
</html>






<!DOCTYPE html> 
<html> 

<head> 
  <title> 
  DOM nextSibling Property 
  </title> 
</head> 

<body style="xxxtext-align: xxxcenter"> 

  <h2 style="color:green;"> 
  DOM nextElementSibling Property 
  </h2> 

  <h4 id="h42">Web Languages:</h4> 
  <select size="4"> 
    <option>HTML</option> 
    <option id="Select">CSS</option> 
    <option>JAVA SCRIPT</option> 
    <option>XML</option> 
  </select> 

  <br> 
  <br> 
  <button onclick="open_next_of_css()">Next of CSS</button> 

  <button onclick="open_1()">open_1</button> 
  <button onclick='document.getElementById("p").innerHTML ="";'>Close</button> 

  <br> 
  <br> 

  <div id="p001" style="display: none; padding:5; margin:auto; width: 80%;">
        111111 aaaaaaaa bbbbbbbbb
  </div> 


  <p id="p" style="padding:5; margin:auto; width: 80%;"></p> 

  <script> 
    function open_1() {
      //var to_open = 'KKKKKK'; //document.getElementById("p001").innerHTML; 
      document.getElementById("p").style.color = "white"; 
      document.getElementById("p").style.background = "green"; 
      //document.getElementById("p").innerHTML = to_open.text; //not working
      document.getElementById("p").innerHTML = document.getElementById("p001").innerHTML; 
    } 

    function open_next_of_css() { 
      var a = document.getElementById("Select").nextElementSibling; 
      document.getElementById("p").innerHTML = a.text; 
      document.getElementById("p").style.color = "white"; 
      document.getElementById("p").style.background = "green"; 
    } 

  </script> 
</body> 

</html> 
