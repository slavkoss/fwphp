<?php
// J:\awww\apl\dev1\zinc\utls.php
// 12.9.2015 singleton, SPA substit. txtx in {{txtx}} placeholders 
// U T I L S  c h c o n s  is practical - UNIQUE name - easy to search... :
namespace utlmoj
{
/*
   J:\awww\apl\dev1\zinc\utl\utls.php or one level higher

  ~~~ FORM-BLOCK OPER-SYS-CONF-DATA & GLOBAL UTILITIES &... ~~~
form block = page section CRUD DB records, corresponds Oracle Forms blocks.
Eg form invoice has block01 material document and block02 items.
*/

// I. P H P  S E T  U P
ob_start();    // Start output buffering for all output at end SPA
session_start();  // Start or resume ses. must be called before any output
ERROR_REPORTING(E_ALL);
// error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING ); // err mngment
ini_set("display_errors","2");
date_default_timezone_set('EUROPE/ZAGREB'); // UTC


// METHODS are FUNC.descr. ('new' word creates fn from its descr.):
class utlmoj 
{ // SCOPE: public protected private
  // CTL (ConTrolLer) klasa, mngr for util (helper) klase
  // registry, repos for settings, objects, and their setters, getters
  // s i n g l e t o n - only one copy in memory
  //            ~10 core fns and other fns :
  // URL: u s e t, u b i t s g e t, u b i t g e t, u p a t h g e t
  // OBJECTS & ARRAYS: o s e t, o g e t, a s e t, a g e t, array_ trim 
  // BETTER utls_glbsetpg.php than ln_txtatr_get from txt or xml2array
  //

  //instance of registry class = memmory described by utlmoj class
  private static $instance = null; 
      // Holds instances of PDO base class :
      //private $con = null;
  private static $objects = array(); //objects - system-wide-settings
  
    // PAGE PROPERTIES are STATIC because see __construct :
    private static $p1 = array( );
        //private static $settings = array();
    private static $URLbits = array();
    private static $urlPath;
    //private static $xmlfle;
    private static $conf_pg;
  
  //u t l 0 2 - u t l  c l a s s  is SINGLETON (instantiated once)
  
    // Get class instance itself - SINGLETON  GET_OR_NEW
    // If we need to access object from within our fw, and it is NOT DIRECTLY AVAILABLE TO FILE we are working in, 
    // we can call static method singleton :
    // utl\utlmoj::uget() to get the instance of the Registry.
    // IF DB WITHOUT REGISTRY PATTERN:
    //   dbi_moj\db::getInstance()->verify_wisher_credentials(
    //        $_POST['user'], $_POST['userpassword']  )
    public static function uget() // or getInstance() utilities
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance; // $utl handler (object variable)
    }
            /* //       o r ( o l d ) :
              public static function uget() { 
                  if( !isset( self::$instance ) ) 
                  { 
                     $obj = __CLASS__;
                     self::$instance = new $obj ;
                  }
                  return self::$instance;
               }
            */  
   //u t l 0 1
  // Private constructor to PREVENT IT BEING CREATED DIRECTLY
  // But if we need 2 record blocks in page eg invoice & items ?
  // Then for B02: utls_block.php 
  //    with public __construct, witzhout uget(),
  //    & witzhout global fns that are here
  private function __construct() {} 
  // e n d  f n  __c o n s t r u c t
   //u t l 1 2
   public function __clone() {
      trigger_error( 'Cloning registry is not permitted', E_USER_ERROR );
   }

//  U T I L S  -  H E L P E R S

// ****************************************************
//         1.  G E T T E R S  /  S E T T E R S 
// ****************************************************
   //u t l atribut  se t/ge t :  09 s e t / 10 g e t  
   //u t l 0 9
  public static function aset($name = null, $val, $wai_caller = '') 
  { // or ($data, $key)
      self::$p1[$name] = $val; // $this->p1[$name] = $val;
  }
  //u t l 1 0
  public static function aget($name = null, $wai_caller = '') {
    if (!is_null($name))
       if ($name == 'p1') return(self::$p1);
       else
       //if  (in_array($name, self::$p1))
       //array_search() - Searches arr for value and returns key
       if (array_key_exists($name, self::$p1))
       {  
          //try {
            $varval = self::$p1[$name];
          //} catch (Exception $e) { //$error = $e->getMessage(); } 
          return($varval); // eg 'c u r p g'
       } else {
          echo '<h2>GREŠKA (error): ' . self::wai(__FUNCTION__,__FILE__,__LINE__,__CLASS__) ;
          echo '<br />'.'***NOT*** array_key_exists($name, self::$p1)'
          .', $name = '.$name.'</h2>'
          .' CALLED FROM '.'<br />'.$wai_caller.'</p>';
          echo '<pre>$name='.$name.', self::$p1='; print_r(self::$p1); echo '</pre>'; 
          return null;
       }
    else return(null);
  }

   //u t l  objekt (instanc.klasu) :  07 s e t / 08 g e t  
   //u t l 0 7
   //public function oset( $object, $key ) { // skript in klse dir, k e y
   public static function oset(
        $shortname = null, $script_class_name, $wai_caller = '') 
   { 
     // skript in klse dir
     // called from: i n d e x . p h p  &  g e t o
     
     //When new object is stored within Registry
     //     class file is included
     //     object is instantiated
     //     object is stored in array
     
     //How does it prevent another copy of Registry object being created?
     // constructor is private, preventing object being created directly
     // Cloning object triggers an error.
     // If we need to access object from within our Framework, and it is NOT DIRECTLY AVAILABLE TO FILE we are working in, we can call :
     // utl\utlmoj::uget() to get the instance of the Registry
     
      //require_once(FWPATH .DIRECTORY_SEPARATOR. $script_class_name . '.php'); // 1.
      require_once( $_SERVER['DOCUMENT_ROOT'].'/zinc/klase/' 
                    . $script_class_name . '.php' ); // 1.
      // 2.instantiate in array : 
      // $objects['db'] = new script_class_name(self::$instance)
      
      if (substr($shortname,0,2) == 'db') // if ($shortname == 'db') 
        $script_class_name2=self::aget('db_namesp',self::wai(__FUNCTION__,__FILE__,__LINE__,__CLASS__))
         .DIRECTORY_SEPARATOR.$script_class_name; 
      else $script_class_name2 = $script_class_name; 
      
      self::$objects[$shortname] = 
         new $script_class_name2(self::$instance); 
   }
   //u t l 0 8
   public static function oget( $shortname ) { // g e t  o b j e c t
               if (0) { echo '<pre>$shortname:'."\n"; print_r($shortname); 
               echo 'self::$objects[ $shortname ]='."\n"; 
               print_r(self::$objects[ $shortname ]); echo '</pre>'; } 
      if(is_object (self::$objects[$shortname])) 
          return self::$objects[ $shortname ];
   }

  

   // u r l  u t l atribute  se t/ge t:  
   // 03 s e t / 04,05,06 g e t 
   //u s e t
  public function uri2URLbits() 
  {       
      $urldata = (isset($_GET['page'])) ? $_GET['page'] : '' ;
      self::$urlPath = $urldata;
      
      if( !$urldata) { // no u r l  p a r a m s
         self::$URLbits[] = 'home';
         self::$urlPath   = 'home';
         
      } else { // a r r a y
         $data = explode( '/', $urldata );
         // [0]=ctr script/classname/subdir, [1]=mdl, [2]=view :
         self::$URLbits = $this->array_trim( $data );
      } // END isset($_GET['page']
   } // e n d  f n  u s e t
   //u t l 0 4
   public function ubitsget()  { return self::$URLbits; }
   
   public static function wai($fn='', $fle=' ', $ln=0, $cls=' '
           , $txt1='', $txt2='') { 
      return $txt1.' fn=<b>'.$fn .'(), '
      .basename(dirname($fle)).'/'.basename($fle).', lin='. $ln.'</b>, '
              .' cls=' .$cls .$txt2;
   }
   
   //u t l 0 5
   // w h i c h B i t  can be:  0=ctr subdir, 1=mdl subdir, 2=view subdir:
   // U R L B i t  0  can be: admin, home, tipd...
   public function ubitget( $whichBit ) { 
      if ($whichBit > (count(self::$URLbits) -1)) return 'home'; 
      return self::$URLbits[ $whichBit ]; 
   }
   //u t l 0 6   
   public function upathget() { return self::$urlPath; }


public function sesvar($pact, $psesvar, $pval)
{   
    // Params: 
    // 1. $action = 'toggle' or 'set' or 'get'
    // 2. sesvarname if = '0' then do nothing
    // 3. sesvar default or new value
    // What does: [cre ses.var. &] toggle its val. 1<->0
    //     or      - " -             set    its vl.
    if (!$psesvar) return('sesv_nonexist');
    
    switch ($pact)
    {
      case 'toggle':
       // [cre ses.var. &] toggle its val. 1<->0
       //    eg toggle form visibility
       if (isset($_SESSION[$psesvar]))
       {
          $newval = $_SESSION[$psesvar]; // 0 or 1
          $newval = $newval ? '0' : '1' ; // TOGGLE IT
       } else
          $newval = $pval; // initialize ses.var. 0 or 1
      //exit; 
      break;
    case 'set':
        // c r e a t e  ses var = $defval   (if not created)
        if (!isset($_SESSION[$psesvar])) $newval = $pval;
        // or read ses.var into local var.  (if created)
        else $newval = $pval;
      break;
    case 'get': 
        if (!isset($_SESSION[$psesvar])) $newval = $pval;
        // or read ses.var into local var.  (if created)
        else $newval = $_SESSION[$psesvar];
    default:
      break;
    } // e n d  s w i t c h
$_SESSION[$psesvar] = $newval;
//if ($test) {echo '<p>11111111$newval='; print_r($newval); echo '</p>';}
  if (self::aget('test',self::wai(__FUNCTION__,__FILE__,__LINE__,__CLASS__))) {
    echo '<pre>11111: '.basename(__FILE__).', line='.__LINE__.', fn '.__FUNCTION__
     .'($psesvar, $pval, $pact) SAYS: '.'<br />'
     .'ses.var. '.$psesvar.' has $newval='; print_r($newval); echo '</pre>'; 
  }
return($newval);
} // e n d  f n  set ses var


   
   
// ****************************************************** 
//           2.  OTHER H E L P E R  F N S 
// ****************************************************** 
   //u t l 1 1
   private function array_trim($array) {
       while (!empty($array) and strlen(reset($array)) === 0) 
       { array_shift($array); }
       while (!empty($array) and strlen(end($array)) === 0) 
       { array_pop($array); }
       return $array;
   }



// ****************************************************** 
//                3.  .T X T  F N S
// ****************************************************** 
public function txt2file(
   $filecontent, $filename, $show_msg = '', $msg = '')
{
    if (!$handle = fopen($filename, 'wt')) {
         //echo "Ne mogu otvoriti ($filename)";
         return("Ne mogu otvoriti datoteku ($filename)"); //exit;
    }
    if (fwrite($handle, $filecontent) === FALSE) {
        //echo "Ne mogu upisivati u ($filename)";
        return("Ne mogu upisivati u datoteku ($filename)"); //exit;
    } fclose($handle); return ($show_msg == 'show_msg') ? $msg : '';
} // e n d  f n  txt 2 file
//u t l 1 3
public function ln_txtatr_get($p_txt
  ,$p_lnid = 'home' // $ s c r i p t i d  = U R L B i t,  can be: admin, home, tipd...
  ,$p_lntip = '00' // 10 = sifrarnici .txt line contains pg cre. params
) 
{ 
  // PART OF ROUTING,
  // BETTER utls_glbsetpg.php than ln_txtatr_get from txt or xml2array
            $wai =  'fn='. __FUNCTION__ .'()'
              .' file=' . __FILE__ . "\n".'cls=' .__CLASS__  .'';
   $p_lnid = trim($p_lnid);
   // 1.  $ l n  je  strin g u kome je  t x t  datoteka 
   if(!($ln = file_get_contents($p_txt))) goto nofile;
   // convert new line breaks into '<br'.' />' !!! PAZI OVO NE SPAJATI !!! :
   $ln = nl2br($ln); //$total_line_count = substr_count($ln, '<br'.' />');
    
   // 2.  $ l n  j e  a r r  r e d a k a  t x t  datoteke
   $ln = explode('<br'.' />', $ln);
   //echo "<h5>"."conf_pg.txt", ' has ', count($ln), ' lines.</h5>' ;      

   for($lnno = 0; $lnno < count($ln); $lnno++) // < coun t  jer pocinje s 0
   {        if (0) { echo "<br/>$wai<br/>"
            .'********$p_lnid = '; print('--'.$p_lnid.'--');   
            echo "&nbsp;&nbsp;&nbsp;".'rtrim(substr($ln[$lnno],0,15)) = '; 
            print '---'.rtrim(substr($ln[$lnno],0,15)).'---'; }

      // 3.  $ l n  j e  a r r  jednog  retka
       $lnid  = trim(substr($ln[$lnno],0,15));
       $lntip = trim(substr($ln[$lnno],15,2));
//if (0) { echo "\n<pre>".'~~~~~$p_lnid='.$p_lnid.'~~~$lnid='; print_r($lnid); echo '</pre>';}
       if ( $lnid == $p_lnid ) 
       {  switch ($lntip)
          { //case 11: //return true; //case 12: //case 13: 
            default: // to je 10
 list($tmp01,$tmp02 // scriptid = lnid,   lntip: 10=sifrarnici
     ,$prijava_required, $ctrtodo, $pgtitle
     ,$ctrskript, $mdlskript
     ,$ctrklasa,  $mdlklasa, $viewscript
     ,$breadcumb, $pgpomoc
               ) = explode("|", $ln[$lnno]);
//if (1) { echo "\n".'~~~~~ $breadcumb = '; print_r($breadcumb); }
//if (1) { echo "\n".'~~~~~ $breadcumb = '; var_dump(stristr($breadcumb, '{{pgtitle}}' )); }
               goto foundln ; //break;
          } //e n d   s w i t c h
       } //e n d  URL bit 0 = line in conf_pg.txt
   } // e n d  through conf_pg.txt  l i n e s
foundln:
if (!isset($prijava_required)) {
  echo "<h2>Stranica: $p_lnid nije u popisu stranica.</h2>";
  goto nofile;
}
   switch ($lntip) { 
      default: // to je 10
   $ln = array(
 'scriptid'         => trim($lnid)
,'pgtitle'          => trim($pgtitle)
,'breadcumb'        => trim($breadcumb)
,'pgpomoc'          => trim($pgpomoc)
,'prijava_required' => trim($prijava_required)
,'ctrtodo'          => trim($ctrtodo)
,'ctrskript'        => FWPATH .DIRECTORY_SEPARATOR. trim($ctrskript)
,'mdlskript'        => FWPATH .DIRECTORY_SEPARATOR. trim($mdlskript)
,'ctrklasa'         => trim($ctrklasa)
,'mdlklasa'         => trim($mdlklasa)
,'viewscript'        => FWPATH .DIRECTORY_SEPARATOR. trim($viewscript)
         ) ;
   } //e n d   s w i t c h
//if ($ln['breadcumb'] == '{{pgtitle}}') { $ln['breadcumb']  = $pgtitle; } 
//if (stristr($ln['breadcumb'], '{{pgtitle}}') == '{{pgtitle}}') { 
$ln['breadcumb'] = str_replace('{{pgtitle}}', $pgtitle, $ln['breadcumb']); 
   //ne treba: $ln[$p_lnid] = $ln;
   // e n d  file_ get_ contents('scrip t s.txt')
    return($ln);
    
nofile:
    // usuccessfull file_ get_ contents('scrip t s.txt') 
    return(array('ctrtodo' => ' ')); 
} // e n d  f n  g e t l n 
    // KONVENCIJA: C(MV) URL form !!!!!!    
    //http://dev:8083/fw/tipd/37  fn=() file=H:\dev_web\htdocs\fw\index.php lin=33
    //$_GET = Array( [page] => tipd/37 )   $utl->upathget() = tipd/37
    //$utl->ubitsget() = Array( [0] => tipd  [1] => 37 )
          
    // .../fw/tipd/tipd/tipd are ctr, mdl, view subdirs
    // page as index.php GET param.  
     // stvori Apacheova extenzija (program) mod_rewrite + vidi .htaccess
          
    // ~~~~~~~~~~~~ WITHOUT mod_rewrite: ~~~~~~~~~~
    // simulate_mod_rewrite($_GET); // not possible becouse: 
    //            URL /fw/tipd/37 was not found on this server
    // http://dev:8083/fw/?page=tipd/37 <- instead http://dev:8083/fw/tipd/37
//u t l 1 3
//http://dev:8083/fw/t1/z_test/nixon/socnet/index.php
//http://dev:8083/fw/t1/z_test/missing/index.html
//public function pg_xmlatr_get($p_dir, $p_scriptid //ln_txtatr_get($p_txt, $p_lnid = 'home'
public static function pg_xmlatr_get($p_scriptid) // xml2array
{ //or : ln_txtatr_get
  // PART OF ROUTING, 
  // BETTER utls_glbsetpg.php than ln_txtatr_get from txt or xml2array
  // KONVENCIJA: u param. u r l-a  (eg tipd) je mapa 
  //      u kojoj je $p_scriptid.'.xml'=param stranice - vidi dolje $xmlfle.
  //      U toj mapi se nalaze sve skripte stranice ! 
  //      ali ne moraju - u xml-u su svi ostali param.
  // npr http://dev:8083/fw/tipd/    H:\dev_web\htdocs\fw\apl\tipd\tipd.xml
   
  // 1. from - to kontejneri :
  //http://dev:8083/fw/tipd/ javi     Ne postoji apl\tipd\tipd.xml, učitavam prvu (Home) stranicu (--pg_xmlatr_get)
  //http://dev:8083/fw/tipd_tbl/ javi Ne postoji apl\tipd_tbl\tipd_tbl.xml, učitavam prvu (Home) stranicu (--pg_xmlatr_get)

  self::$xmlfle = 'apl'.DIRECTORY_SEPARATOR.$p_scriptid
                   .DIRECTORY_SEPARATOR.$p_scriptid.'.xml';
   self::$conf_pg = array();
//echo '<h5>'.__FUNCTION__.': PRIJE FLE EXISTS p_scriptid = '.$p_scriptid.', xmlfle = '.$xmlfle.'</h5>';
   if( !(file_exists( self::$xmlfle ) == true) ) 
   {
      if (!($p_scriptid == 'home'))
      {  
         echo '<font color="red" size="3">' //face="Tahoma" 
              .'Ne postoji '.self::$xmlfle
              .', učitavam prvu (Home) stranicu (--'.__FUNCTION__.')'
              .'</font><br />'
              ;
         self::pg_xmlatr_get('home');
         goto endfn;
      } else 
      {
         echo '<h4>Ne postoji '.self::$xmlfle.'.</h4>';
         goto endfn;
      }
   }

   // 2. from - to kod :
//echo '<h5>'.__FUNCTION__.': PRIJE FLE GET CONT: p_scriptid = '.$p_scriptid.', xmlfle = '.$xmlfle.'</h5>';
   $xs = file_get_contents(self::$xmlfle);
   $data = new SimpleXMLElement($xs);
   
   foreach ($data->pg->atr as $atr) 
   {   //print $atr["type"].' = '.$atr."<br />";
      self::$conf_pg[(string)$atr["type"]] = trim((string)$atr);
   }
//
endfn:
//$w ai = __FUNCTION__ .'() '.basename(__FILE__).' lin='. __LINE__.' prije r e t u r n '.' cls='.__CLASS__ ;
if (0) {
    echo '<pre>'.'<strong>'.self::wai( __FUNCTION__, __FILE__, __LINE__, __CLASS__ ).' self::$conf_pg=</strong>'; print_r(self::$conf_pg); echo '</pre>';
}
return(self::$conf_pg);
} // e n d  f n  pg_ atr_ get($d ir, $s criptid)




// ****************************************************
// 4.1  V I E W  F N S   S H O W  S O U R CE   C O D E :
// ****************************************************
public static function kod_edit_run(
  $script_dir_path, $script_name, $action = 'url1' , $style = 'font-weight:bold' )
{
  //public static ? 
          //utl::kod_edit_run(
          //    dirname($sourcepath)  // script_dir_path
          //   , basename($sourcepath) // script_name
          //   , 'url1', 'font-weight:normal'
          //)
  // $action = url1 or url2 or... or 'allurl'
  // or $style = '<span style="font-style:italic; font-weight:normal">'
  
   /* call it so:
   utl::kod_edit_run(
      cnf\utl::get('curpgd')   // script_dir_path
    , cnf\utl::get('curpg')    //$curpg  // script_name
    , $mdurl);  // url1=show source link, allurl=show phpinfo link,  web_docroot_url  =  (Apache)  web  server  URL
   */
   $ds = DIRECTORY_SEPARATOR;

   $return = '';
   if ($action == 'allurl' or $action == 'url1')
   { // U R L 1 :
    $return .=  //echo
    '<a href="'
    . basename(self::$p1['curpgpath'])
      . "?cmd=showsource&file=$script_dir_path$ds$script_name"
    . '&line=1&prev=10000&next=10000'.'"'
      . ' target="_blank"'
      .'>&nbsp;'
      .'<span style="'.$style.'">'.'source'.'</span>'
      .'</a>'
      ;
    // outputs: // http://dev1:8083/ls/index.php
                // ?cmd=showsource
    // &file=J:\awww\apl\dev1\ls\index.php&line=1&prev=10000&next=10000
   }
    if ($action == 'allurl' or $action == 'url2')
    { // U R L 2 :
      $return .= '&nbsp;&nbsp;&nbsp;<a href="'
        .self::aget('mdurl',self::wai(__FUNCTION__,__FILE__,__LINE__,__CLASS__)).'/zinc/utl/info/info_php.php'
        .'" target="_blank">phpinfo</a>';
    }
  return($return);
} // e n d  f n  kod_ edit_ run



public static function showSource($file, $line, $prev = 10, $next = 10)
{
    /*
http://dev1:8083/08ls/index.php?cmd=showsource&file=J:\awww\apl\dev1\zdoc\books\00ng_Wahlin\DemoList.php&line=1&prev=10000&next=10000
    */
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
         echo '<span>'.self::wai( __FUNCTION__, __FILE__, __LINE__, __CLASS__ ).' SAYS : Sorce code of ';
            echo '<br />'.'file=' .'<strong 
                 style="font-size:1.2em; color:blue">'.$file.'</strong>';
            echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
               .'line=' . $line .' prev=' . $prev .' next=' . $next;
            echo ' count=' . $count .' start=' . $start 
                 .' end=' . $end;
         echo '</span>';
                     //print_r($utl->ubitsget()); //var_dump
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
                 .'&prev=10000&next=10000#'.($line - 15).'">View Full Source</a>' ;
        print "</div>";
    }

}




// ****************************************************
// 4.2  V I E W  F N S
// ****************************************************
public function pars_req_ses($flesays, $showpgparams) {
  // show vars: pars = script parameters or scripts&dirs structure
  //            req  = $_REQUEST superglobals array
  //            ses  = $_SESSION variable array
  echo '<pre>';
  echo 'script '.$flesays.' SAYS:'.'<br />';
  echo '<br />$showpgparams = '; print_r($showpgparams);
  echo '<br />Script\'s request params are $_REQUEST = '; print_r($_REQUEST);
  echo '<br />$_SESSION = '; print_r($_SESSION);
  echo '</pre>';

} // e n d  f n  show vars pars_ req_ ses


public function  dsp_row(
   $row, $flds, $ordno='', $akc = 'assi', $wai = '') 
{ // assi=associative indices  or  numi=numeric indices
      echo ' <tr>';
      $cnt = count($flds); $ii = 0; while ($ii < $cnt)
      {
        if ($akc == 'assi') {
echo '<td align="right">'.htmlentities($ordno, ENT_QUOTES).'. </td>';
           echo '<td>'.htmlentities($row[$flds[$ii]],ENT_QUOTES).'</td>';
        } else if ($akc == 'numi') {
            echo '<td align="right">'.' '.'</td>';
            echo '<td>'.htmlentities($flds[$ii],ENT_QUOTES).'</td>';
        }
        ++$ii;
      }
      echo ' </tr>';
}



} // e n d  c l s  c h c o n s


    /*
    exec("del ip_web_servera.txt");
    exec("wget -qO - http://www.icanhazip.com > ip_web_servera.txt");
    if (file_exists("ip_web_servera.txt") and is_file...) {
      $ip_web_servera=trim(file_get_contents("ip_web_servera.txt"));
       //echo '<p>'."***IP web servera: $ip_web_servera ***".'</p>';
       }
    else {
       echo '<p>'."***wget nije stvorio ip_web_servera.txt***".'</p>';
       //exit;
    }
    */
} // e n d  n a m e s p a c e  c h c o n s