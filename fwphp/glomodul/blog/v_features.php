<?php
//J:\awww\www\fwphp\glomodul4\blog\v_features.php

 $title = 'Blog module features' ;
 require_once("navbar.php");
?>
<div class="container">
  <div class="row mt-4">

    <!-- Main Area Start-->
    <div class="col-sm-8 ">
      <h1>Blog module features</h1>
      <h1 class="lead">Responsive CMS Blog (PHP, PDO, Bootstrap 4, jQuery only for Bootstrap, no AJAX)</h1>


        Real life site code examples. PHP WEB modules like Oracle Forms, ee each module in own dir (not three dirs M, V, C for all modules) - it is not easy to see need to eg for user module convert code from procedural MVC to OOP MVC with namespaces and autoloading like my fwphp modules : main mnu fwphp\www5 and op.system files cRUd fwphp\glomodul4\mkd (c and d we do in op.system, not in mkd !). 
        <br /><br />To me seems that my fwphp modules mnu (in www dir) and mkd could be best standard for large sites but I am not shure. For navigation (url-s, links) code is same - OOP does not help. Procedural MVC user module code is more clear and readable. So why is OOP better ? This module should show why.

      </div>

      <?php require_once("home_side_area.php"); ?>
    </div>
</div>
