<?php
  /**
   * http://dev1:8083/fwphp/glomodul/z_examples/ajax/simpleajax/serverfile.php?aa=12
   * J:\xampp\htdocs\fwphp\glomodul\z_examples\ajax\simpleajax\serverfile.php
   * You can query database in this file, get required text/string and print/echo it.
   * That text will be displayed by JS on the main page(example.php)
   * 
   */
  if(isset($_GET) && count($_GET) > 0) {
    echo "YESSS \$_GET : You can process \$_GET parameters and return result accordingly <br />";
    echo "This text will be displayed by JS on the main page(example.php)";
    if ('1') { echo '<br />'.__FILE__ .', lin='. __LINE__ .' SAYS: <br />json_encode( $_GET, JSON_PRETTY_PRINT ) =' ;
       echo '<pre>'; echo json_encode( $_GET, JSON_PRETTY_PRINT ) ;   echo '</pre>'; }
  }
  else {
    echo "NOOO \$_GET : This text will be displayed by JS on the main page(example.php)";
    if(isset($_POST)) { // && count($_POST) > 0
       if ('1') { echo '<br />'.__FILE__ .', lin='. __LINE__ .' SAYS: <br />$_POST=' ;
         echo '<pre>'; echo json_encode( $_POST, JSON_PRETTY_PRINT ) ;   echo '</pre>'; }
    }
  }
?>
