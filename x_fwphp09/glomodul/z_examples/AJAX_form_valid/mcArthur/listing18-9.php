<?php
$arr = array(
         'Alpha','Bravo','Charlie','Delta','Echo',
         'Foxtrot','Golf','Hotel','India','Juliett',
         'Kilo','Lima','Mike','November','Oscar',
         'Papa','Quebec','Romeo','Sierra','Tango',
         'Uniform','Victor','Whiskey','X-ray','Yankee',
         'Zulu'
       );
$search = strtolower($_POST['search']);

$hits = array();

if(!empty($search)) {
  foreach($arr as $name) {
    if(strpos(strtolower($name), $search) === 0) {
      $hits[] = $name;
    }
  }
}

echo json_encode($hits);