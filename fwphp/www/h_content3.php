<?php
//  This is fifth of 5 home page parts (all are prefixed with "h_")
$tmp     = $img_url . 'ic_done_black_32dp.png' ;
$img_url_done_link_black = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>
  <!-- C O N T E N T 3  SHARE HEAD -->
  <section id="share-head-section" class="bg-secondary bg-gradient text-dark bg-opacity-25">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h1 class="display-4">3. Share</h1>
            <p class="lead"> Share what you create. </p>
            <a href="#" class="btn btn-outline-light">Find Out More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SHARE SECTION -->
  <section id="share-section" class="py-5 bg-light text-muted">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?=$img_url?>twitter.jpg" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
        <div class="col-md-6">
          <h3>3.1 Share what you create</h3>
          <p>111 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ...</p>
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <?=$img_url_done_link_black?>
            </div>
            <div class="p-4 align-self-end">
              <a target="_blank" href="https://github.com/slavkoss/fwphp/">Github</a>
              &nbsp; &nbsp; 
              <a target="_blank" href="http://phporacle.altervista.org/">phporacle blog</a>
              &nbsp; &nbsp;  <a target="_blank" href="http://phporacle.altervista.org/wp-admin/index.php/">blog admin</a>
              <br /><br />
              <a target="_blank" href="http://phporacle.eu5.net/">Demo site on Linux (freehostingeu)</a>
              <br /><br />
              <a target="_blank" href=" http://phporacle.heliohost.org/">Demo site on Linux (heliohost )</a>
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <?=$img_url_done_link_black?>
            </div>
            <div class="p-4 align-self-end">
              333 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas...
            </div>
          </div>
        </div>

            <br />This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.

      </div>
    </div>
  </section>
