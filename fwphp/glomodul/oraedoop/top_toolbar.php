<?php
//******************************************
// 1.   Display first (violet) header
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
      ' - <a style="background:lightgray;" 
             href="' . $this->pp1->logout //$_SERVER[ 'PHP_SELF' ]
        //. '?sid=' . '$sid' . '&d isconnect=1' 
        .'" accesskey="d" title="Click here to log out [d]">Odjava</a>';
?>


<table class="headerline">
  <tr><td>
    <span class="logo">Editor</span>
    Prijavljeni ste na Oracle kao <b><?="$usr_tmp $DBname_tmp $link_odjava_tmp"?></b>
  </td></tr>
</table>
<!--  //////////////////////////////////////// kraj toolbar 1. red -->



<form name="tblhdr_frm" id="tblhdr_frm" method="post" 
      action="<?=$this->pp1->filter_page?>1/">
<?php
//******************************************
// 2.  27. TOOLBAR RED GUMBA :
//******************************************
// Prikazati - "blk_rowsnum" selection popup, Submit butt. Refresh, E xport 
        //onChange="javascript:document.forms[0].submit()"
?>
<table class="selectform">
<tr><td>
    Prikazati <select name="blk_rowsnum"
      onChange="javascript:document.getElementById('tblhdr_frm').submit();"
      title="Izaberite broj redaka na stranici (\$blk_rowsnum from \$blk_rowsnums)"
    >
   <?php
   foreach ($this->pp1->states->blk_rowsnums as $blk_rnum)
     { echo '<option value="' . $blk_rnum . '"';
       if ($blk_rnum == $_SESSION['states']->blk_rowsnum) echo ' selected="selected"';
       echo '>' . $blk_rnum . '</option>' ;
     }
   echo '</select> redaka po stranici ' ;

   // Submit buttoni Refresh i E xport :
   echo '<input type="submit" accesskey="e" value="'
      . ($_SESSION['states']->entrymode == 'popups' ? 'Refresh' : 'Execute')
  . '" title="Click here to execute the SQL statesment [e]" />' . "";

   echo ' &nbsp; <input type="submit" accesskey="x" name="export" value="Export"'
           .' title="Click here to export rows as text, XML or CSV [x]" />' . "";


   // L I N K  R U C N I  UNOS  S Q L-A:
   echo str_repeat('&nbsp;', 6);
   echo '<a href="' . $_SERVER[ 'PHP_SELF' ]
      . '?sid=' . '$sid'
  . '&entrymode=' . ($_SESSION['states']->entrymode == 'popups' ? 'manual' : 'popups')
  . '" accesskey="s" title="Click here to switch between manual SQL entry and the table/view popup [s]">';
   
   //echo ($_SESSION['states']->entrymode == 'popups' ? 'Ruƒçni unos SQL-a : ' : 'Popup-unos SQL-a : ') . '</a>' . "\n";

   //////////////////////////////////////////// kraj toolbar 2. red
   ?>
</td></tr>

<tr><td>



<?php
   //******************************************
   // 3.   28. IME TABLICE I WHERE KLAUZULA - toolbar red selecta :
   //******************************************

    if ($_SESSION['states']->entrymode == 'popups'):
    { 
        // --------------------------------------
        // Popup-aided SQL query entry
        // --------------------------------------
        //***********************************
        // "t able" selection popup
        //***********************************
        // "s elect" (column list) i n p u t field
        $c_alltables = $this->pof_gettables($this);
        $c_allviews  = $this->pof_getviews($this);
                        //.'onChange="javascript:document.forms[0].submit()" '
        //<input type="text" name="select"
        ?>
        SELECT <input type="text" name="select"
          value="<?=htmlspecialchars($_SESSION['states']->select)?>" size="20"
          title="Unesite imena stupaca tablice (comma-separated), ili * za sve kolone tablice" />
        FROM <select name="table"
           onChange="javascript:document.getElementById('tblhdr_frm').submit();"
           title="Izaberite tablicu/view za uËitavanje / mjenjanje">

            <option value="">[Izaberite tablicu:]</option>
            <?php
            $found = false;
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
        ?>WHERE, ORDER BY... <input type="text" name="where"
            value="<?=htmlspecialchars($_SESSION['states']->where)?>"
            size="40" title="Unesite WHERE, GROUP BY, ORDER BY uvjete upita" />

        <br />
        <input type="submit" accesskey="r" name="exewholeqry" value="Execute qry"
               title="Click here to execute query" />
        <input type="text" name="WHOLEQRY"
          value="
SELECT <?=htmlspecialchars($_SESSION['states']->select)?> 
FROM <?=htmlspecialchars($_SESSION['states']->table)?>
"
          size="100"
          title="Unesite cijeli SQL QRY" />

        <?php

      //////////////////////////////////////////// kraj toolbar 3. red
   } // end ($_SES SION[ 'entry mode == 'pop ups')
   else:
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
  } endif; // Popup-aided / Manual SQL query/command entry
   //////////////////////////////////////////// kraj toolbar red selecta
     ?>


    <?=$this->pof_sqlline_msg(' ')?> <!--//'err' or 'info'-->


</td></tr></table>
</form>