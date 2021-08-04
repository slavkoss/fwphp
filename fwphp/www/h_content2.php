<?php
//  This is fourth of 5 home page parts (all are prefixed with "h_")
$tmp     = $img_url . 'ic_done_white_32dp.png' ;
$img_url_done_link_white = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>
  <!-- C O N T E N T 2  CREATE HEAD -->
  <section id="create-head-section" class="bg-primary">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h1 class="display-4">2. Explain - Create</h1>
            <p class="lead">Write text about something.</p>
            <a href="#" class="btn btn-outline-light">Find Out More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CREATE SECTION -->
  <section id="create-section" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>2.1 Create your passion (Msg share, ACXE2, Mini3 PDO, kalendar...)</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident... </p>
          
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <?=$img_url_done_link_white?>
            </div>
            <div class="p-4 align-self-end">
              Message
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <?=$img_url_done_link_white?>
            </div>
            <div class="p-4 align-self-end">
              Todo / Done
            </div>
          </div>
          
        </div>
        <div class="col-md-6">
          <img src="<?=$img_url?>edit.png" alt="" class="img-fluid mb-3 rounded-circle">
        </div>

            <br />This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.

      </div>
    </div>
  </section>