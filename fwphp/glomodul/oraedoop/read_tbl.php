<?php
// J:\awww\www\fwphp\glomodul\z_examples\oraedoop\read_tbl.php
//<!-- // PAGE 2: ako je prijavljen na bazu: Automatically populated SQL (popup mode) : -->

$tbl = $_SESSION['states']->table ;
$rblk = $_SESSION['states']->blk_rowsnum ;
$rtbl = ($tbl > ' ') ? $this->rrcount($tbl) : 0 ;

//$pgn_links = self::get_pgnnav($rtbl, $this->pp1->filter_page.'1/', $this->uriq, $rblk);
$pgn_links = self::get_pgnnav($rtbl, '/i/home/', $this->uriq, $rblk);
$pgnnavbar        = $pgn_links['navbar']; //string of pgn links
$pgordno_from_url = $pgn_links['pgordno_from_url'];
$first_rinblock   = $pgn_links['first_rinblock'];
$last_rinblock    = $pgn_links['last_rinblock'];


require 'top_toolbar.php' ;

$statementtype = 'SELECT' ;
if ($statementtype == 'SELECT')
{
  if ($tbl > ' ') {

     //      C U R S O R S :

     // c1   $c_ col_ info = column list

    $qrywhere   = "TABLE_NAME='$tbl'" ; //'1'='1' and  ORDER BY VIEW_NAME
    $binds      = [] ;
    $do_ora_pgn = '' ;
                      //$binds[]=['placeh'=>':row_ordno', 'valph'=>$row_ordno, 'tip'=>'int'];
                      if ('') //if ($autoload_arr['dbg']) 
                      { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                        echo '<pre>' ; 
                          echo '$qrywhere='; print_r($qrywhere) ;
                        echo '</pre>'; }
    $c_col_info = $this->rr('', $this, 'USER_TAB_COLUMNS', $qrywhere
    ,'COLUMN_NAME, DATA_TYPE, DATA_LENGTH, DATA_SCALE, DATA_PRECISION, NULLABLE, DATA_DEFAULT'
        , $binds, $do_ora_pgn) ;

     //var_dump($c_col_info);
     $numcols = $c_col_info->columnCount(); //$numcols = ocinumcols($c_col_info);

     // c2   $c_ limited SQL = paginated block rows

    //$qrywhere = "'1'='1' ORDER BY COUNTRY_NAME" ;
    $qrywhere = "'1'='1'" ;
    $binds = [
            ['placeh'=>':first_rinblock', 'valph'=>$first_rinblock, 'tip'=>'int']
          , ['placeh'=>':last_rinblock',  'valph'=>$last_rinblock, 'tip'=>'int']
    ] ;
    self::$do_pgntion = '1'; $c_limitedSQL = $this->rr('', $this, $tbl //c= cursor
        , $qrywhere, '*', $binds, basename(__FILE__),__LINE__,__METHOD__
        //, "$qrywhere ORDER BY ... LIMIT :first_rinblock,5", '*' //mysql
      ) ;
    $numcols = $c_limitedSQL->columnCount(); //$numcols = ocinumcols($c_col_info);
     //e n d      C U R S O R S



    include 'read_tbl_showtbl.php'; 
  }
} //e n d  $s tatementt ype == 'S ELECT'


elseif ($statementtype != '')
{ // Non-S ELECT statesments

} //e n d  $statementtype != ''




                     /*  if ($a1)
                        { $ii = 0; while ($ii < count($a1) )
                           { $row = $a1[$ii];
                             //$_SESSION['states']->cache' ][ '_allviews' ][ ] = $row[ 'VIEW_NAME' ];
                             $ii++;            
                           }
                          $a1 = array(); 
                        }
                     } */