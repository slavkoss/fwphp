<?php
// 2. View.php
// J:\awww\www\fwphp\glomodul4\help_sw\test\01_MVC_learn\02hopkins_2009_clickme\v.php
namespace B12phpfw\clickmeModule ;
//use B12phpfw\L1hopkins_2009_clickme\m;
//use B12phpfw\L1hopkins_2009_clickme\c;

class v
{
  private $m;
  //private $c;

  //public function __construct(c $c, m $m) {
  public function __construct(m $m) {
      //$this->c = $c; //Dependency Injection
      $this->m = $m; //Dependency Injection
  }

  public function out($ctrakcmethod_for_link)
  {
    // v knows for m - pulls m data. I do not like this.
    $content = '<div class="row">
  <div class="col-md-10 mx-auto">'
       . __FILE__ .' SAYS:'
      . '<h3>'
      . '<a href="?action='.$ctrakcmethod_for_link.'">'.$this->m->data->lnk_txt.'</a>'
      .'</h3>'
      . $this->m->data->txtdata
      . '     </div>
 </div>'
    ;


    // ----------------------------------------
    // I Added, not needed for toggleable link : 
    ob_start(); //or ob_ start("callbackfn");
    ?>
    <div class="row">
      <div class="col-md-10 mx-auto">
      <p>
        <a href='./' class="btn btn-success">
           <span style="font-size:1.2em">This module Home (Top mnu is App.Home)</span>
        </a>
      </p>
      <?=__METHOD__?>() method SAYS : 
      <pre>Query string parameters :  htmlspecialchars(print_r($_GET, true)) = 
        <?='$_GET='.htmlspecialchars(print_r($_GET, true))?>
      </pre>


      <?php 
      include __DIR__.'/home.php';
      $content .= ob_get_contents();
    ob_end_clean(); //ob_end_flush(), ob_get_flush()...
    // E N D  Added, not needed for togglable link 
    // ----------------------------------------------
    ?>       </div>
      </div>
    <?php
      
    return $content;
  }
}