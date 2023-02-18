<?php
// J:\awww\www\fwphp\glomodul\z_examples\oraedoop\read_tbl.php
//<!-- // PAGE 2: ako je prijavljen na bazu: Automatically populated SQL (popup mode) : -->

$rblk = 10;
$rtbl = $this->rrcount('COUNTRIES') ;

//$pgn_links = self::get_pgnnav($rtbl, $this->pp1->filter_page.'1/', $this->uriq, $rblk);
$pgn_links = self::get_pgnnav($rtbl, '/i/home/', $this->uriq, $rblk);
$pgnnavbar        = $pgn_links['navbar'];
$pgordno_from_url = $pgn_links['pgordno_from_url'];
$first_rinblock   = $pgn_links['first_rinblock'];
$last_rinblock    = $pgn_links['last_rinblock'];


$qrywhere = "'1'='1' ORDER BY COUNTRY_NAME" ;
$binds = [
        ['placeh'=>':first_rinblock', 'valph'=>$first_rinblock, 'tip'=>'int']
      , ['placeh'=>':last_rinblock',  'valph'=>$last_rinblock, 'tip'=>'int']
] ;
$c_limitedSQL = $this->rr('', $this, 'COUNTRIES' //c= cursor
    , $qrywhere, '*', $binds, 'do_ora_pgn', $this->pp1->dbi_obj
    //, "$qrywhere ORDER BY COUNTRY_NAME LIMIT :first_rinblock,5", '*' //mysql
  ) ;
$numcols = $c_limitedSQL->columnCount(); //$numcols = ocinumcols($c_col_info);



//******************************************
// Display first (violet) header
//******************************************
    if (isset($_SESSION['cncts']->username)) { $usr_tmp = $_SESSION['cncts']->username;
    } else {$usr_tmp = '';} //Guest

    //if ($_SESSION['cncts']->service != '') {
    $DBname_tmp = null;
    if ( isset($_SESSION['cncts']->service) and $_SESSION['cncts']->service != ''
    ) { $DBname_tmp='@' . $_SESSION['cncts']->service; }

    //    http://dev1:8083/fwphp/glomodul/z_examples/oraedoop/?i/l ogout/
    //was http://dev1:8083/fwphp/glomodul/z_examples/oraedoop/index.php?sid=$sid&d isconnect=1
    $link_odjava_tmp=
      ' - <a href="' . $this->pp1->logout //$_SERVER[ 'PHP_SELF' ]
        //. '?sid=' . '$sid' . '&d isconnect=1' 
        .'" accesskey="d" title="Click here to log out [d]">Odjava</a>';
    //echo '</table>' . "\n";
?>
<table class="headerline">
  <tr><td><span class="logo">Editor</span>
  Prijavljeni ste na Oracle kao <b><?="$usr_tmp $DBname_tmp $link_odjava_tmp"?></b>
  </td></tr>
</table>



<?php
//******************************************
// 27. toolbar red gumba :
//******************************************
// Prikazati - "blk_rowsnum" selection popup
?>
<table class="selectform">
<tr><td>
    Prikazati <select name="blk_rowsnum"
      onChange="javascript:document.forms[0].submit()"
      title="Izaberite broj redaka na stranici (\$blk_rowsnum from \$blk_rowsnums)"
    >
   <?php
   foreach ($this->pp1->states->blk_rowsnums as $blk_rnum)
     { echo '<option value="' . $blk_rnum . '"';
       if ($blk_rnum == $_SESSION['states']->blk_rowsnum) echo ' selected="selected"';
       echo '>' . $blk_rnum . '</option>' ;
     }
   echo '</select> redaka po stranici ' ;

   // Submit buttoni Refresh i Export :
   echo '<input type="submit" accesskey="e" value="'
      . ($_SESSION['states']->entrymode == 'popups' ? 'Refresh' : 'Execute')
  . '" title="Click here to execute the SQL statesment [e]" />' . "\n";

   echo '<input type="submit" accesskey="x" name="export" value="Export"'
           .' title="Click here to export rows as text, XML or CSV [x]" />' . "\n";


   // l i n k  R u c n i  unos S Q L-a:
   echo str_repeat('&nbsp;', 6);
   echo '<a href="' . $_SERVER[ 'PHP_SELF' ]
      . '?sid=' . '$sid'
  . '&entrymode=' . ($_SESSION['states']->entrymode == 'popups' ? 'manual' : 'popups')
  . '" accesskey="s" title="Click here to switch between manual SQL entry and the table/view popup [s]">';
   echo ($_SESSION['states']->entrymode == 'popups' ? 'Ručni unos SQL-a : ' : 'Popup-unos SQL-a : ') . '</a>' . "\n";

   //////////////////////////////////////////// kraj toolbar red gumba
   ?>
</td></tr>

<tr><td>
<?php
   //******************************************
   // 28. toolbar red selecta (ime tablice i where klauzula):
   //******************************************

   if ($_SESSION['states']->entrymode == 'popups')
    { 
                      /*<form id="myForm" action="/action_page.php">
                        First name: <input type="text" name="fname"><br>
                        Last name: <input type="text" name="lname"><br><br>
                        <input type="button" onclick="myFunction()" value="Submit form">
                      </form>

                      <script>
                      function myFunction() {
                        document.getElementById("myForm").submit();
                      }
                      </script> */
      //echo '<form id="lov_ tbl" action="<=$this->pp1->tbl>" method="post">' ;
        // --------------------------------------
        // Popup-aided SQL query entry
        // --------------------------------------
        echo 'SELECT '; // "select" (column list) input field
        echo '<input type="text" name="select"
          value="' . htmlspecialchars($_SESSION['states']->select) . '" size="20"
          title="Unesite imena kolona (comma-separated), ili * za sve kolone tablice" />';
        //***********************************
        // "table" selection popup
        //***********************************
        $c_alltables = $this->pof_gettables($this);
        $c_allviews  = $this->pof_getviews($this);

        echo ' FROM <select name="table" '
             .'onChange="javascript:document.getElementById("lov_tbl").submit();" '
                        //.'onChange="javascript:document.forms[0].submit()" '
             .'title="Izaberite tablicu/view za učitavanje / mjenjanje">' ;
        $found = false;
        echo '<option value="">[Izaberite tablicu:]</option>' ;
        
                       //foreach ($c_alltables as $flds) //OWNER, TABLE_NAME
        while ($r = $this->rrnext($c_alltables))
        { echo '<option value="' . $r->TABLE_NAME . '"';
           if (! $found)
             if ($r->TABLE_NAME == $_SESSION['states']->table)
              { echo ' selected="selected"';
                $found = true;
              }
           echo '>' . $r->TABLE_NAME . '</option>' ;
        } // end for each  t a b l i c a
        
        echo '<option value=""></option>' ;
        echo '<option value="">[Izaberite view:]</option>' ;

                              //foreach ($c_allviews as $viewname)
        while ($r = $this->rrnext($c_allviews))
        { echo '<option value="' . $r->TABLE_NAME . '"';

           if (! $found)
             if ($r->TABLE_NAME == $_SESSION['states']->table)
              { echo ' selected="selected"';
                $found = true;
              }

           echo '>' . $r->TABLE_NAME . '</option>' . "\n";
        } // end for each  v i e w

        if (! $found)
          echo '<option value="" selected="selected">[Izaberite tablicu]</option>' . "\n";

        echo '</select>' . "\n";

        // "where" input field for WHERE, ORDER BY, GROUP BY, ...

        echo ' <input type="text" name="where" '
        .'value="' . htmlspecialchars($_SESSION['states']->where) . '" '
        .'size="40" title="Unesite WHERE, GROUP BY, ORDER BY uvjete upita" />';
      //echo '</form>' ;
    } // end ($_SES SION[ 'entry mode == 'pop ups')
   else
   { 
       // -------------------------------------
       // Manual SQL query/command entry
       // -------------------------------------
          ?>
          SQL: [Oprez sa UPDATE, DELETE, DROP...  - nema rollback-a !]<br />

          <textarea name="sql" rows="5" cols="80" title="Enter any SQL statesment here: SELECT, INSERT, UPDATE, DELETE, ALTER, DROP..."><?php echo htmlspecialchars($_SESSION['states']->sql); ?></textarea>

          <script type="text/javascript">
          document.forms[ 'form1' ].elements[ 'sql' ].focus();
          </script>

          <?php
     }
   //////////////////////////////////////////// kraj toolbar red selecta
     ?>
</td></tr></table>




<?php
   //see c r u d 29.1 u p d, 29.2 d e l,  29.3 c r e  at end this script,
   //   29.4 Run SELECT statesment, display results

$statementtype = 'SELECT' ;
if ($statementtype == 'SELECT')
{   // Get column list

  $qrywhere   = "TABLE_NAME='COUNTRIES'" ; //'1'='1' and ORDER BY VIEW_NAME
  $binds      = [] ;
  $do_ora_pgn = '' ;
  //$binds[]=['placeh'=>':row_ordno', 'valph'=>$row_ordno, 'tip'=>'int'];
                if ('') //if ($autoload_arr['dbg']) 
                { echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
                  echo '<pre>' ; 
                    echo '$qrywhere='; print_r($qrywhere) ;
                    //echo 'ses fltr pg ='; print_r($_SESSION['states']->filter_posts']) ;
                    //echo '<br />$binds='; print_r($binds) ;
                  //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
                  echo '</pre>'; }
  $c_col_info = $this->rr('', $this, 'USER_TAB_COLUMNS', $qrywhere
  ,'COLUMN_NAME, DATA_TYPE, DATA_LENGTH, DATA_SCALE, DATA_PRECISION, NULLABLE, DATA_DEFAULT'
      , $binds, $do_ora_pgn) ;
                   /*  if ($a1)
                      { $ii = 0; while ($ii < count($a1) )
                         { $row = $a1[$ii];
                           //$_SESSION['states']->cache' ][ '_allviews' ][ ] = $row[ 'VIEW_NAME' ];
                           $ii++;            
                         }
                        $a1 = array(); 
                      }
                   } */
   //var_dump($c_col_info);
   $numcols = $c_col_info->columnCount(); //$numcols = ocinumcols($c_col_info);

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

      echo $pgnnavbar ; ?>

      <table class="resultgrid">
      <tr class="gridheader"><th>Row</th>
      <?php
      if ($_SESSION['states']->entrymode == 'popups') { ?>
        <th>Actions</th><th>OrdNo</th> <?php
      }
                              //CREATE TABLE mytab (c1 NUMBER, c2 FLOAT, c3 NUMBER(4), c4 NUMBER(5,3));
                              // field prec. scale
                              //   C1    0   -127
                              //   C2  126   -127
                              //   C3    4      0
                              //   C4    5      3
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
    //str_pad( string $input, int $pad_length[, string $pad_string = " "[, int $pad_type = STR_PAD_RIGHT]] ) : string
    //str_replace('0', "&nbsp;", str_pad($foo, 10, '0', STR_PAD_LEFT))
    ?>
        <tr><td></td><td></td>
        <td><?=str_replace('!', "&nbsp;", str_pad(
          
          ($pgordno_from_url == 1)
                    ? ($first_rinblock+1 + $ordno-1) 
                    : ($first_rinblock + $ordno-1)

                    , 6, '!', STR_PAD_LEFT) ) //. '. ' //&nbsp;
            ?>
        </td>
        <?php
          foreach ($columns as $columnname => $column) {
            echo '<td>'.' '. $r->$columnname .'</td>' ;
          }
        echo '</tr>';
    } endwhile ; //e n d  f o r  e a c h  t b l  r o w


  } //e n d  Display table header
} //e n d  $s tatementt ype == 'S ELECT'



elseif ($statementtype != '')
{ // Non-SELECT statesments

   /* $rowcount = ocirowcount($cursor);

   $words = array(
      'UPDATE' => 'updated',
      'DELETE' => 'deleted',
      'INSERT' => 'inserted'
      );

   $msg = $rowcount . ' row' . ($rowcount == 1 ? '' : 's') . ' ';

   if (isset($words[ $statementtype ]))
     $msg .= $words[ $statementtype ] . '.';
   else
     $msg = $statementtype . ' affected ' . $msg . '.';

   echo $this->pof_sqlline_msg($msg);
   */
} //e n d  $statementtype != ''




                    /*
                    $qrywhere   = "'1'='1'" ; // ORDER BY VIEW_NAME
                    $binds      = [] ;
                    $do_ora_pgn = 'do_ora_pgn' ;

                    $c_blok = $this->rr('', $this, 'COUNTRIES', $qrywhere
                    ,'*'
                        , $binds, $do_ora_pgn) ;

                     $numcols = $c_blok->columnCount(); //$numcols = ocinumcols($c_col_info);

                     $blok = [] ;
                                 for ($j = 1; $j <= $numcols; $j++) {
                                   if (ocicolumnname($c_col_info, $j) != 'ROWID_') {
                                     $columns[ (ocicolumnname($c_col_info, $j)) ] = array(
                                         'type' => ocicolumntype($c_col_info, $j),
                                         'size' => ocicolumnsize($c_col_info, $j)
                                     );
                                   }
                                 } 
                    */


                         /*  if ($a1)
                            { $ii = 0; while ($ii < count($a1) )
                               { $row = $a1[$ii];
                                 //$_SESSION['states']->cache' ][ '_allviews' ][ ] = $row[ 'VIEW_NAME' ];
                                 $ii++;            
                               }
                              $a1 = array(); 
                            }
                         } */
         //var_dump($c_col_info);



       /*
            // Skip previous sets

            $offset = 0;

            if ($_SESSION['states']->set > 1)
              { $offset = ($_SESSION['states']->set - 1) * $_SESSION['states']->blk_rowsnum;
               for ($j = 1; $j <= $offset; $j++)
                 if (! ocifetch($cursor))
                  break;
              }

            $morerows = false;
            $foundact_record = false;

            $foreign = $this->pof_getforeignkeys($_SESSION['states']->table);

            // Display records

            $i = 0;

            while (true)
            { if (! ocifetchinto($cursor, $row, OCI_ASSOC | OCI_RETURN_LOBS))
                 break;

               $i++;

               echo '<tr class="' . ($i % 2 ? 'gridline' : 'gridlinealt') . '">' . "\n";
               echo '<td>' . ($i + $offset) . '</td>' . "\n";

               // Is this record to be edited?
               $mode = 'show';
               if ($action != '')
                 if (    ($this->pp1->act_record[ 'table' ] == $_SESSION['states']->table)
                      && ($this->pp1->act_record[ 'rowid' ] == $row[ 'ROWID_' ]))
                  { $mode = $action;
                    $foundact_record = true;
                  }

               // Display A ctions column (entrymode=popups)
               if ($_SESSION['states']->entrymode == 'popups')
                 { echo '<td>';
                  if ($mode == 'edit')
                    { echo '<a name="act_record"></a>';
                     echo '<input type="submit" value="Update" name="editsave" 
                                  title="Click here to save your changes now" /><br />';
                     echo '<input type="submit" value="Cancel" name="editcancel" 
                                  title="Click here to dismiss your changes and go back" />';
                    }
                  elseif ($mode == 'delete')
                    { echo '<a name="act_record"></a>';
                     echo '<input type="submit" value="Delete" name="deleteconfirm" 
                                  title="Click here to delete this record now" /><br />';
                     echo '<input type="submit" value="Cancel" name="deletecancel" 
                                  title="Click here to go back" />';
                    }
                  else
                    {   $qs = 'record[table]=' . urlencode($_SESSION['states']->table) . '&' .
                        'record[rowid]=' . urlencode($row[ 'ROWID_' ]);

                     echo '<a href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid'
                          . '&action=edit&' . $qs
                     .'#act_record" title="Click here to change this record">Update</a><br />';
                     echo '<a href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid'
                     . '&action=delete&' . $qs
             . '#act_record" title="Click here to delete this record">Delete</a>';
                    }

                  echo '</td>' . "\n";
                 }

               // Display values

               if ($mode == 'edit')
                 { foreach ($columns as $columnname => $column)
                    { $value = '';
                     $nul = false;

                     if (isset($row[ $columnname ]))
                       $value = $row[ $columnname ];
                     else
                       $nul = true;

                     echo '<td>';

                     if ($columnname == $pk)
                       echo '<pre>' . htmlspecialchars($value) . '</pre>';
                     else
                       { echo '<nobr>Original value: <nobr>' 
                         . htmlspecialchars(substr($value, 0, 50)) . (strlen($value) > 50 
                               ? '...' : '') . '</nobr><br />';

                        $inputsize = $column[ 'size' ];
                        if ($inputsize < 4)
                          $inputsize = 4;
                        elseif ($inputsize > 48)
                          $inputsize = 48;

                        echo '<nobr><input type="radio" name="edit[' 
                             . $columnname . '][mode]" value="value" ' 
                             . ($nul ? '' : 'checked="checked" ') . '/>' . "\n";

                        if (($column[ 'type' ] == 'LONG') || ($column[ 'type' ] == 'CLOB'))
                          echo '<textarea name="edit[' . $columnname 
                                . '][value]" rows="10" cols="48" wrap="virtual">' 
                                . htmlspecialchars($value) . '</textarea>' . "\n";
                        else
                          { echo '<input type="text" name="edit[' . $columnname 
                              . '][value]" value="' . htmlspecialchars($value) 
                              .'" size="' . $inputsize . '" ';
                           if ( ($column[ 'size' ] <= 256) 
                                && ( ($column[ 'type' ] == 'VARCHAR') 
                                     or ($column[ 'type' ] == 'VARCHAR2')
                                   )
                              )
                             echo 'maxlength="' . $column[ 'size' ] . '" ';
                           echo '/>';
                          }

                        echo '</nobr><br />' . "\n";

                        echo '<nobr><input type="radio" name="edit[' 
                             . $columnname . '][mode]" value="function" ' 
                             . ($nul ? 'checked="checked" ' : '') . '/> ' . "\n";
                        echo 'Function: <input type="text" name="edit[' 
                             . $columnname . '][function]" value="' 
                             . ($nul ? 'NULL' : '') .'" size="10" /></nobr>' . "\n";
                       }

                     echo '</td>' . "\n";
                    }
                 }
               else // prikaz redaka tablice:
                  foreach ($columns as $columnname => $column)
                  { echo '<td>';
                    if (isset($row[ $columnname ]))
                     { echo '<pre>';
                       if (isset($foreign[ 'to' ][ $columnname ]))
                        echo
                           '<a href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid' .
                           '&table=' . urlencode($foreign[ 'to' ][ $columnname ][ 'table' ])
                         .'&keepwhere=' . urlencode("where "
                         . $foreign[ 'to' ][ $columnname ][ 'column' ] . "='"
                         . ereg_replace("'", "''", $row[ $columnname ]) . "'") .
                                                 '" title="klik za nadtablicu '
                         . htmlspecialchars($foreign[ 'to' ][ $columnname ][ 'table' ]) . ' record">';

                       echo htmlspecialchars($row[ $columnname ]);

                       if (isset($foreign[ 'to' ][ $columnname ]))
                        echo '</a>';

                       echo '</pre>';

                     if ($test && isset($foreign[ 'from' ][ $columnname ]))
                                          // fk-ovi na taj redak:
                      foreach ($foreign[ 'from' ][ $columnname ] as $key => $item)
                      { if ($key > 0) echo '<br />';
                          echo '<nobr><a href="'
                         .$_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid'
                        .'&table=' . urlencode($item[ 'table' ])
                        .'&keepwhere='
                        . urlencode("where " . $item[ 'column' ]
                            . "='" . ereg_replace("'", "''", $row[ $columnname ]) . "'")
                        .'" title="klik za podtablicu '
                        .htmlspecialchars($item[ 'table' ] . '.' . $item[ 'column' ])
                        .'">=&gt; '
                        .nl2br(htmlspecialchars(wordwrap($item[ 'table' ]
                        . '.' . $item[ 'column' ], 30, "-\n", true))) . '</a></nobr>'
                        . "\n";
                      }

                     }

                    echo '</td>' . "\n";
                  }

               echo '</tr>' . "\n";

               //******************************************
               // 34. Check whether there's a next result set
               //******************************************
               if ($i >= $_SESSION['states']->blk_rowsnum)
                 { if (ocifetch($cursor))
                    $morerows = true;
                  break;
                 }
              }

            if (! $foundact_record)
              { $action = '';
               $this->pp1->act_record = false;
              }

            //******************************************
            // 35. New record row
            //******************************************
            if ($action == '')
            {  // paint line :
               echo '<tr class="' . ($i % 2 ? 'gridlinealt' : 'gridline')
                    . '">' . "\n";

               if (isset($_REQUEST[ 'showinsert' ]))
                {
                  // **************************************************
                  // Find default values + NOT NULL restrictions
                  // **************************************************
                  $coldefs = $this->pof_getcoldefs($_SESSION['states']->table);

                  // Paint cells
                  echo '<td><a name="insertrow"></a>&nbsp;</td>' . "\n";
                  echo '<td><input type="submit" value="Insert" name="insertsave" /></td>' . "\n";

                  foreach ($columns as $columnname => $column)
                    { $value = '';
                     $nul   = false;

                     if (isset($coldefs[ $columnname ]))
                       { $value = $coldefs[ $columnname ][ 'default'  ];
                        $nul   = $coldefs[ $columnname ][ 'nullable' ];
                       }

                     echo '<td>';

                     $inputsize = $column[ 'size' ];
                     if ($inputsize < 4)      $inputsize = 4;
                     elseif ($inputsize > 48) $inputsize = 48;

                     echo '<nobr><input type="radio" name="insert[' . $columnname . '][mode]" value="value" ' . ($nul ? '' : 'checked="checked" ') . '/>' . "\n";
                     echo '<input type="text" name="insert[' . $columnname . '][value]" value="' . htmlspecialchars($value) .'" size="' . $inputsize . '" ';
                     if (($column[ 'size' ] <= 256) && (($column[ 'type' ] == 'VARCHAR') || ($column[ 'type' ] == 'VARCHAR2')))
                       echo 'maxlength="' . $column[ 'size' ] . '" ';
                     echo '/></nobr><br />' . "\n";

                     echo '<nobr><input type="radio" name="insert[' . $columnname . '][mode]" value="function" ' . ($nul ? 'checked="checked" ' : '') . '/> ' . "\n";
                     echo 'Function: <input type="text" name="insert[' . $columnname . '][function]" value="' . ($nul ? 'NULL' : '') .'" size="10" /></nobr>' . "\n";

                     echo '</td>' . "\n";
                    }
                } // end if (isset($_REQUEST[ 'showinsert' ]))
               elseif ($_SESSION['states']->entrymode == 'popups')
                 echo
                 '<td colspan="' . (count($columns) + 2) . '">'
                      .' <a href="' . $_SERVER[ 'PHP_SELF' ]
                              . '?sid=' . '$sid'
                              . '&showinsert=1#insertrow" '
                          .'title="Klik = dodati novi redak u '
                              . htmlspecialchars($_SESSION['states']->table)
                      . '">' . 'Dodati redak'
                      .'</a>'.
                   '</td>';

               echo '</tr>' . "\n";
            } // if ($action == '') <---- new_rec

            echo '</table>' . "\n";

            echo '<table class="gridfooter"><tr><td>' . "\n";

            if ($_SESSION['states']->set > 1)
              { echo '<a href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid' . '&set=1" accesskey="f" title="Click here to go to the first page [f]">|&lt;</a> ';
               echo '<a href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid' . '&set=' . ($_SESSION['states']->set - 1) . '" accesskey="p" title="Click here to go to the previous page [p]">&lt;&lt;</a> ';
              }

            echo 'Page ' . $_SESSION['states']->set;

            if ($morerows)
              echo ' <a href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid' . '&set=' . ($_SESSION['states']->set + 1) . '" accesskey="n" title="Click here to go to the next page [n]">&gt;&gt;</a>';

            echo '</td></tr></table>' . "\n";
      */


      //$this->pof_closecursor($cursor);
    //}




/*
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .'Coding step cs04. ~~~~~~~~~~~~~~~~~~~~~~~~~~~~';
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET);
                  echo '<b>$_POST</b>='; print_r($_POST);
                  echo '<b>$_SESSION</b>='; print_r($_SESSION);
                  echo '<br /><b>$this->pp1</b>='; print_r($this->pp1);
                  //echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']);
                  //echo '<br /><b>uri_arr is exploded string REQUEST_URI '.$_SERVER['REQUEST_URI'].' (on QS=?)</b>'
                  //.'<br />0 is $module_relpath,'
                  //.'<br />1 is $uri_qrystring=key-value pairs ee=url parameters after QS.'
                  //.'  <br />$this->pp1->uri_arr='; print_r($this->pp1->uri_arr);
                  //echo '<br /><b>exploded $uri_qrystring (on /) is'
                  //.'<br />$this->pp1->uri_qrystring_arr</b>=';
                  //    print_r($this->pp1->uri_qrystring_arr);
                           ////echo '<br /><b>key-value pairs in one assoc arr line =  $u riq</b>='; print_r($u riq);
                  echo '<br /><b>$this->uriq</b>='; print_r($this->uriq);
                  echo '</pre>';
                  }



   //******************************************
   // FTR01. History popup (drop-down lista) iz $_SESSION['states']->history
   //******************************************
   echo '<table class="selectform"><tr><td>' . "\n";
   echo 'History: <select name="history" '
        .'onChange="javascript:document.forms[0].submit()" '
      .'title="Izbor prijašnje SQL naredbe">' . "\n";
        echo '<option value="" selected="selected"> </option>' . "\n";
        foreach ($_SESSION['states']->history as $key => $item)
            echo '<option value="' . $key . '">' . htmlspecialchars(substr($item[ 'sql' ], 0, 100))
         . '</option>' . "\n";
   echo '</select>' . "\n";
   echo '</td></tr></table>' . "\n";

   //******************************************
   // FTR02. Hidden fields for the currently edited record
   //******************************************
   if (is_array($this->pp1->states->act_record))
     { echo '<input type="hidden" name="record[table]" value="'
         . htmlspecialchars($this->pp1->act_record[ 'table' ]) . '" />' . "<br />";
       echo '<input type="hidden" name="record[rowid]" value="'
        . htmlspecialchars($this->pp1->act_record[ 'rowid' ]) . '" />' . "<br />";
      if ($action != '')
        echo '<input type="hidden" name="action" value="' . $action . '" />' . "<br />";
     }

   //******************************************
   // FTR03 TABLICA 1RED X 3STUPCA
   //******************************************
   echo '<table class="selectform"><tr>' //. "<br />"
   ;
         //<!-- *************************************
         // link "Drop cache" = stupac 1 = http://dev/oraed.php?sid=4ee38e91d1cf0&dropcache=1
         //****************************************** -->
   echo '<td valign="top">'
              .'<a href="' . $_SERVER[ 'PHP_SELF' ] .'?sid=' . '$sid' .'&dropcache=1"'
           .' title="Force a re-read of table definitions (after altering tables).">'.
           'Drop DDL cache</a></td>' //. "<br />"
           ;

         //<!-- *************************************
         // link "D ebug" = stupac 2 = http://dev/oraed.php?sid=4ee38e91d1cf0&debug=1
         //****************************************** -->
   echo '<td valign="top"> &nbsp; <a title="Switch SQL statesment logging on or off" '
             .'href="' . $_SERVER[ 'PHP_SELF' ] . '?sid=' . '$sid' . '&debug=';
             if ($_SESSION['states']->debug) 
               echo '0">Isključiti debug mode'; 
             else echo '1">Uključiti debug mode';
   echo '</a><br />(Logs SQL statements in ini_get(\'error_log\')='.'<br />'
          . ini_get('error_log') . ')</td>' //. "<br />"
   ;


         //<!-- *************************************
         // Oracle environment variables stupac 3
         //****************************************** -->
      echo '<td halign="left" valign="top">
      Oracle environment variables:<br />'
      .'ORACLE_SID='      . getenv('ORACLE_SID') .'<br />'
      .'NLS_LANG='        . getenv('NLS_LANG') .'<br />'
      .'NLS_DATE_FORMAT=' . getenv('NLS_DATE_FORMAT') //.'<br />'
      ;
      echo '</td>';
   echo '</tr></table>';  ///////////////// kraj footer 1 = TABLICA 1RED X 3STUPCA ////////////
*/
/*
      $env_vars = array( 'ORACLE_SID', 'NLS_LANG', 'NLS_DATE_FORMAT' );
      $first = true;
      foreach ($env_vars as $env_var)
       { $val = getenv($env_var);
         if ($val === false) continue;
         if (! $first) echo '<br />';
         echo sprintf("%s=%s\n", $env_var, $val);
         $first = false;
       }
*/






   //******************************************
   // 29.1 crUd: Update record if requested
   //******************************************
/*
   if (($action == 'edit') && isset($_REQUEST[ 'editsave' ]) && is_array($this->pp1->act_record) && isset($_REQUEST[ 'edit' ]))
     if (is_array($_REQUEST[ 'edit' ]))
      if (count($_REQUEST[ 'edit' ]) > 0)
        { $sql = 'update ' . $this->pp1->act_record[ 'table' ] . ' set ';
         $i = 0;
         $bind = array();

         foreach ($_REQUEST[ 'edit' ] as $fieldname => $field)
           { if (! (isset($field[ 'mode' ]) && isset($field[ 'value' ]) && isset($field[ 'function' ])))
              continue;

            if ($i > 0)
              $sql .= ', ';

            $sql .= $fieldname . '=';

            if ($field[ 'mode' ] == 'function')
              $sql .= $field[ 'function' ];
            else
              { $sql .= ':' . $fieldname;
               $bind[ $fieldname ] = $field[ 'value' ];
              }

            $i++;
           }

         $sql .= ' where ROWID=chartorowid(:rowid_)';
         if ($_SESSION['states']->debug) error_log($sql);

         $bind[ 'rowid_' ] = $this->pp1->act_record[ 'rowid' ];

         echo $this->pof_sqlline_msg($sql . ';');

         $updcursor = ociparse($conn, $sql);

         if (! $updcursor)
           { $err = ocierror($conn);
            if (is_array($err))
              echo $this->pof_sqlline_msg('Parse failed: ' . $err[ 'message' ], true);
           }
         else
           { foreach ($bind as $fieldname => $value)
              ocibindbyname($updcursor, ':' . $fieldname, $bind[ $fieldname ], -1);

            $ok = ociexecute($updcursor);

            if (! $ok)
              { $err = ocierror($updcursor);
               if (is_array($err))
                 echo $this->pof_sqlline_msg('oci execute($updcursor) err: ' . $err[ 'message' ], true);
              }

            ocifreestatesment($updcursor);
           }
        }
*/
   //******************************************
   // 29.2 cruD: Delete record if requested
   //******************************************
/*
   if (($action == 'delete') && isset($_REQUEST[ 'deleteconfirm' ]) && is_array($this->pp1->act_record))
     { $sql = 'delete from ' . $this->pp1->act_record[ 'table' ] . ' where ROWID=chartorowid(:rowid_)';
      if ($_SESSION['states']->debug) error_log($sql);

      echo $this->pof_sqlline_msg($sql . ';');

      $delcursor = ociparse($conn, $sql);

      if (! $delcursor)
        { $err = ocierror($conn);
         if (is_array($err))
           echo $this->pof_sqlline_msg('Parse failed: ' . $err[ 'message' ], true);
        }
      else
        { ocibindbyname($delcursor, ':rowid_', $this->pp1->act_record[ 'rowid' ], -1);

         $ok = ociexecute($delcursor);

         if (! $ok)
           { $err = ocierror($delcursor);
            if (is_array($err))
              echo $this->pof_sqlline_msg('oci execute($delcursor) err: ' . $err[ 'message' ], true);
           }

         ocifreestatesment($delcursor);
        }

      $action = '';
      $this->pp1->act_record = false;
     }
*/
   //******************************************
   // 29.3 Crud:  Insert record if requested
   //******************************************
/*
   if (isset($_REQUEST[ 'insertsave' ]) && isset($_REQUEST[ 'insert' ]))
     if (is_array($_REQUEST[ 'insert' ]))
      if (count($_REQUEST[ 'insert' ]) > 0)
        { $fieldnames = array();
         $fieldvalues = array();
         $bind = array();

         foreach ($_REQUEST[ 'insert' ] as $fieldname => $field)
           { if (! (isset($field[ 'mode' ]) && isset($field[ 'value' ]) && isset($field[ 'function' ])))
              continue;

            $fieldnames[ ] = $fieldname;

            if ($field[ 'mode' ] == 'function')
              $fieldvalues[ ] = $field[ 'function' ];
            else
              { $fieldvalues[ ] = ':' . $fieldname;
               $bind[ $fieldname ] = $field[ 'value' ];
              }
           }

         $sql = 'insert into '
               . $_SESSION['states']->table
               . ' (' . implode(', ', $fieldnames) . ') '
               .'values (' . implode(', ', $fieldvalues) . ')';
         if ($_SESSION['states']->debug) error_log($sql);

         echo $this->pof_sqlline_msg($sql . ';');

         $inscursor = ociparse($conn, $sql);

         if (! $inscursor)
           { $err = ocierror($conn);
            if (is_array($err))
              echo $this->pof_sqlline_msg('Parse failed: ' . $err[ 'message' ], true);
           }
         else
           { foreach ($bind as $fieldname => $value)
              ocibindbyname($inscursor, ':' . $fieldname, $bind[ $fieldname ], -1);

            $ok = ociexecute($inscursor);

            if (! $ok)
              { $err = ocierror($inscursor);
               if (is_array($err))
                 echo $this->pof_sqlline_msg('oci execute($inscursor) err: ' . $err[ 'message' ], true);
              }

            ocifreestatesment($inscursor);
           }
        }
*/


   //******************************************
   // 29.4 cRud: Run SELECT statesment, display results
   //******************************************
   //if ((($_SESSION['states']->table != '') || ($_SESSION['states']->sql != '')) && (! $dont_execute))
   //{

      //echo $this->pof_sqlline_msg($main_sql . ';');

      //if ($_SESSION['states']->debug) error_log($main_sql);

      /*if ($_SESSION['states']->entrymode == 'popups')
        $pk = $this->pof_getpk($_SESSION['states']->table);
      else $pk = ''; */

      /*
                   //$cursor = $this->pof_opencursor($main_sql);
      if ($cursor = $db->all($sql, "Get main_sql crud select")) $ok = true;

      $statementtype = '';
      if ($cursor)
        { // Add to history
         // Remove ROWID select string from the SQL string displayed in the history - it's just ugly

         if ($_SESSION['states']->entrymode == 'popups')
           $histsql = str_replace($rowidsql, '', $main_sql);
         else
           $histsql = $main_sql;

         foreach ($_SESSION['states']->history as $key => $item)
           if ($item[ 'sql' ] == $histsql)
            unset($_SESSION['states']->history[ $key ]);

         $statementtype = ocistatementtype($cursor);

         $historyitem = array(
            'sql'       => $histsql,
            'set'       => $_SESSION['states']->set,
            'blk_rowsnum'   => $_SESSION['states']->blk_rowsnum,
            'entrymode' => $_SESSION['states']->entrymode,
            'type'      => $statementtype
            );

         if ($_SESSION['states']->entrymode == 'popups')
           { $historyitem[ 'table'   ] = $_SESSION['states']->table;
            $historyitem[ 'select'  ] = $_SESSION['states']->select;
            $historyitem[ 'where'   ] = $_SESSION['states']->where;
           }

         array_unshift($_SESSION['states']->history, $historyitem);

         if (count($_SESSION['states']->history) > 25)
           array_pop($_SESSION['states']->history);
        }
        */

