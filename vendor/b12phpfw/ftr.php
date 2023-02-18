<?php
//use B12phpfw\core\b12phpfw\Config_allsites as utl ;
//$wsroot_url = $pp1->wsroot_url ;

/*if ( isset($pp1) and is_object($pp1) ) { 
  if ( isset($pp1->wsroot_ url) and null !== $pp1->wsroot_ url ) { $wsroot_ url=$pp1->wsroot_ url; }
  else { $wsroot_ url = '/' ; } ;
} */
/*
switch (true) {
  case isset($wsroot_ url) : NULL ; break;
  default: $wsroot_ url = '/' ; break;
}
*/
?>


<!-- FOOTER -->
<hr>
<footer class="container">

    <div>
            <?php
            //setlocale(LC_TIME, "en_US");
            //echo strftime('%F', time());
            echo date('Y-m-d', time());
            if ($pp1->dbg)
            ?>
      <a href="#!">Privacy</a> &middot; <a href="#!">Terms</a> &middot; <a href="#!">Contact</a>
    </div><!-- e n d -->
  <small>

      <nav>
        <ul>
          <li>Built with</li>
          <li>PHP >= 7 PDO MySQL, Oracle</li>
          <li><a href="https://picocss.com">Pico css v1.4.4 </a></li>
          <li><a href="https://github.com/picocss/examples/blob/master/bootstrap-grid/">Pico source code</a>
              (Tested also Skeleton V2.0.4 (2014 year) & Bootstrap 5.1.3.)
          <li>Theme:</li>
          <!--li><a href="#" data-theme-switcher="auto">Auto</a></li-->
          <li><a href="#" data-theme-switcher="light">Light</a></li>
          <li><a href="#" data-theme-switcher="dark">Dark</a></li>
          </li>
        
        </ul>
      </nav>

<p>Pico Grid examples display :
 1 column on <strong>extra small</strong> devices <u>&lt;576px</u>
 2 col on <strong>small</strong> devices <u>≥576px</u>
 3 col on <strong>medium</strong> devices <u>≥768px</u>
 4 col on <strong>large</strong> devices <u>≥992px</u>
 6 col on <strong>extra large</strong> devices <u>≥1200px</u>
</p>


      <p>
        <br>ver. 11 Feb. 2022 | <?='PHP_OS is '.PHP_OS.' | php_uname(): '.php_uname()?>

        <br><span id="year"></span> &copy; phporacle (Slavko Srakočić, Zagreb) MIT licence All right Reserved. 
        This page is Part of <a style="color: brown; text-decoration: none; cursor: pointer;" 
            href="https://github.com/slavkoss/fwphp" 
            target="_blank">&trade; B12phpfw 
         </a>
      </p>

  </small>


          <?php
              if ($pp1->dbg == '1') {echo '<pre>'.__FILE__.' ln='.__LINE__.' said:';
                //echo '<br />$pp1='; print_r($pp1) ; echo '</pre>';
                if ( isset($pp1) and is_object($pp1) )
                {
                  echo '<br />'.'OS doc root adress is $this->p p 1->wsroot_ path='. $pp1->wsroot_path  ;
                  echo '<br />'.'Same web server doc root adress is $this->p p 1->wsroot_ url='. $pp1->wsroot_url  ; 
                  echo '<br><br>'.'<b>Module property pallete like in Oracle Forms :<br />$this->p p 1</b>='; 
                  print_r($pp1);
                  //echo '<b>URI`s query string $this->u r i q</b>='; print_r($pp1->urlqry_parts) //$pp1->uriq 
                } //catch(Exception $e) { echo $e->getMessage(); }
              }


        echo '<h4>'."~~~\$pp1->dbg=$pp1->dbg~~~".__FILE__ .'() '.', line '. __LINE__ .' SAYS: '
        .'<br>'
        .'</h4>' ; 

        echo 'PHP_OS='. PHP_OS .', php_uname()=' . php_uname() ;
        echo '<br />'.'$_SERVER[\'DOCUMENT_ROOT\']='.$_SERVER['DOCUMENT_ROOT']  ;
        echo '<br />'.'$_SERVER[\'REQUEST_URI\']='.$_SERVER['REQUEST_URI']  ;
        echo '<br />'.'$_SERVER[\'QUERY_STRING\']='.$_SERVER['QUERY_STRING']  ;
        echo '<br />'.'$_SERVER[\'HTTP_HOST\']='.$_SERVER['HTTP_HOST']  ;


          //if (isset($this))  //try 



          //     C O N F I G S :
          echo '<b>$_ GET</b>='; print_r($_GET); 
          echo '<b>$_POST</b>='; print_r($_POST); 
          echo '<b>$_SESSION</b>='; print_r($_SESSION); 

                    echo '<b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 

                    echo '<br /><br /><b>$p p1->url_parts arr is exploded string $_SERVER[\'REQUEST_URI\']'
                    .' (part1 before QS=? and part2 after QS)</b>'

          ?>




    </footer><!-- Footer -->

    <!-- Minimal theme switcher -->
    <script src="/vendor/b12phpfw/themes/picocss/minimal-theme-switcher.js"></script>

<!-- FOOTER END-->




<!--br /><br /-->
                <!-- 
                    h3 class="xxcard-title"
                -->
            <!--
            <button type="button" class="collapsible">
                <h5 style="color:gray;">
                  <?php //echo self::escp('CLICK ME ! - Own debugging for logical errors (Xdebug is for sintax errors)'); ?>
                </h5>
            </button>
            -->
                <!--a href="" style="float:right;"><span class="btn btn-info">More</span></a-->
                <!-- e n d  1. a r t i c l e  O S  f i l e  n a m e -->

<!-- *********exp_collapse Open/close summary, img...**********
style="color: yellow;"   class="card" class="content

style="display:none;"
-->


<!-- needed for msg, msgyn : -->
<script src="<?=$shares_url?>util.js" type="text/javascript"></script>
<!--script src="<?=$shares_url?>exp_collapse.js" language='JScript' type='text/javascript'></script-->

<script>
  //$('#year').text(new Date().getFullYear());
</script>


</body>
</html>