<?php
// http://dev:8083/test/books/a01cookbook/
// J:\dev_web\htdocs\test\books\a01cookbook\zodiac.php

    // ***********************************
    // 1. M O D E L - file  w h e r e  b u i l d_ q u e r y ( )  is defined
    // ***********************************
include __DIR__ . '/dbconn.php';
$fields = array(
   'sign'
 , 'symbol'
 , 'planet'
 , 'element'
 , 'start_month'
 , 'start_day'
 , 'end_month'
 , 'end_day'
);
$lbls = array(
    'Znak'
  , 'Simbol'
  , 'Planeta'
  , 'Element'
  , 'Od mjeseca'
  , 'Od dana'
  , 'Do mjeseca'
  , 'Do dana'
);

include __DIR__ . '/mdl.php';
//$db = new PDO('sqlite:zodiac.sqlite');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // ***********************************
    // 2. C O N T R O L L E R
    // ***********************************
$cmd = isset($_REQUEST['cmd']) ? $_REQUEST['cmd'] : 'show';
switch ($cmd) 
{
   case 'edit':
       try {
          $st = $db->prepare('SELECT ' . implode(',',$fields) .
                             ' FROM zodiac WHERE id = ?');
          $st->execute(array($_GET['id']));
          $row = $st->fetch(PDO::FETCH_ASSOC);
       } catch (Exception $e) {
           $row = array();
       }
   case 'add':
           print '<form method="post" action="' .
                 htmlentities($_SERVER['PHP_SELF']) . '">';
           print '<input type="hidden" name="cmd" value="save">';
           
           print '<table>';
           
           if ('edit' == $cmd) {
               printf('<input type="hidden" name="id" value="%d">',
                      $_GET['id']);
           }
           foreach ($fields as $field) {
               if ('edit' == $cmd) {
                  $value = htmlentities($row[$field]);
               } else {
                   $value = '';
               }
               printf('<tr><td>%s: </td><td><input type="text" name="%s" value="%s">',
                      $field, $field, $value);
               printf('</td></tr>');
           }
           print '<tr>
                <td></td>
                <td><input type="submit" value="Save"></td>
              </tr>';
           
           print '</table></form>';
           break;
   case 'save':
           try {
             $st = build_query($db,'id',$fields,'zodiac');
             print 'Added info.';
           } catch (Exception $e) {
             print "Couldn't add info: " . htmlentities($e->getMessage());
           }
           print '<hr>';
   case 'show':
          // ***********************************
          // 3. V I E W - P A G I N A T O R
          // ***********************************
       default:
           $self = htmlentities($_SERVER['PHP_SELF']);
           
           /* without P A G I N A T O R :
           foreach ($db->query('SELECT id,sign FROM zodiac') as $row) {
               printf('<li> <a href="%s?cmd=edit&id=%s">%s</a>',
                      $self,$row['id'],htmlentities($row['sign']));
           }
           */
      $offset = isset($_GET['offset']) ? intval($_GET['offset']) : 1;
      if (! $offset) { $offset = 1; }
      $per_page = 10;
      $total = $db->query('SELECT COUNT(*) FROM zodiac')->fetchColumn(0);
      $limitedSQL = 'SELECT * FROM zodiac ORDER BY id ' .
                    "LIMIT $per_page OFFSET " . ($offset-1);
      $lastRowNumber = $offset - 1;

           print '<a href="'.$self.'?cmd=add">Dodati redak</a><hr />';
           print '<ol>';
      foreach ($db->query($limitedSQL) as $row) {
          $lastRowNumber++;
          //print "{$row['sign']}"
          
          printf('<li> <a href="%s?cmd=edit&id=%s">%s</a>',
                      $self,$row['id'],htmlentities($row['sign']));
          echo ", {$row['symbol']} ({$row['id']}) <br/>\n";
      }
          print '</ol>';
      //
      indexed_links($total,$offset,$per_page);
      print "<br/>";
      print "(Prikazani retci $offset - $lastRowNumber od $total)";
           //
           break;
} // e n d 
