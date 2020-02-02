<?php
//J:\awww\www\fwphp\glomodul\z_examples\03steinmetz\ch01_INC_prev_next_links_ARR_rowcolor\paginator_navbar_no_rows.php

//http://dev1:8083/fwphp/glomodul/z_examples/03steinmetz/ch01_INC_prev_next_links_ARR_rowcolor/%3C?=QS?%3E/pg/2

namespace B12phpfw ;

define('QS', '?');
//define('DS', DIRECTORY_SEPARATOR);

//echo 'xxxxx='.realpath('\zinc\Pgn.php');
require realpath($_SERVER['DOCUMENT_ROOT'].'/zinc/Pgn.php');

//$url = QS ;  //$url = $_SERVER["PHP_SELF"] ;
$rblk = 15 ; // nr.records in table block to display
$rtbl = 1000 ; // total nr.records in table

$req_uri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
$phpself = filter_var($_SERVER['PHP_SELF'], FILTER_SANITIZE_URL);
      // [0] => 'pg',  [1] => pgordno,  [2] => 'all' or...
//$pgordno=str_replace(QS.'/pg/','',str_replace($_SERVER["PHP_SELF"],'',$req_uri)) ;
$pgordno=str_replace(QS.'/pg/','',str_replace($phpself,'',$req_uri)) ;
if($pgordno == '1/all') $pgordno = 1 ;
$pgordno = intval($pgordno);

echo '<pre>$_GET='; print_r($_GET) ; echo '</pre>';
//echo '<pre>$_SERVER[\'REQUEST_URI\']='; print_r($_SERVER['REQUEST_URI']) ; echo '</pre>';

$pgn  = new Pgn($pgordno, $rblk, $rtbl);
$pgnso = (object)get_pgnnav($pgordno, $rblk, $rtbl);
//$pgnso = (object)$pgns; 
         
                //echo '<pre>'.'$pgns='; print_r($pgns); echo '</pre>';
echo ''
     . '<br />'.'NAVBAR='.$pgnso->navbar
     . '<br />'.'pgordno requested='.$pgordno
     . '<br />'. '<br />'.'$pgn->tot_pgs()='. $pgn->tot_pgs()
     . '<br />'. '<br />'.'req_uri='.$req_uri
     . '<br />'.'phpself='.$phpself //$pgnso->phpself
;




echo '<h4>'.'$pgn cls created pages navbar: </h4>'
     . '<div id="pagination" style="clear: both;">' ;

  if($pgn->tot_pgs() > 1) {
    
    if($pgn->has_prev_pg()) { 
      echo "<a href=\"index.php?page=";
      echo $pgn->prev_pg();
      echo "\">&laquo; Previous</a> "; 
    }

    for($i=1; $i <= $pgn->tot_pgs(); $i++) {
      if($i == $pgordno) {
        echo " <span class=\"selected\">{$i}</span> ";
      } else {
        echo " <a href=\"index.php?page={$i}\">{$i}</a> "; 
      }
    }

    if($pgn->has_next_pg()) { 
      echo " <a href=\"index.php?page=";
      echo $pgn->next_pg();
      echo "\">Next &raquo;</a> "; 
    }
    
  }

echo '</div>';




/**
*             P A G I N A T O R
*    Creates navigation bar & page ordinary number
*/
//public static 
function get_pgnnav(
    //$href  = ''
    $pgordno // requested  p a g e
  , $rblk  // nr.records in table block to display
  , $rtbl  = 0  // nr.records in table
)
{
  $qs = QS;
   // eg  $req_uri  is /zbig/04knjige/...paginator_navbar_no_rows.php?/pg/15
   //     $_SERVER["PHP_SELF"] is $req_uri without ?/pg/15
  $total_pages = ceil($rtbl / $rblk);
  //$req_uri = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
      // [0] => 'pg',  [1] => p gordno,  [2] => 'all' or...

  //$p gordno=str_replace(QS.'/pg/','',str_replace($_SERVER["PHP_SELF"],'',$req_uri)) ;
  //if($pgordno == '1/all') $pgordno = 1 ;
  //$pgordno = intval($pgordno);
                //$rfirstinblock = ($p gordno - 1) * $r blk ;


  // Link to first page                               11111
      //$n avbar = "<center><div id='pagination'>"
      $navbar = "<div>"
       ." <a title='No pagination (for c t r l + F)' href='$qs/pg/1/all'>ALL</a>"
       .' uk.str.'.$total_pages." <a href='$qs/pg/1'>&lt;&lt;</a>";
      
  // Link to prev page                             -11111
      $navbar .= " <a href='$qs/pg/".( ($pgordno > 1) ? $pgordno-1 : $pgordno)
         ."'>&nbsp;&lt;&nbsp;</a>";

  // Link to pages between first and last page
      for ($pg=1; $pg<=$total_pages; $pg++) {   // 11111...l a s t
        $navbar .= " <a href='$qs/pg/$pg'>";
          $tmp1=''; $tmp2=''; 
          // currpg is italic
          if ($pg==$pgordno) {$tmp1='<b><i>*'; $tmp2='</i></b>';}
          $navbar .= $tmp1.str_pad($pg, 3, '0', STR_PAD_LEFT).$tmp2 ;
        $navbar .=  '</a>';
      }


  // Link to next page                          +11111
      $navbar .= " <a href='$qs/pg/"
         .( ($pgordno < $total_pages) ? $pgordno+1 : $pgordno)
         ."'>&nbsp;&gt;&nbsp;</a>";
         
  // Link to last page                        .l a s t
      $navbar .= " <a href='$qs/pg/$total_pages'>&gt;&gt;</a>";

      //$navbar .= '</center></div>' ;
      $navbar .= '</div>' ;

      return [
           'navbar'=>$navbar  //'<h2>'.'aaaaaaaa'.'</h2>';
         //, 'req_uri'=>$req_uri
         //, 'phpself'=>$_SERVER["PHP_SELF"]
         //, 'pgordno'=>$pgordno
      ]; 

} // e n d  f n  g e t _ p g n n a v b a r


/*
//J:\awww\www_old_ver_5_4_3\fwphp\glomodul4\help_sw\test\books\mongodb\books_store_code_mongo\ajax\pagination.php

//page variable to know on what page i am on
$page = isset($_GET['page'])? $_GET['page'] : 1;
$limit = 12;
$sort = ['bookTitle'=> 1]; 

$skip = ($page - 1) * $limit;
$next = ($page + 1);
$prev = ($page - 1);

//$cursorPage = $collection_books->find([], ['limit'=>$limit, 'skip' => $skip, 'sort'=> $sort ]);

$total = 100; //$collection_books->count($cursorPage);
$maxPages = ceil($total/$limit);
$moveRight;
 $moveLeft;

  switch ($page) {
    case $maxPages:
          $moveRight = '';
          $moveLeft = '?page='.$prev;
      break;

    case 1:
          $moveRight = '?page='.$next;
          $moveLeft = '';
      break;
  
    default:
      $moveLeft = '?page='.$prev;
      $moveRight = '?page='.$next;
      break;
  }


*/
