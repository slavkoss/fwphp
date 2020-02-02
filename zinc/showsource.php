<!DOCTYPE HTML>
<html>
<head>
<title>
<?php
$ds = DIRECTORY_SEPARATOR ;
// http://dev/inc/utl/showsource.php
// J:\dev_web\htdocs\inc\utl\showsource.php
// ako nema param. datoteka ispise svoj kod:
$file = (isset($_GET['file'])
     ? str_replace('/',$ds, $_GET['file'])
     : str_replace('/',$ds, $_SERVER['SCRIPT_FILENAME']) );
$file = str_replace($ds.$ds
                   ,$ds, $file) ;
echo $file ; 
?>
</title>
<meta content="text/html;charset=UTF-8" http-equiv="Content-Type" />
</head>


<body bgcolor="white">
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
                  , $_SERVER['SCRIPT_FILENAME']);
// ispisan je dio koda <font color="#FF00FF">$id</font>  
echo <<<EOT
<div style="font-family: tahoma; font-size:14px;">       
   Kod skripte: <strong>$file</strong> šđčćž 
   <br />
   Kod skripte 
   <a href="$_SERVER[PHP_SELF]"?file=$file&line=$line&prev=10000&next=10000>$shows_path</a> koja prikazuje kod (za vlastiti kod ne slati joj param. "file=...", ne inkludira se view_fn.inc)
</div>
EOT;
//.urlencode($file) <pre>
//.'&next=10000#'.($line - 15)
//.urlencode($file)
    //}

showSource($file, $line, $prev, $next);

/* //staro:
$a = explode('&', $QUERY_STRING);
$i = 0;
while ($i < count($a)) {
    $b = split('=', $a[$i]);
    echo 'Value for parameter ', htmlspecialchars(urldecode($b[0])),
         ' is ', htmlspecialchars(urldecode($b[1])), "<br />\n";
    $i++;
}
*/



function showSourceLnk($id, $file, $lcurr = 10, $lprev = 10, $lnext = 10) {
echo <<<EOT
<div style="font-family: tahoma; font-size: 10px;">
  <a href="/util/ShowSource.php
       ?file=$file&amp;id=$id&amp;line=$lcurr&amp;prev=$lprev&amp;next=$lnext"
     target="_blank">$id</a> u $file</div>
EOT;
}

function showSource($file, $line, $prev = 10, $next = 10) {
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
         echo '<pre>'.'<strong>'. $wai;
            echo "\nfile=" . $file; //print_r($utl->ubitsget()); //var_dump
            echo "\nline=" . $line .' prev=' . $prev .' next=' . $next;
            echo " count=" . $count .' start=' . $start .' end=' . $end;
         echo '</strong></pre>';
         }
    
    //color for numbering lines
    $highlight_default = ini_get('highlight.default');

    //displaying
    echo '<table cellspacing="0" cellpadding="0"><tr>';
    echo '<td style="vertical-align: top;"><code style="background-color: #FFFFCC; color: #666666;">';

    for ($x = $start; $x <= $end; $x++) {
        echo '<a name="'.$x.'"></a>';
        echo ($line == $x ? '<font style="background-color: red; color: white;">' : '');
        echo str_repeat('&nbsp;', (strlen($end) - strlen($x)) + 1);
        echo $x;
        echo '&nbsp;';
        echo ($line == $x ? '</font>' : '');
        echo '<br />';
    }
    echo '</code></td><td style="vertical-align: top;"><code>';
    while ($start <= $end) {
        echo '&nbsp;' . $data[$start - 1] . '<br />';
        ++$start;
    }
    echo '</code></td>';
    echo '</tr></table>';

    if ($prev != 10000 || $next != 10000) {
        echo '<div style="font-family: tahoma; font-size: 14px;">';
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
</body>
</html>