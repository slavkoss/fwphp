<?php
$a = 'C';
$b = 4;
//echo ($a === $b) ? 'EQUAL' :'NOT EQUAL';
switch ($a) {
case "A" :
echo $a . " is equal to A";
break;
case "B" :
echo $a . " is equal to B";
break;
case "C" :
echo $a . " is equal to C";
break;
case "D" :
echo $a . " is equal to D";
break;
default :
echo "no value for a was a case";
break;
}
/*
if($a == $b ){
    $c = 'EQUAL';
} elseif($a>$b)
{
    $c = 'a is larger than b';
} elseif($a<$b){
      $c = 'B is larger than A';
}
else {
    echo ' this is a default value <BR>';
    $c = 'NOT EQUAL';
}
echo $c;
PHP ternary operator
$x = condition ? value if true : value if false;
if (condition) {
   code if true
} else {
   code if false
}
*/
