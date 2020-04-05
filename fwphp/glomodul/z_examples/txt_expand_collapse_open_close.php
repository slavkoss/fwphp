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

<h2>Collapsibles</h2>

<button type="button" class="collapsible">Open Collapsible1</button>
<div class="content">
  <p>1111111111111111</p>
</div>

<button type="button" class="collapsible">Open Collapsible2</button>
<div class="content">
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


