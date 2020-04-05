<?
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

$c = curl_init();
curl_setopt($c, CURLOPT_URL, "http://www.google.com/search?q=beans");
curl_setopt($c, CURLOPT_HEADER, false);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$page_data = curl_exec($c);
curl_close($c);
print $page_data; 

// $foo = retrieve_page("http://www.google.com/search?q=beans");
// $foo = retrieve_page("http://www.google.com/search", array("q" => "beans"));
// print $foo;

$foo = retrieve_page("http://search.yahoo.com/search", array("p" => "beans"));
print $foo;

?>
