<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
  <title>1002 Validating a Form</title>
  <link rel="stylesheet" type="text/css" href="css/basic_2.css" />
</head>

<body>

<?php
  $firstname = $_POST['firstname'];
  $age = $_POST['age'];

  print "<h3>A Message for you $firstname</h3>";

  if ($age > 40)
  {
    print "<p>You are over the hill!</p>";
  } else {
    print "<p>There is still time to switch careers!</p>";
  }
?>


</body>
</html>
