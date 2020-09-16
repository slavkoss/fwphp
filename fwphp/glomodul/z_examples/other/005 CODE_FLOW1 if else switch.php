http://php.net/manual/en/control-structures.if.php 
<?php 
if ($a > $b) 
  echo "a is bigger than b"; 
?> 
http://php.net/manual/en/control-structures.else.php 
<?php 
if ($a > $b) { 
  echo "a is greater than b"; 
} else { 
  echo "a is NOT greater than b"; 
} 
?> 
http://php.net/manual/en/control-structures.elseif.php 
<?php 
if ($a > $b) { 
    echo "a is bigger than b"; 
} elseif ($a == $b) { 
    echo "a is equal to b"; 
} else { 
    echo "a is smaller than b"; 
} 
?> 
http://php.net/manual/en/control-structures.switch.php 
<?php 
if ($i == 0) { 
    echo "i equals 0"; 
} elseif ($i == 1) { 
    echo "i equals 1"; 
} elseif ($i == 2) { 
    echo "i equals 2"; 
} 
 
switch ($i) { 
    case 0: 
        echo "i equals 0"; 
        break; 
    case 1: 
        echo "i equals 1"; 
        break; 
    case 2: 
        echo "i equals 2"; 
        break; 
} 
?> 
 
<?php 
switch ($i) { 
    case "apple": 
        echo "i is apple"; 
        break; 
    case "bar": 
        echo "i is bar"; 
        break; 
    case "cake": 
        echo "i is cake"; 
        break; 
}



