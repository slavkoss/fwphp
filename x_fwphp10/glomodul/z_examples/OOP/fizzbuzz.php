<?php

function fizzbuzz($start, $end)
{
  // generator function returns an object that can be iterated over


    for ($i = $start; $i <= $end; $i++) {
        // Note that $i is preserved between yields.
        yield $i;
    }

  /* $current = $start;
  while ($current <= $end) {
    if ($current%3 == 0 && $current%5 == 0) {
      yield "fizzbuzz n%3,5==0";
    } else if ($current%3 == 0) {
      yield "fizz n%3==0";
    } else if ($current%5 == 0) {
      yield "buzz n%5==0";
    } else {
      yield $current;
    }
    $current++;
  } */
}

foreach(fizzbuzz(1,20) as $number) {
  echo $number.'<br />';
}
?>
