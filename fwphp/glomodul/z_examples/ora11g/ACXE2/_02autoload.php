<?php
// J:\awww\apl\dev1\afinc\_02autoload.php
//use B12phpfw\afcls\fw as core ;
//use B12phpfw\afcls\fw\_Helper ;

function _02autoload($fqcn) //fqcn = Full Qualified Class Name with NS (namespace)
{
  if (!defined('TEST')) { define('TEST', '1'); }

  $fqcn_linux_fmt = str_replace('\\', '/', $fqcn) ;
                          if(1*TEST) { echo '<h5>' ; 
                          prf('THIS MODULE\'s AUTOLOADER ' //.__FILE__.', line'.__LINE__
                            .' SAYS: $fq_class_scriptname='
                          , $fqcn_linux_fmt.'</h5>'
                          ); 
                          }
  //             Cls script without NS (namespace)
  // Here NS B12phpfw serves only for name resolution, not for class script path
  $file = basename(str_replace('B12phpfw','',$fqcn_linux_fmt)) . '.php' ;
                  if(1*TEST) { ob_start();  //echo '<h3>Own debug logging</h3>' ;
                    prf( //key - value pair :
                      '<b>'.'THIS MODULE\'s AUTOLOADER '.__FILE__.', line'.__LINE__.' SAYS:</b> '
                        ."\n" .'CLASS SCRIPT (in module dir) to autoload $file='
                      , $file . ' &nbsp;  &nbsp; '.' Full Qualified Class Name ='.$fqcn
                    ) ;

                    $tmp = nl2br(ob_get_contents()) ;  ob_end_clean() ;
                    trace_log($tmp, 'trace_log.html', 'a') ;
                  }
  require $file;  //if (file_exists($file)) {}

  //$file2 = UP_TO_SITEDOCROOT . $file; //site global class scripts
  //if (file_exists($file2)) { require $file2 ; }
}

spl_autoload_register('_02autoload');




// ****************************************** //
// ******* 1. p r i n t _ r  formated ******* //
function prf($n1, $v1){
  //echo $n1.'&nbsp; &nbsp; &nbsp; =';   echo ' = ' ;
  echo '<pre>';
     print_r($n1); print_r($v1);
  echo '</pre>';
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
  $file = UP_TO_SITEDOCROOT . str_replace('B12phpfw','',$fqcn_linux_fmt);
  if (!file_exists($file)) {
    // module classes :
    $file = str_replace('B12phpfw','',$fqcn_linux_fmt); // __DIR__ .'/'.
  }
*/
  //$file = __DIR__ . '/../classes/' . $fqcn_linux_fmt;