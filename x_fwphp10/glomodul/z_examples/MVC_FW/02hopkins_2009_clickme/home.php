<!--
/**
* J:\awww\www\fwphp\glomodul\z_examples\02_MVC\02hopkins_2009_clickme\home.php
*
* https://getbootstrap.com/docs/4.0/components/buttons/
* 1. <button type="button" class="btn btn-primary">Primary</button> BLUE
* 2. btn-secondary GRAY  3. btn-success GREEN    4. btn-danger RED
* 5. btn-warning YELLOW  6. btn-info DARK GREEN  7. btn-light WHITE, GRAY TXT
* 8. btn-dark BLACK      9. btn-link WHITE, BLUE TXT
*
*/
-->


<!DOCTYPE html>
<html lang="hr">

  <head>
    <meta charset="UTF-8 (sans BOM)">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head tag -->
    
    <meta name="description" content="B12phpfw Own PHP framework">
    <meta name="author" content="Slavko SrakoÄiÄ‡, Zagreb, Croatia (see my blog at http://phporacle.altervista.org)">
    <meta name="licence" content=GPL2">


    <link href="/vendor/b12phpfw/themes/bootstrap/css/styles.css" rel="stylesheet" type="text/css">
      <!--link href="/zinc/themes/site/yosemite.css" rel="stylesheet" type="text/css"-->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Title, Custom css -->

    <!-- get attrib. APP_ NAME (short), APP_ TITLE (long)
         VENDOR_ NS = VENDOR NAME SPACE PREFIX, NOT DIR 
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
        Menu in <?=basename(__FILE__)?> <span class="glyphicon glyphicon-chevron-down"></span>
      </button>
        
        &nbsp;<a class="navbar-brand" href="#">B12phpfw</a>
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
              <li><a href="#">Walking &amp; Nature watching</a></li>
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
    
     	  <p><br>1. if we don't have any USER INTERACTIONS defined with $_GET(), $_POST&nbsp; 
	 than we don't have any Controller-specific functionality - View holds all of the functionality as the example is purely for display purposes. </p>
     
     <p><b>2. This Clickme example</b> added functionality to the controller, thereby adding INTERACTIVITY to the app. </p>
     
     

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
    August 10, 2009</time> </span>author <strong>Adlian</strong> : Data flow. <br>
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
<br><span class="auto-style1"><strong>[L3] BEST </strong></span>&nbsp;MINI3 - Simple beginning MVC classes 
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

namespace B12phpfw\clickmeModule ; //FUNCTIONAL NAME SPACING (not dir names ee positional)
// USE is not needed if all scripts have same name space !

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
 
 
</div>
<h1>Building a Basic Blog Domain Model</h1>
<p>Defining the relationships between domain objects, as well as their own 
rules, data, and behavior is up to the developer.<br>Good OOP practices : 
involved objects have just a few, well-defined responsibilities, and <strong>
model</strong> doesn't get its pristine (clean, pure) ecosystem <strong>polluted 
with database logic</strong>. Add to this that shifting the model from one 
infrastructure to another can be done in a fairly painless fashion, and you'll 
get to see why this approach is very appealing when developing applications that 
must scale well.</p>
<p>************************* 11111 **********************<br>
http://www.sitepoint.com/building-a-domain-model/ February 24, 2012 By Alejandro 
Gervasio<br><br>//HOW TO CONSUME MODEL - Putting the Domain Model to Work<br>
//blog domain model : underlying INTERFACES AND CLASSES living in happy 
ignorance about the existence of any type of persistence mechanism that may be 
implemented down the line, be it a database, a web service, or anything else<br>
//network of rules and rich relationships with each other<br>//current domain 
object implementations can be replaced with custom ones without much fuss<br>
<br>In this case each object graph is spawned by using plain Dependency 
Injection, which is sufficient for demonstrative purposes.<br><br>If the 
situation warrants, however, object graph creation should be delegated to more 
versatile structures, such as a Dependency Injection Container or a Service 
Locator. In either case, at this point the model is already doing its business 
as expected.<br><br><br>************************* 22222 **********************<br>
https://www.sitepoint.com/integrating-the-data-mappers/ March 16, 2012 By 
Alejandro Gervasio<br><br>Basic mapping module which will allow you to move data 
easily between the blog's model and a MySQL database, all while keeping them 
neatly isolated from one other.<br><br>We'll be trying to connect a batch of 
mapping classes to a blog's domain model.<br><br>1. Idea is to set up from 
scratch a basic Data Access Layer (DAL) so that domain objects can easily be 
persisted in a MySQL database, and in turn, retrieved on request through some 
generic finders.<br><br>DAL in question will be made up of just a couple of 
components: the first one will be a simple database adapter interface, whose 
contract is interface DatabaseAdapterInterface. Contract allows us to create 
different database adapters at runtime and perform a few common tasks, such as 
connecting to the database and running CRUD operations without much fuss.<br>
<br>2. Now we need at least one implementer of the interface that does all these 
cool things. The proud cavalier that will assume this responsibility will be a 
non-canonical class PdoAdapter implements DatabaseAdapterInterface.<br><br><br>
3.<br></p>
<pre>ALTER TABLE `admins` ADD `email` VARCHAR(60) NULL AFTER `username`; 
CREATE TABLE posts (
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
title VARCHAR(100) DEFAULT NULL,
content TEXT,

PRIMARY KEY (id)
);

CREATE TABLE users (
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
name VARCHAR(45) DEFAULT NULL,
email VARCHAR(45) DEFAULT NULL,

PRIMARY KEY (id)
);

CREATE TABLE comments (
id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
content TEXT,
user_id INTEGER DEFAULT NULL,
post_id INTEGER DEFAULT NULL,

PRIMARY KEY (id),
FOREIGN KEY (user_id) REFERENCES users(id),
FOREGIN KEY (post_id) REFERENCES posts(id)
);</pre>
<p>At this point we've implemented a simple DAL which we can use for persisting 
the blog's domain model in MySQL without sweating too much during the process. 
Now we need to add the middle men to the picture, that is data mappers, so any 
impedance mismatches can be handled quietly behind the scenes.<br><br>
Implementing a Bi-directional Mapping Layer - relational mappers<br>
*******************************************<br>Quite a ways away from being 
trivial. That's why ORM libraries like Doctrine live.<br><br>4. Encapsulating as 
much mapping logic as possible within abstract class AbstractDataMapper<br>- 
couple of generic finders, all of the logic required for pulling in data from a 
specified table, which is then used for reconstituting domain objects in a valid 
state. Because reconstitutions should be delegated down the hierarchy to refined 
implementations, the createEntity() method has been declared abstract.<br><br>5. 
Set of concrete mappers that will deal with blog posts, comments, and u sers :<br>
1. PostMapperInterface and class PostMapper extends AbstractDataMapper 
implements PostMapperInterface <br>2. CommentMapperInterface and class 
CommentMapper extends AbstractDataMapper implements CommentMapperInterface<br>3. 
UserMapperInterface and class UserMapper extends AbstractDataMapper implements 
UserMapperInterface<br><br>PostMapper extends its abstract parent and injects in 
the constructor a comment mapper (still undefined), in order to handle in sync 
both posts and comments without revealing to the outside world the complexities 
of creating the whole object graph.<br><br>CommentMapper class behaves quite 
similar to its sibling PostMapper. In short, it asks for a user mapper in the 
constructor, so that a specific comment can be tied up to the corresponding 
commenter.<br><br>We build up from scratch an easy-to-manage mapping layer, 
capable of moving data back and forward between a simplistic blog domain model 
and MySQL.<br><br>Mapping the Blog's Domain Objects to and from the DAL<br>
*****************************************************<br>Mappers' APIs do the 
actual hard work and HIDE UNDERLYING DB FROM MODEL. This ability, though, is 
best appreciated from app. layer's perspective. Let's wire up all the mapper 
graphs together:<br><br><br><br>************************* 33333 
**********************<br>
https://www.sitepoint.com/community/t/would-you-agree-this-is-the-definition-of-a-php-framework/191138<br>
If you have to write your own code to call the framework components, then it is 
not a framework, it is a library. A &quot;true&quot; FRAMEWORK IS MINI-APPLICATION TO 
GENERATE AND RUN YOUR APP COMPONENTS.<br><br>Eg templating libraries to deal 
with creating markup, image libraries...<br><br>Framework brings together all 
(or most) of the common functionality needed to build an app<br>- usually 
providing a more consistent API <br>- and often some of the boilerplate code to 
wire components together<br>- GENERATE AND RUN YOUR APP COMPONENTS fw definition 
is more definition of a Rapid Application Development (likely where Radicore 
gets its name) RAD framework, which is a PARTICULAR KIND OF FRAMEWORK, some of 
which allow u sers to build (or, more accurately, customize) an application via 
a GUI WITHOUT HAVING TO KNOW HOW TO PROGRAM. Of course, the apps you can build 
with such a framework are limited by the supplied components. I doubt you would 
be able to build an online image editing app, for example, using Radicore.<br>
<br>--------------------------------------------<br>What is SW fw (Software 
framework)<br>--------------------------------------------<br><br>- provides a 
STANDARD WAY TO BUILD and deploy applications<br><br>- is abstraction in which 
SW providing GENERIC FUNCTIONALITY can be selectively applied / changed<br>by 
additional user-written code, thus providing application-specific SW <br><br>- 
is universal, REUSABLE SW environment that provides particular functionality as 
part of a larger SW platform to facilitate development of SW applications<br>
<br>- key distinguishing features that separate SW fw from SW libraries<br>
-----------------------------------------------------------------<br>- IoC 
(INVERSION OF CONTROL) is key difference to a library:<br>IoC is about who 
initiates control messages - DOES YOUR CODE CALL INTO A FW,<br>or does it plug 
something into a framework, and then the framework calls back?<br>Hollywood 
principle &quot;Don't call us, we'll call you (details).&quot;<br>Eg game knows when a 
player can make decisions and prompts the player <br>accordingly, rather than 
the player making the decision.<br><br>Unlike in (set of) libraries intended to 
provide reuse<br>or in normal user apps, CODE FLOW (OF CONTROL MESSAGES) IN SW 
FW<br>IS DICTATED BY SW FW, not by the caller method<br><br>If you're using a 
library, objects and methods implemented by the library<br>are instantiated and 
invoked by your custom app.<br>You need to know which objects to instantiate / 
call. <br><br>If you're using a framework, you implement objects and methods <br>
that are custom to your app and they are instantiated and invoked by fw.<br>Fw 
defines the flow of control for app - embodies some abstract design,<br>with 
more behavior built in. In order to use it you need to insert <br>your behavior 
into various places in the framework either by subclassing <br>or by plugging in 
your own classes. Fw code then calls your code at these points.<br><br>Term IoC 
was getting overloaded with different meanings - was the reason<br>Fowler coined 
the term DIP (DEPENDENCY INVERSION PRINCIPLE - EARLY '90s).<br>About libraries 
vs fws, inversion he's talking about is Hollywood principle<br>&quot;Don't call us, 
we'll call you (details).&quot;<br>
https://martinfowler.com/articles/dipInTheWild.html 21 May 2013<br>Inversion is 
BOTTOMS UP DESIGN - reversal of direction in TOP-DOWN DESIGN : <br>high-level 
design described by smaller parts <br>and therefore it directly depends on them.<br>
Eg business requirement of reporting on energy savings depends on <br>gathering 
data, which depends on executing Sql. Dependencies follow<br>how the problem is 
decomposed. The more detailed something is, <br>the more likely it will change. 
We have a high-level idea depending <br>on something that is likely to change.<br>
<br>In 2004, Martin Fowler published an article on Dependency Injection (DI) <br>
and Inversion of Control (IoC) . Is the DIP the same as DI, or IoC?<br>No, but 
they play nice together. When Robert Martin first discussed DIP,<br>he equated 
it a first-class combination of the Open Closed Principle<br>and Liskov 
Substitution Principle, important enough to warrant its own name.<br><br>DI is 
about wiring, IoC is about direction, and DIP is about shape.<br><br>Dependency 
Injection is about how one object knows about another, dependent object<br>
(master table does not know about its details which have FK - knowlege about 
master).<br>DI is about how one object acquires a dependency.<br><br>IoC is 
about who initiates the call. If your code initiates a call, it is not IoC, if 
the container/system/library calls back into code that you provided it, is it 
IoC.<br><br>DIP is about the level of the abstraction in messages sent from your 
code<br>to the thing it is calling. To be sure, using DI or IoC with DIP<br>
tends to be more expressive, powerful and domain-aligned,<br>but they are about 
different dimensions, or forces, in an overall problem.<br><br>Several examples 
that all share common thread: raising abstraction level<br>of a dependency to be 
closer to the domain, as limited by system needs.<br><br>Hide DB Behind 
Something Domain-related<br>A repository is a gateway to a conceptual (maybe 
actual) potentially<br>large collection of durable objects. Typical interface 
might include<br>basic CRUD operations (assuming the domain calls for them) but 
then we'll<br>add methods that make sense for the needs of the system.<br><br>
<br><br><br>Domain analysis is a form of Modeling. A key thing about modeling,<br>
is that you are only considering details that are important.<br>Domain here is 
limited by some feature set rather than <br>a mythical domain that exists 
outside of such context.<br>In a sense, this is YAGNI applied to domain 
analysis.<br><br>Not &quot;best practices&quot;, but good ideas for a given context<br>
Design principles<br>Should be &quot;violated&quot; sometimes<br>Are often conflicting (at 
odds) with each other<br>Often mix together for something even better than when 
used in isolation<br>Often overlap with other ones<br>There are no free lunches, 
all abstractions have a cost<br><br>Like the term &quot;best practices&quot; I wonder if 
&quot;design principles&quot; even makes <br>sense as a nikname (moniker = often a 
shortened name). <br>In the case of the SOLID principles, I think of them more 
as up front ideas<br>that I often come back to due to familiarity. I often fall 
back into<br>the basics like COHESION and COUPLING, adding another level of 
indirection.<br>By calling something a principle, when I'm pragmatic I will 
probably <br>Preferable is to REPLACE &quot;PRINCIPLE&quot; WITH GUIDELINE.<br><br>Whether 
we call something a principle or a guideline, the ability to make<br>an informed 
decision to disregard a design principle (a so-called Journeyman<br>behavior 
according to The Seven Stages of Expertise in Software<br>
http://www.wayland-informatics.com/The%20Seven%20Stages%20of%20Expertise%20in%20Software.htm),<br>
is a good place to strive towards.<br><br><br><br><br>DIP like SOLID (five 
design principles intended to make software designs more<br>understandable, 
flexible and maintainable) is simple to state but deep<br>in its application. 
SOLID is subset of many principles stated by Robert C. Martin.<br>1. Single 
responsibility principle - class should only have single r.<br>that is, only 
changes to one part of the software's specification<br>should be able to affect 
the specification of the class.<br>2. Open-closed principle SW entities... 
should be open for extension,<br>but closed for modification.<br>3. Liskov 
substitution principle - Objects in a program should be <br>replaceable with 
instances of their subtypes without altering<br>the correctness of that program. 
See also design by contract.<br>4. Interface segregation principle - Many 
client-specific interfaces<br>are better than one general-purpose interface.<br>
5. Dependency inversion principle - One should &quot;depend upon abstractions,<br>
[not] concretions<br><br>See also https://en.wikipedia.org/wiki/SOLID :<br>Code 
reuse<br>Inheritance (object-oriented programming)<br>Package principles<br>DRY 
Don't repeat yourself<br>GRASP (object-oriented design, not related to the SOLID 
design principle)<br>General Responsibility Assignment Software Patterns (or 
Principles).<br>Guidelines for assigning responsibility to classes and objects 
in OO Design.<br>KISS principle (keep it simple, stupid - minimalist concept)<br>
YAGNI (You aren't gonna need it - šta æe vam to npr excell a ne pdf izvještaji)<br>
- preprogramiravanje i preprojektiranje.<br>Always implement things when you 
actually need them,<br>never when you just foresee that you need them.<br>YAGNI 
is a principle of XP (extreme programming),<br>type of agile software 
development.<br>https://en.wikipedia.org/wiki/Extreme_programming<br><br><br>- 
HAS DEFAULT BEHAVIOR: must be some useful behavior and not a series of no-ops.<br>
<br>- NON-MODIFIABLE FW CODE: u sers should not modify SW fw code but can extend 
it<br><br>- EXTENSIBILITY: can be extended by the user usually by selective 
overriding<br>or specialized by user code to provide specific functionality<br>
<br>Component = Module like Oracle Forms .fmb<br>---------<br>- tight group of 
related classes tasked with accomplishing a single task.<br>- components should 
be independent<br>- should SHARE A NAME SPACE so their classes don't need to 
make use statements<br>to address each other.<br>A task too small for a 
component is likely going to fall to a single class.<br><br>Symfony's 
HttpFoundation is a good example - providing a basic I/O framework.<br>It's not 
just used by Symfony, but also by Drupal 8, Laravel and Silex (that I know of).<br>
<br>Packages or Bundles<br>-------------------<br>Packages are groups of related 
components. Twig is one example. Unlike a component<br>which is usually a more 
or less drop it in decision, Packages tend to have more<br>far reaching effects 
on the application since taking advantage of them will<br>require some 
forethought and outside code will need to be aware of their API.<br><br>The 
smallest frameworks and the largest packages is a very blurry line,<br>
frameworks style themselves to be more complete solutions than packages tend to 
be.<br><br>Frameworks<br>----------<br>Frameworks provide a road map to solving 
a particular type of problem. There are<br>- general purpose frameworks - 
Symfony<br>- frameworks devoted to small scale websites - Silex<br>- and 
everywhere in between<br><br>What makes Frameworks distinct from packages is 
they:<br><br>Have a distinct over arching paradigm, either Model-View-Controller 
or Model-View-Presenter<br>Have components and packages to implement the areas 
of that paradigm.<br>Have a configuration methodology set up in PHP or non-PHP 
files, usually XML or INI or YAML.<br><br>Largest frameworks are almost 
indistinguishable from apps and are ready to go from install,<br>but the 
distinguishing line here is whether a non-programmer can be expected<br>to set 
the code up and get it running. If not then, no matter how large <br>and 
featured it is, it's still a framework, not an app.<br><br>More framework can 
do, harder it is to customize it. This isn't always true though,<br>and it also 
depends on what area of the app is being customized.<br>The best frameworks 
tolerate having their components and packages switched out<br>though the 
incoming packages will usually need a wrapper of some sort especially<br>if the 
interface in that area hasn't been standardized.<br><br>Apps<br>----<br>If a 
non-programmer can be expected to install and configure the app<br>without 
touching a single line of code then it's an App.<br><br>Drupal 8 is one example, 
and a rather huge one at that.<br>Apps may or may not have further customization 
possible, most popular ones have.<br>The smaller apps out there can be smaller 
than some frameworks.<br><br>The distinctive feature of an app is INSTALLER CODE 
that<br>- creates DB<br>- writes config file<br>- overall automates the setup 
process for a non-programmer user<br>Frameworks don't have these though they 
might have tools for handling some parts<br>of the install process, like 
creating blank model classes, route files or the like.<br><br>Increasingly in 
the PHP world the leading applications bring together<br>components and packages 
from various vendors.<br>The only major PHP project that doesn't anymore is 
WordPress which can get away<br>with this largely due to its marketshare - even 
then I've seen Wordpress plugins<br>make use of component libraries. Given time 
even Wordpress will probably evolve<br>over, though it's going to have to get 
rid of its horrid &quot;The Loop&quot; to do so.<br><br><br><br>************************* 
44444 **********************<br>
http://blog.cleancoder.com/uncle-bob/2014/05/08/SingleReponsibilityPrinciple.html<br>
08 May 2014 by Robert C. Martin (Uncle Bob)<br><br>Breaking up a large piece of 
code<br>=================================<br>into snippets : &quot;sections&quot; 
&quot;modules&quot; or &quot;classes&quot;.<br><br>Code is not responsible for bug fixes or 
refactoring but programmer is.<br><br>To isolate your modules from the 
complexities of the organization,<br>ee design your systems such that each 
module is responsible (responds to)<br>the needs of just that one business 
function. :<br><br>SRP (SINGLE RESPONSIBILITY PRINCIPLE) is about people<br>
(single person or tightly coupled group of people<br>representing a single 
narrowly defined business function)<br>who request method changes (many cooks 
spoil soup).<br><br>Uncle Bob is saying that SRP has replaced SoC (SEPARATION OF 
CONCERNS) <br>because SRP now includes ideas of Coupling and Cohesion which SoC 
did not.<br><br>Ee:<br>Gather together the things that CHANGE FOR THE SAME 
REASONS (PEOPLE !).<br>Separate those things that change for different reasons.<br>
This is just another way to define cohesion and coupling. <br>We want to 
increase the cohesion between things that change for the same reasons,<br>and we 
want to decrease the coupling between those things that change for different 
reasons.<br><br>Remember that the reasons for change are people. It is people 
who request changes.<br>And you don't want to confuse those people, or yourself, 
by mixing together <br>code that many different people care about for different 
reasons.<br><br>This is the reason we SEPARATE CONCERNS (relevant things - 
responsibilities).<br>Concern can be as general as details of HW the code is 
being <br>optimized for, or as specific as name of a class to instantiate.<br>- 
we do not put SQL in JSPs<br>- we do not generate HTML in the modules that 
compute results<br>- business rules should not know the database schema<br><br>
Eg :<br>public class Employee {<br>public Money calculatePay(); //how much 
particular employee should be paid<br>public void savePay(); //stores data 
managed by Employee object onto enterprise DB<br>public String reportHours(); 
//returns string worked_number_of_hours<br>}<br>CEO = chief executive officer = 
chief operating officer = managing director<br>=corporate&nbsp;executive 
responsible&nbsp;for the operations of the firm; reports to a board&nbsp;of&nbsp;directors; may 
appoint other managers (including a president)<br>Reporting to that CEO are 
C-level executives eg : <br>CFO = responsible for controlling the FINANCES of 
the company eg for calculatePay()<br>COO = responsible for managing the 
OPERATIONS of the company eg for reportHours()<br>CTO = responsible for the 
TECHNOLOGY infrastructure and development eg for savePay()<br><br>3-Tier 
Architecture - separating GUI logic, business logic and database logic<br>is 
sufficient to satisfy SRP. <br><br><br>Classes contain one method each, and each 
method contains one line of code :<br>- broken encapsulation<br>- low cohesion<br>
- high coupling<br>SRP == SoC + Coupling + Cohesion<br><br><br><br><br><br>
http://github.com/webengfhnw/WE-CRM<br></p>
 
 
</body>  
</html>