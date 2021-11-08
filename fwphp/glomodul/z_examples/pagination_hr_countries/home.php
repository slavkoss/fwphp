<?php
// ***********************************
// 3. V I E W  &  P A G I N A T O R
// ***********************************

$rblk = 4; //=per_page
$rtbl = $this->rrcount('COUNTRIES') ;

$pgn_links = self::get_pgnnav($rtbl, '/i/home/', $this->uriq, $rblk);
$pgnnavbar        = $pgn_links['navbar'];
$pgordno_from_url = $pgn_links['pgordno_from_url'];
$first_rinblock   = $pgn_links['first_rinblock'];
$last_rinblock    = $pgn_links['last_rinblock'];


       //$onerow, $db, $tbl, $where='1', $flds='COUNT(*) COUNT_ROWS', $binds = []
$qrywhere = "'1'='1' ORDER BY COUNTRY_NAME" ;
$binds = [
        ['placeh'=>':first_rinblock', 'valph'=>$first_rinblock, 'tip'=>'int']
      , ['placeh'=>':last_rinblock',  'valph'=>$last_rinblock, 'tip'=>'int']
] ;
$c_limitedSQL = $this->rr('', $this, 'COUNTRIES' //c= cursor
    , $qrywhere, '*', $binds, 'do_ora_pgn', $this->pp1->dbi_obj
    //, "$qrywhere ORDER BY COUNTRY_NAME LIMIT :first_rinblock,5", '*' //mysql
  ) ;

?>
<!-- HEADER & n avbar_ admin2    Selfjoin home -->
<header class="bg-dark text-white py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
      <h2>
                Pagination hr countries
         <?php //if ($category_from_url) { echo ' - all ' . $category_from_url . ' articles' ;
         //} else {echo ' - all articles';} ?>
      </h2>
      <h2 class="lead">aaaaaaaa...</h2>
      </div>
      <?php //require('navbar_admin2.php'); ?>
    </div>
  </div>
</header>
<!-- HEADER END -->


<!-- Main Area -->
<section class="container py-2 mb-4">
  <div class="row">
    <div class="col-lg-12">
      <?php
       echo $this->ErrorMessage();
       echo $this->SuccessMessage();
       echo $pgnnavbar ; ?>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
        <tr>
          <th>#</th><th>Country</th><th>id</th><th>Region id</th>
        </tr>
        </thead>

        <tbody>
          <?php
          $ordno = 0 ;
          while ($r = $this->rrnext($c_limitedSQL)): //c=cursor
          { ++$ordno ?>
             <tr>
             <td><?=($pgordno_from_url == 1)
                    ? ($first_rinblock+1 + $ordno-1) : ($first_rinblock + $ordno-1) 
                . '. '?></td>
             <td><?=self::escp($r->COUNTRY_NAME)?></td>
             <td><?=self::escp($r->COUNTRY_ID)?></td>
             <td><?=self::escp($r->REGION_ID)?></td>
             </tr>
            <?php
          } endwhile;
          ?>
        </tbody>
      </table
      <?php echo $pgn_links['navbar'] ; //P G N  L I N K S  ?> 
    </div>
  </div>
</section>
<!-- Main Area End -->

<?php
