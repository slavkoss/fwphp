<?php

   //see c r u d 29.1 u p d, 29.2 d e l,  29.3 c r e  at end this script,
   //   29.4 Run S ELECT statesment, display results

  $columns = [] ;

  while ($r = $this->rrnext($c_col_info))
  { 
    $columns[ $r->COLUMN_NAME ] = 
      [
          'type' => $r->DATA_TYPE
        , 'size' => $r->DATA_LENGTH
        , 'precision' => $r->DATA_PRECISION
        , 'scale' => $r->DATA_SCALE
      ];
  } // end for each  c o l u m n  t i t l e




   //******************************************
   // 29.5 cRud: Display main table
   //******************************************
  $exportmode ='';
  // Display export settings form
  if ($exportmode) { require 'export_frm.php'; }

   // !$e xport mode
  else 
  {   // Display table header

      echo $pgnnavbar ;
                              //CREATE TABLE mytab (c1 NUMBER, c2 FLOAT, c3 NUMBER(4), c4 NUMBER(5,3));
                              // field prec. scale
                              //   C1    0   -127
                              //   C2  126   -127
                              //   C3    4      0
                              //   C4    5      3
  ?>
        <!--h4>Responsive Table with horizontal scrollbar
            <br />2click html does not work (THROUGH WEB SERVER WORKS!)</h4-->
      <!--error in M I D   C O L  --div class="w3-container"-->
      <div style="overflow-x:auto;">
        <!--div class="w3-responsive"-->
          <table>
            <tr>
              <th>Row</th>
              <?php
              if ($_SESSION['states']->entrymode == 'popups') { ?>
                <th>Actions</th><th>OrdNo</th> <?php
              }

              foreach ($columns as $columnname => $column) {
                echo '<th>' . $columnname 
                        . '<br />(' . $column[ 'type' ] . ', ' . $column[ 'size' ]
                        . ' ' . $column[ 'precision' ] .' '. $column[ 'scale' ] 
                        . ')'
                      .'</th>' ;
              }
              echo '</tr>' . "\n";

            $ordno=0;
            while ($r = $this->rrnext($c_limitedSQL)): //c=cursor
            { ++$ordno
            ?>
                <tr><td></td><td></td>
                <td><?=str_replace('!', "&nbsp;", str_pad(
                  
                  $first_rinblock + $ordno - 1
                  //($pgordno_from_url < 2)
                  //? ($first_rinblock + $ordno-1) : ($first_rinblock + $ordno-1)

                            , 6, '!', STR_PAD_LEFT) ) //. '. ' //&nbsp;
                    ?>
                </td>
                <?php
                  foreach ($columns as $columnname => $column) {
                    echo '<td>'.' '. $r->$columnname .'</td>' ;
                  }
                echo '</tr>';
            } endwhile ; //e n d  f o r  e a c h  t b l  r o w
            ?>


          </table> <!-- class="w3-table-all"-->
        <!--/div--> <!-- class="w3-responsive"-->
      </div> <!-- class="w3-container"-->
    <?php


  } //e n d  Display table header
