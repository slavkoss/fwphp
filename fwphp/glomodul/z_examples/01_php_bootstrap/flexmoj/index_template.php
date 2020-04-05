<?php
/**
 * http://sspc1:8083/    (virtual host dev1)
 * or http://localhost:8083/ = J:\zwamp64\vdrive\web\index.php
*/
$site_rootdir  = $_SERVER['DOCUMENT_ROOT'] ;
$corereldir = '/fwphp/b12fw' ;
       // H E A D E R  GLOBAL & LOCAL
  $ibrowsertabtxt = 'HOME';
  $userstr = 'Home';
  $pgtitle = 'Learn PHP';
  //require '03hdr.php';
  
   
  //       ***C O N T E N T***
  // ***ROUTER*** SPA app: "<a href" links not used
  $cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : '04home.php';
  // ***DISPATCHER***
  //if ($cmd == 'cls')

    
$wai = ' '.__FILE__;

/*
  <title><= $ibrowsertabtxt ></title>
  <link rel='stylesheet' href='/inc/css/sitemoj.css' type='text/css'>
  <link rel='stylesheet' href='/inc/css/horizMenu.css' type='text/css'>
</head>
  
  
<body>
*/

?>
<!-- 
  i n c l u d e d  in  index.php
  J:\awww\apl\dev1\03hdr.php
  J:\zwamp64\vdrive\web\03hdr.php 
SPA: <li><a target="_blank" href="?cmd=<= DEVDIR.'/01info/00info_ctr.php' >" target="_blank"><b>INFO</b> devel.envir, paginator</a><br />
-->
<!DOCTYPE html>
<html lang="hr">

  <head>
    <meta charset="UTF-8 (sans BOM)">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head tag -->
    
    <meta name="description" content="B12phpfw Own PHP framework">
    <meta name="author" content="Slavko Srakoèiæ, Zagreb, Croatia (see my blog at phporacle.altervista.org)">
    <meta name="licence" content=GPL2">

      
      <link href="<?php //CSSURL.'/bootstrap.min.css' ?>" 
            rel="stylesheet" type="text/css">
	<link href="<?php //CSSURL.'/yosemite.css' ?>" rel="stylesheet" type="text/css">
  
      <link href="<?php //echo CSSURL.'/sitemoj.css'; ?>" 
            rel="stylesheet" type="text/css">
      <?php //echo '<style type="text/css"><!-- '.file_get_contents($basecss).' --></style>';?>

      
  <title><?= $ibrowsertabtxt ?></title>
  <link rel='stylesheet' href='/fwphp/b12fw/css/other/sitemoj.css' type='text/css'>
  <link rel='stylesheet' href='/fwphp/b12fw/css/other/horizMenu.css' type='text/css'>
</head>
      
      
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

      

      
      
      
      
      
  <!-- Title, Custom css -->
  
</head>  
  
<body>




  <!-- 1. T I T L E -->
  <center>
     <?= '<span style="font: italic 18px Georgia">'
         . 'Logged in: '.$userstr.'</span>' //APLNAME ?>
     <!--canvas id='logo' width='624' height='96'>     </canvas-->
  </center>
  



  
  
  <nav>
  NNNNNNNNNNNNNNNNNNNNNNNNNNNN
  <?php
  echo "<span class='main'>";
  // *****************************************************
  // 2.  n a v = LEFT  M E N U  FOR GUEST / MEMBER
  // *****************************************************
  //if ($loggedin) echo "$user poruke"; //is logged in
  //else           echo 'Sign up and/or log in';
  ?>
  
  <!--a href="#"><img id="logosocnet" src="robin.gif"></a-->

  <!--div class='appname'><?= $appusr ?></div-->
  <!--script src='z_pgtitle.js'></script-->
<?php
  //  if ($loggedin)
  { 
  ?>
          <!--h1>Learn PHP</h1-->
<p>
<!--a href="?"><img id="icnpro1" src="/inc/img/slkmirror.png"></a-->
</p>

<p>

  <ul>
    </li><li>
    <a target="_blank" href="?cmd=help">Help</a>
    <a href="index.php?cmd=help">docs</a><br />

    <a target="_blank" href="index.php?cmd=upload">multi upload</a>&nbsp;&nbsp;
    <a target="_blank" href="http://phporacle.dynu.com:8083/FILE_TRANSFER/">download</a><br />
    
    </li><li><a target="_blank" href="http://phporacle.altervista.org">discuss (blog)</a>
    </li><li><a target="_blank" href="https://github.com/slavkoss/fwphp">github</a></li>
    </li><li><a target="_blank" href="http://phporacle.dynu.com:8083/">demo site (CE time 18-24h)</a></li>

    <hr />

    <li><a target="_blank" href="/aplw/<?php
      //http://dev1:8083/aplw/home
      //echo ROOTDIR.'/aplw/index.php&c=home&m=index'; 
      ?>"><b>aplw</b></a><br />
    <li><a target="_blank" href="?cmd=<?= 
      $site_rootdir.'/fwphp/aplw/utl/lsweb/lsweb.php' ?>"><b>MNU LSWEB</b></a><br />
  
   <a target="_blank" href="<?= $corereldir.'/socnet/' ?>"><b>SOCNET</b></a>
    <a target="_blank" href="http://phporacle.dynu.com:8083/papl1/blogb/">drupal</a>   
    <a target="_blank" href="http://phporacle.dynu.com:8083/papl1/blogwp/wp-admin/">wordpress</a><br />  
    

    <li><a target="_blank" href="pdev1/01info/00info_ctr.php" target="_blank"><b>INFO</b> devel.envir, paginator</a><br />

    <li><a target="_blank" href="?cmd=<?= 
           $corereldir.'/../zz/zz/z30GB/zfw/yii2/basic/web/?r=site/b1-b2' 
    // Warning: require(): http:// wrapper is disabled in the server configuration by allow_url_include=0 ?>" target="_blank"><b>INFO</b> Greatest events</a><br />


    </li><li><a target="_blank" href="?cmd=<?= 
      $site_rootdir.'/lsweb/lsweb.php&dir=J:\awww\apl\dev1\04knjige' ?>"><b>knjige (lsweb)</b></a><br />
     
    
    </li><li><a target="_blank" href="http://dev1:8083/04knjige/js/">knjige Forbidden! (.htaccess)</a></li>

    <li><a target="_blank" href="index.php?cmd=allmnus">  All menus</a>

    <li><a target="_blank" href="index.php?cmd=zwamp">    Mnu zwamp (bells & whis.)</a>


    <li><a target="_blank" href="./zfw/medoo/crud_medoo_2day.php"><hr />Medoo DBI on oci8 DBI -  ex.5</a><br />
    <li><a target="_blank" href="./01_test/01fwmoj/">Own phpfw cmdflow</a>

    <li><a target="_blank" href="./01apl/"><hr />Aplikacije test</a><br />
    <li><a target="_blank" href="#">Apl.produkc.(other site)</a>

    <li><a target="_blank" href="./00dev/ng/emp.php"><hr />Å ifrarnik hr.Emp, PHP, PDO, AngularJS 1.4.3 Aug.2015</a>

      <li><a target="_blank" href="./zinc/utl/zwamp/view" target="_blank"><hr />WOAP instalac</a><br>

          <li><a target="_blank" href="./zdoc/jezik/"><hr />Engleski (Learn English)</a>

    <li><a target="_blank" href="http://imagecurl.com/"><hr />http://imagecurl.com/</a><br>
    <li><a target="_blank" href="http://iviewsource.com"><hr />Villalobos blog</a><br>
    <li><a target="_blank" href="https://github.com/DanWahlin">Wahlin GitHub</a>





  </ul>
  </p>


    <br><ul class='menu'>
    <li><a href='?cmd=login'>Prijava</a></li>
    <li><a href='?cmd=signup'>Registracija</a></li>
    <li><a href='?'>Prva stranica</a></li>
    <li><a href='?cmd=help'>PomoÄ‡></li>
    </ul><br>
    <!--span class='info'>You must be logged in to
    view this page</span--><br>
  <?php 
  }
  ?>
  
NNNNNNNNNNNNNNNNNNNNNNNNN
  </nav>

  
  
  
  
  
<article>
AAAAAAAAAAAAAAAAAAAAAA





AAAAAAAAAAAAAAAAAAAAAA
</article>

