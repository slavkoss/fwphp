<?php
//J:\awww\apl\dev1\afwww\glomodul\help\eurojp.php
//Igrači moraju izabrati pet glavnih brojeva između 1 i 50.
//Igrači moraju izabrati dva dodatna Euro broja između 1 i 10.

// htmlspecialchars($line)   highlight_string "<b>{$line_num}</b> "

/*
#J:\awww\apl\dev1\afwww\glomodul\help\eurojp.txt
#https://www.euro-jackpot.net/hr/rezultati-arhiva-2018
#
20180105 2 7 38 40 45 7 10
20180112 16 17 25 40 44 2 9
20180119 3 9 17 45 47 4 9
20180126 10 23 26 29 35 3 5
#
20180202 15 24 29 33 41 7 8
20180209 7 8 24 34 46 4 8
20180216 4 8 19 25 44 9 10
20180223 18 26 33 42 46 4 10
#
*/

?>
<h2>Five main numbers 1 to 50 and two Euro numbers 1 to 10</h2>


<?php
$lines_tmp = file('eurojp.txt') ;

$ii=0; foreach ($lines_tmp as $line_num => $line) 
{
  if (substr($line,0,1) <> '#') { $ii++; $lines[$ii] = $line ;} ;
}

$lines_count = count($lines) ;
echo 'Lines (ee weeks) count : '. $lines_count . '<br />' ;
echo 'How lines (ee weeks) look like : ' . '<br />' ;
//
$num_last_datums = [];
$numeuro_l_datums = [];

$line_ordno = 1;
foreach ($lines as $line_num => $line) 
{
  // comments are not in line_ ordno
  //if (substr($line,0,1) == '#') {goto next_line ;}
  
  if ( $line_ordno > 1 and $line_ordno < ($lines_count - 4) ) {goto process_line ;}
  
  echo $line . '<br />' ;
  
  process_line:
  
  if ($line_ordno == 2) echo '...<br />' ;
  $line_ordno_val = explode(' ', $line);
  //echo '<pre>$line_ordno_val=' ; print_r($line_ordno_val); echo '</pre>' ;
                /*
                20180330 5 15 17 29 32 5 7

                $line_ordno_val=Array
                (
                    [0] => 20180330
                    [1] => 5
                    [2] => 15
                    [3] => 17
                    [4] => 29
                    [5] => 32
                    [6] => 5
                    [7] => 7
                )
                */
      foreach ($line_ordno_val as $col_ordnum => $col_val) 
      {
        if ($col_ordnum == 0) $datum = $col_val;
        else 
          if ($col_ordnum < 6) $num_last_datums[rtrim($col_val)] = $datum;
          else $numeuro_l_datums[rtrim($col_val)] = $datum;
      }
      

  $line_ordno++;
  
  next_line:
}


//usort($num_last_datums, "cmp");
//$tmp_arr = sort($num_last_datums) ; // indexes are lost
asort($num_last_datums) ; 
asort($numeuro_l_datums) ; 
                    /*$num_last_datums2 = [];
                    $ii=0; foreach ($tmp_arr as $idx => $datum) 
                    {
                      $num_last_datums2[$num_last_datums[]] = $datum ;} ;
                      $ii++; 
                    } */


echo '<h2>Number last appeared in week</h2>' ;
//echo '<pre>$num_last_datums=' ; print_r($num_last_datums); echo '</pre>' ;
$ii=0; foreach ($num_last_datums as $num => $last_datum) 
{
  echo str_pad($num, 2, "0", STR_PAD_LEFT) . ' &nbsp;&nbsp;&nbsp; ' . $last_datum .'<br />' ;
  $ii++; 
}

echo '<h2>EURO Number last appeared in week</h2>' ;
//echo '<pre>$num_last_datums=' ; print_r($num_last_datums); echo '</pre>' ;
$ii=0; foreach ($numeuro_l_datums as $num => $last_datum) 
{
  echo str_pad($num, 2, "0", STR_PAD_LEFT) . ' &nbsp;&nbsp;&nbsp; ' . $last_datum .'<br />' ;
  $ii++; 
}

echo '<br />' ;
echo '<br />' ;
echo '<br />' ;




function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

/*

//This will take array([5] => "test1", [4] => "test2", [9] => "test3") 
//into array([0] => "test1", [1] => "test2", [2] => "test3") so you can access it easier.
 function normalize_array($array){
   $newarray = array();
   $array_keys = array_keys($array);
   $i=0;
   foreach($array_keys as $key){
    $newarray[$i] = $array[$key];
    
   $i++;
   }
   return $newarray;
 } 




$array = array(0 => 100, "color" => "red");
print_r(array_keys($array));

$array = array("blue", "red", "green", "blue", "blue");
print_r(array_keys($array, "blue"));

$array = array("color" => array("blue", "red", "green"),
               "size"  => array("small", "medium", "large"));
print_r(array_keys($array));
?>  


The above example will output:


Array
(
    [0] => 0
    [1] => color
)
Array
(
    [0] => 0
    [1] => 3
    [2] => 4
)
Array
(
    [0] => color
    [1] => size
)


See Also
array_values() - Return all the values of an array
array_combine() - Creates an array by using one array for keys and another for its values
array_key_exists() - Checks if the given key or index exists in the array
array_search() - Searches arr for given val, returns first corresponding key if success

*/