<?php

function retrieve_page($url, $post_parameters = null) {
    /* connects to a site using POST or GET; fetches data */
    $query_string = null;
    if (!is_null($post_parameters)) {
	if (!is_array($post_parameters)) {
	    die("POST parameters not in array format");
	}
	/* build query string */
	$query_string = http_build_query($post_parameters);
    }

    $ch = curl_init(); 

    if ($query_string) {
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $return_data = curl_exec($ch);
    curl_close($ch);
    return $return_data; 
}

$qs = http_build_query(array(
    "appid"	=> "YahooDemo",
    "street"	=> "1600 Pennsylvania Avenue NW",
    "city"	=> "Washington",
    "state"	=> "DC",
    "zip"	=> "20006",
));
$page = retrieve_page("http://local.yahooapis.com/MapsService/V1/geocode?$qs");
print $page;
$data = new SimpleXMLElement($page);
$lat1 = $data->Result->Latitude[0];
$lon1 = $data->Result->Longitude[0];

?>
