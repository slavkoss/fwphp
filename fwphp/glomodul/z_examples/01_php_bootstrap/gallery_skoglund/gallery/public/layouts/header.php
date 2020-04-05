<html>
  <head>
    <title>Photo Gallery</title>
    <link href="stylesheets/main.css" media="all" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div id="header">
      <h1>Photo Gallery: user <?=isset($_SESSION['username'])?$_SESSION['username']:'Guest'?></h1>
    </div>
    <div id="main">
