  <h2>ftr aaaaaaa&nbsp;</h2>

  <?php if(isset($super_hero_image)) { ?>
    
    <div class="expanding-wrapper">
      <?php //$image_url = url_for('images/' . $super_hero_image); ?>
      <img id="super-hero-image" src="<?php echo $super_hero_image; ?>" />

      <footer>
        <?php include(PRIVATE_PATH . 'copyright_disclaimer.php'); ?>
      </footer>
    </div>
    
  <?php } else { ?>
    
    <footer>
      <?php include(PRIVATE_PATH . 'copyright_disclaimer.php'); ?>
    </footer>
    
    <?php
  }
  echo '<br />$_SERVER[\'SCRIPT_NAME\']='. $_SERVER['SCRIPT_NAME'] ;
  echo '<br />PUBLIC_REL_PATH='. PUBLIC_REL_PATH ;
  echo '<br />PRIVATE_PATH='. PRIVATE_PATH ;
  ?>

  </body>
</html>
