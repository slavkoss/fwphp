<?php
/**
*  J:\awww\www\fwphp\glomodul\z_examples\01_PHP_bootstrap\bootstrap\index.php
*  http://dev1:8083/fwphp/glomodul/z_examples/01_PHP_bootstrap/bootstrap/
*/

//<!--a href="03socnet/index.php" is http://dev1:8083/fwphp/www/03socnet/index.php-->
//<!--but we need : href="<=QS>b_tmplts_socnet" which is : http://dev1:8083/fwphp/glomodul/z_examples/01_PHP_bootstrap/bootstrap/03socnet/-->

require 'inc_adresses.php' ;
require 'inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/style.css');
?>

<nav class="navbar navbar-expand-md navbar-light fixed-top py-4">
  <div class="container">
      <a href="index.php" class="navbar-brand">

        <img src="<?=$module_arr['wsroot_url']?>zinc/img/meatmirror.jpg" width="50" height="50" alt="">

        <h3 class="d-inline align-middle">Main menu</h3>

      </a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
         <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="<?=QS?>b_tmplts_socnet" class="nav-link">Socnet</a></li>
        <li class="nav-item"><a href="<?=QS?>b_tmplts_blog" class="nav-link">Blog</a></li>
        <li class="nav-item"><a href="<?=QS?>b_tmplts_site" class="nav-link">Site</a></li>
        <li class="nav-item"><a href="<?=QS?>b_tmplts_portfoligrid" class="nav-link">About me (resume)</a></li>
        <li class="nav-item"><a href="<?=QS?>b_tmplts_01help" class="nav-link">About this module</a></li>
        <li class="nav-item"><a href="<?=QS?>b_tmplts_02help" class="nav-link">About us</a></li>
      </ul>

    </div>
  </div>
</nav>


<!-- C O N T E N T -->
<section id="showcase" class="bg-light py-5">
  <div class="primary-overlay text-dark">
    <div class="container">
      <div class="row">
        <div class="col-12">

        <h3>&nbsp;</h3>
        <h3>&nbsp;</h3>

        <h3>Bootstrap 4.3.1 (2019) six PHP projects (no database, ee no table rows CRUD yet)</h3>

          <p class="">Six beautiful Bootstrap projects (submodules of module=folder "bootstrap") plus this home page seventh which show (all we need) code for easy make ibrowser GUI for fast web site pages. </p>
          
          <p><b>Table rows CRUD is much heavier task - see help below about this module and B12phpfw program skeleton in mkd and msg modules.</b></p>

        <p>HTML version is 2 MB, this php version is 180 kB - because <b>globals (header, footer...) are in zinc folder</b>. PHP is better than HTML because we have include statements : globals are in module local folder or in site global zinc folder.
        Includes from internet are slow.</p>
        
        
        <p>03socnet/index.php - SPA (single page module)</p>
        <p>04blog/index.php - not SPA, multipage module based on blog templates</p>
        <p>05site/index.php - not SPA, multipage module based on site templates</p>
        <p>HELP: 06portfoligrid/index.php - SPA - about me (my resume)
        &nbsp;&nbsp;01help/index.php - SPA - about this module&nbsp;&nbsp;
           02help/index.php - SPA - about us</p>

        </div>

      </div>
    </div>
    </div>

</section>


<h3>&nbsp;</h3>
<h3>&nbsp;</h3>
  <footer id="main-footer" class="py-5 bg-primary text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-6 ml-auto">
          <p class="lead">Copyright &copy; 2017</p>
        </div>
      </div>
    </div>
  </footer>

<?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>

</body></html>

