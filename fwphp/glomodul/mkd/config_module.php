<?php
/**
* J:\awww\www\fwphp\glomodul4\msg_share\conf_module.php
* http://dev1:8083/fwphp/glomodul4/msg_share/
* #cs02. (code flow step 2) init, config, routing
*/
namespace B12phpfw ;
//session_start();

//To see code flow set next two settings to : '1' and ''
$dbg   = '' ;
$module_towsroot         = '../../../' ; //inet provider doc root for us - www or htdocs or...
$modulename              = 'MKD' ;
$dir                     = __DIR__ ;

    $data[] = '';
    $dir = __DIR__ ;

    $wsroot_path = str_replace('\\','/', realpath($module_towsroot)).'/' ; 
    $modul_rel_path = rtrim(ltrim(str_replace('\\','/', __DIR__ .'/'), $wsroot_path),'/') ;

    $readme_edit_path = "?edit={$wsroot_path}readme.md" ; 
    $readme_showhtml_path = "?showhtml={$wsroot_path}readme.md" ; 

    //http://dev1:8083/, http://sspc1:8083/
    $wsroot_url = $wsroot_url = 
        ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
          .'/', FILTER_SANITIZE_URL ) ;
    $module_url = $wsroot_url . $modul_rel_path .'/' ;

    //we have only one (eg glomodul) group of modules per subsite (eg fwphp) !!
    $subsite_dir       = 'fwphp' ; //basename(__DIR__) 
    $glomodul_dir      = 'glomodul' ; 
    $modulglo_rel_path = $subsite_dir.'/'.$glomodul_dir.'/' ;

    $help_sw_rel_path  = $modulglo_rel_path .'help_sw/' ;
    $test_rel_path     = $help_sw_rel_path . 'test/' ;
    $helpsw_url  = '/'.dirname($test_rel_path).'/' ;

    $zbig_url       = $wsroot_url .'zbig/';
    $zbig_path      = $wsroot_path .'zbig/'; 

      /* **********************************************************
      *  fill in  d a t a  a r r  = LIST OF  M K D or T X T  FILES
      ********************************************************** */

      // similar to lsweb module, 13 to 30 mili seconds
      $objects = new \RecursiveIteratorIterator(
           new \RecursiveDirectoryIterator($dir)
         , \RecursiveIteratorIterator::SELF_FIRST
      );
      $data[] .= '<ol>';
      $dirname_prev = '';
      foreach($objects as $name => $object)
      {
        $md_fle_path = 
          str_replace(DIRECTORY_SEPARATOR, '/', str_replace($dir.DIRECTORY_SEPARATOR, '', $name)) ;
                          //echo $md_fle_path. '<br />' ;
        $path_parts = pathinfo($md_fle_path) ; //stripos($md_fle_path, '.txt')
                          //echo '<pre>'.'$path_parts='; print_r($path_parts); echo '</pre>';
        $ext = isset($path_parts['extension']) ? $path_parts['extension'] : 'noext';
        if ($ext === 'txt' or $ext === 'md' or $ext === 'mkd')
        {

          $md_fle_path = str_replace(DIRECTORY_SEPARATOR, '/', $md_fle_path);
          if (dirname($md_fle_path) != dirname($dir))
          {
            $dirname = dirname($md_fle_path); // '\\'
            if ($dirname_prev == $dirname) {$data[] .= '<br />';} 
            else {
              $dirname_prev = $dirname ;
              $data[] .= '<br /><li></b>'.$dirname.'</b><br />';
            }
          }

          $flename = basename($md_fle_path);

          //also works $module_ url.
          $fle_edit_url = '?edit='.$md_fle_path ;
          $md_fle_url = $md_fle_url = '?showhtml='.$md_fle_path ; //see md2htm()

          $data[] .= 
          ' <a href="'.$fle_edit_url.'" '." title='$fle_edit_url = SimpleMDE edit'>$flename</a>";
          //
          $data[] .= " &nbsp; &nbsp; 
          <a href='$md_fle_url' title='$md_fle_url = Parsedown txt to html'> HTM</a>";

        }              //echo '<pre>'.'$object='; print_r($object); echo '</pre>';
      }
      $data[] .= '</li></ol>';  //echo in View
                        if ('0') { 
                        //if ($module_arr['dbg'] and !$module_arr['style']) { 
                        echo '<h2>STEP555 ' .', lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šðèæž</h2>';
                        //echo '<br />'.'$ctr_ ordno='.$ctr_ ordno .'=...' ;
                        echo '<br />'.'$md_fle_url='.$md_fle_url ;
                        //print '<br />$module_arr ='; echo '<pre>'; print_r($module_arr); echo '</pre>';
                          echo '<br /><br />';
                        }
                        //echo '<br />5555555555555555555 '. __FILE__ ;
       //e n d    LIST OF  M K D or T X T  FILES
