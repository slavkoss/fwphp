<?php
$xs = file_get_contents("foo.xml");
$data = new SimpleXMLElement($xs);

print $data->sins->sin[0];
print "\n";
print $data->sins->sin[1]["type"];
print "\n";

foreach ($data->sins->sin as $sin) {
    print $sin . " : " . $sin["type"];
    print "\n";
}

print_r($data);

?>
