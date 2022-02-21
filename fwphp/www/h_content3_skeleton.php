<?php
//  This is fifth of 5 home page parts (all are prefixed with "h_")
$tmp     = $img_url . 'ic_done_black_32dp.png' ;
$img_url_done_link_black = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>

  <!-- –––––––––––––––––––––––––––––––– section hero must be first (preklapa div) !! -->
  <article data-theme="light">
    <main class="container">

        <div id="share3" class="container"><a href="#lcs">TOP</a>
          <h1 class="section-heading">3. Share</h1>
          Share what you create. <a href="#">More</a> 
        </div><!-- E N D   half column -->



      <!-- Grid Bootstrap -->
      <div class="row row-example">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div> <!-- -->
            <img src="/vendor/b12phpfw/img/meatmirror.jpg"> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="https://github.com/slavkoss/fwphp/">Github</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.altervista.org/">phporacle blog</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.altervista.org/wp-admin/index.php/">blog admin</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.eu5.net/">Demo site on Linux (freehostingeu)</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href=" http://phporacle.heliohost.org/">Demo site on Linux (heliohost )</a> </div> </div>
      </div><!--e n d  Grid Bootstrap -->




        <!-- SHARE SECTION -->
        <br><br>
        <div>
          <img src="<?=$img_url?>twitter.jpg" alt="">
          <img src="/vendor/b12phpfw/img/globus.png">
          ggggggg gggggggg
        </div>

        <div>
          <p>aa111 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ... &nbsp; </p>

            <div>
              <?=$img_url_done_link_black?>ddd dddddddddd
            </div>



            <div>
              <?=$img_url_done_link_black?>hhhhhh hhhhhhh
            </div>
            <div>
              333 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas...
            </div>
      </div><!-- E N D   r o w -->

            <hr />
            This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.

        <br>examples_path_rel = <?=$examples_path_rel?>
        <br>examples_url = <?=$examples_url?>
        <br>glomodul_url = <?=$glomodul_url?>
    </main><!-- E N D   c o n t a i n e r -->
  </article><!-- E N D   s e c t i o n -->


    <!-- Footer -->
    <footer class="container">

      <small>

      <nav>
        <ul>
          <li>Theme:</li>
          <!--li><a href="#" data-theme-switcher="auto">Auto</a></li-->
          <li><a href="#" data-theme-switcher="light">Light</a></li>
          <li><a href="#" data-theme-switcher="dark">Dark</a></li>
          <li>Built with</li>
          <li><a href="https://picocss.com">Pico</a></li>
          <li><a href="https://github.com/picocss/examples/blob/master/bootstrap-grid/">Source code</a></li>
        </ul>
      </nav>




      <p>This grid example displays:
        &nbsp; &nbsp; 1 column on <strong>extra small</strong> devices <code>&lt;576px</code>
        &nbsp; &nbsp; 2 columns on <strong>small</strong> devices <code>≥576px</code>
        &nbsp; &nbsp; 3 columns on <strong>medium</strong> devices <code>≥768px</code>
        &nbsp; &nbsp; 4 columns on <strong>large</strong> devices <code>≥992px</code>
        &nbsp; &nbsp; 6 columns on <strong>extra large</strong> devices <code>≥1200px</code>
      </p>

        <p>Created with PHP 8.0.12, Pico css v1.4.4 or Skeleton V2.0.4 (2014 year) or Bootstrap 5.1.3. 
        This is typical static web page with dynamic (PHP) links. </p>


      </small>



    </footer><!-- ./ Footer -->

    <!-- Minimal theme switcher -->
    <script src="/vendor/b12phpfw/themes/picocss/minimal-theme-switcher.js"></script>
