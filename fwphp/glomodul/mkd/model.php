<?php
/**
* J:\awww\www\fwphp\glomodul\mkd\model.php
* http://sspc2:8083/fwphp/glomodul/mkd/
* #cs04. (code flow step 4) processing (model, business logic)
*/
namespace B12phpfw\flatFilesEd\mkd ;
//session_start();
//echo 'aaaaaaaaaaaaaaaaaaaaa';

$data[] = '';

$dir                     = __DIR__ ;

      /* **********************************************************
      * fill in  d a t a  a r r  = LIST OF .mkd, .md or .txt  FILES
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
              // *********** out dir containing texts ************
              $data[] .= '<br /><br /><li></b>'.$dirname.'</b><br />';
            }
          }

          $flename = basename($md_fle_path);

          //http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\\readme.md
          $fle_edit_url = '?i/edit/path/'. str_replace('/','\\', $md_fle_path) ;

          //http://sspc2:8083/fwphp/glomodul/mkd/?i/showhtml/path/J:\awww\www\\readme.md
          $md_fle_url = '?i/showhtml/path/'. str_replace('/','\\', $md_fle_path) ;
          //see md2htm()

          $data[] .= 
          ' <a href="'.$fle_edit_url.'" '." title='$fle_edit_url = SimpleMDE edit'>$flename</a>";
          //
          $data[] .= " &nbsp; &nbsp; 
          <a href='$md_fle_url' title='$md_fle_url = Parsedown txt to html'> HTM</a>";

        }              //echo '<pre>'.'$object='; print_r($object); echo '</pre>';
      }

      $data[] .= '</li></ol>';  //echo in View

                        if ('') { 
                        //if ($module_arr['dbg'] and !$module_arr['style']) { 
                        echo '<h2>STEP555 ' .', lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šðèæž</h2>';
                        //echo '<br />'.'$ctr_ ordno='.$ctr_ ordno .'=...' ;
                        echo '<br />'.'$md_fle_url='.$md_fle_url ;
                        //print '<br />$module_arr ='; echo '<pre>'; print_r($module_arr); echo '</pre>';
                          echo '<br /><br />';
                        }
                        //echo '<br />5555555555555555555 '. __FILE__ ;
//e n d    LIST OF  M K D or T X T  FILES
