<?php
// J:\dev_web\inc\confglob.php - NOT WEB ACCESSIBLE
//    - SAME LEVEL AS APACHE DOC ROOT
ini_set("display_errors","2");
ERROR_REPORTING(E_ALL);
$md=realpath($_SERVER['DOCUMENT_ROOT']);// 1. rel.adresses are ok for both  p a t h s  &   u r l s :
$idxrel = str_replace($md,'', $idx); // str_replace(DS,'/',
$aplrel = str_replace($md,'', $apl); // str_replace(DS,'/',// 2. u r l s  – s u b a p l,  a p l,  m d (main doc.root = Apache doc.root):

$mdurl ='http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/';
if (!defined('MDURL')) define('MDURL', $mdurl);

$idxurl = $mdurl.str_replace(DS,'/',$idxrel).'/'.$idxscript;
$aplurl = $mdurl.'/'.substr(str_replace(DS,'/',$aplrel),1);
$imgurl = $mdurl.'/inc/img';