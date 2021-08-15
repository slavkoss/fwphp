<?php
// code behind  f o r m   -  C R U D  c u r s o r s :
function buildqry_add_ed(
   $db, $idname, $flds, $tbl //, $postedfrm
) 
{
    $postedfrm = $_POST ;
    $values = array();
    //if (! empty($postedfrm[$idname]))
    if ($postedfrm['crud'] == 'u')
    { // U  P  D
      $update_flds = array();
      foreach ($flds as $fld) {
        $update_flds[] = "$fld = ?";
        $values[] = $postedfrm[$fld]; // Assume data from form
      }
      // Add key field's value to $values array
      $values[] = $postedfrm[$idname];
      $dml = "UPDATE $tbl SET "
        . implode(',', $update_flds) . " WHERE $idname = ?";
                            if(TEST) 
                            {echo '<b>(ln '.__LINE__.'), '.__FILE__.' SAYS:</b><pre>';
                            echo '***U P D $ d m l=';  print_r($dml);
                            echo '<br />'.'Placeholders values='; print_r($values);
                            echo '</pre>';}
                            
      $st = $db->prepare($dml);
    } else // I N S   if (empty($postedfrm[$idname]))
    {
      switch ($postedfrm['idcre_way']) 
      {
        case 'dbgenerated':
        // key_ fld_ val = NULL If your DB is set to generate it :
        break;
        case 'entered':
          $idval = $postedfrm[$idname];
        break;
        case 'increment':
        // c r e  i d v a l  if we do not have sequence (autoincreament):
            $sql = "SELECT nvl(max($idname),0) FROM $tbl";  //$q = self::getConn()->query($sql);
            $q = $db->query($sql); 
            $idval = $q->fetchColumn() + 1; 
            $q->closeCursor();
                           if(TEST) {echo '<b>(ln '.__LINE__.'), '.__FILE__.' SAYS:</b><pre>';
                           echo 'For i n s  n e w  $idval='; print_r($idval); echo '</pre>';}

          $postedfrm[$idname] = $idval; // md5(uniqid()); $placeholders = array('?');
        break;
      } // e n d  idcre_ way

      foreach ($flds as $fld) {
        $placeholders[] = '?';
        // Assume data from form :
        $values[] = $postedfrm[$fld];
      }
      $dml = "INSERT INTO $tbl (".implode(',',$flds) . ')'
            .' VALUES (' . implode(',',$placeholders) .')';
                          if(TEST) { echo '<b>(ln '.__LINE__.'), '.__FILE__
                            .' SAYS:</b><pre>';
                          echo '<br />'.'$ _ P O S T='; print_r($postedfrm);
                          echo 'I N S  $ d m l=';  print_r($dml);
                          echo '<br />'.'$ key_ fld_ val='; print_r($idval);
                          echo '<br />'.'Nonamed placeholders values='; print_r($values);
                          echo '</pre>'; }
      $st = $db->prepare($dml);
    }

    $st->execute($values);
    return $st;
}

function print_link($inactive,$text,$offset='')
{
    if ($inactive) {
        print "<span class='inactive'>$text</span>";
    } else {
        print "<span class='active'>".
              "<a href='" . PHPSELF .
              "?offset=$offset'>$text</a></span>";
    }
}

function indexed_links($total,$offset,$per_page)
{
    $separator = ' | ';
    //
    print_link($offset == 1, '<< Preth', max(1, $offset - $per_page));
    // print all groupings except last one
    for ($start = 1, $end = $per_page;
         $end < $total;
         $start += $per_page, $end += $per_page) {
             print $separator;
             print_link($offset == $start, "$start-$end", $start);
    }
    /* print the last grouping -
     * at this point, $start points to the element at the beginning
     * of the last grouping
     */
    /* the text should only contain a range if there's more than
     * one element on the last page. For example, the last grouping
     * of 11 elements with 5 per page should just say "11", not "11-11"
     */
    $end = ($total > $start) ? "-$total" : '';
    print $separator;
    print_link($offset == $start, "$start$end", $start);
    //
    print $separator;
    print_link($offset == $start, 'Sljed >>',$offset + $per_page);
}
