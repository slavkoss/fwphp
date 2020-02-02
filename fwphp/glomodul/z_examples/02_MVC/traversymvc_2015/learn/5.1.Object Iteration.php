<?php
class People{
  public  $person1  = 'Mike';
  public  $person2  = 'Shelly';
  private $person5 = 'Jen';

  function iterateObject(){
    foreach($this as $key => $value){ print "$key => $value<br />"; }
  }
}

$people = new People;

echo '<b>iterateObject prints private $person5 :</b><br />';
$people->iterateObject();

echo '<br /><b>foreach DOES NOT PRINT private $person5 :</b><br />';
foreach($people as $key => $value){ print "$key => $value<br />"; }
