<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title><?= ($title ?? 'NOTITLE'); ?></title>

  <!--
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
  -->
    <link href="<?=$siteUrl?>zinc/themes/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a class="navbar-brand" href="<?=$moduleRelPath?>index.php">ModuleHome</a>

  <div class="collapse navbar-collapse show">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="/">SiteHome</a></li>
      <li class="nav-item"><a class="nav-link" href="<?=$moduleRelPath?>index.php/profile">Profile</a></li>
    </ul>
  </div>
</nav>

<main class="container">
  <?php if (isset($content)) {

      echo $content;

  } else { ?>
    <div class="jumbotron">
      <h1 class="display-4">Hello world!</h1>

      <div class="alert alert-warning">
          No content was provided for main layout.
      </div>

      <!-- J:\awww\www\fwphp\glomodul\z_examples\02_mvc\01workshop\m oduleh ome.php -->
      <br /><hr /><p class="lead">This is the main layout, loaded from :
        <br /><code><?php echo __DIR__ . '/modulehome.php'; ?></code>
        <pre><?php //echo '$_SERVER[\'PATH_INFO\']=' . $_SERVER['PATH_INFO'] ; ?></pre>
        <pre><?php echo '$siteUrl='. $siteUrl; ?></pre>
        <pre><?php echo 'bootstrap.min.css_URL='. "{$siteUrl}zinc/themes/bootstrap/css/bootstrap.min.css"; ?></pre>
      </p>

    </div>
  <?php } ?>
</main>


</body>
</html>
