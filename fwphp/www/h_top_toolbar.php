<?php
//<!-- J:\awww\www\fwphp\www\h_top_toolbar.php -->
// http://dev1:8083/fwphp/www/
$tmp = $img_url . 'ic_view_module_white_24dp.png' ;

$img_url_modules_link = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
$tmp = $img_url . 'ic_supervisor_account_black_24dp.png' ;
$img_url_users_link   =  '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';


?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
<div class="container">
    <!-- http://dev1:8083/fwphp/www5?h - works -->
    <a href="" class="navbar-brand">SocNet</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarCollapse">

    <ul class="navbar-nav ml-auto">
      <!--li class="nav-item"><a href="" class="nav-link">Home</a></li-->
          <!-- http://dev1:8083/fwphp/www/   - works call Home_c -->
      <!--li class="nav-item">
        <a href="../<=basename(__DIR__).Q S.'home'>" class="nav-link" target="_blank">FlexSkin</a>
      </li-->
      <li class="nav-item"><a href="#explore-head-section" class="nav-link"><b>L</b>earn</a></li>
      <li class="nav-item"><a href="#create-head-section" class="nav-link"><b>C</b>reate</a></li>
      <li class="nav-item"><a href="#share-head-section" class="nav-link"><b>S</b>hare</a></li>
    </ul>






    <!-- 
           H E L P  DROP DOWN MENU 
      <li class="nav-item"><a href="<=Q S>h" class="nav-link"><b>H</b>elp</a></li>
      
    -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown mr-3">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
         title="Include help / template scripts. (Included scripts SEE CALLING SCRIPT VARIABLES)"><?=$img_url_modules_link?> Help
      </a>
              <div class="dropdown-menu">

                  <a href="<?=QS?>h1" class="dropdown-item" target="_blank"
                     title=""
                  ><?=$img_url_users_link?> 2 cols</a>

                  <a href="<?=QS?>h2" class="dropdown-item" target="_blank"
                     title=""
                  ><?=$img_url_settings_link?> 4 cols CSSplay</a>

                  <a href="<?=QS?>h3" class="dropdown-item" target="_blank"
                     title=""
                  >Flex (phpenthusiast)</a>

              </div>
    </li>

    </ul>



    <!-- 
           MULTILANGUAGE DROP DOWN MENU 
      <li class="nav-item"><a href="<=Q S>h" class="nav-link"><b>H</b>elp</a></li>
      
    -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown mr-3">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
         title="Select pages language"><?=$img_url_modules_link?> <?=$lang?>
      </a>
              <div class="dropdown-menu">

                  <a href="<?=QS?>lang=hr" class="dropdown-item" target="_blank"
                     title=""
                  ><?=$img_url_users_link?> Croatian</a>

                  <a href="<?=QS?>lang=en" class="dropdown-item" target="_blank"
                     title=""
                  ><?=$img_url_settings_link?> English</a>


              </div>
    </li>

    </ul>




    <!-- 
           U S E R / S E T T I N G S  DROP DOWN MENU 
    -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown mr-3">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
         title="Links to modules (php scripts dirs like Oracle Forrms fmb modules)">
         <?=$img_url_modules_link.$Modules_Login?>
      </a>
              <div class="dropdown-menu">
                  <!-- profile.php  $wsroot_url.$path_rel_glomodul.'/user/' -->
                  <a href="<?='../glomodul/user/'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Users (Register/Login/Loguut)

                  </a>
                  <a href="settings.php" class="dropdown-item" target="_blank">
                      <?=$img_url_settings_link?>Settings
                  </a>

                  </a>
                  <a href="xyz.php" class="dropdown-item" target="_blank">
                      <?=''?>xyzzzzzzzzz xxxxxxxxxx yyyyyyyyyy zzzzzzzz 
                  </a>

              </div>
      </li>

      <!--li class="nav-item">
        <a href="h_login.php" class="nav-link" target="_blank">
          <i class="fas fa-user-times"></i> Login
        </a>
      </li-->

    </ul>








  </div><!--class="collapse..."-->
</div> <!--class="container"-->
</nav>
