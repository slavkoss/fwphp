<!DOCTYPE html>
<html lang="hr">

  <head>
    <meta charset="UTF-8 (sans BOM)">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head tag -->
    
    <meta name="description" content="B12phpfw Own PHP framework">
    <meta name="author" content="Slavko Srakočić, Zagreb, Croatia (see my blog at http://phporacle.altervista.org)">
    <meta name="licence" content=GPL2">


    <link href="/zinc/themes/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <!--link href="/zinc/themes/site/yosemite.css" rel="stylesheet" type="text/css"-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Title, Custom css -->

    <!-- get attrib. APP_ NAME (short), APP_ TITLE (long)
         VENDOR_ NS = VENDOR NAMESPACE PREFIX, NOT DIR 
         pp = array of iniparams
    -->    
    <title>Clickme</title>
    
  <style type="text/css">

  .auto-style1 {
 color: #FF00FF;
}

  </style>
    
    
</head>  
  
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">  
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed"   
        data-toggle="collapse" data-target="#topFixedNavbar1" 
        aria-expanded="false">
      <span class="sr-only">Toggle navigation</span>
Menu<span class="glyphicon glyphicon-chevron-down"></span>
      </button>
        
        <a class="navbar-brand" href="#">B12phpfw</a>
      </div>
      
      
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="topFixedNavbar1">
        <ul class="nav navbar-nav">
          <!--li class="active"-->
          <li class="active">
            <a href="?">
Home<span class="sr-only">(current)</span></a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
Places to See<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Yosemite Valley</a></li>
              <li><a href="#">Half Dome</a></li>
              <li><a href="#">Glacier Point</a></li>
              <li><a href="#">Waterfalls</a></li>
              </ul>
            </li>            
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
Activities<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Camping</a></li>
              <li><a href="#">Hiking</a></li>
              <li><a href="#">Birdwatching</a></li>
              </ul>
            </li>
            
          <li><a href="../L1hopkins_2009_clickme_orig/about">
About</a></li>
            
          </ul>
        </div>
      <!-- /.navbar-collapse -->
      </div>
    <!-- /.container-fluid -->
  </nav>






<div class="container-fluid"></div>
  <div class="container">
    <div class="row">  
  
<!-- J:\awww\apl\dev1\aplw\Possys\tipdok\Ymenu_top.php 
    Application Module menu below Site menu -->
<div class="row">

</div>
  
    
  <div class="container">
    <div class="row">

    </div>

    <div class="row">
       <div class="col-md-10 mx-auto">
    
<?=__FILE__.' SAYS:<br />'?>
    
     <p><b>1. Hello World example</b> We don't have any Controller-specific functionality if we don't have any USER INTERACTIONS defined with our app ($_GET(), $_POST) - View holds all of the functionality as the example is purely for display purposes. </p>
     
     <p><b>2. Clickme example</b> added functionality to the controller, thereby adding INTERACTIVITY to the app. </p>
     
     

<h2>On what are my MVC examples based</h2>

<p>April 2017, my Web search:&nbsp;&nbsp;&nbsp;&nbsp; php mvc no framework simple pure tutorial<br>
    <br>see <a href="http://dev1:8083/inc/_SetGet_test.php">
    http://dev1:8083/inc/_SetGet_test.php</a> <br><br>
<b><span style="color:fuchsia">[L1] Best DI :
    <a href="http://dev1:8083/aplw/tests/L1hopkins_2009_clickme/">
    http://dev1:8083/aplw/tests/L1hopkins_2009_clickme/</a> <br> </span></b>
 March 04, 2013

Thanks Callum Hopkins. <br>No PSR-4 autoloading (no namespaces) in Callum\'s code (I added it plus link toggle functionality).
<br />
<b>Clickme example (link toggle) is must learn (both data flows) !!</b>

<br><a href="https://www.sitepoint.com/the-mvc-pattern-and-php-1">
    https://www.sitepoint.com/the-mvc-pattern-and-php-1</a> <br>
    <a href="https://www.sitepoint.com/the-mvc-pattern-and-php-2">
    https://www.sitepoint.com/the-mvc-pattern-and-php-2</a>

<br> 
<br />Logic - DATA FLOW - <strong>v pulls (DI) m.$data</strong>.&nbsp; Could 
    also be (better ?) : "c-m, c-v" ee <strong>v recives from c by ref model's $data</strong> ee no data flow m-v,<br>
    ee m and v&nbsp; do not comunicate. <br><br>BOTH 
    DATA FLOWS ARE OK :
<ol>
<li>
<span style="color:#333333">Data flow C&lt;-&gt;M, C-&gt;V.</span> "C updates M / C pass M data 
to V byref", m and v do not comunicate, <br><br>

<li>
<span style="color:#333333">Data flow C-&gt;M-&gt;V. </span>Callum's "CupdatesM / Vpulls(DI)-M",&nbsp; v&nbsp; comunicates with m, possible with c, ee v DI m (possible DI c), 
<br>Good:&nbsp; v does not know about c method 
which 
updates M data.<br></ol>

<br> 
</span><br><span class="auto-style1"><strong>[L2]</strong></span> <span style="color:#333333">
    <span class="posted-on">
    <time class="entry-date published" datetime="2009-08-10T00:38:57+00:00">
    August 10, 2009</time> </span>author <strong>Adlian</strong> : Data flow <strong>C&lt;-&gt;M, C&lt;-&gt;V (which I prefer. I also 
    prefer entity classes</strong>). <br>
    <a href="../../02L2adlian_mvc_2009/"><strong>
    ../../02L2adlian_mvc_2009/</strong></a> <br>
<span style="color:#333333">
<a href="http://php-html.net/tutorials/model-view-controller-in-php/">http://php-html.net/tutorials/model-view-controller-in-php/</a>
    <br>
<a href="http://sourceforge.net/projects/mvc-php/files/mvc.zip/download">http://sourceforge.net/projects/mvc-php/files/mvc.zip/download</a>
<br>
    </span>
</span>Most simple beginning MVC classes, only Read of&nbsp; CRUD, no namespaces 
(<span style="color:#333333">no PSR-4 autoload</span>).
    <span style="color:#333333"> <br>(If you do not understand [L1] and [L2] - forget 
(PHP) programming.)</span><br>
<br><span class="auto-style1"><strong>[L3]</strong></span> MINI3 - Simple beginning MVC classes 
        <span style="color:#333333">: namespaces (Composer's </span>PSR-4 autoload 
        classes) - 
good idea: <strong>SONGS APP</strong>: <br> <span style="color:#333333">
    <a href="../../03mini3fw/"><strong>
    ../../03mini3fw/</strong></a>&nbsp;&nbsp;&nbsp;&nbsp; <strong>
    <a href="../../01L3song/">../../01L3song/</a></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>december 2016   
<a href="https://github.com/panique/mini3">https://github.com/panique/mini3</a> 
        <br><br> <span style="color:#333333">
    <strong>
    <a href="../../01inanz/">../../01inanz/</a>&nbsp; 2016.10.23&nbsp; </strong>&nbsp;<a href="http://www.inanzzz.com/index.php/post/07gt/creating-a-simple-php-mvc-or-framework-application-from-scratch">http://www.inanzzz.com/index.php/post/07gt/creating-a-simple-php-mvc-or-framework-application-from-scratch</a>&nbsp; 
</span><br><br><span style="color:#333333">
    <strong>
    <a href="../../03xuding_users2017/">../../03xuding_users2017/</a>&nbsp; 
        users table</strong></span><br><br> <br>
<br>[L4] Invoices PSR-4 autoload October 14, 2016 
<a

rel="author" href="https://google.com/+DanielGheorghe">Daniel Gheorghe</a><br>
<a href="https://www.codepunker.com/blog/develop-your-own-mvc-application-in-php">https://www.codepunker.com/blog/develop-your-own-mvc-application-in-php</a> 

  <p> Oct 23, 2016 :<br>&nbsp;<a href="http://juancadima.com/custom-php-mvc-framework-part-3-controllers/">http://juancadima.com/custom-php-mvc-framework-part-3-controllers/</a> </p>
<p>&nbsp;<a href="https://learn.openenergymonitor.org/electricity-monitoring/emoncms-internals/architecture">https://learn.openenergymonitor.org/electricity-monitoring/emoncms-internals/architecture</a>
</p>
<p>&nbsp;<a href="https://nodeme.blogspot.hr/2016/06/write-your-own-php-mvc-framework-part-1.html">https://nodeme.blogspot.hr/2016/06/write-your-own-php-mvc-framework-part-1.html</a>  </p>
<p>
<span style="color:#333333">
<a href="https://www.sitepoint.com/the-mvc-pattern-and-php-1/">
<strong>https://www.sitepoint.com/the-mvc-pattern-and-php-1/</strong></a>&nbsp; 
and ...-2</span></p>
<p>
<a data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://github.com/PatrickLouys/no-framework-tutorial&amp;source=gmail&amp;ust=1493710705616000&amp;usg=AFQjCNFE7kf9wZKfhJFcyYJdI5PeAKX_WQ" href="https://github.com/PatrickLouys/no-framework-tutorial" target="_blank">
https://github.com/PatrickLouywbr>s/<strong>no-framework-tutorial</strong></a></p>
<p>
<a href="http://symfony.com/doc/current/create_framework/index.html">
http://symfony.com/doc/current/create_framework/index.html</a> </p>
<p>&nbsp;</p>

</div>
  </div>





<div class="row"><div class="col-md-12  mx-auto"><br /><h1>&nbsp;</h1></div></div>

<div class="row">
  <div class="col-md-6 mx-auto">
      <p class="">&nbsp;&nbsp;<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Model<br><br>&nbsp; 
      4. M updates V&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      3. </strong><span class="auto-style2"><strong>C manipulates M</strong></span><strong><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Controller<br><br>&nbsp; 
      1. V sees user&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
      2. user uses C eg through link in V<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      User</strong>
      </p>
  </div>


  <div class="col-md-6 mx-auto">
      <pre>&lt;?php
      // 1. Model.php
      class Model
      {
          public $string;

          public function __construct(){
              $this-&gt;string = "MVC + PHP!";
          }
      }</pre>

     </div>
 </div>


<p>&nbsp;</p>
<div class="row">
  <div class="col-md-6 mx-auto">
    <pre>&lt;?php
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

  public function out($ctrakcmethod)
  {
    // v knows for m - pulls m data. I do not like this.
    $content = __FILE__.' SAYS:'
      . '&lt;h3>'
      . '&lt;a href="?action='.$ctrakcmethod.'">'.$this->m->data->lnk_txt.'&lt;/a>'
      .'&lt;/h3>'
      . $this->m->data->txtdata
    ;


    // ----------------------------------------
    // I Added, not needed for toggleable link : 
    ob_start(); //ob_start("callbackfn");
    ?>
      &lt;br />&lt;p>
        &lt;a href='./'
           class="btn btn-success">
           &lt;span style="font-size:1.2em">
      This module Home (Top mnu is App.Home)&lt;/span>
        &lt;/a>
      &lt;/p>

      &lt;?php 
      echo 'v.out() SAYS : &lt;pre>'; //print_r(self::$p1,true);
        echo '&lt;br />'.'Query string parameters :  htmlspecialchars(print_r($_GET, true)) = ';
        echo htmlspecialchars(print_r($_GET, true));
      echo '&lt;/pre>';
    
      include __DIR__.'/home.php';
      $content .= ob_get_contents();
    ob_end_clean(); //ob_end_flush(), ob_get_flush()...
    // E N D  Added, not needed for togglable link 
    // ----------------------------------------------
    
      
    return $content;
  }
}</pre>
     </div>



  <div class="col-md-6 mx-auto">
      <pre>&lt;?php
      // 3. Controller.php
      class Controller
      {
          private $model;

          public function __construct($model) {
              $this-&gt;model = $model;
          }
          
          public function clicked() {
              $this-&gt;model-&gt;string = '<strong>Updated Data! </strong><span class="auto-style2"><strong>3. C manipulates M</strong></span>'
          }
          
      }</pre>
     </div>
  </div>



<p>&nbsp;</p>
<div class="row">
  <div class="col-md-6 mx-auto">
    <pre>&lt;?php
// 4. index.php
// J:\awww\www\fwphp\glomodul4\help_sw\test\01_MVC_learn\02hopkins_2009_clickme\index.php

namespace B12phpfw\clickmeModule ; //FUNCTIONAL NAMESPACING (not dir names ee positional)
// USE is not needed if all scripts have same namespace !

//Instead  require 'm.php'; require 'v.php';  require 'c.php'; :

//           namespaced cls name --> cls script path
spl_autoload_register(function($class) { 
  //for this module :
  require_once __DIR__ .'/'
  . str_replace( ['B12phpfw\\clickmeModule','\\']
                   , ['', '/']
                   , $class
               ).'.php';
});
//require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //for external modules

$m = new m();
$c = new c($m);
$v = new v($m); //$v = new v($c, $m); // $c is not needed in v ? (bad logic ?)

  /**
  * code flow STEP 2. R O U T E R
  * we added functionality (ee link) to C, thereby adding INTERACTIVITY to app. 
  * NOT NEEDED IF NO USER INTERACTIONS (ee link) :
  */
  $ctrakcmethod = 'clicked';
  if ( isset($_GET['action']) and !empty($_GET['action']) )   {
    $c->{$_GET['action']}(); //call c.clicked()
    $ctrakcmethod = '';
  } 
  // E N D  code STEP 2.
  
echo $v->out($ctrakcmethod);</pre>

     </div>



  <div class="col-md-6 mx-auto">
    <h2>Routing and URLs</h2>
      <pre>&lt;?php
      // 4. index.php  URLs look like : ...<strong>index.php?page=about</strong> or better ...<strong>index.php?about</strong>
      $page = $_GET['page'];
      if (!empty($page)) {

          $data = array(
              'about'     =&gt; array('model' =&gt; 'AboutModel', 'view' =&gt; 'AboutView', 'controller' =&gt; 'AboutController'),
              'portfolio' =&gt; array('model' =&gt; 'PortfolioModel', 'view' =&gt; 'PortfolioView', 'controller' =&gt; 'PortfolioController')
          );

          foreach($data as $key =&gt; $components){
              if ($page == $key) {
                  $model      = $components['model'];
                  $view       = $components['view'];
                  $controller = $components['controller'];
                  break;
              }
          }

          if (isset($model)) {
              $m = new $model();
              $c = new $controller($model);
              $v = new $view($model);
              echo $v-&gt;output();
          }
      }</pre>

     </div>
  </div>

<p>&nbsp;</p>
<p>&nbsp;</p>








 <script src="/zinc/themes/bootstrap/js/jquery.min.js"></script>

  <!-- Include all compiled plugins (below), or include individual files as needed
          jquery-2.1.1.min.js
  --> 
  <script src="/zinc/themes/bootstrap/js/bootstrap.min.js"></script>
 
 
</body>  
</html>