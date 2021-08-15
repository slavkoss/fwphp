<?php
?>
  <!DOCTYPE html>
  <html lang="hr">

  <head>
      <meta charset=utf-8" />
      <title><?='aaaa' //$page_title; ?></title>
    <link rel="stylesheet" type="text/css" media="screen,projection"
          href="<?='/zinc/themes/site/simplest.css'?>" />
  </head>

  <body>

  <br /><br /><b>WHAT config.php DOES</b> :
  <ol>
  <li>Enable sessions if not active
  <li>Cre. anti-CSRF token if doesn`t exist
  <li>DEFINE adresses <b></b>
  <li>Define autoload fn for clsscripts
  <li>Mdl: inc. dbcnf, cre. dbcon cnst, Create PDO object (in routing cases)
  <li>ROUTING (from URL extract what call or include), DISPATCHING (call or include)
  </ol>
  
       <br /><b>init.u k l j.php step 3.DEFINE ADRESS CONSTANTS :</b>
      <br />PATHWSROOT = <?=PATHWSROOT?> = realpath($UPTO_WSROOT)
                 (= $_SERVER[\'DOCUMENT_ROOT\'] - worse - inethosting...)
      <br />PATHMODUL = <?=PATHMODUL?> = $dir of modul
      <br /> &nbsp;  &nbsp;  &nbsp; PATHMODUL_REL = <b><?=PATHMODUL_REL?></b> = 
      str_replace(PATHWSROOT, str_replace(DS,'/', PATHMODUL)
      <br /> &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; (because DIRNAME RETURNS OSDIRSEP, not UNIX "/" SEPARATOR
      
      <br /> &nbsp;  &nbsp;  &nbsp; URLMODUL_CSS=<?=URLMODUL_CSS?> = PATHMODUL_REL.'/css'
      <br /> &nbsp;  &nbsp;  &nbsp; URLMODUL_JS =<?=URLMODUL_JS?> = PATHMODUL_REL.'/js'
      
      PATHINC_MODUL=<?=PATHINC_MODUL?> = PATHMODUL.'/inc'
      <br />vidi <a href="http://mojkalendar.com.hr/">http://mojkalendar.com.hr/</a>
      <br /><br />

      <b><?=Basename(__FILE__)?></b> (in <?=dirname(__FILE__)?>) SAYS :
      <pre>$_SESSION=<?php print_r($_SESSION); ?> </pre>
      <pre>$_GET=<?php print_r($_GET); ?> </pre>
      <pre>$_POST=<?php print_r($_POST); ?> </pre>


</body></html>
