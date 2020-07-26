<!-- 
    J:\awww\www\fwphp\glomodul\z_examples\02_mvc\login_taulien\ftr.php

jQuery is required
-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script -->

<!-- UIkit JS -->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/js/uikit-icons.min.js"></script>

<script src="<$module_relpath>/z_main.js"></script -->

      <?php
//http://dev1:8083/%3Cbr%20/%3E%3Cb%3ENotice%3C/b%3E:%20%20Und…%3C/b%3E%20on%20line%20%3Cb%3E12%3C/b%3E%3Cbr%20/%3E/main.js
        echo "<hr /> &nbsp; Today is: " . date("Y.m.d") ;

        if (isset($module_relpath)) echo ', $module_relpath='.$module_relpath ;
        else echo ', $module_relpath is not set.' ;

        if (isset($_SERVER['QUERY_STRING'])) echo '<br />$_SERVER[\'QUERY_STRING\']='. $_SERVER['QUERY_STRING'] ;
        else echo '<br />$_SERVER[\'QUERY_STRING\'] is not set.' ;
        
        if (isset($_SESSION['user_id'])) echo '<br />$_SESSION[\'user_id\']='. $_SESSION['user_id'] ;
        else echo '<br />$_SESSION[\'user_id\'] is not set.' ;
      ?> 
  </body>
</html>