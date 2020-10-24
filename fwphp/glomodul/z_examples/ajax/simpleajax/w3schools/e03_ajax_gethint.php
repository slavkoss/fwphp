<?php
// Array with names
$a[] = "ajax";
$a[] = "Amanda";
$a[] = "Brittany";
$a[] = "Cinderella";
$a[] = "Cindy";
$a[] = "Diana";
$a[] = "Eva";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Fiona";
$a[] = "Gunda";
$a[] = "html";
$a[] = "Inga";
$a[] = "JS";
$a[] = "Kitty";
$a[] = "Linda";
$a[] = "Liza";
$a[] = "Nina";
$a[] = "Ophelia";
$a[] = "php";
$a[] = "Raquel";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
