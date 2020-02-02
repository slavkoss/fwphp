<?php
/**
* J:\awww\www\fwphp\glomodul\lsweb\Lsweb.php
* http://dev1:8083/fwphp/glomodul/lsweb/?cmd=J:/awww/www
* http://dev1:8083/fwphp/glomodul/help_sw/00info_php2.php
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//declare(strict_types=1); // php 7
//ob_start();
// starts new or resumes existing session
if (!isset($_SESSION)) { session_start(); }

//namespaced controller object (memory) described by class lsweb
$nsctrcls_obj = new lsweb();

    /**
     * C L A S S  lsweb  - web server dirs list (cRud) & run PHP scripts
     * cRud - only R of CRUD (cud we do with oper.sys fns)
     */
class Lsweb
{
  private $data = []; // folder items

  private static $UPTO_WSROOT  = '../../../' ; 
  private static $PATHWSROOT ;
  private static $getcmd_or_wsrootpath ;
  private static $URLALLSITES ;
  private static $URLMODULE ;
  private static $imgdir_rel ;

  private static $mode_type_map;
  
  private static $sizedir;
  private static $url_sort_param;

  public function __construct()
  {
    /**
     *  2.1 M O D E L  (CREATE DATA ARRAY TO  D I S P L A Y)
     *  DirectoryIterator() -  D I R  I T M S  (E N T R I E S)
     */
                // diritemtype - l s w e b  own constants (no need to look at them):
                self::define_constants();
                self::$mode_type_map = array(
                  S_IFBLK => 'b', S_IFCHR => 'c', S_IFDIR => 'd', S_IFREG => '-'
                 ,S_IFIFO => 'p', S_IFLNK => 'l', S_IFSOCK => 's'
                );

    /**
     * 1 . C O N T R O L L E R  -  R O U T I N G  T O  S E L F
     *        ADRESSES - (NAVIGATION) PARAMETERS
     */
      self::$PATHWSROOT = str_replace('\\','/', realpath(self::$UPTO_WSROOT) .'/') ; //'J:/awww/www/'
      self::$getcmd_or_wsrootpath = rtrim(
         isset($_GET['cmd']) ? str_replace('\\','/', $_GET['cmd']) : self::$PATHWSROOT,'/') //default
      ; 
      self::$URLALLSITES    = //=URL_PROTOCOL or :
        ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://')
        . filter_var( $_SERVER['HTTP_HOST'] //URL_DOMAIN  .$_SERVER['REQUEST_URI']
        . '/' , FILTER_SANITIZE_URL ) ;
      self::$URLMODULE      = self::$URLALLSITES . str_replace(
            // = __FILE__ without P ATHWSROOT
            str_replace('\\','/', self::$PATHWSROOT),''
          , str_replace('\\','/',__FILE__)
        );
      self::$imgdir_rel = '/'. dirname(str_replace( // = __FILE__ without P ATHWSROOT
            str_replace('\\','/', self::$PATHWSROOT),''
          , str_replace('\\','/',__FILE__))
        ).'/';

    $this->mdl_get_curdiritems();

      if (is_callable([$this, 'Display']))
      { // c a l l  cls's  action method (f u n c t i o n) :
         $action = 'Display';
         $this->$action();
      }

      if ('0') { echo '<pre>'.'THIS IS EXECUTED AFTER C L S  F T R'; echo '</pre>'; }


  } //e n d  _ _ c o n s t r u c t ()

    /**
     *  2.1 M O D E L  (CREATE DATA ARRAY TO  D I S P L A Y)
     *  DirectoryIterator() -  D I R  I T M S  (E N T R I E S)
     */
  private function mdl_get_curdiritems() 
  {
    // GET DATA ARRAY = items in folder TO  D I S P L A Y
                      /* $this->data[0]['sizedir'] = 0; //summary rec.cols are in arr.index=0
                      $this->data[0]['user_info'] = '' ;
                      $this->data[0]['group_info'] = '' ;
                      $this->data[0]['dateymd'] = '' ;
                      $this->data[0]['datedmy'] = '' ;
                      $this->data[0]['mode'] = 'd' ;
                      $this->data[0]['mode_type'] = '' ;
                      $this->data[0]['size'] = 0 ;
                      $this->data[0]['itmname'] = 'summary' ;
                      $this->data[0]['itmtype'] = 'summary' ; */

    self::$sizedir = 0 ;
    $itm_ordno = 0; 
    foreach  (new  \DirectoryIterator(self::$getcmd_or_wsrootpath) as $flediriter)
    {
      //$this->data[$itm_ordno]['flediriter'] = $flediriter ;
      //  translate  uid  into  user  name
      if  (function_exists('posix_getpwuid'))  {
        $this->data[$itm_ordno]['user_info'] = posix_getpwuid($flediriter->getOwner());
      }  else  {
        $this->data[$itm_ordno]['user_info'] = $flediriter->getOwner();
      }
      //  translate  gid  into  group  name
      if  (function_exists('posix_getgrid'))  {
        $this->data[$itm_ordno]['group_info'] =  $flediriter->getGroup();
      }  else  {
        $this->data[$itm_ordno]['group_info'] =  $flediriter->getGroup();
      }
      //  format  f  o  r  readability  'd.m.Y  H:i'  'M  d H:i'
      $this->data[$itm_ordno]['dateymd'] = $date = date('Ymd H:i', $flediriter->getMTime());
      $this->data[$itm_ordno]['datedmy'] = date('d.m.Y  H:i', $flediriter->getMTime());
      //  translate  the  octal  m o d e  into  a  readable  string
      $this->data[$itm_ordno]['mode'] = $mode = self::mode_string(
          $flediriter->getPerms(), self::$mode_type_map
        );
      $this->data[$itm_ordno]['mode_type'] = $mode_type  =  substr($mode,0,1);
      
      $this->data[$itm_ordno]['itmname'] = $itmname  =  $flediriter->getFilename();


      $itmtype = 'fle';
      if ($itmname == '..')      {$itmtype = 'aupdir';} //prefixed with a for usort
      else if ($itmname == '.')  {$itmtype = 'curdir';}
      else if ($flediriter->isDir()) { $itmtype = 'dir'; // which can be link
         if  ($mode_type == 'l') {$itmtype = 'link';}
      }
      $this->data[$itm_ordno]['itmtype'] = $itmtype ;
      
      //             C R E A T E  S O R T  I T E M
      $this->data[$itm_ordno]['sort_typ_name'] = $itmtype . $itmname ;
      $this->data[$itm_ordno]['sort_typ_date'] = $itmtype . $date ;
      
      if  (($mode_type == 'c') or ($mode_type == 'b')) {
              //  if  it's  a  block  or  character  device,  p  r  i  n  t  out  the  major  and  minor  device  type  instead  of  the  file  size
              $statInfo  =  lstat($flediriter->getPathname());
              $major  =  ($statInfo['rdev']  >>  8)  &  0xff;
              $minor  =  $statInfo['rdev']  &  0xff;
        $this->data[$itm_ordno]['size'] = sprintf('%3u,  %3u',$major,$minor);
      }  else  {
        
        $this->data[$itm_ordno]['size'] = $flediriter->getSize();
        
        //             S U M M A R I Z E
        if ($itmtype == 'fle') {
          self::$sizedir += $this->data[$itm_ordno]['size'] ;
                       //print  '<h3>' . $this->data[$itm_ordno]['itmname'].', '.$this->data[$itm_ordno]['size'] .'<h3>';
        }
      }

      $itm_ordno++;
    } //e n d  GET DATA ARRAY TO  D I S P L A Y



    //             S O R T  D A T A  A R R A Y
    if (!isset($_GET['s'])) {$sort_by = 'sort_typ_name' ; self::$url_sort_param='' ;}
    else {
      switch($_GET['s']) { 
        case '2': $sort_by = 'sort_typ_date' ;  self::$url_sort_param='&s=2' ; break;
        default:  $sort_by = 'sort_typ_name' ;  self::$url_sort_param='' ; break; 
      } 
    } ;
    usort($this->data, $this->build_sorter($sort_by));
                    //usort($this->data, $this->build_sorter('sort_typ_name'));
                    //usort($this->data, $this->build_sorter('sort_typ_date'));

  } //e n d  f n  mdl_ get_ cur dir items()

  private function build_sorter($key) {
    // using closure to sort multi-dimensional array
      return function ($a, $b) use ($key) {
          return strnatcmp($a[$key], $b[$key]);
      };
  }


  private function Display()
  {
                       if ('0') { echo '<h3>getcmd_or_wsrootpath='.self::$getcmd_or_wsrootpath
                       .',&nbsp;&nbsp; URLALLSITES='.self::$URLALLSITES
                       .',&nbsp;&nbsp; URLMODULE='.self::$URLMODULE
                       .'<br />imgdir_rel='.self::$imgdir_rel
                       //.',&nbsp;&nbsp; $dev1ROOTURL='.$dev1ROOTURL
                       .'</h3>'; } //<br />

    $tbl_hdr_printed  =  false;

    /**
     *  2.2 M O D E L  (GET DATA ARRAY ROW TO  D I S P L A Y)
     */
    $itm_ordno = 0;
    foreach($this->data as $itm) :
    {
      // input
      //$flediriter = $itm['flediriter'] ;
      $user_info  = $itm['user_info'] ;
      $group_info = $itm['group_info'] ;
      //$dateymd    = $itm['dateymd'] ;
      $datedmy    = $itm['datedmy'] ;
      $mode       = $itm['mode'] ;
      //$mode_type  = $itm['mode_type'] ;
      $size       = $itm['size'] ; 
      $itmname    = $itm['itmname'] ;
      $itmtype    = $itm['itmtype'] ;
                             //echo '<pre>$itmname, $itmtype='; print_r($itmname.', '.$itmtype); echo '</pre>';
      // output defaults :
      $url_href     = self::$URLALLSITES ;
                    //$url_href  =  urlencode($url_href)  ;
                    //everything  but  "/"  should  be  urlencode  d
                    //$url_href  =  str_replace('%2F','/',$url_href);
      $txt_href    = 'REFRESH PAGE (NO HIGHER DIR)';
      $path_script = 'it_is_folder';  // for show code link,...
      $lnktitle    = ' title="" ';


      /**
       *  3.1  V I E W  - C R E  L I N K S : $url_ href & $txt_ href
       *       for  $ h r e f  = '<a %s href="%s">%s</a>'
       */
      switch ($itmtype)
      {
        //       ~~~  C U R R E N T  D I R ( . ) ~~~
        case  'curdir' :
           break; // n o  d i s p l a y  and NO ACTION

        case  'fle' :
        //       ~~~  1. F I L E  ~~~
        // to  d i s p l a y  page in ibrowser, download  file...
          if  (strtolower(substr($itmname,  -3,  3))  ==  'tml'  ) // .html
                $itmname_ext  =  substr($itmname,  -4,  4);
          else  $itmname_ext  =  substr($itmname,  -3,  3); //substr('ab',-1,1)=b

          $script_exts_allowed_todspl=array('php','html','htm','css','txt','xml','xsl');
          if (in_array(strtolower($itmname_ext),  $script_exts_allowed_todspl))
            {$path_script = self::$getcmd_or_wsrootpath . DS . $itmname;}

          //  <a title="$url_href=/fwphp/glomodul4/help_sw/00info_php.php href=" fwphp="" glomodul4="" help_sw="" 00info_php.php"="">00info_php.php</a>
          $url_href  =  self::$URLALLSITES // .'/'
            . str_replace(DS, '/',
                str_replace(
                  str_replace(DS, '/', self::$PATHWSROOT)      // needle
                  ,''                                          // new needle
                  ,str_replace(DS, '/', self::$getcmd_or_wsrootpath) //in haystack
                ) .'/'.( strtolower($itmname) == 'index.php' ? '' : $itmname)
            ) ;
          $txt_href  =  $itmname; // script name
          //echo '<h4>'.'$txt_ href='.$txt_ href.'<br />'.'$url_href='.$url_href.'</h4>' ;
         break;

        /* case  'link' : // NOT T ESTED YET
                       //  ~~~ 2. L I N K ~~~
          //  show  the  link  target :
          $txt_ href = ' -&gt; ' . readlink($flediriter->getPathname());
          break; */


        case  'dir' :
          /* ~~~ 3. D  I  R  BELOW $cur d i r ~~~
              "<img src='data:image/png;base64," // png or jpeg
                .base64_encode(file_get_contents(self::$imgdir_rel.'/DIROPEN.PNG'))
                ."'" .' alt="'.self::$imgdir_rel.'DIROPEN.PNG'.'"'.'>'
          */
                      $tmp = __METHOD__ .', line '. __LINE__ .' SAYS: '
                        . '\\n self::$getcmd_or_wsrootpath=' . self::$getcmd_or_wsrootpath
                        . '\\n $itmname=' . $itmname
                      ;
                      ?><SCRIPT LANGUAGE="JavaScript">//alert( "<?=$tmp?>");</SCRIPT><?php
          $url_href=self::$URLMODULE . '/?cmd='.str_replace( 
                DS,'/', self::$getcmd_or_wsrootpath.DS.$itmname
              )
              .self::$url_sort_param;
          
          $txt_href = '<img src='.self::$imgdir_rel.'DIROPEN.PNG' // png or jpeg
            .' alt="'.self::$imgdir_rel.'DIROPEN.PNG'.'"'.'>'
            . SPAN_1_2EM .' '.$itmname .'</span>' // picture and folder name
            //.' ('.$url_href.')'
          ;
          break;


        case  'aupdir' :
          //    ~~~D  I  R  ABOVE $cur d i r ~~~

          if  (self::$getcmd_or_wsrootpath == self::$PATHWSROOT)
          {
            // STAY IN cur dir if it is PATHWSROOT :
            $url_href = self::$URLMODULE . '/?cmd='.str_replace(DS,'/'
                , self::$getcmd_or_wsrootpath.DS.$itmname).self::$url_sort_param;
                 
            $txt_href = '<img src='.self::$imgdir_rel.'DIRUP.PNG' // png or jpeg
               .' alt="'.self::$imgdir_rel.'DIRUP.PNG'.'"'.'>'
               . ' WEB SERVER ROOT DOC DIR = '.self::$getcmd_or_wsrootpath
            ;
          }
          else
          {
            // GO UP FROM DIR BELOW WEB SERVER ROOT DOC DIR :
            $url_href=self::$URLMODULE .'/?cmd='.str_replace(DS,'/'
                 , dirname(self::$getcmd_or_wsrootpath)).self::$url_sort_param;
          
            $txt_href = '<img src='.self::$imgdir_rel.'GOUP.PNG'
              .' alt="'.self::$imgdir_rel.'GOUP.PNG'.'"'.'>'
              .'&nbsp;&nbsp;'
              .'<img src='.self::$imgdir_rel.'DIROPEN.PNG'
               .' alt="'.self::$imgdir_rel.'DIROPEN.PNG'.'"'.'>'
              .SPAN_1_2EM.' '.str_replace('/',DS, self::$getcmd_or_wsrootpath).'</span>';
          }
          
          //$txt_href .= '<br />Size of files in dir = '. self::$sizedir.' bytes.';

          break;


        default :
          $txt_href = 'UNKNOWN DIR ITEM TYPE';


      }  //e  n  d   s  w  i  t  c  h  C R E  L I N K S  $url_ href & $txt_ href


      /**
       *  3.2  V I E W  -  C R E A T E  $ h r e f  = '<a %s href="%s">%s</a>'
       */
            //$lnktitle=' title="$url_href='.$url_href.'"'
               // ,  \$txt_ href=$txt_ href
      $href = 'do_not_print'; 
            $lnktitle=" title='\$url_href=$url_href
            , \$txt_href=" . str_replace("'",'"',$txt_href)."'"
      ;
      if ($itmtype !== 'curdir')
      {
        //  http://dev1:8083/fwphp/glomodul4/lsweb/?cmd=J:\awww\www\fwphp\glomodul4\help_sw\
        // <a title="$h refurl=//dev1:8083J:/awww/www/fwphp/glomodul4/help_sw//00info_php.php href=" dev1:8083j:="" awww="" www="" fwphp="" glomodul4="" help_sw="" 00info_php.php"="">00info_php.php</a>
        $href = sprintf( '<a %s href="%s">%s</a>'
              , $lnktitle
              , $url_href  //dirname($mastpgdurl)
              , $txt_href  //  'NO  HIGHER  DIR  ..'
        );
      }

      //  ~~~~~~~~~
      //  V I E W  T B L  (R E P O R T)  H D R
      //  ~~~~~~~~~
        if  (!$tbl_hdr_printed)
        { ?>
          <title>LSWEB TEST</title>  </head>  <body>
                        <?php
                        $wai = array('fn'=>__FUNCTION__,'fle'=>__FILE__,'cls'=>__CLASS__,'txt1'=>'','txt2'=>''); //where am I
                        $wai['ln']=__LINE__; $caller = __FILE__;//utl::wai($wai);

          print  '<table width="100%"  border="1" line-color="lightgray"
                          cellspacing="0" cellpadding="2">';
           $tbl_hdr_printed  =  true;
        }  //  e  n  d   print  h d r   ( if (!$tbl_h d r_printed) )


      //  ~~~~~~~~~
      //  V I E W  R O W = D I R  I T E M
      //  ~~~~~~~~~
      //  print info for d i r  i t e m :
                      // link "show source" :  $ b c - >  change to  u t l : :
                      if ($path_script !== 'it_is_folder') {
                        $url_show_source = SPAN_ITALIC
                        //. utl::kod_edit_run(
                        //         dirname($path_script)  // script_dir_path
                        //       , basename($path_script) // script_name
                        //       , 'url1', 'font-weight:normal' )
                          .'</span>'
                      ; }

      if ( $href !== 'do_not_print')
      {
        printf
        (
          '<tr>
                <td align="left">%s  %s</td>
                <td width="12%%" align="left">%s</td>
                <td width="13%%"  align="right">%s</td>
                <td  width="9%%"  align="left">%s</td>
                <td  width="10%%" align="left">%s</td>
                <td  width="10%%" align="left">%s</td>
          </tr>'
          //t d 1   $href  :   height="207"  width="280"
          ,( $mode[0] == 'd' ) ? $href : '<strong>'.$href  .'</strong>' 
          , (($path_script !== 'it_is_folder') ? $url_show_source : '')
          ,  $datedmy  //t d 2  last modified date time
          //t d 3  file size (or device  numbers)
          , ( $itmtype == 'dir' ? '' : ( $itmtype == 'aupdir' ? '' : $size ) )
          ,  $mode //  t d 4 formatted mode string
          ,  ( is_null($user_info['name']) ) ?  'owner' : $user_info['name'] //t d 5  owner's user name
          ,  ( is_null($group_info['name']) )?  'gr'    : $group_info['name'] //t d 6 group name
        ); // link to browse or download
      }
      $itm_ordno++;

    }
    endforeach; //d i r  i t e m s  in  d a t a  a r r

    print  '</table>';

    print  '<p>Size of files in dir = '. number_format(self::$sizedir, 2, ',', '.') . ' bytes.'
            .' Sort by itmtype, itmdate : ?s=2 or &s=2 at URL end.'
            .' Sort by itmtype, itmname : delete ?s=2 or &s=2 from URL end.'
    .'</p>';

        //  ~~~~~~~~~
        //  V I E W  - F T R
        //  ~~~~~~~~~
    print  '<br /><hr />';
                if ('1')
                {
                  echo '<b>ADRESS VARIABLES</b><br />';
                  echo SPAN_BLUE.SPAN_1EM
                       .'self::$getcmd_or_wsrootpath='         .self::$getcmd_or_wsrootpath
                       .'<br />getcmd_or_wsrootpath can be = self::$PATHWSROOT=' .self::$PATHWSROOT
                       .'<br />self::$URLALLSITES='.self::$URLALLSITES
                       .'<br />self::$URLMODULE='  .self::$URLMODULE
                       .'<br />self::$imgdir_rel='     .self::$imgdir_rel
                       .'<br />'
                       .'<br />$itmname='   .$itmname
                       .'<br />$path_script='   .$path_script
                  .'</span></span>' ;
                  echo SPAN_1_2EM ;
                  echo '<pre>'.'$_SERVER["PHP_SELF"]='; print_r($_SERVER["PHP_SELF"]); echo '</pre>';
                  echo '<pre>'.'$_POST='; print_r($_POST); echo '</pre>';
                  echo '<pre>'.'$_GET='; print_r($_GET); echo '</pre>';
                  echo '<pre>'.'$_SESSION='; print_r($_SESSION); echo '</pre>';
                  //echo '<pre>'.'$_REQUEST='; print_r($_REQUEST); echo '</pre>';
                  echo SPAN_RED_BOLD.'~~~end script '. __FILE__ .'</span>';
                } // e n d  t e s t

    print  '</body></html>';

  } // e n d  f n  i n d e x ( )





  /*************************************************
   *   M A I N   F N S USED FOR WEB SERVER DIRECTORY LISTING
   * DO NOT LOOK AT THEM - they work and it is enough
   *************************************************/
  private static function define_constants()
  {
    if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

    define('SPAN_1EM', '<span style="font-size:1em">');
    define('SPAN_1_1EM', '<span style="font-size:1.1em">');
    define('SPAN_1_2EM', '<span style="font-size:1.2em">');
    define('SPAN_1_4EM', '<span style="font-size:1.4em">');
    define('SPAN_1_6EM', '<span style="font-size:1.6em">');
    define('SPAN_ITALIC', '<span style="font-style:italic; font-weight:normal">');

    define('SPAN_RED_BOLD','<span style="font-style:italic; color:red; font-weight:bold">');
    define('SPAN_BROWN_BOLD','<span style="font-style:italic; color:brown; font-weight:bold">');
    define('SPAN_BLUE_BOLD','<span style="font-style:italic; color:blue; font-weight:bold">');
    define('SPAN_GREEN_BOLD','<span style="font-style:italic; color:green; font-weight:bold">');
    define('SPAN_FUCHSIA_BOLD','<span style="font-style:italic; color:fuchsia; font-weight:bold">');

    //'<span style="font: italic 18px Georgia">'
    define('SPAN_ITALIC_GEORGIA18PX','<span style="font-family:GEORGIA; font-size:18px; font-style:italic;">');
    define('SPAN_BLUE','<span style="font-style:italic; color:blue; font-weight:normal;">');

    if (!defined('S_IFMT'))
    {
      define('S_IFMT',0170000);   // mask for all types
      define('S_IFSOCK',0140000); // type: socket
      define('S_IFLNK',0120000);  // type: symbolic link
      define('S_IFREG',0100000);  // type: regular file
      define('S_IFBLK',0060000);  // type: block device
      define('S_IFDIR',0040000);  // type: directory
      define('S_IFCHR',0020000);  // type: character device
      define('S_IFIFO',0010000);  // type: fifo
      define('S_ISUID',0004000);  // set-uid bit
      define('S_ISGID',0002000);  // set-gid bit
      define('S_ISVTX',0001000);  // sticky bit
      define('S_IRWXU',00700);    // mask for owner permissions
      define('S_IRUSR',00400);    // owner: read permission
      define('S_IWUSR',00200);    // owner: write permission
      define('S_IXUSR',00100);    // owner: execute permission
      define('S_IRWXG',00070);    // mask for group permissions
      define('S_IRGRP',00040);    // group: read permission
      define('S_IWGRP',00020);    // group: write permission
      define('S_IXGRP',00010);    // group: execute permission
      define('S_IRWXO',00007);    // mask for others permissions
      define('S_IROTH',00004);    // others: read permission
      define('S_IWOTH',00002);    // others: write permission
      define('S_IXOTH',00001);    // others: execute permission
    }

  }

  /** mode_ string() is a helper function that takes an octal mode
   * and returns 10-character string: first char = file type
   * and rwx owner-group-world permiss. that correspond to octal mode.
   * This is a PHP ver. of the mode_ string() function in the GNU fileutils package.
   */
  private static function mode_string($mode, $mode_type_map) { // takes an octal mode
      //global $mode_type_map;
      $s = '';
      $mode_type = $mode & S_IFMT;
      // Add the type character
      $s .= isset($mode_type_map[$mode_type]) ?
            $mode_type_map[$mode_type] : '?';

    // set user permissions
    $s .= $mode & S_IRUSR ? 'r' : '-';
    $s .= $mode & S_IWUSR ? 'w' : '-';
    $s .= $mode & S_IXUSR ? 'x' : '-';
    // set group permissions
    $s .= $mode & S_IRGRP ? 'r' : '-';
    $s .= $mode & S_IWGRP ? 'w' : '-';
    $s .= $mode & S_IXGRP ? 'x' : '-';
    // set other permissions
    $s .= $mode & S_IROTH ? 'r' : '-';
    $s .= $mode & S_IWOTH ? 'w' : '-';
    $s .= $mode & S_IXOTH ? 'x' : '-';
    // adjust execute letters for set-uid, set-gid, and sticky
   if ($mode & S_ISUID) {
        // 'S' for set-uid but not executable by owner
        $s[3] = ($s[3] == 'x') ? 's' : 'S';
    }
    if ($mode & S_ISGID) {
        // 'S' for set-gid but not executable by group
        $s[6] = ($s[6] == 'x') ? 's' : 'S';
    }
    if ($mode & S_ISVTX) {
        // 'T' for sticky but not executable by others
        $s[9] = ($s[9] == 'x') ? 't' : 'T';
    }

    return $s;
  } // end  f n  mode_ string



  /********************************************************
   *   H E L P E R  F N S - NOT YET IN USE
   *  (may be never - to much work).
   *   Used to sort dir list, paginator, h d r, f t r ...
   *   Once, I t ested them a bit, code works
   *   but their large code is not so important
   *      & less clear simple
   *      & requires lot of t esting if we include them here
   *******************************************************/
  // require_once('lsweb_helper_fns.php');

} // e n d  c l a s s



/**
* J:\awww\apl\dev1\fwphp\utl\lsweb\lsweb.php
* J:\awww\apl\dev1=http://sspc1:8083=web site doc.root $_SERVER['DOCUMENT_ROOT']
* J:\zwamp64\vdrive\web  \fwphp\utl\lsweb\lsweb.php
*                Z:\web  \utl\lsweb\lsweb.php
* Z:\web is http://localhost:8083
*
*   ~~~  WEB  SERVER  DIRS  BROWSER  ~~~
*
* http://sspc1:8083/fwphp/utl/lsweb/lsweb.php/?cmd=J:/awww/apl/dev1/fwphp/phppdf
* http://localhost:8083/utl/lsweb/lsweb.php?cmd=Z:/web/aplw
*
* http://dev1:8083/fwphp/phpgrid/15.php
*/
?>