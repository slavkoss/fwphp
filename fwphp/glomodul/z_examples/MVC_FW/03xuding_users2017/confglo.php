<?php
// J:\awww\apl\dev1\inc\confglo.php
//     or J:\zwamp64\vdrive\web\inc\confglo.php
// To i n c l u d e  AS FIRST in index.php or in bootstrap.php

//namesp.(=dirname !!convention)\clsname(=ut lmoj)
//use inc\utlmoj as utl;

//session_start();


//define('LN', 'hr');   // croatian language
    //_1Utl::aset('lang', 'hr'); // or en = language
  
// ~~~~~
// ~~~~~ 1. MAIN SETTINGS (GLOBALs), see others in u t lmoj.php constructor

    defined('TEST') or define('TEST', '1');
    
    // QS (URL QRY SEPARATOR) is like DS (dir separator): 
    // ALOWS US TO CONSTRUCT BEAUTIFUL URL-s  
    // REGARDLESS MOD_REWRITE IS ENABLED OR NOT
    defined('QS') or define('QS', '?'); 
    // '?' = not enabled mod_rewrite, but beautiful url-s !
    //       - with ? before urlqrystring -:)
    // '' = yes mod_rewrite (if enabled in httpd.conf)
    defined('DS') or define('DS', DIRECTORY_SEPARATOR);
    
    defined('ROOTDIR') or define('ROOTDIR'
       , str_replace('/',DS, $_SERVER['DOCUMENT_ROOT']));
    define('ROOTURL', $_SERVER['REQUEST_SCHEME']
            .'://'
            . $_SERVER['SERVER_NAME'] // sspc1, localhost, dev1
            .':'.$_SERVER['SERVER_PORT'] ); 
    define('CSSURL', '/inc/css'); // /sitemoj.css
    defined('HDRSCRIPT') or define('HDRSCRIPT', 
               ROOTDIR.DS.'inc'.DS.'hdr.php');

define('WEBADRESA', $_SERVER['SERVER_NAME']); //domain eg www.mysite.hr
define('TESTVHOSTURL', str_replace(WEBADRESA, 'dev1',ROOTURL)); //SPAs url
define('PRODVHOSTURL', str_replace(WEBADRESA, 'pro1',ROOTURL)); //SPAs url

define('JSURL', '/inc/js');
define('IMGDIR', ROOTDIR.DS.'inc'.DS.'img');

    define('SPAN_1_2EM', '<span style="font-size:1.2em">');
    define('SPAN_1_8EM', '<span style="font-size:1.2em">');
    define('SPAN_ITALIC', '<span style="font-style:italic; font-weight:normal">');
    define('SPAN_RED_BOLD','<span style="font-style:italic; color:red; font-weight:bold">');
    define('SPAN_BLUE_BOLD','<span style="font-style:italic; color:blue; font-weight:bold">');
    define('SPAN_GGREEN_BOLD','<span style="font-style:italic; color:green; font-weight:bold">');
  
// 1. OWN GLOBAL U T I L S (H E L P E R S)
//require_once 'functions.php';
//require(ROOTDIR.DS.'inc'.DS.'utlmojlite.php');

//see 02routing: 3. GLOBAL & LOCAL  H E A D E R
//require_once ROOTDIR.DS.'inc'.DS.'hdr.php';
//require_once '03hdr.php';