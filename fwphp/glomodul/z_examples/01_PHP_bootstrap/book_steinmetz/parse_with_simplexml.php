<?php
// You can use simplexml_load_file() to create the object //from a file instead of using this two-step process:
$xs = file_get_contents("sins.xml");$data = new SimpleXMLElement($xs);echo '<pre>'; print_r($data); echo '</pre>';//print 'First sin: '. $data->sins->sin[0] . ', Tip : '.$data->sins->sin[0]["type"];print '<br/>Tip drugog elem.: '.$data->sins->sin[1]["type"];
echo '<br/><br/>';foreach ($data->sins->sin as $sin) {    print $sin . " : " . $sin["type"];    print "<br />";}
?>