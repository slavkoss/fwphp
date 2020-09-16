<?php
$i = 1;
do {
echo 'the current value of $i is '.$i.'<BR>';
$i++;
}
while ($i <= 10);
/*
while ($i <= 10) {
    echo 'the current value of $i is '.$i.'<BR>';
    $i++;
}
*/




//    L  O O P  E X A M P L E S
for($i = 1;$i <= 10; $i++){ 
   echo 'the current value of $i is '.$i.'<BR>';  
} 
 
http://php.net/manual/en/control-structures.while.php 
<?php 
/* example 1 */ 
 
$i = 1; 
while ($i <= 10) { 
    echo $i++;  /* the printed value would be 
                   $i before the increment 
                   (post-increment) */ 
} 
 
/* example 2 */ 
 
$i = 1; 
while ($i <= 10): 
    echo $i; 
    $i++; 
endwhile; 
?> 
http://php.net/manual/en/control-structures.do.while.php 
<?php 
$i = 0; 
do { 
    echo $i; 
} while ($i > 0);
