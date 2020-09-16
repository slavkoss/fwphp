<?php
// http://php.net/manual/en/functions.arguments.php
$a = 5;
$b = 9;
$c = 15;
function myFunction($a,$b){
///global $a,$b;
$c = $a + $b ;
echo 'Hello World ' .$c. ' a is '.$a.' b is '.$b.'<BR>';
///return $str;
}
for($i=0;$i<$c;$i++){
    myFunction($a,$b);
$a++;
$b++;
}
//echo '<div style="padding:15px;">'.myFunction().'</div>';