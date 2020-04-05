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

if (!$_REQUEST["street"] && !$_REQUEST["city"] && !$_REQUEST["state"]) {
    ?>
<html><head><title>Map Demo</title></head><body>
<form action="mapdemo.php">
Street: <input type="text" name="street" /><br />
City: <input type="text" name="city" /><br />
State: <input type="text" name="state" /><br />
<input type="submit" /><br>
</form>
</body></html>
    <?php
    exit;
}
$qs = http_build_query(array(
    "appid"	=> "YahooDemo",
    "street"	=> "1600 Pennsylvania Avenue NW",
    "city"	=> "Washington",
    "state"	=> "DC",
    "zip"	=> "20006",
));
$page = retrieve_page("http://local.yahooapis.com/MapsService/V1/geocode?$qs");
$data = new SimpleXMLElement($page);
$lat1 = $data->Result->Latitude[0];
$lon1 = $data->Result->Longitude[0];

$qs = http_build_query(array(
    "appid"	=> "YahooDemo",
    "street"	=> $_REQUEST["street"],
    "city"	=> $_REQUEST["city"],
    "state"	=> $_REQUEST["state"],
));
$page = retrieve_page("http://local.yahooapis.com/MapsService/V1/geocode?$qs");
$data = new SimpleXMLElement($page);
$lat2 = $data->Result->Latitude[0];
$lon2 = $data->Result->Longitude[0];

?>
<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Strict//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Map Example</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAMjqw-ZMhHHh1Sgize0NOMBSqI4oAlfqlTC-N9aC06CTUHn_DkxQwPBsCBTHiKQHxEHsAjPyAdaKF7A"
            type="text/javascript"></script>
    <script type="text/javascript">

    function initialize() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map_canvas"));
	var latlon1 = new GLatLng(<?php print "$lat1, $lon1"; ?>);
	var latlon2 = new GLatLng(<?php print "$lat2, $lon2"; ?>);
        map.setCenter(latlon1);
        map.addOverlay(new GMarker(latlon1));
        map.addOverlay(new GMarker(latlon2));
	var line = new GPolyline([latlon1, latlon2], "#3333aa", 5);
	map.addOverlay(line);
	var bounds = line.getBounds();
	level = map.getBoundsZoomLevel(bounds);
        map.setCenter(bounds.getCenter(), level);
        map.addControl(new GLargeMapControl());
      }
    }

    </script>
  </head>
  <body onload="initialize()" onunload="GUnload()">
    <div id="map_canvas" style="width: 500px; height: 300px"></div>
  </body>
</html>
