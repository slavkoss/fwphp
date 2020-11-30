<?php
//  This is third of 5 home page parts (all are prefixed with "h_")
$tmp = $img_url . 'ic_supervisor_account_black_24dp.png' ;
$img_url_users_link   =  '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp     = $img_url . 'ic_done_black_32dp.png' ;
$img_url_done_link_black = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>
  <!-- C O N T E N T 1  EXPLORE HEAD -->
  <section id="explore-head-section">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h1 class="display-4">1. Learn - Explore</h1>
            <p class="lead">See what your friends write.</p>
            <a href="#" class="btn btn-outline-secondary">Find Out More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- EXPLORE SECTION -->
  <section id="explore-section" class="bg-light text-muted py-5">
  
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <img src="<?=$img_url?>mvc_M_V_data_flow.jpg" alt="" class="img-fluid mb-3 rounded-circle">
  
        </div>

        <div class="col-md-6">
          <h3>1.1 Explore & Connect (right collumn)</h3>
          <p>See what your friends write:

                  <a style="display: inline;"
                     href="/<?=$path_rel_examples.'singleton.php'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Singleton</a>

                  <a style="display: inline;"
                     href="/<?=$app_glomodul_dir_path.'oraedoop/'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Oraedoop</a>

                  <!--
                     http://localhost:8083/adminer/adminer/?oracle 
                     http://dev1:8083/fwphp/glomodul/adminer/adminer/?oracle 
                     $app_glomodul_dir_path.'adminer/adminer'.QS.'oracle'
                  -->
                  <a style="display: inline;"
                     href="http://localhost:8083/adminer/adminer/?oracle" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>adminer</a>

          </p>
          <div class="d-flex flex-row">
            <!--div class="p-4 align-self-start"></div-->
            <div class="p-4 align-self-end">
              <?=$img_url_done_link_black?>
              div class="p-4 align-self-end" $img_url_done_link_black Lorem ipsum dolor...
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <?=$img_url_done_link_black?>
            </div>
            <div class="p-4 align-self-end">
              div class="p-4 align-self-start" $img_url_done_link_black Lorem ipsum dolor...
            </div>
          </div>
        </div><!-- class="col-md-6" -->

            <p>
<b>M-V data flow</b>. <b>SEES</b> in picture means :  C assigns variables from user request in URL (from URL query) telling V what user wants and includes V (not showed in picture). <b>UPDATES</b> in picture means : V pulls data from M according C variables. 
<b>MANIPULATES</b> in picture means : V (user request) may call C method for some state changes ordered by user (<b>USES</b> in picture) in URL ee table row updates like approve user comment (see msg module). User`s events are so handled in Controller class. 
V script may contain class but I do not see need for view classes.
</p>
            <p>
View gets (singleton) or instantiates model object and pulls data from M.
If we have user`s interactions (events) eg filter displayed rows (pagination is sort of filtering), than M-V data flow is only possible solution.
</p>
            <p>
<b>M-C-V data flow</b> - controller instantiates M and pushes M data to V.
I do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow is only possible solution, C is fat in large modules (lot of code). C in my msg (blog) module has lot of code, but code is very simple.
            </p>
            <hr />
            This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.


      </div><!-- class="row" -->
    </div><!-- class="container" -->
  </section>