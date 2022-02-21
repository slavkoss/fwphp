<?php
//  This is third of 5 home page parts (all are prefixed with "h_")
$tmp = $img_url . 'ic_supervisor_account_black_24dp.png' ;
$img_url_users_link   =  '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp     = $img_url . 'ic_done_black_32dp.png' ;
$img_url_done_link_black = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>

  <!-- –––––––––––––––––––––––––––––––– section hero must be first (preklapa div) !! -->
  <div class="section get-help">
    <div class="container">


      <div class="row">
        <div class="one-half column">
          <h4 class="section-heading">1. Learn - Explore, Connect</h4>
          <p>See and explore what your friends write. 
             Hard work on learning is worth nothing if not explained & shared.</p>
              <!--  -->
                  <a style="display: inline;"
                     href="<?=$examples_url.'php_patterns/singleton.php'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Singleton</a>
                  <a style="display: inline;"
                     href="<?=$examples_url.'php_patterns/p08_singleton.php'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Singleton2</a>

                  <a style="display: inline;"
                     href="<?=$glomodul_url.'oraedoop/'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Oraedoop</a>

                  <!--
                     http://localhost:8083/adminer/adminer/?oracle 
                     http://dev1:8083/fwphp/glomodul/adminer/adminer/?oracle 
                     $glomodul_path.'adminer/adminer'.QS.'oracle'
                  -->
                  <a style="display: inline;"
                     href="<?=$glomodul_url .'lsweb/lsweb.php/?cmd=' . $examples_path?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link .' ALL HELP SW'?></a>  &nbsp;  


          <br><br><p><a class="button button-primary" href="#">More</a></p>

        </div><!-- E N D   half column -->

        <div class="one-half column phones">
          <img class="phone" src="/vendor/b12phpfw/img/mvc_M_V_data_flow.jpg">
          <!--img class="phone" src="/vendor/b12phpfw/img/mvc_M_V_data_flow.jpg"-->
        </div>
      </div><!-- E N D   r o w -->



        <div>
            <p>
          <b>M-V data flow</b>. <b>SEES</b> in picture means :  C assigns variables from user request in URL
          (from URL query) telling V what user wants and includes V (not showed in picture). <b>UPDATES</b> 
          in picture means : V pulls data from M according C variables. 
          <b>MANIPULATES</b> in picture means : V (user request) may call C method for some state 
          changes ordered by user (<b>USES</b> in picture) in URL ee table row updates like approve 
          user comment (see msg module). User`s events are so handled in Controller class. 
          V script may contain class but I do not see need for view classes.
          </p>
                      <p>
          View gets (singleton) or instantiates model object and pulls data from M.
          If we have user`s interactions (events) eg filter displayed rows (pagination is sort of filtering),
          than M-V data flow is only possible solution.
          </p>
                      <p>
          <b>M-C-V data flow</b> - controller instantiates M and pushes M data to V.
          I do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow
          is only possible solution, C is fat in large modules (lot of code). C in my msg (blog) module has
          lot of code, but code is very simple.
            </p>
        </div>


            <!--  -->
            <div>
              <?=$img_url_done_link_black?>aaaaaaaa aaaaaaa
              <br>
              <?=$img_url_done_link_black?> bbbbbbbbbbb bbbbbbbb
            </div>



            <hr />
            This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.

    </div><!-- E N D   c o n t a i n e r -->
  </div><!-- E N D   s e c t i o n -->
