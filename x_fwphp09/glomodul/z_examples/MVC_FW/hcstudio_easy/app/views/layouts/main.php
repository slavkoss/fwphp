<?php
include(__DIR__ .'/hdr.php'); ?>

      <div class="container">
          <a class="button" href="<?= BASE_URL ?>">Home</a>
          &nbsp; &nbsp; <a class="button" href="<?= BASE_URL ?>/article">Articles</a>
          &nbsp; &nbsp; <a class="button" href="<?= BASE_URL ?>/site/logout">Logout</a>
      </div>

  <?= $content ?>
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