<?php
    /**
    *  f n  m d 2 h t m ( ) :  P a r s e d o w n  displays .txt or .md or .mkd as html
    * http://dev1:8083/fwphp/www4/glomodul/mkd/?Home/md2htm/J:\awww\www/readme.md/
    * CALLED FROM 
    * CALLS (extern) Parsedown to display txt from content subfolder
    */

    require $wsroot_path.'vendor/erusev/parsedown/Parsedown.php';
    $pdown = new \Parsedown; // Parsedown cls has no namespace

    $fle_displ_url = '?edit='.$fle_to_displ_path .'/' ;
    //http://dev1:8083/zinc/showsource.php?file=J:/awww/www/fwphp/glomodul/mkd/02/02_domain_model/DM_Gervasio_part2.txt&line=55&prev=10000&next=10000
    //http://dev1:8083/zinc/showsource.php?file=02/02_domain_model/DM_Gervasio_part2.txt&line=55&prev=10000&next=10000
    $colored_fle_displ_url = '/zinc/showsource.php?file='. realpath($fle_to_displ_path)
      .'&line=55&prev=10000&next=10000' ;

    ?>
    <!DOCTYPE html><html lang="hr"><head><title>HTMLofMKD</title>
       <link rel="stylesheet" href="/vendor/erusev/parsedown/styles/default.css">
       <!--script src="/vendor/erusev/parsedown/highlight.pack.js"></script-->
       <!--script>hljs.initHighlightingOnLoad();</script-->


          </head> <body>
    <?php
    //          TOP TOOLBAR
    //ob_start(); // this shows html below
    ?>
      WYSIWYG md editor SimpleMDE or use some desktop markdown text editor
        &nbsp; &nbsp;<a href="index.php" title="index.php">Home</a>

      &nbsp; &nbsp;[<a href="https://domchristie.github.io/turndown/"
          title="html2markdown"> html2markdown </a>]

      <br /><b>Markdown txt <?=$fle_to_displ_path?> Parsedown-ed to HTML.</b>
        &nbsp; &nbsp;[<a href="<?=$fle_displ_url?>"
            title="SimpleMDE edit : <?=isset($_GET['edit'])?rtrim($_GET['edit'],'/'):''?>"
          ><b> Edit text</b>
         </a>]

        &nbsp; &nbsp;[<a href="<?=$colored_fle_displ_url?>"
            title="Higligted code <?=isset($_GET['edit'])?rtrim($_GET['edit'],'/'):''?>"
          ><b> Colored text</b>
         </a>]


    <?php
    //$top_toolbar = ob_get_contents();
    //ob_end_clean();

    //echo $pdown->text($top_toolbar);

    //Warning: file_get_contents(?home/md2htm/J:): failed to open stream
    $mkdowntxt = file_get_contents($fle_to_displ_path) ;
    $htmltxt = $pdown->text($mkdowntxt) ;
    echo $pdown->text($htmltxt) ;

//

//http://dev1:8083/zinc/showsource.php?file=J:/awww/www/fwphp/glomodul/mkd/02/02_domain_model/DM_Gervasio_part2.txt&line=55&next=171


            // highlight_string( string $str[, bool $return_highl_code = FALSE|TRUE] ) : mixed
            // highlight_file( string $filename[, bool $return_highl_code = FALSE|TRUE] ) : mixed
            // $mkdowntxt = highlight_file( $fle_to_displ_path, TRUE ) ;



    /*
    $findtxt   = '<pre';
    $pos = strpos($htmltxt, $findtxt);
    if ($pos === false) {
        echo "String '&lt;pre' was not found "; //in the string '$htmltxt'
    } else {
        echo "The string '&lt;pre' was found "; //in the string '$htmltxt'
        echo " and exists at position $pos";
    }
    //echo '<br />'. str_replace( '<pre>', '',
      highlight_string(substr($htmltxt, $pos, 1000), FALSE);
    //) ;
    */


/*
//              NO LINE NUMBERS :
  showSource($file='J:\awww\www\fwphp\glomodul\mkd\02\02_domain_model\DM_Gervasio_part2.txt'
  //J:/awww/www/fwphp/glomodul/mkd/02/02_domain_model/DM_Gervasio_part2.txt
     , $line=55, $prev = 1, $next = 171) ;
  //public static 
  function showSource($file, $line, $prev = 10, $next = 10)
  {
//http://dev1:8083/08ls/index.php?cmd=showsource&file=J:\awww\apl\dev1\zdoc\books\00ng_Wahlin\DemoList.php&line=1&prev=10000&next=10000

      if (!(file_exists($file) && is_file($file))) {
          return trigger_error(
              "showSource(): ne postoji skripta ~~~".$file.'~~~'
              , E_USER_ERROR);
          return false;
      }
      //read code
      //ob_start();
      highlight_file($file);
      $data = ob_get_contents();
      ob_clean(); // ob_clean() or ob_end_clean()

      //seperate lines
      $data  = explode('<br />', $data);
      $count = count($data) - 1;

      //count which lines to display
      $start = $line - $prev;
      if ($start < 1) {
          $start = 1;
      }
      $end = $line + $next;
      if ($end > $count) {
          $end = $count + 1;
      }

           //if ('0') { // where am I  s a y s :
          $wai = array('fn'=>__FUNCTION__,'fle'=>__FILE__,'ln'=>__LINE__
                 ,'cls'=>__CLASS__,'txt1'=>'','txt2'=>''); //where am I
           $wai['ln']=__LINE__ + 1; //echo self::w a i($wai) ;
           echo '<span>' //.self::wai($wai)
               .' SAYS : Sorce code of ';
              echo '<br />'.'file=' .'<strong
                   style="font-size:1.2em; color:blue">'.$file.'</strong>';
              echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
                 .'line=' . $line .' prev=' . $prev .' next=' . $next;
              echo ' count=' . $count .' start=' . $start
                   .' end=' . $end;
           echo '</span>';
                //print_r(_1UtlGlbl::get all url cmd()); print_r($utl->ubitsget()); //var_dump
           //}

      //color for numbering lines
      $highlight_default = ini_get('highlight.default');

      //displaying
      echo '<table cellspacing="0" cellpadding="0"><tr>';
      echo '<td style="vertical-align: top;"><code style="background-color: #FFFFCC; color: #666666;">';

      for ($x = $start; $x <= $end; $x++) {
          echo '<a name="'.$x.'"></a>';
          echo ($line == $x ? '<font style="background-color: red; color: white;">' : '');
          echo str_repeat('&nbsp;', (strlen($end) - strlen($x)) + 1);
          echo $x;
          echo '&nbsp;';
          echo ($line == $x ? '</font>' : '');
          echo '<br />';
      }
      echo '</code>'
         .'</td>'
      .'<td style="vertical-align: top;">'
      .'<code>';
      while ($start <= $end) {
          echo '&nbsp;' . $data[$start - 1] . '<br />';
          ++$start;
      }
      echo '</code></td>';
      echo '</tr></table>';

      if ($prev != 10000 || $next != 10000) {
          echo '<div style="font-family: tahoma; font-size: 14px;">';
          echo '<br /><a
            href="'.@$_SERVER['PHP_SELF']
                   .'?file='.urlencode($file).'&line='.$line
                   .'&prev=10000&next=10000#'.($line - 15).'">view Full Source</a>' ;
          print "</div>";
      }

  }
*/