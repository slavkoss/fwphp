<?php
switch (true) {
  case isset($wsroot_url)      : NULL ; break;
  case isset($pp1->wsroot_url) : $wsroot_url = $pp1->wsroot_url ; break;
  default: $wsroot_url = '/' ; break;
}
?>
<br>
    <!-- FOOTER -->
    <footer class="bg-dark text-white">

      <div class="container">
        <div class="row">
          <div class="col">

            <p class="lead text-center"> 
              | <span id="year"></span> &copy; phporacle (Slavko Srakočić, Zagreb) MIT licence All right Reserved.</p>
            <p class="text-center small"><a style="color: white; text-decoration: none; cursor: pointer;" 
              href="https://github.com/slavkoss/fwphp" 
              target="_blank">PHP 7 PDO DBI <?=''?> | Bootstrap 4.3.1 
              <br>&trade; B12phpfw on <?=PHP_OS.', '.php_uname()?></a></p>


           </div> <!-- e n d  c o l-->
         </div>
      </div>

    </footer>
    <!-- FOOTER END-->


<script type="text/javascript" src="<?=$wsroot_url?>zinc/themes/bootstrap/js/jquery.min.js"></script>
<script src="<?=$wsroot_url?>zinc/themes/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="<?=$wsroot_url?>zinc/themes/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$wsroot_url?>zinc/util.js"></script>

<script>
  $('#year').text(new Date().getFullYear());
</script>



</body>
</html>

          <div style="color: white;">
<?php
// https://www.php.net/manual/en/language.oop5.basic.php
//Inside a class definition, $this refers to the current object, while  self  refers to the current class.

//require_once($this->pp1->wsroot_path.'zinc/ftr.php');   class="alert alert-success"
//text-decoration: none;   background:black;

echo '<pre style="color:black; background:white;">'; // style="background:black;"
if ('1') //if ($autoload_arr['dbg']) 
{
  //if (isset($this)) //if (isset($this->uriq)) //if (is_object($this)) 

  echo '<h5>Msg (blog) module has no problem, but Mnu module displays: Fatal error: Uncaught Error: <br />Using $this when not in object context in J:\awww\www\zinc\ftr.php</h5>';

  echo 'PHP_OS='. PHP_OS .', php_uname()=' . php_uname() ;
  echo '<br />'.'$_SERVER[\'DOCUMENT_ROOT\']='.$_SERVER['DOCUMENT_ROOT']  ;
  echo '<br />'.'~~~~~~~~~<b>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</b>' ; 



      if (isset($this))  //try 
      {
        echo '<br />'.'OS web server doc root $this->pp1->wsroot_path=' . $this->pp1->wsroot_path  ;
        echo '<br />'.'Same web server doc root as URL $this->pp1->wsroot_url=' . $this->pp1->wsroot_url  ;
        //echo '<b>$autoload_arr</b>='; print_r($autoload_arr); 
        echo '<br />'.'<b>Module`s property pallete like in Oracle Forms :<br />$this->pp1</b>='; print_r($this->pp1); 
        echo '<b>URI`s query string $this->uriq</b>='; print_r($this->uriq); 



        echo '<b>$_ GET</b>='; print_r($_GET); 
        echo '<b>$_POST</b>='; print_r($_POST); 
        echo '<b>$_SESSION</b>='; print_r($_SESSION); 
        echo '<br />';
      } //catch(Exception $e) { echo $e->getMessage(); }


      else
      {
      echo '<b>$_ GET</b>='; print_r($_GET); 
      echo '<b>$_POST</b>='; print_r($_POST); 
      //echo '<b>$_SESSION</b>='; print(json_encode($_SESSION,JSON_PRETTY_PRINT)); 
      echo '<b>$_SESSION</b>='; print_r($_SESSION); 
      echo '<br />'; 
      //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
      }

} ?>
           </div><!-- e n d  p r e -->
