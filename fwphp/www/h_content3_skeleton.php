<?php
//  This is fifth of 5 home page parts (all are prefixed with "h_")
$tmp     = $img_url . 'ic_done_black_32dp.png' ;
$img_url_done_link_black = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>

  <!-- –––––––––––––––––––––––––––––––– section hero must be first (preklapa div) !! -->
  <div class="section get-help">
    <div class="container">


      <div class="row">
        <div class="one-half column">
          <h4 class="section-heading">3. Share</h4>
          <p>Share what you create.</p>
          <a class="button button-primary" href="#">More</a>

        </div><!-- E N D   half column -->

        <div class="one-half column phones">
          <img class="phone" src="/vendor/b12phpfw/img/meatmirror.jpg">
          <!--img class="phone" src="/vendor/b12phpfw/img/mvc_M_V_data_flow.jpg"-->
        </div>
            <div>
              <a target="_blank" href="https://github.com/slavkoss/fwphp/">Github</a>
              &nbsp; &nbsp; 
              <a target="_blank" href="http://phporacle.altervista.org/">phporacle blog</a>
              &nbsp; &nbsp;  <a target="_blank" href="http://phporacle.altervista.org/wp-admin/index.php/">blog admin</a>
              <br /><br />
              <a target="_blank" href="http://phporacle.eu5.net/">Demo site on Linux (freehostingeu)</a>
              <br /><br />
              <a target="_blank" href=" http://phporacle.heliohost.org/">Demo site on Linux (heliohost )</a>
            </div>



        <!-- SHARE SECTION -->
        <br><br>
        <div>
          <img src="<?=$img_url?>twitter.jpg" alt="">
          <img src="/vendor/b12phpfw/img/globus.png">
          ggggggg gggggggg
        </div>

        <div>
          <p>aa111 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ...</p>

            <div>
              <?=$img_url_done_link_black?> &nbsp; ddd dddddddddd
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
    </div><!-- E N D   c o n t a i n e r -->
  </div><!-- E N D   s e c t i o n -->


