<?php 
  if(isset($_POST)) {
    echo 'First post variable in request ='.$_POST['username'];
    echo "<br>";
    echo 'Second post variable in request ='.$_POST['password'];
  }
                 //echo "YES is working";

?>