<?php
session_start();
include_once ('lang.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="/zinc/themes/bootstrap/css/bootstrap.min.css" 
          rel="stylesheet" media="screen">
    <title>Multi language website</title>
</head>


<body>
<div>Change language: 
<a href="?lang=hr">Croatian</a> | <a href="?lang=en">English</a> | <a href="?lang=de">Deutch</a>
</div>
<ul>
    <li><a href="/"><?=$home?></a> </li>
   <li><a href="blog.php"><?=$blog?></a> </li>
   <li><a href="news.php"><?=$news?></a> </li>
    <li><a href="contact.php"><?=$contact?></a> </li>
</ul>

<div id="welcome"><h1><?=$welcome?></h1></div>

</body>
</html>