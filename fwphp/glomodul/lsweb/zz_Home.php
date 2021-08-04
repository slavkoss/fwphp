<?php

/**
*        J:\awww\www\fwphp\glomodul\lsweb\Home.php
* Line  55:   public f unction __construct()
* Line 118:   public f unction IsURLCurrentPage($ruta) { // ruta is  r o u t e
* Line 125:   public f unction crelink($ruta) //was Btn($btnprops)
* Line 165:   public f unction crelinks($rutas)
* Line    :                                 // each() f unction is deprecated :
* Line 198:   public f unction Display()
* Line 280:   public f unction Ftr()
* Line 338:   public f unction Title()
* Line 343:   public f unction Keywords()
* Line 348:   public f unction Styles()
* Line 361:   public f unction Hdr()
* Line 374:   private f unction ftrtxt()
* Line 386:                       public f unction __set($name, $value)
* Line 391:                       public f unction __get($name)
* Line 397:                       public f unction __toString()
* Line 379:     *   ***** F UNCTION  SPECIFIC FOR MKD MODULE *****
* Line 414:   public f unction top_links_and_content(
* Line 453:   public f unction get_data(&$data)
* Line 511:   public f unction save()
* Line 518:   public f unction edit()
* Line 626:   public f unction md2htm()
* Line 671:   private f unction dpl(&$urlqry_arr)
*/
namespace B12phpfw ;

class Home
{

  public $pgtxt_name = ''
    ,$title = 'LSWEB'
    ,$page_title = 'Browse / run web server\'s scripts'
    ,$img_logo = '<img src="DIROPEN.PNG" alt="DIROPEN.PNG" />'
    ,$page_subtitle = ''
    ,$fqclsname

    ,$keywords = 'OOP, MVC, PHP, HTML, framework'
    // R O U T I N G  T A B L E :
    ,$routes1
  ;

  private $dbg // 1= show trace & debug messages
    ,$req_uri
    ,$cls
  ;

  //class operations - methods

  public function __construct()
  {
    $this->pgtxt_name   = lcfirst(basename(get_class($this))).'_view.php';
                            //self::$breadcr .= ' ->'. $rps['clsinurl'];
                            //$_SESSION['breadcr'] .= ' ->'. $rps['clsinurl'];

    //parent::__construct(); //no parent, __construct is called from: index.php, child clses
    //get_parent_class(get_class()) ; //is_subclass_of()  get_called_class()

    //R O U T I N G  T A B L E  level 1 (pages properties) - links
    // http://dev1:8083/fwphp/www4/glomodul/mkd/?Home
    //require_once 'module_routes.php' ;
    $this->routes1 = [] ; //$_SESSION['module_routes'][basename(__FILE__, '.php')] ;

    /**
    * I. D I R  T R E E  DESCRIPTION  for cls scripts autoload -------------------
    */
    $clsinurl = $_SESSION['rps']['clsinurl'] ;
    switch($clsinurl) { //new $clsnamevariable does not see fqcn from USE string
        //ee USE string is not variable  ee we must : CLSNAME_NOTVARIABLE::class
    case 'Help': case 'help': case 'h':
      $this->fqclsname = Help::class ;  break;
    default: break; }

  } //e n d  _ _ c o n s t r u c t ( )

  public function IsURLCurrentPage($ruta) { // ruta is  r o u t e
    if ( strpos($ruta['clsorcmd'],      //HAYSTACK eg Home or Learn for ALL BTNS
           $_SESSION['rps']['clsinurl']   //NEEDLE eg Home or LearnPhp06OOPIterator for URL
        ) === false ) { return false; } //is not cur page so SHOW LINK
    else { return true; }
  }

  public function crelink($ruta) //was Btn($btnprops)
  {
    //CONVENTION: $view = lcfirst($fqclsname).'_view.php';
    $clsorcmd = $btnname = $ruta['clsorcmd']; $urlorscript = $ruta['urlorscript'];
    $btntitle = $ruta['btntitle'] ; $btnlabel = $ruta['btnlabel'] ;

    $clsorcmd_url = QS . $clsorcmd ;

    if ($this->IsURLCurrentPage($ruta))
    {
      // cur page, DO NOT SHOW LINK   span class="menutext" style="width:20px;height:20px;"
      ?><a href="<?=$clsorcmd_url?>" title="<?=$btntitle?>">&rArr;</a><?=$btnlabel?><?php

    } else { // SHOW LINK

        if ( $ruta['clsorcmd'] == 'gourl' ) {
          //SHOW LINK 1. R O U T I N G  to single page module (u r l-ed  s cript) :
          //  eg to skin2 : ../www  or to  thttp://dev1:8083/fwphp/glomodul/mkd/
          ?> <a href="<?=$urlorscript?>"
                title="<?=$ruta['btntitle']?>"><?=$ruta['btnlabel']?></a><?php
        } else {
          //SHOW LINK 2. R O U T I N G  to  module's mnu c l a s s
          //   eg http://dev1:8083/fwphp/www4/?Home
           ?> <a href="<?=$clsorcmd_url?>" title="<?=$ruta['btntitle']?>">
                <?=$ruta['btnlabel']?></a><?php
        }

    }

      //<img src="../arrow_right.gif" alt="../arrow_right.gif"> is in <a tag
  }
  public function crelinks($rutas)
  {
    ?>

    <!--
      **************************************************************
      TOP LINKS NOT DROPDOWN = breadcrumbs (all, INHERITED)
      **************************************************************
    -->
    <div id="hMenu">
    <ul>
    <li id="frst">
    <?php
    $ii = 0; foreach ($rutas as $ruta) { // max 7 top buttons
      $ii++;
                     if ($_SESSION['rps']['dbg']) {
                     echo '<pre>'.__FILE__ .', lin='. __LINE__ .' SAYS: __METHOD__='. __METHOD__ .'<br />HAYSTACK $this->req_uri='.$this->req_uri . '<br />NEEDLE '.$ii.' IS BUTTON NAME $ruta[\'cls\']='. $ruta['clsorcmd'] .', FIRST TOP BUTTONS ROW HAS DOT !!' . '<br />$_SERVER[\'PHP_SELF\']='. $_SERVER['PHP_SELF'] . '<br />$urlorscript (was url)='. $ruta['urlorscript'] ; echo '<br />NEEDLE $_SESSION[\'rps\']='; print_r($_SESSION['rps']); echo '<br />HAYSTACK $ruta='; print_r($ruta); echo '</pre>'; //$_SERVER['PHP_SELF'] must be allways index.php  (it is module single entry point) !!
                     }

      $this->crelink($ruta);
    }
    //echo $_SESSION['breadcr'] ; //self::$breadcr; $_SESSION['rps']['breadcr'] ; $mnulevel ;

    echo "</li>
    </ul>
    </div>"; // </nav>\n
                                // each() function is deprecated :
                                //while (list($name, $url) = each($buttons)) {$this->Btn($name, $url, !$this->IsURLCurrentPage($url)); }
  }


  public function Display()
  {
    //$rps = $_SESSION['rps'] ;
    $akc = $_SESSION['rps']['akcinurl'] ;
    $readme_edit_url   = QS.'Home/edit/'.$_SESSION['rps']['PATHWSROOT'].'readme.md' ;
    $readme_md2htm_url = QS.'Home/md2htm/'.$_SESSION['rps']['PATHWSROOT'].'readme.md' ;

    echo "<html><head>";
    $this -> Title();
    $this -> Keywords();
    $this->Styles();
    echo "</head><body>";

        switch($akc) // or switch(true)
        {
          case 'edit':
            //commented because routing in _ConfAllSites4.php does it (search fqclsname) :
            //  $this->edit(); // DisplayMkdForm if clicked  l i n k  in  p a g e
            break;

          default:
            /*
            // R e a d  m o d e l  d a t a    M O D E L  code for OUT FILES LIST
            $data = [];
            $this->get_data($data);

            // D I S P L A Y  P A G E
            $this->top_links_and_content($readme_edit_url, $readme_md2htm_url, $data);
            */
            break;
        }
      echo "<br /><br />";





    $this -> Hdr();

      echo "<div class='content'>";

         $this -> crelinks($this->routes1); // $this -> crelinks($this->buttons);

                         if ($_SESSION['rps']['dbg']) {
                           echo '<pre>'.__FILE__ .', lin='. __LINE__ .'<br /><b>*** '.__METHOD__ .'  SAYS ***</b>';
                           echo '$this->pgtxt_name='.$this->pgtxt_name;
                           echo '<br /><h3>$_SESSION=</h3>'; print_r($_SESSION) ;
                           echo '</pre><br />';
                         } else {
                           //echo __CLASS__ .' &nbsp;m e n u &nbsp;c l a s s';
                           //include_once $this->pgtxt_name; // s cript c ontent
                        }

      require_once __DIR__ . '/lsweb.php';

      echo "</div>";


    $this -> Ftr();

    echo "</body></html>";

  }



  public function Ftr()
  { ?>

    <!--
      **************************************************************
                         p a g e   f o o t e r
      **************************************************************
    -->
    <div class="pgftr">

    <br />
    Our <a href="legal.php">
      <?php $tmp1='Legal information page'; echo str_replace('$tmp1',$tmp1
         , $_SESSION['rps']['tmpl_txtlightgreen']); ?></a>
    &nbsp;<a href="http://phporacle.altervista.org" title="phporacle blog">
      <?php $tmp1='Comments'; echo str_replace('$tmp1',$tmp1
          ,$_SESSION['rps']['tmpl_txtlightgreen']); ?></a>
    &nbsp;<a href="/faqs.html">
    <?php $tmp1='FAQ'; echo str_replace('$tmp1',$tmp1
        ,$_SESSION['rps']['tmpl_txtlightgreen']); ?></a>

    <br />
    &copy; OOP Consulting Pty Ltd. 2001-... ™phporacle - All rights reserved.

    <?php
    $decimale = 6;
    $time_end = explode(" ", microtime());
    $time_end = $time_end[0] + $time_end[1];
    $time = round($time_end - STARTUP_TIME, $decimale) * 1000;

    $mem1 = round(STARTUP_MEMORY/(1024*1024), $decimale);
    $mem2 = round(memory_get_usage(true)/(1024*1024), $decimale);
    $mem  = $mem2 - $mem1;

    echo 'Page rendered in <span style="font-size:1.5em">'.$time.'</span> mili seconds'
    .', using '.round($mem,3).' MB '.'(='.$mem2.' - '.$mem1.')'
    . '<br />
      Minimal 10 times faster than Stu Nicholls cssplay, 250 times faster than Bootstrap.'
    //.', Nr DB queries ' . $data['o']['NrDBqueries'] //$main_ctr->NrDBqueries
    ;
    ?>


      </div>

  </body>

  </html>


  <?php //$this->ftrtxt() ;


  }



  public function Title()
  {
    echo "<title>".$this->title."</title>";
  }

  public function Keywords()
  {
    echo "<meta name='keywords' content='".$this->keywords."'/>";
  }

  public function Styles()
  {
    ?>
    <link href="/zinc/themes/site/simplest.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="../favicon.ico" type="image/ico">
    <!--also works: link rel="shortcut icon" href="favicon.ico" type="image/x-icon"-->
    <?php
    //styles.css
  }




  public function Hdr()
  {
    ?>
    <div class="pghdr">
      <!-- height="20" width="20"     class="pghdr"-->
      <h2><?=$this->img_logo?><i></i> <?=$this->page_title?></h2>
      <span><?=$this->page_subtitle?><br /><span>
    </div>
    <?php
  }



  private function ftrtxt()
  {
      ?>

    </div>

    <?php
  }


                      /*
                      //magic methods (triggers)
                      public function __set($name, $value)
                      {
                        //eg after  $a = new classname();  works $a->attribute = 5;
                        $this->$name = $value;
                      }
                      public function __get($name)
                      {
                        //eg after  $a = new classname();  works echo $a->attribute ;
                        return $this->$name;
                      }
                      */
    public function __toString()
    {
      return(var_export($this, TRUE)); //print_r does not show values
      //return(print_r($this, TRUE));
    }




    /**
    *   ***** FUNCTION  SPECIFIC FOR MKD MODULE *****
    */


    /**
    *           D I S P L A Y  P A G E
    */
  public function top_links_and_content(
      $readme_edit_url, $readme_md2htm_url, &$data
  )
  {
      /**
      *           D I S P L A Y  T O P  L I N K S
      */
        ?>
        <div>
           <!-- parent::getconf('PATHALLSITES_WSDOC')
                  //$urlqry = QS  .'Home/&fle='.$path;  was QS  .'p/edit/&fle=readme.md
                  //QS  .'p/md2htm/&fle=   target="_blank"
           -->
          <a href="<?=$readme_edit_url?>" title="SimpleMDE edit readme.md">
          Edit readme.md</a>
          &nbsp;
          <a href="<?=$readme_md2htm_url?>" title="Parse down readme.md md to html">
          HTML</a>

        </div>
        <?php


          /**
          *       D i s p l a y  m o d e l  d a t a
          *       D I S P L A Y (BLOCK, LIST OF) FILES
          */
          foreach($data as $htmlline) { echo $htmlline; }
          //echo '<br/><br/><hr/>e n d o f &nbsp; '.__FILE__;
          //echo '<br/>default view $this->pgtxt_name_def = lcfirst(basename(get_class($this))).\'_view.php\'; = '. $this->pgtxt_name_def;


  } //e n d  f n   d i s p l a y  m o d e l  d a t a



  /**
  *       M O D E L  code for OUT FILES LIST
  */
  public function get_data(&$data)
  {

      $dir = __DIR__ ; // . '/mdtxt'


      // similar to lsweb module, 13 to 30 mili seconds
      $objects = new \RecursiveIteratorIterator(
           new \RecursiveDirectoryIterator($dir)
         , \RecursiveIteratorIterator::SELF_FIRST
      );
      $dirname = '';
      foreach($objects as $name => $object)
      {
        $path = str_replace(DS, '/', str_replace($dir.DS, '', $name)) ;
                          //echo $path. '<br />' ;
        $path_parts = pathinfo($path) ; //stripos($path, '.txt')
                          //echo '<pre>'.'$path_parts='; print_r($path_parts); echo '</pre>';
        $ext = isset($path_parts['extension']) ? $path_parts['extension'] : 'noext';
        if ($ext === 'txt' or $ext === 'md' or $ext === 'mkd')
        {

          $path = str_replace(DS, '/', $path);
          if (dirname($path) != $dirname)
          {
            $dirname = dirname($path); // '\\'
            $data[] .= '<br /><br /></li><li></b>'.$dirname.'</b>'; //echo in View
          }

          $flename = basename($path);

          //not URL call this script (QS unknown...) but include or :
          //this script be class like lsweb and page classes in www4
          //$urlqry = QS  .'p/edit/&fle='.$path; //echo '<br />XXX'.$urlqry ;
          // http://dev1:8083/fwphp/www4/glomodul/mkd/?Home/&fle=01/001_db/oracle_apex.txt
          $fle_edit_url   = QS .'Home/edit/'.$path ;
          $fle_md2htm_url = QS .'Home/md2htm/'.$path ;
                //.$rps['PATHWSROOT'].'readme.md'

          $data[] .= '<br /><a href="'.$fle_edit_url.'" '
            .' title="SimpleMDE edit ' . $fle_edit_url .'">'.$flename.'</a>';
          //
          $urlqry = $fle_md2htm_url; //md2htm() in page  c t r

          $data[] .= ' &nbsp; &nbsp; <a href="'.$fle_md2htm_url.'" '
            .' title="P a r s e d o w n  txt to html ' . $fle_md2htm_url .'"'
            .'>'.'HTM'.'</a>';

        }              //echo '<pre>'.'$object='; print_r($object); echo '</pre>';
      }
      $data[] .= '</li></ol>';  //echo in View
  }



  /**
  *       code BEHIND  m k d  f o r m
  */
  public function save()
  {

  }
  /**
  *       V I E V  code for  m k d  f o r m
  */
  public function edit()
  {
      //NEVER $_GET['fle']
      $fle_path_below_module = rtrim(str_replace('/',DS
          , implode('/', $_SESSION['rps']['akcinurlparams'])), DS) ;
                       // [[0] => 01 [1] => 001_db [2] => oracle_apex.txt] to :
                       // 01/001_db/oracle_apex.txt

                     //to see :  1+ $_SESS...
                     if ($_SESSION['rps']['dbg']) {
                     echo '<pre>'.__FILE__ .', lin='. __LINE__ .' SAYS:'
                     .'<br />__METHOD__='. __METHOD__
                     .'<br />see akcinurlparams in $_SESSION[\'rps\']=';
                     //akcinurlparams arr : [0] => 001_MDcheatsheet.txt :
                     print_r($_SESSION['rps']);
                     echo '</pre>'; }
      if (basename($fle_path_below_module) == 'readme.md') {
         $fle_path = $_SESSION['rps']['PATHWSROOT'].'readme.md' ;
      } else {
         //J:\awww\www\fwphp\glomodul4\mkd\001_MDcheatsheet.txt
         $fle_path = $_SESSION['rps']['PATHWSROOT'] //J:\awww\www
                . $_SESSION['rps']['DIRSITE']      // 'fwphp/'
                . $_SESSION['rps']['DIRGLOMODUL4'] // 'glomodul4/'
                . $_SESSION['rps']['DIRMODUL']     // 'mkd/'
             . $fle_path_below_module ;            // 001_MDcheatsheet.txt
         $fle_path = rtrim( str_replace('/',DS, $fle_path), DS ) ;
      }

      $save_url           = QS .'Home/edit/'.$fle_path_below_module . '/' ;
      $fle_md2htm_url     = QS .'Home/md2htm/'.$fle_path_below_module . '/' ;

          /*<!--
                    IS  R E A D  OR  U P D A T E  T X T  ?
          -->*/
          //m s g is better than echo '<pre>'.'$_REQUEST='; print_r($_REQUEST); echo '</pre>';
            if (isset($_POST['nameedtxtarea'])) {
              $mdcontent = $_POST['nameedtxtarea'];
              file_put_contents(
                 rtrim( str_replace('/',DS, $fle_path), DS )
                , $mdcontent
              );
            } else { $mdcontent = file_get_contents($fle_path); }
          ?>



          <!--   OUT  F O R M  FOR  Simple MDE WYSIWYG  MARKDOWN EDITOR
                href="/vendor/simplemde/simplemde.min.css"
                parent::getconf('URLALLSITES_VENDOR')
          -->
          <!DOCTYPE html><html lang="hr"><head><title>EDMKD4 <?=basename($fle_path_below_module)?></title>
          <link rel="stylesheet" type="text/css"
                href="/vendor/simplemde/simplemde.min.css">
                        <!-- WYSIWYG markdown editor 11 kB css v1.11.2, 2016 year
                        or href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css"
                        -->
              </head><body>

              <form action="<?=$save_url?>" method="post" id="frmwysiwyg">
                <h3>
                  <label for="edtxtarea">WYSIWYG md editor SimpleMDE</label>
                  &nbsp; &nbsp;<input type="submit" name="Save" value="Save">
                  &nbsp;<?=$fle_path_below_module?>

                   &nbsp; &nbsp; <a href="<?=$fle_md2htm_url?>"
                  title="<?='ctrl+click '.$fle_md2htm_url?>" >HTML (Parsedown)</a> &nbsp;
                </h3>

                <textarea name="nameedtxtarea" id="edtxtarea"><?=$mdcontent?></textarea>
              </form>




          <!--
                 A S S E T S  ( I N C L U D E S )
          https://github.com/sparksuite/simplemde-markdown-editor
          parent::getconf('URLALLSITES_VENDOR')
          -->
          <script src="/vendor/simplemde/simplemde.min.js"></script>
          <!-- 269 kB js v1.11.2, 2016 year -->
          <!--script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script-->
          <script>
            new SimpleMDE({
              element: document.getElementById("edtxtarea"),
              //forceSync: true,
              placeholder: "Type here...",
              spellChecker: true,
              //status: true,
              shortcuts: {
                drawTable: "Cmd-Alt-T"
              },
              showIcons: ["code", "table"],
              autosave: {
                enabled: false,
                unique_id: "edtxtarea",
                // one second :
                delay: 1000,
              },
            });
          </script>



              </body></html>
          <?php
  } //e n d  f n  e d i t ()



    /**
    *  f n  md2htm ():  P a r s e d o w n  displays .txt or .md or .mkd as html
    * http://dev1:8083/fwphp/www4/glomodul/mkd/?Home/md2htm/J:\awww\www/readme.md/
    * CALLED FROM J:\awww\www\fwphp\www4\glomodul\mkd\home_view.php
    * CALLS (extern) Parsed. to display .txt or .md or .mkd from content subfolder
    */
  public function md2htm()
  {

    require_once $_SESSION['rps']['PATHWSROOT'].'/vendor/erusev/parsedown/parsedown.php';

    //NEVER $_GET['fle']
    $path = rtrim(
        str_replace('/',DS, implode('/', $_SESSION['rps']['akcinurlparams']))
    , DS);
    $fle_edit_url = QS .'Home/edit/'.$path .'/' ;

    // http://dev1:8083/fwphp/glomodul/mkd/?p/htm/&fle=J:/awww/www/readme.md
    $pdown = new \Parsedown; // Parsedown cls has no namespace
    //$parsedown->setSafeMode(true); //processing untrusted user-input
    //$parsedown->setMarkupEscaped(true); //escape HTM **in trusted input**
    ?>
          <!DOCTYPE html><html lang="hr"><head><title>HTMLofMKD4</title>
      <link rel="stylesheet" type="text/css"
            href="<?='URLALLSITES_VENDOR'?>simplemde/simplemde.min.css">
      <!--                    11 kB css v1.11.2, 2016 year
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
      -->

          </head> <body>
    <?php
    // http://dev1:8083/fwphp/glomodul/mkd/?p/edit/mdtxt/004_markdown/001_MDcheatsheet.txt
    // http://dev1:8083/fwphp/glomodul/mkd/?p/edit/wsr/readme.md
    // http://dev1:8083/fwphp/glomodul/mkd/?p/edit/J:/awww/www/readme.md
            //. str_replace( parent::getconf('PATHMODULE'), '', 'fle' )
               //str_replace(PATHALLSITES, '', 'fle])
               //. "\n PATHMODULE=".parent::getconf('PATHMODULE')
               //. "\n PATHMODULEBELOWWSDOC=".parent::getconf('PATHMODULEBELOWWSDOC')
    echo $pdown->text(
      '<h3>'.'Markdown ' . $path .' Parsedown-ed to HTM. '
        . "<a href='$fle_edit_url'" . ' ' . 'title="SimpleMDE edit">'
           . ' <b>[Edit this page - here]</b></a> (WYSIWYG md editor SimpleMDE) or use some desktop markdown text editor.'
     .'</h3>'
    );
    //echo $pdown->text(highlight_string(file_get_contents($path))); //readme.md
    echo $pdown->text(file_get_contents($path)); //readme.md



  } // E N D  f n  m d 2 h t m ( )



  private function dpl(&$urlqry_arr)
  {
     _CtrMain::dpl($urlqry_arr);
  } // E N D  f n  deploy_ dev_ to_ test ( )



} //e n d  c l s
