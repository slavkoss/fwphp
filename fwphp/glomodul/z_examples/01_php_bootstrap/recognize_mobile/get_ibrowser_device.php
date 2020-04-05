<?php

// 1. a d r e s s e s :
if (!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if (!defined('CONFGLOB_DIR')) define('CONFGLOB_DIR',
       realpath($_SERVER['DOCUMENT_ROOT'].'/zinc'));

$apl = dirname(dirname(__DIR__)).DS.'htdocs'; // *** !!! *** ONLY YOU TO SET UP, used for link
$idx = __DIR__ ; $idxscript = basename(__FILE__) ;

// 2. i n c l u d e s :
$edrun      = __DIR__ .DS.'kod_edit_run.php';
$confglob   = __DIR__ .DS.'confglob.php';
$codebehind = __DIR__ .DS.'get_ibrowser_device.pcls';

require_once($edrun);      // h e l p e r
//echo 'aaaaaaaaaaaaaaaaa qqqqqqqqqq';

require_once($confglob);   // c o n f i g

require_once($codebehind); // m o d e l

// 3. c o n t r o l l e r :
$trigger = new getIbrowserProp(); // Client() = trigger becouse can direct output view

// ************** e n d  c o n t r o l l e r  p r o g r a m

// v i e w :
?>
<!DOCTYPE html>
<html lang="hr">
<head>
   <title>Is mobile</title>
   <meta content="text/html; charset=utf-8"; http-equiv="content-type">
        <!--base href='/'-->
        <link rel='stylesheet' href='lib/bootstrap/dist/css/bootstrap.min.css' />
        <link rel='stylesheet' href='src/bootstrap.min.css' />
</head>
<body>

<a href="http://phporacle.altervista.org/php-oracle-main-menu/"><strong>http://phporacle.altervista.org/php-oracle-main-menu/</strong></a>
<ol>
  <li>Installing<a title="1. Install PHP, Apache, Oracle DB 11g XE on Win 8.1 64bit – Apache, PHP" href="http://phporacle.altervista.org/1-install-php-apache-oracle-db-11g-xe-win-8-1-64bit-apache-php/" target="_blank" data-mce-href="http://phporacle.altervista.org/1-install-php-apache-oracle-db-11g-xe-win-8-1-64bit-apache-php/"> <strong>Apache, PHP, Oracle</strong></a> 11XE (all 64 bit) </li>
  <li><a title="2. Install Oracle DB 11g XE on Win 8.1.1 (all 64bit) + APEX" href="http://phporacle.altervista.org/2-install-php-apache-oracle-db-11g-xe-win-8-1-64bit-apex/" target="_blank" data-mce-href="http://phporacle.altervista.org/2-install-php-apache-oracle-db-11g-xe-win-8-1-64bit-apex/"><strong>11g XE</strong></a> on Win 8.1.1, both 64bit - <strong>APEX</strong> VERSION 4.2.5,  Maj 24, 2014</li>
  <li><strong><a title="3. Zwamp server development ibrowser menu" href="http://phporacle.altervista.org/zwamp-server/" target="_blank" data-mce-href="http://phporacle.altervista.org/zwamp-server/%20‎">Zwamp</a></strong> server development ibrowser menu all on Win 8.1.1,  64bit<br>
    <a href="http://phporacle.altervista.org/wp-content/uploads/2015/01/zwamp_taskbartray_icon.png">http://phporacle.altervista.org/wp-content/uploads/2015/01/zwamp_taskbartray_icon.png</a> <br>
    <a href="http://phporacle.altervista.org/wp-content/uploads/2015/01/zwamp.jpg">http://phporacle.altervista.org/wp-content/uploads/2015/01/zwamp.jpg</a> <br>
    <a href="http://phporacle.altervista.org/wp-content/uploads/2015/01/zwamp.7z">http://phporacle.altervista.org/wp-content/uploads/2015/01/zwamp.7z</a>&nbsp;
- attachement page  </li>
  <li>How to recognize mobile device -<a title="How to recognize mobile device - oop, spa, mvc domain-style, php outside web doc root" href="http://phporacle.altervista.org/how-to-recognize-mobile-device-oop-spa-mvc-domain-style-php-outside-web-doc-root/" target="_blank" data-mce-href="http://phporacle.altervista.org/how-to-recognize-mobile-device-oop-spa-mvc-domain-style-php-outside-web-doc-root/"> <strong>OOP, SPA, MVC</strong></a><strong> domain-style, php outside web doc root</strong></li>
  <li><a href="http://phporacle.altervista.org/5-crud-simple-table-id-some-data-pdo-sqlite/">http://phporacle.altervista.org/5-crud-simple-table-id-some-data-pdo-sqlite/</a></li>
  <li><a href="http://phporacle.altervista.org/6-crud-selfjoin-table-forum-message-board-pdo-sqlite/">http://phporacle.altervista.org/6-crud-selfjoin-table-forum-message-board-pdo-sqlite/</a></li>
</ol>
<p>&nbsp;</p>
<p><a href="http://docs.oracle.com/cloud/latest/trial_paid_subscriptions/CSGSG/GUID-40A60901-7D84-44BE-92C3-CC11279657A2.htm#CSGSG486">http://docs.oracle.com/cloud/latest/trial_paid_subscriptions/CSGSG/GUID-40A60901-7D84-44BE-92C3-CC11279657A2.htm#CSGSG486</a>&nbsp; &nbsp;or&nbsp; &nbsp;<a href="http://docs.oracle.com/cloud/latest/trial_paid_subscriptions/index.html">http://docs.oracle.com/cloud/latest/trial_paid_subscriptions/index.html</a></p>
<p><a href="https://cloud.oracle.com/database"><strong>https://cloud.oracle.com/database</strong></a></p>
<p>Buyers can create a purchase order for 
  an Oracle Cloud service from the Oracle 
  Cloud website (<a href="cloud.oracle.com">cloud.oracle.com</a>) or the 
  Oracle Store (<a href="shop.oracle.com">shop.oracle.com</a>) using their 
  Oracle.com account. <br>
</p>
<p>Also, an Oracle sales representative can 
  create a purchase order.</p>
<p>Watch Videos<br>
  •  Creating a Database <a href="https://apex.oracle.com/pls/apex/f?p=44785:24:0:::24:P24_CONTENT_ID,P24_PREV_PAGE:9978,1">Cloud Instance</a><br>
  •  <a href="https://apex.oracle.com/pls/apex/f?p=44785:24:0:::24:P24_CONTENT_ID,P24_PREV_PAGE:10114,1">Connecting</a> to a Database Instance in the Oracle 
Database Cloud Service</p>
<p>Before you can request a<strong> 1 month trial subscription or purchase a subscription</strong> to an Oracle<br>
Cloud service, you must have an Oracle.com account.</p>
<p> 30-day free trial begins on the date that you <strong>activate</strong> your trial<br>
  subscription to an Oracle Cloud service. It does not begin on the date that you<br>
<strong>requested</strong> the trial.</p>
<p>You can request a one-time 30-day extension for your trials.</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>




<h2>How to recognize mobile device - non OOP code</h2>
<p><code><code><span style="color:#000000; "><span style="color:#007700; ">function </span><span style="color:#0000BB; ">findDevice</span><span style="color:#007700; ">() {<br>
  </span></span><code><span style="color:#000000; "><span style="color:#007700; ">    $</span><span style="color:#0000BB; ">userAgent</span><span style="color:#007700; ">=</span><span style="color:#0000BB; ">strtolower</span><span style="color:#007700; ">(</span><span style="color:#0000BB; ">$_SERVER</span><span style="color:#007700; ">[</span><span style="color:#DD0000; ">'HTTP_USER_AGENT'</span><span style="color:#007700; ">]);<br>
  </span><span style="color:#FF8000; ">
      </span><span style="color:#007700; ">$</span><span style="color:#0000BB; ">device</span><span style="color:#007700; ">=array(</span><span style="color:#DD0000; ">'iphone'</span><span style="color:#007700; ">,</span><span style="color:#DD0000; ">'ipad'</span><span style="color:#007700; ">,</span><span style="color:#DD0000; ">'android'</span><span style="color:#007700; ">,</span><span style="color:#DD0000; ">'silk'</span><span style="color:#007700; ">,</span><span style="color:#DD0000; ">'blackberry'</span><span style="color:#007700; ">, </span><span style="color:#DD0000; ">'touch'</span><span style="color:#007700; ">);<br>
  
      $</span><span style="color:#0000BB; ">deviceLength</span><span style="color:#007700; ">=</span><span style="color:#0000BB; ">count</span><span style="color:#007700; ">($</span><span style="color:#0000BB; ">device</span><span style="color:#007700; ">);<br>
  </span></span></code><span style="color:#000000; "><span style="color:#007700; "><br>
    for(</span><span style="color:#0000BB; ">$ii</span><span style="color:#007700; ">=</span><span style="color:#0000BB; ">0</span><span style="color:#007700; ">;</span><span style="color:#0000BB; ">$ii </span><span style="color:#007700; ">&lt; $</span><span style="color:#0000BB; ">deviceLength</span><span style="color:#007700; ">;</span><span style="color:#0000BB; ">$ii </span><span style="color:#007700; ">++) {<br>
       if(</span><span style="color:#0000BB; ">strstr</span><span style="color:#007700; ">($</span><span style="color:#0000BB; ">userAgent</span><span style="color:#007700; ">, $</span><span style="color:#0000BB; ">device</span><span style="color:#007700; ">[</span><span style="color:#0000BB; ">$ii</span><span style="color:#007700; ">])) {<br>
  </span><span style="color:#FF8000; ">        </span><span style="color:#007700; ">return $</span><span style="color:#0000BB; ">device</span><span style="color:#007700; ">[</span><span style="color:#0000BB; ">$ii</span><span style="color:#007700; ">];<br>
       } else return </span><span style="color:#DD0000; ">'desktop/laptop'</span><span style="color:#007700; ">;<br>
    }<br>
}</span></span></code></code></p>




<h2>OOP, SPA, MVC domain style, PHP outside web doc root</h2>
<p>Display ibrowser properties (view class methode):<br />
<?php //$trigger->out_vew_ibrowse_params() ; ?>
</p>

<p>Or display one property - returned from getter: Device = 
      <?php echo $trigger->get_device(); ?> </p>



<h2>About OOP programs</h2>
<ol>
<li>CODE INSIDE APACHE DOC ROOT (this page script) : 
<?php kod_edit_run(
           $idx       // script_dir
         , $idxscript // script
         , MDURL); ?>
  <br>
  <br>
  INCLUDED CODE FROM OUTSIDE APACHE DOC ROOT : <br>
<li>code behind this page script (model .pcls) : 
<?php kod_edit_run(
           dirname($codebehind)  // script_dir
         , basename($codebehind) // script
         , MDURL); ?>
<li> code config - set up : 
<?php kod_edit_run(
           dirname($confglob)  // script_dir
         , basename($confglob) // script
         , MDURL); ?>
<li>code helper (util) : 
<?php kod_edit_run(
           dirname($edrun)  // script_dir
         , basename($edrun) // script
         , MDURL); ?>
<li> <pre>/**
* This page URL $idxurl = <a href="<?php echo $idxurl; ?>"><?php echo $idxurl; ?><a>
*   displays o u t p u t  o f  server script $idx.DS.$idxscript =
*   <?php echo $idx.DS.$idxscript; ?>, which contains :
*      MODEL_fn_call from public fn __ c o n s t r u c t ( )
*      protected_VIEW_fn_call from public fn
*      CONTROLLER_code before c l a s s  C l i e n t
*
* server script i n c l u d e s scripts which are outside Apache doc root :
*   1. config $confglob                : require_once('<?php echo $confglob; ?>');
*   2. helper (util) $edrun            : require_once('<?php echo $edrun; ?>');
*   3. code behind (class) $codebehind : require_once('<?php echo $codebehind; ?>');
*
* $confglob contains  P H P  s e t  u p :
*    ini_set('display_errors','2');
*    ERROR_REPORTING(E_ALL);
**/ </pre>
</ol>





<?php
class Client
{
  private $IbrowserProp;
  
  // M O D E L :
  public function __construct()   {
    $this->IbrowserProp = new getIbrowserProp();
  } // e n d  p u b l i c  f n  _ _c o n s t r u c t ( )
  
   public function get_device() {
       return  $this->IbrowserProp->findDevice() ;
   } // e n d
  
  // V I E W :
  public function out_vew_ibrowse_params() {
       $this->vew_ibrowse_params();
   } // e n d
  protected function vew_ibrowse_params()  // public private protected
  {
    echo '<ol>';
    echo '<li>Device = '    . $this->IbrowserProp->findDevice() . '<br/>';
    echo '<li>Browser = '   . $this->IbrowserProp->findBrowser() . '<br/>';
    echo '<li>userAgent = ' . $this->IbrowserProp->getUserAgent() . '<br/>';
    echo '</ol>';
  } // e n d  p u b l i c  f n  _ _c o n s t r u c t ( )

} // e n d  c l a s s  C l i e n t

?>
    </body>
</html>