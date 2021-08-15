<?php //4: index.php  1=fns, 2=hdr, 3=
  require_once 'header.php';

  echo "<br><span class='main'>Welcome to Socnet, ";

  if ($loggedin) echo " $user, you are logged in.";
  else           echo ' please sign up and/or log in to join in.';
?>

    </span><br><br>
  </body>
</html>
