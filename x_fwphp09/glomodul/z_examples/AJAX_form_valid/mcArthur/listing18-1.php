$original = array('key'=>'value', 'key2'=>'value2');
$json = json_encode($original);
$restored = json_decode($json, true);

print_r($original);
print "\n" . $json ."\n\n";
print_r($restored);