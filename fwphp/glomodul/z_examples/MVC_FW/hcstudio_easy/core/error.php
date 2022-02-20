<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CORE</title>

    <link rel="stylesheet" href="/vendor/b12phpfw/themes/skeleton/normalize.css">
    <link rel="stylesheet" href="/vendor/b12phpfw/themes/skeleton/skeleton.css">
  </head>

<body>
  <section>

      <div class="container">
          <a class="button" href="<?= BASE_URL ?>">Home</a>
          &nbsp; &nbsp; <a class="button" href="<?= BASE_URL ?>/article">Articles</a>
          &nbsp; &nbsp; <a class="button" href="<?= BASE_URL ?>/site/logout">Logout</a>
      </div>

    <div class="container">
      <h1 class="title">
        Error Page
      </h1>
      <p class="subtitle">
          <?php
          if (!empty($error_message)) {
              echo $error_message;
          }
          if (!empty($debug_message) and $config['debug']) {
              echo $debug_message;
          }
          ?>
      </p>
    </div>

</section>
  <?php
                                echo '<pre>'; 
                                    echo 'Script '. __FILE__ .' SAYS :';
                                    echo '<br>$_SESSION='; print_r($_SESSION);
                                    echo 'WEB_URL='.WEB_URL;
                                    echo '<br>BASE_URL='.BASE_URL;
                                echo '</pre>'; 
  ?>
</body>
</html>