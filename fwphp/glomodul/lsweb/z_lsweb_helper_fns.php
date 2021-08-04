<?php
/* 
   http://dev1:8083/ls/
   J:\awww\apl\dev1\ls\index.php
   includes J:\awww\apl\inc\utl\lsweb.php
   
   http://dev1:8083/inc/utl/lsweb.php
*/

/********************************************************
 *   H E L P E R  F N S - NOT YET IN USE (too much work)
 *   to sort dir list, h d r, f t r ...
 *   once before I tested them a bit, code works
 *******************************************************/
/* // use them so:
$rows  =  dir2arr('0');  //fn01  READ_IN_ARR  EACH  DIR.  ENTRY
$count  =  count($rows);
for  ($ii=0;  $ii  <  $count;  $ii++)
{  //  kroz  retke  matrice  elemenata  direktorija

        foreach  ($rows[$ii]  as  $ime  =>  $iznos)
        {  $fld  =  $ime;  $$fld  =  $rows[$ii][$ime];  }
        //
        if  ($prava{0}  ==  'd')  $isdir  =  '1';  else  $isdir  =  '0';
        $vlasnik    =  ($vlasnik  ?  $vlasnik  :  'nema    ');
        $grupa    =  ($grupa  ?  $grupa  :  'nema    ');
        $ext_up  =  strtoupper($ext);

//if  ($desc  ==  0)  usort($rows,  "asc");  else  usort($rows,  "desc");
*/
function dir2arr($vardump) {
  // 1. START AT THE DOCUMENT ROOT IF DIR NOT SPECIFIED
  $dir = isset($_GET['dir']) ? $_GET['dir'] : '';
  // locate  $ d i r  in filesystem
  $real_dir = realpath($_SERVER['DOCUMENT_ROOT'].$dir);
  // Passing document root through realpath resolves any
  // forward-slash vs. backslash issues
  $real_docroot = realpath($_SERVER['DOCUMENT_ROOT']);
  //
  // 2. MAKE SURE $REAL_DIR IS INSIDE DOCUMENT ROOT
  if (! (($real_dir == $real_docroot) ||
         ((strlen($real_dir) > strlen($real_docroot)) &&
          (strncasecmp($real_dir,$real_docroot.DIRECTORY_SEPARATOR,
          strlen($real_docroot.DIRECTORY_SEPARATOR)) == 0)))) {
      die("$dir is not inside the document root");
  }
  //
  // 3. CANONICALIZE $DIR BY REMOVING DOC.ROOT FROM ITS BEGINNING
  $dir = substr($real_dir,strlen($real_docroot)+1);
  // are we opening a directory?
  if (!is_dir($real_dir)) die("$real_dir nje mapa");
  //
  if (0){
    print '<pre><strong>fn='.__FUNCTION__.'() fle='. __FILE__ .'</strong>'; 
    print '<br/>$_GET: '; print_r($_GET); 
    print '<br/>$dir: '; var_dump($dir); 
    //print 'dirname($url): '; var_dump(dirname($url));
    print '<br/>$real_dir: '; var_dump($real_dir); 
    //print 'parse_url($urlreq): '; print_r(parse_url($urlreq)); 
    print '<br/>$real_docroot: '; var_dump($real_docroot); 
    print '</pre>';
  } //e n d t e s t
  //
  // READ EACH ENTRY IN D I R
  $ii = 0;
  foreach ( new DirectoryIterator($real_dir) as $file)
  {
    // $dir = $_ GET['dir'] = mapa cije datot. prikazujemo,
    // a datotekin $dirname = $file->getDirname();
    $flnm = $file->getFilename();
    $ext = $file->getExtension();
    //
      // 4. TRANSLATE UID INTO USER NAME
      if (function_exists('posix_getpwuid')) {
          $user_info = posix_getpwuid($file->getOwner());
      } else {
          $user_info = $file->getOwner();
      }
      //
      // 5. TRANSLATE GID INTO GROUP NAME
      if (function_exists('posix_getgrid')) {
          $group_info = $file->getGroup();
      } else {
          $group_info = $file->getGroup();
      }
      //
      // 6. FORMAT DATE FOR READABILITY
      $date = date('Y.m.d H:i',$file->getMTime()); // 'M d H:i'
      //
      // 7. TRANSLATE OCTAL MODE INTO READABLE 10 CHAR. STRING
      $mode = mode_string($file->getPerms());
      $mode_type = substr($mode,0,1);
      //
      // 8. FILE SIZE if it's a block or character device, print out
      //    MAJOR AND MINOR DEVICE TYPE instead of the file size
      if (($mode_type == 'c') || ($mode_type == 'b')) {
          $statInfo = lstat($file->getPathname());
          $major = ($statInfo['rdev'] >> 8) & 0xff;
          $minor = $statInfo['rdev'] & 0xff;
          $size = sprintf('%3u, %3u',$major,$minor);
      } else {
          $size = $file->getSize();
      }
    //
      $href = '..'; 
      credetlnk($href, $dir, $flnm, $file, $mode_type);
    //
    // *******************************************
    // stupci koji se ispisuju 
    // *******************************************
    $rows[$ii]['filename'] = $rows[$ii]['srtitm'] = $flnm ;
    $rows[$ii]['filepath'] = str_replace(
       DIRECTORY_SEPARATOR.DIRECTORY_SEPARATOR,DIRECTORY_SEPARATOR,
$real_docroot.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$flnm );
    $rows[$ii]['srt1'] = '' ;
    $rows[$ii]['href'] = $href ;
    $rows[$ii]['prava'] = $mode ;
    $rows[$ii]['vlasnik'] = $user_info['name'] ;
    $rows[$ii]['grupa'] = $group_info['name'] ;
    $rows[$ii]['bytes'] = $size ;
    $rows[$ii]['datum'] = $date ;
    // *******************************************
    // stupci koji se ne ispisuju
    // *******************************************
    $rows[$ii]['dir'] = $dir ; 
    $rows[$ii]['ext'] = $ext ; 
    //
    $ii++;
  } // e n d  kroz
  return($rows);
} // ---------------------------------end fn
 
function asc($r1, $r2) { //verzija (datum)
  // column = 0; // = $mode{0}.$filename
  //           1=second col. = href...
  // $r1 = a r r a y  r o w,  $r2 = n e x t  a r r a y  r o w
  $c = 'srtitm';
  if ($r1[$c] == $r2[$c]) {       return 0;
  } else if ($r1[$c] < $r2[$c]) { return -1; // -1=ascending
  } else {                      return 1; } // 1=ascending
} // end fn

function desc($r1, $r2) { //verzija (datum)
  $c = 'srtitm';
  if ($r1[$c] == $r2[$c]) {       return 0;
  } else if ($r1[$c] < $r2[$c]) { return 1; // -1=ascending
  } else {                      return -1; } // 1=ascending
} // ---------------------------------end fn

function unparse_url($parsed_url) {
$scheme = isset($parsed_url['scheme']) ? $parsed_url['scheme'] . '://' : '';
$host = isset($parsed_url['host']) ? $parsed_url['host'] : '';
$port = isset($parsed_url['port']) ? ':' . $parsed_url['port'] : '';
$user = isset($parsed_url['user']) ? $parsed_url['user'] : '';
$pass = isset($parsed_url['pass']) ? ':' . $parsed_url['pass']  : '';
$pass = ($user || $pass) ? "$pass@" : '';
$path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
$query = isset($parsed_url['query']) ? '?' . $parsed_url['query'] : '';
$fragment = isset($parsed_url['fragment']) ? '#' . $parsed_url['fragment'] : '';
return "$scheme$user$pass$host$port$path$query$fragment";
}

function urlqry2arr($query) {
//parse_str($urlp['query'], $qryp); je isto kao:
//     $qryp = urlqry2arr($urlp['query']); 
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param) {
      if (isset($param)) {
        $item = explode('=', $param);
        if (isset($item[1])) $params[$item[0]] = $item[1];
      } //else 
    }
    return $params;
}

function cremastlnk($url // u r l  s t r i n g npr http://dev:8082/
  // npr http://dev:8082/index.php?dir=/apl&rbrk=2&desc=1&test=1
       , $column // column ord.num. = u r l param. r b r k  
       , $desc // za asc/desc sort. - 1= a s c,  0= d e s c  
                // - MJENJA GA SVAKI KLIK LINKA
     // r1 = prvi redak pgntr-a - vwnavbar-a
) {  // izlaz: l i n k  na sebe u svakom stupcu h d r-a  tablice
$url_new = ''; // r e t. of this  f n

// -------------------------------------------------
// 1. a r r a y  parsed u r l  -input of this f n
// -------------------------------------------------
$urlp = parse_url($url);  
if (!isset($urlp['path']))  $urlp['path'] = '/index.php';
if ($urlp['path'] == '/')   $urlp['path'] = '/index.php';
if (!isset($urlp['query'])) $urlp['query'] = 'dir=/';
//
// -----------------------------------
// 2. a r r a y  pg params:
// -----------------------------------
//$t1 = strpos($urlp['query'], 'dir='); if (!($t1 === false))
// max_input_vars directive affects this fn:
parse_str($urlp['query'], $qryp); //$qryp = urlqry2arr($urlp['query']); 
//           dir, rbrk, desc, r1, test
if (!isset($qryp['dir'])) $qryp['dir'] = '/'; 
if (!isset($qryp['rbrk'])) $qryp['rbrk'] = $column; 
// d e s c   param. = 1 ili 0 MJENJA GA SVAKI KLIK LINKA
if (!isset($qryp['desc'])) $qryp['desc'] = '0'; 
else if ($qryp['desc'] == 0) $qryp['desc'] = '1'; else $qryp['desc'] = '0'; 
if (!isset($qryp['r1'])) $qryp['r1'] = '0'; 
if (!isset($qryp['test'])) $qryp['test'] = '0'; 
//
$urlp['query'] = http_build_query($qryp) ; //sa &, ili ...($qryp, '', '&amp;');
$url_new = str_replace( 'dir=//', 'dir=/', unparse_url($urlp) ) ;
        if (0) {
        print '<pre><strong>fn='.__FUNCTION__.'() fle='. __FILE__ .'</strong>'; 
        print '<pre>$url_new: '; print_r($url_new); print '</pre>'; 
        print '<pre>---------$c olumn='.$column.' $url (u r l ove stranice): '; print_r($url); print '</pre>';
        print '<pre>$urlp = parse_url($url): '; print_r($urlp); print '</pre>';
          print '<pre>$qryp: '; print_r($qryp); print '</pre>';
        }
/* 
---------$c olumn=1 $url (u r l ove stranice): http://dev:8082/index.php?dir=/apl&r1=10&r1=0&r1=10&r1=0
$urlp = parse_url($url): Array(
    [scheme] => http
    [host] => dev
    [port] => 8082
    [path] => /index.php
    [query] => dir=%2Fapl&r1=0&rbrk=1&desc=0&test=0
)
$qryp: Array(
    [dir] => /apl
    [r1] => 0
    [rbrk] => 1
    [desc] => 0
    [test] => 0
)
       

$str = "first=value&arr[]=foo+bar&arr[]=baz";
parse_str($str);
echo $first;  // value
echo $arr[0]; // foo bar
echo $arr[1]; // baz

parse_str($str, $output);
echo $output['first'];  // value
echo $output['arr'][0]; // foo bar
echo $output['arr'][1]; // baz

parse_url() doesn't work with relative URLs, parses URLs and not URIs
for backwards compatibility exception is for file:// scheme where triple slashes (file:///...) are allowed. For any other scheme this is invalid. 
'http://username:password@hostname/path?arg=value#anchor'
Potential keys: 1.scheme - e.g. http 2.host 3.port 4.user 5.pass 
  6.path 7.query - after '?' 8. fragment - after hashmark '#' (anchor)
$urlp = parse_url($url, PHP_URL_QUERY); - to retrieve URL component as string or integer for PHP_URL_PORT
PHP_URL_SCHEME, PHP_URL_HOST, PHP_URL_PORT, PHP_URL_USER, PHP_URL_PASS, PHP_URL_PATH, PHP_URL_QUERY or PHP_URL_FRAGMENT 
*/
return ($url_new);
} // -------------------------------end fn  c r e a d r m a s t

function vwprnlnk($lnktxt, $align, $column, $url, $cls) { //style
echo <<< EOTXT
<td class="$cls" align="$align">
      <a href=$url>$lnktxt</a>
</td>
EOTXT;
//      <a href=$url>$lnktxt ($column)</a>
} // -----------------------------end fn  v w l n k

function credetlnk(&$href, &$dir, $flnm, $file, $mode_type) {
      /////////////////////////////////////////////////////
      // FORMAT <a h r e f =""> AROUND  F I L E N A M E
      /////////////////////////////////////////////////////
// --------------------------------------------------------------
//$dir: apl,  urlencode($file): ed,  $href: /apl/ed
//$dir: apl,  urlencode($file): index.html,  $href: /apl/index.html
// --------------------------------------------------------------
      $dir = str_replace( DIRECTORY_SEPARATOR, '/', $dir);
      //$file = str_replace( DIRECTORY_SEPARATOR, '/', $file);
      if ('.' == $flnm) { $href = '.'; // no link for curr.dir.
      } else {
          // don't include ".." in parent directory link
          if ('..' == $flnm) { $href = urlencode(dirname($dir));
          } else { // nije . niti ..
              $href = '/' . urlencode($dir) . '/' . urlencode($file);
          }
          // everything but "/" should be urlencoded, ee: / -> /
          $href = str_replace('%2F','/',$href);
          $href = str_replace('//','/',$href);
          //
      if (0) {
        print '<pre>';
        //print '<strong>fn='.__FUNCTION__.'() fle='. __FILE__ .'</strong>'; 
        print '<br />'.__FUNCTION__.'...$dir: '; print_r($dir);        
        print ',  urlencode($file): '; print_r(urlencode($file));
        print ',  $href: '; print_r($href);
        print '</pre>'; 
//$dir: apl,  urlencode($file): ed,  $href: /apl/ed
//$dir: apl,  urlencode($file): index.html,  $href: /apl/index.html
      }
          //
// --------------------------------------------------------------
// --------------------------------------------------------------
          if ($file->isDir()) {
              // br o w s e  other directories with web-ls
//$href = sprintf('<a target="_blank" href="%s?dir=%s">%s</a>',
//                       $_SERVER['PHP_SELF'],$href,$file);
$href = '<a target="_blank" href="'
       .$_SERVER['PHP_SELF'].'?dir='.$href.'">'.$file
   .'</a>';
          } else {
              // link to files to download them
              $href= '<a target="_blank" '
                .'href="' . $href .'">'.$file.'</a>';
          }
          // if it's a symbolic link, show symbolic link target, too
          if ('l' == $mode_type) { // ili is_link()
              $href .= ' -&gt; ' . readlink($file->getPathname());
          }
      } // e n d 9. FORMAT <a h ref=...
} // -------------------------------end fn  c r e a d r m a s t


function vwprnhdrpg($mapa) { //style
?>
<html>
<head>
  <script Language="JavaScript">
    function msg(t1,t2,t3,t4,t5,t6,txt_srvgen) {
       //document.getElementById('div_srvgen').innerHTML = txt_srvgen;
       alert(t1+"\n"+t2+"\n"+t3+"\n"+t4+"\n"+t5+"\n"+t6);
    }
  </script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <title><?php echo ($mapa ? $mapa : 'Home') ?></title>

  <style type="text/css">
    body,td,th {
      font-family: Arial, Helvetica, sans-serif;
    }
    th {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: medium;
      color: blue; background-color: lightblue;
      border-bottom:1px; 
      align: center; vertical-align:top
    }
    .th2 {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: medium;
      /* color: blue; */
      background-color: lightblue;
      border-bottom:1px; 
      /*   align: center; */ 
      vertical-align:top
    }

tr.row1 {
    background-color: #E0E1FE;
}
tr.row2 {
    background-color: white; 
}
    
    .font1_3 {font-size: 1.3EM; font-weight: bold;}
    .font1_3bckzut {font-size: 1.3EM; font-weight: bold;
       background-color: lightyellow;}    
    .font0_7 {font-size: 0.7EM; font-weight: normal;}

    .mapa { color: #666666; 
            font-weight: normal; 
            background-color: lightyellow;
    }
    
    .fldprg { color: darkgreen; background-color: lightgreen;
              font-weight: medum; 
    }

  </style>
</head>
<body>

<?php
} // ----------------------------end fn  h d r p g

function vwprnftr($url) { //style
if (0) print '' //. __FILE__
.'<strong>'.dirname(__FILE__) .' je lokalni oblik</strong> imena mape '
   .'kojeg stvara program zvan (windows) explorer'
.'<br/>'
.'<strong>'. dirname($url) .' je WEB oblik</strong> imena mape '
   .'kojeg stvara program zvan WEB server'
.'<br/>(kao što IBAN ima oblike: bančin, nacionalni i internacionalni)'
;
} // -------------------------end fn

function vwprnhdrtbl($mapa, $url) { // style t h
$mapa_apl = $mapa ? $mapa : 'Home' ;
$mapa_apl2 = $mapa ? '' : '(prva stranica)' ;
echo <<< EOTXT
<table align="center" border="1" cellspacing="2" cellpadding="3">
<tr>
  <th colspan="6">
  <span class="font0_7">Site map:&nbsp;&nbsp;</span>
  <span class="font1_3bckzut"> $mapa_apl </span>
  <span class="font0_7">&nbsp;&nbsp;$mapa_apl2</span>
  </th>
</tr>
<tr>
EOTXT;
// za rbrk[olone] dodajte na URL: &rbrk=2&desc=1
} // ----------------------------end fn  h d r t b l

function vwrowcolor(&$row_counter) { 
// by ref da ne moramo ++ u gl.prog.
    // Returns row class for a row
    if ($row_counter & 1) { $row_color = "row2"; 
    } else { $row_color = "row1"; }
    //$row_counter++;
    return $row_color;  
}

function vwprnnavbar( $p_start_number = 0
                  ,$p_items_per_page = 50, $p_count
                  ,$current_page
) {  // Creates a navigation bar
   //$current_page = $_SERVER["PHP_SELF"];
//
// 
$urlp = parse_url($current_page); 
        if (0) {
        print '<strong>fn='.__FUNCTION__.'() fle='. __FILE__ .'</strong>'; 
        //print '<pre>$url_new: '; print_r($url_new); print '</pre>'; 
        //print '<pre>---------$c olumn='.$column.' $url (u r l ove stranice): '; print_r($url); print '</pre>';
        print '<pre>$urlp = parse_url($url): '; print_r($urlp); print '</pre>';
          print '<pre>$current_page: '; print_r($current_page); 
        print '</pre>';
        }
// 1. da bih mogao dodati parametar:
if (!isset($urlp['path']))  $urlp['path'] = '/index.php';
if ($urlp['path'] == '/')   $urlp['path'] = '/index.php';
// 2. da r1 param. ne konkatenira na  u r l  bez kraja:
//unset($urlp['query']); // ne ide jer [query] => dir=/apl
// 3. jedini ili vise param. :  
if (!isset($urlp['query'])) { 
   $param_separ = '?'; 
   $urlp['query'] = '';
} else $param_separ = '&';

parse_str($urlp['query'], $qryp); 
//$qryp = urlqry2arr($urlp['query']); 
//           dir, rbrk, desc, r1, test
if (isset($qryp['r1'])) unset($qryp['r1']); // jer ga dolje dodajemo
$urlp['query'] = http_build_query($qryp) ; //sa &, ili ...($qryp, '', '&amp;');
//
$current_page = str_replace( 'dir=//', 'dir=/', unparse_url($urlp) ) ;
$current_page = str_replace( '%2F', '/', $current_page) ;
//if (!isset($urlp['query'])) $urlp['query'] = 'dir=/';
        if (0) {
        print '<strong>fn='.__FUNCTION__.'() fle='. __FILE__ .'</strong>'; 
        //print '<pre>$url_new: '; print_r($url_new); print '</pre>'; 
        //print '<pre>---------$c olumn='.$column.' $url (u r l ove stranice): '; print_r($url); print '</pre>';
        print '<pre>$urlp = parse_url($url): '; print_r($urlp); print '</pre>';
          print '<pre>$current_page: '; print_r($current_page); 
        print '</pre>';
        }
//
//   
    if ( ($p_start_number < 0) 
         || (! is_numeric($p_start_number))) 
    { $p_start_number = 0; }
    //
    $navbar = "";
    $prev_navbar = "";
    $next_navbar = "";
    //
    if ($p_count > $p_items_per_page) 
    {
        $nav_count = 0;
        $page_count  = 1;
$nav_passed = false;
        while ($nav_count < $p_count) 
        {
            // Are we at the current page position?
            if ( ($p_start_number <= $nav_count) 
                 && ($nav_passed != true) ) 
                 
                 
            { $navbar .= 
"<b><a href=\"$current_page".$param_separ."r1=$nav_count\"> [$page_count] </a> </b>";
$nav_passed = true;


                // Do we need a "prev" button?
                if ($p_start_number != 0) {
                    $prevnumber = $nav_count - $p_items_per_page;
                    if ($prevnumber < 1) {
                        $prevnumber = 0;
                    }
                    
                    
                    $prev_navbar = 
"<a href=\"$current_page".$param_separ."r1=$prevnumber\"> &lt;Pre - </a>";
                } 
                
                
              $nextnumber = $p_items_per_page + $nav_count;
                
                // Do we need a "next" button?
                if ($nextnumber < $p_count) {
                    $next_navbar = 
"<a href=\"$current_page".$param_separ."r1=$nextnumber\"> - Slj&gt; </a>";  // <br>


                }
            } else { // NOT at the curr.page position :
                // Print normally.
                
                
                $navbar .= 
"<a href=\"$current_page".$param_separ."r1=$nav_count\"> [$page_count] </a>";


            } 
            $nav_count += $p_items_per_page;
            $page_count++;
        } // E N D  w h i l e ($nav_ count < $p_ count)
 
        $navbar = $prev_navbar . $navbar . $next_navbar;
        return $navbar; 
    }
} 

