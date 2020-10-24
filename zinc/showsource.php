<?php
$ds = DIRECTORY_SEPARATOR ;
// http://dev1:8083/zinc/showsource.php?file=J:/awww/www/fwphp/glomodul/mkd/02/02_domain_model/DM_Gervasio_part2.txt&line=55&next=171
// J:\awww\www\zinc\showsource.php
//http://dev1:8083/fwphp/glomodul/mkd/?showhtml=02/02_domain_model/DM_Gervasio_part2.txt

// if no param. displays this script code :
      switch (true) {
        case isset($file) and $file > '' :
          $file = str_replace('\\','/', $file);
          break;
        case isset($_GET['file']) and $_GET['file'] > '' :
          $file = str_replace('\\','/', $_GET['file']);
          break;
        default :
          $file = str_replace('\\','/', $_SERVER['SCRIPT_FILENAME']) ;
      }

//echo basename($file) ; 
//bgcolor="lightgray"
//<div class="jumbotron jumbotron-fluid">
?>

<div class="container">
<?php
//bgcolor="#E0E0E0"
//Cezary Tomczak http://gosu.pl/software/mygosulib.html
// $_GET and $_REQUEST  are already decoded
//echo $file;

$id = @$_GET['id'] ? $_GET['id'] : '[???]';
//
$line = isset($_GET['line']) ? $_GET['line'] : 1;
$prev = isset($_GET['prev']) ? $_GET['prev'] : 10000;
$next = isset($_GET['next']) ? $_GET['next'] : 10000;

//NE: require_once($_SERVER['DOCUMENT_ROOT'].'/inc/utl/view_fn.inc');
  //if ($prev != 10000 || $next != 10000) {
$shows_path = str_replace('/',$ds
                , $_SERVER['SCRIPT_FILENAME']
                //, $file
);


        //echo "<h4>XXXXXXXXX $file</h4>" ;
// ispisan je dio koda <font color="#FF00FF">$id</font>
// $_SERVER[PHP_SELF] je index.php
?>
<p class="lead">
 Code of script : <strong><?=$file?></strong> šđčćž 
 <br />
 Displayed by PHP script <?=__FILE__?> called from 
 <a href="<?=$_SERVER['PHP_SELF']?>"?file=<?=$file?>&line=<?=$line?>&prev=10000&next=10000><?=$shows_path?></a>

 <br />

<?php
//.urlencode($file) <pre>
//.'&next=10000#'.($line - 15)
//.urlencode($file)
  //}

showSource($file, $line, $prev, $next);


// ********************************************************
//<div style="font-family: tahoma; font-size: 1em;">
function showSourceLnk($id, $file, $lcurr = 10, $lprev = 10, $lnext = 10) {
?>
<a href="/util/ShowSource.php
     ?file=$file&amp;id=$id&amp;line=$lcurr&amp;prev=$lprev&amp;next=$lnext"
   target="_blank"><?=$id?></a> u <?=$file?></div>
</p>

<?php
}

function showSource($file, $line, $prev = 10, $next = 10) 
{
  if (!(file_exists($file) && is_file($file))) {
      return trigger_error( 
          "showSource(): ne postoji skripta ~~~".$file.'~~~'
                            , E_USER_ERROR);
      return false;
  }
       $wai = __FILE__ .' lin='. __LINE__ .' fn='. __FUNCTION__ .'()'.' cls=' .__CLASS__ ;
  //read code
  ob_start();

  
  highlight_file($file);


  $data = ob_get_contents();
  ob_end_clean();

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

       if (0) { //($p1['kon']['test']) {
       echo '<pre style="font-size:1.1em">'.'<strong>'. $wai;
          echo "\nfile=" . $file; //print_r($utl->ubitsget()); //var_dump
          echo "\nline=" . $line .' prev=' . $prev .' next=' . $next;
          echo " count=" . $count .' start=' . $start .' end=' . $end;
       echo '</strong></pre>';
       }
  
  //color for numbering lines
  $highlight_default = ini_get('highlight.default');

  //displaying

  ?>
  <table cellspacing="0" cellpadding="0">
  <?php
    while ($start <= $end) {
      echo '<tr>' ;

        echo '<td style="font-size: 1.2em; vertical-align: top;"><span>' 
           . $start . ' &nbsp; </span></td>';

        echo '<td style="font-size: 1.2em; vertical-align: top;"><span>' 
           . $data[$start - 1] . '</span></td>';

      echo '</tr>' ;
        ++$start;
    }
  ?>
  </table>
  <?php





  if ($prev != 10000 || $next != 10000) {
      echo '<div style="font-family: tahoma; font-size: 16px;">';
      echo '<br /><a
        href="'.@$_SERVER['PHP_SELF']
               .'?file='.urlencode($file).'&line='.$line
               .'&prev=10000&next=10000#'.($line - 15).'">View Full Source</a>' ;
      print "</div>";
  }

}

function txt2file($filecontent, $filename, $show_msg = '', $msg = '') {
  if (!$handle = fopen($filename, 'wt')) {
       //echo "Ne mogu otvoriti ($filename)";
       return("Ne mogu otvoriti datoteku ($filename)"); //exit;
  }
  if (fwrite($handle, $filecontent) === FALSE) {
      //echo "Ne mogu upisivati u ($filename)";
      return("Ne mogu upisivati u datoteku ($filename)"); //exit;
  } fclose($handle); return ($show_msg == 'show_msg') ? $msg : '';
}
// http://php.net/manual/en/language.variables.scope.php
function next_rbr()
{ // static var exists only in local fn scope, but it does not lose 
// its value when program execution leaves this scope
// Static declarations are resolved in compile-time.
  static $a = 0;
  echo $a;
  $a++;
}
function test_recursion()
{
  static $count = 0;
  $count++;
  echo $count;
  if ($count < 10) {
      test();
  }
  $count--;
}

///////////////////////////


?>

</div>
