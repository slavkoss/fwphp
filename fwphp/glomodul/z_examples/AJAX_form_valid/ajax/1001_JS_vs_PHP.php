<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
  <title>1001 Basic JavaScript Syntax</title>

  <link rel="stylesheet" type="text/css" href="css/basic_2.css" />

</head>

<body>

<div>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <p>
      Enter First Name:<br />
      <input type="text" name="firstname" id="firstname" size="30" />
      </p>


      <p>
      <input type="submit" value="Display Message" />
      <input type="reset" />
      </p>
  </form>
</div>

<div id="messagediv">
    <?php
      displayMessage();
    ?>
</div>


</body>
</html>

<?php

  function displayMessage()
  {
    $displayHTML = getFormInfo();

    print $displayHTML;
  }


  function getFormInfo()
  {
    $msg = "<p>Messages:<br />";

    if (isset($_POST['firstname']))
    {
      $firstname = $_POST['firstname'];

      $firstname_UC = strtoupper($firstname);

      if ($firstname_UC == 'STEVE')
      {
        $msg .= "<br />You must be the instructor";
      } else {
        $msg .= "<br />You must be the student named ".$firstname;
      }
    } else {
      $msg = "<br />none";
    }

    return $msg;
  }

?>