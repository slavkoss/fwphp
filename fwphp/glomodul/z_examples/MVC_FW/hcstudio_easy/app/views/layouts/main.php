<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Easy</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bulma.min.css">
    <script defer src="<?= BASE_URL ?>/assets/js/all.js"></script>
    <script>
      <?= $js_header ?>
    </script>
  </head>
  <body>
  <?= $content ?>
  <?php
  echo '<pre>'; 
    echo 'WEB_URL='.WEB_URL;
    echo '<br>BASE_URL='.BASE_URL;
  echo '</pre>'; 
  ?>
  </body>
</html>