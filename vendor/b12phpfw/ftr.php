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

<!-- Footer-->
<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
            <div class="col-auto">
                <a class="link-light small" href="#!">Privacy</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Terms</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#!">Contact</a>
            </div>
        </div>
    </div>
</footer>




<!--footer class="bg-dark text-white"-->

  <div class="container px-5">
    <div class="row">
      <div class="col">

        <!--bigger font: p class="lead text-center"--> 
        <p class="small text-center"> 
          <span id="year"></span> &copy; 
          phporacle (Slavko Srakočić, Zagreb) MIT licence All right Reserved. 
          <br>
          <span class="small text-center">
            This site is on : code skeleton 
            <a style="color: blue; text-decoration: none; cursor: pointer;" 
               href="https://github.com/slavkoss/fwphp" 
               target="_blank">&trade; B12phpfw </a>
                  ver. 8 November 2021 | PHP >= 7, PDO DBI | Bootstrap >=5.1.3
                  <br><?='PHP_OS '.PHP_OS.', php_uname(): '.php_uname()?>
          </span>
        </p>


       </div> <!-- e n d  c o l-->
     </div>
  </div>

</footer>
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
<?php
if ($pp1->dbg)
{ ?>
  <br>
  <!--div class="xxxcontent"-->
    <!--div class="xxxcard"-->
      <?php
      // https://www.php.net/manual/en/language.oop5.basic.php
      //Inside a class definition, $this refers to the current object, while  self  refers to the current class.

      //r equire_ once($this->p p1->wsroot_path.'zinc/ftr.php');   class="alert alert-success"
      //text-decoration: none;   background:black;

      echo '<pre style="color:black; background:white;">'; // style="background:black;"
      if ('1') //if ($autoload_arr['dbg']) 
      {
        //if (isset($this)) //if (isset($this->u riq)) //if (is_object($this)) 

        //if ( isset($pp1) and is_object($pp1) ) {...  is solution for : echo '<h5>Msg (blog) module has no problem, but Mnu module displays: Fatal error: Uncaught Error: <br />Using $this when not in object context in J:\awww\www\b12phpfw\ftr.php</h5>';

        echo '<h3>'."~~~\$pp1->dbg=$pp1->dbg~~~".__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h3>' ; 

        echo 'PHP_OS='. PHP_OS .', php_uname()=' . php_uname() ;
        echo '<br />'.'$_SERVER[\'DOCUMENT_ROOT\']='.$_SERVER['DOCUMENT_ROOT']  ;
        echo '<br />'.'$_SERVER[\'REQUEST_URI\']='.$_SERVER['REQUEST_URI']  ;
        echo '<br />'.'$_SERVER[\'QUERY_STRING\']='.$_SERVER['QUERY_STRING']  ;
        echo '<br />'.'$_SERVER[\'HTTP_HOST\']='.$_SERVER['HTTP_HOST']  ;


          //if (isset($this))  //try 
          if ( isset($pp1) and is_object($pp1) )
          {
            echo '<br />'.'OS web server doc root $this->p p 1->wsroot_ path=' 
                 . $pp1->wsroot_path  ;
            echo '<br />'.'Same web server doc root as URL $this->p p1->wsroot_ url=' 
               . $pp1->wsroot_url  ; 
            echo '<br />'.'<b>Module property pallete like in Oracle Forms :<br />$this->p p 1</b>='; 
            print_r($pp1);
            //echo '<b>URI`s query string $this->u r i q</b>='; print_r($pp1->uriq); 
          } //catch(Exception $e) { echo $e->getMessage(); }


          //     C O N F I G S :
          echo '<b>$_ GET</b>='; print_r($_GET); 
          echo '<b>$_POST</b>='; print_r($_POST); 
          echo '<b>$_SESSION</b>='; print_r($_SESSION); 
          echo '<br />';



                    //       R O U T I N G :
                      echo '<h3>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h3>'
                      .'Coding step c s 0 2. R O U T I N G ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                    //
                    echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 

                    echo '<br /><br /><b>$p p1->uri_ arr is exploded string $_SERVER[\'REQUEST_URI\']'
                    .' (part1 before QS=? and part2 after QS)</b>'
                    .'<br />part1 index 0 is <b>$p p1->module_ relpath=</b>'. $pp1->module_relpath
                    .'<br />part2 index 1 is <b>$p p1<>uri_ qrystring</b> = key-value pairs ee = url parameters after QS = '. $pp1->uri_qrystring
                    .'  <br />$this->p p1->uri_ arr='; print_r($pp1->uri_arr);

                    echo '<br /><br /><b>EXPLODED $p p1->uri_ qrystring (on /) is'
                    .' $this->p p1->uri_ qrystring_ arr</b>=';
                        print_r($pp1->uri_qrystring_arr);
                    //echo '<br /><b>key-value pairs in one assoc arr line =  $u riq</b>='; print_r($u riq);
                    echo '<br />From $p p1->uri_ qrystring_ arr <b>method in Home_ ctr and method parameters : $this->u riq</b>='; print_r($pp1->uriq);




          //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'

      } ?>
    <!-- </div> e n d  p r e -->

  <!-- </div>  class="content" (C ollapsible) Summary, img...-->
  <!-- ******************** E N D Open/close summary, img... **************** -->
<?php
} ?>


<br /><br /><br />

<!-- 
    Show components requiring JavaScript
    Alerts for dismissing
    Buttons for toggling states and checkbox/radio functionality
    Carousel for all slide behaviors, controls, and indicators
    Collapse for toggling visibility of content
    Dropdowns for displaying and positioning (also requires Popper.js)
    Modals for displaying, positioning, and scroll behavior
    Navbar for extending our Collapse plugin to implement responsive behavior
    Tooltips and popovers for displaying and positioning (also requires Popper.js)
    Scrollspy for scroll behavior and navigation updates

needed for bootstrap : -->
<!--script src="<?=$shares_url?>themes/bootstrap/js/jquery.min.js" type="text/javascript"></script-->
<!-- needed for : -->
<!--script src="<=$shares_url>themes/bootstrap/js/popper.min.js"></script-->


<!-- Bootstrap core JS-->
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script-->
<script src="<?=$shares_url?>themes/bootstrap/js/bootstrap.bundle.min.js" type="text/javascript"></script>

<!-- Core theme JS-->
<!-- needed for msg, msgyn : -->
<script src="<?=$shares_url?>util.js" type="text/javascript"></script>

<!--script src="<?=$shares_url?>exp_collapse.js" language='JScript' type='text/javascript'></script-->

<script>
  //$('#year').text(new Date().getFullYear());
</script>


</body>
</html>