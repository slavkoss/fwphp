<?php 
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\login_taulien\register_frm.php
  define('__CONFIG__', true); // Allow the config
  require_once "config.php"; 

  Page::ForceDashboard($module_relpath);

require_once "hdr.php"; 
?>
    <div class="uk-section uk-container">
      <div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid>

      <form action="register.php" method="post" class="uk-form-stacked js-register">
        
        <h2>Register</h2>

          <div class="uk-margin">
              <label class="uk-form-label" for="form-stacked-text">Email</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-stacked-text"
                     name="email" type="email"
                     required='required' placeholder="email@email.com">
              </div>
          </div>

          <div class="uk-margin">
              <label class="uk-form-label" for="form-stacked-text">Passphrase</label>
              <div class="uk-form-controls">
                  <input class="uk-input" id="form-stacked-text"
                     name="password" type="password" 
                     required='required' placeholder="Your passphrase">
              </div>
          </div>

          <div class="uk-margin uk-alert uk-alert-danger js-error" style='display: none;'></div>

          <div class="uk-margin">
              <button class="uk-button uk-button-default" type="submit">Register</button>
          </div>

      </form>
      </div>
    </div>

    <?php require_once "ftr.php"; ?> 
  </body>
</html>
