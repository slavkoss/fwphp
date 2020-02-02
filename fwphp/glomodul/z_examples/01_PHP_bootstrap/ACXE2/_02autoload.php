<?php
// J:\awww\apl\dev1\afinc\_02autoload.php
//use B12phpfw\afcls\fw as core ;
//use B12phpfw\afcls\fw\_Helper ;

function _02autoload($fqcn) {
                      // fqcn = Full Qualified Class Name
                      //global $rps;  //<br /><br /><br /><br /><br /><br />
  if (!defined('TEST')) define('TEST', '1');
  $fqc_scriptname = str_replace('\\', '/', $fqcn) . '.php';
                  if(1*TEST) { echo '<h5>' ; 
                  prf('MY AUTOLOADER ' //.__FILE__.', line'.__LINE__
                  .' SAYS: $fq_class_scriptname '
                  //.'= Full qualified name of CLASS SCRIPT to autoload'
                  ,$fqc_scriptname.'</h5>'
                  ); 
                  }
  $file = str_replace('B12phpfw','',$fqc_scriptname);
                      //module classes : without NS (namespace). Here NS serves only for name resolution
                      //                 not for class script path
  $file = basename($file);
                  //if (file_exists($file)) {goto include_script;}
                  //site global classes : not here
                  //$file2 = UP_TO_SITEDOCROOT . $file;
                  //if (file_exists($file2)) {$file = $file2; goto include_script;}
  include_script:
                  if(1*TEST) { ob_start(); prf('<h4>'.'MY AUTOLOADER '.__FILE__.', line'.__LINE__.' SAYS: CLASS SCRIPT to autoload $file</h4>',$file
                  ); //ob_start();
                  $tmp = nl2br(ob_get_contents());  ob_end_clean();
                  if (TEST) { trace_log($tmp, 'trace_log.html', 'a'); }
                  }
  //include $file;
  require $file;
}

spl_autoload_register('_02autoload');

// ****************************************** //
// ******* 1. p r i n t _ r  formated ******* //
function prf($n1, $v1){
  echo $n1.'&nbsp; &nbsp; &nbsp; ='; echo '<pre>'; print_r($v1); echo '</pre>';
}

function trace_log(
   $tracetxt, $tracefle, $openmode //eg 'a+'=reading and writing or 'w'
) 
{
  if ($fp = fopen($tracefle, $openmode)) { 
    if (flock($fp, LOCK_EX)) { // exclusive lock
      fwrite($fp, $tracetxt); 
      fclose($fp);
    } 
  }
}


  /*
  //db core classes if we href lowercase name of class script :
  $file2 = UP_TO_SITEDOCROOT . '/afcls/db/'.$file;
  if (file_exists($file2)) {$file = $file2; goto include_script;}
  */

/*
  // core classes :
  $file = UP_TO_SITEDOCROOT . str_replace('B12phpfw','',$fqc_scriptname);
  if (!file_exists($file)) {
    // module classes :
    $file = str_replace('B12phpfw','',$fqc_scriptname); // __DIR__ .'/'.
  }
*/
  //$file = __DIR__ . '/../classes/' . $fqc_scriptname;