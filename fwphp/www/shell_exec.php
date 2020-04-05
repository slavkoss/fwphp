<?php
// J:\awww\www\shell_exec.php
// http://dev1:8083/shell_exec.php?p=0_phpmanual.chm
// http://dev1:8083/shell_exec.php?p=J:/awww/0_phpmanual.chm

      echo '<br />$_GET ='; echo '<pre>'; print_r(str_replace('/',DIRECTORY_SEPARATOR,$_GET)); echo '</pre>';
// This function is identical to the backtick operator. 
exec( 
    //'"J:\\awww\\www\\zbig\\1_dokum\\phpmanual.chm' . '"'
    $_GET['p'] //p=program eg chm, pdf, doc, php, exe, fmx...
); 