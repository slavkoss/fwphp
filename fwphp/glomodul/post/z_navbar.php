<?php
//J:\awww\www\fwphp\glomodul\blog\navbar.php
use B12phpfw\core\b12phpfw\Config_allsites as utl ; // init, setings, utilities

                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' said: '.'</h3>' ;
                    echo '<pre style="font-family:\'Lucida Console\'; font-size:small">';
                      echo '<b>$pp1</b>='; print_r($pp1);
                      //echo '<br><b>$_POST</b>='; print_r($_POST);
                    echo '</pre>'; }
?>
<!-- Responsive NAVBAR -->

  <div class="hero" data-theme="dark">

    <nav class="container-fluid">
        <ul>
          <li><a href="<?=$pp1->glomodul_url .'/'. $pp1->dir_menu .'/' ?>" 
                 class="contrast"><strong>Sitehome</strong></a></li>
        </ul>

        <ul>
          <?php if(empty($_SESSION['username'])){ ?>
          <li><a title="Posts dashboard" class="contrast" href="<?=$pp1->module_url?>">Posts dashboard</a></li>
          <!--li><a title="" class="contrast" href="< ?=$pp1->kalendar? >">Calendar</a></li-->
          <li><a title="" class="contrast" href="<?=$pp1->module_url.QS?>/about_module">About</a></li>
          <!--li><a title="" class="contrast" href="< ?=$pp1->features? >">Module</a></li-->
          <!--li><a title="" class="contrast" href="<?=$pp1->contact_us?>">Contact us</a></li-->
          <?php  } ?>

          <?php if(!empty($_SESSION['username'])){ ?>
             &nbsp; &nbsp; &nbsp; 
             <li><a title="Posts & other tables with CRUD functionality" class="contrast" 
                    href="<?=$pp1->posts?>">Dashboard</a></li>
             <li><a class="contrast" href="<?=$pp1->logout?>">Logout</a></li>
          <?php }else{  ?>
             <li><a class="contrast" href="<?=$pp1->loginfrm?>">Login</a></li>
          <?php  } ?>

        </ul>
    </nav>


  </div><!-- ./ Hero -->

<!-- NAVBAR END -->
