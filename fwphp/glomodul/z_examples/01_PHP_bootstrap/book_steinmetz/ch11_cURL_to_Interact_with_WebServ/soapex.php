<?php
    $client = new SoapClient("http://webservices.amazon.com/AWSECommerceService/AWSECommerceService.wsdl");

    $search->AWSAccessKeyId = "04WC7A96F0XKX81KBF02";
    $search->Request->SearchIndex = "Music";
    $search->Request->Keywords = "Merle Haggard";

    $r = $client->itemSearch($search);

    foreach ($r->Items->Item as $item) {
	$attributes = $item->ItemAttributes;
	if (is_array($attributes->Artist)) {
	    $artist = implode($attributes->Artist, ", ");
	} else {
	    $artist = $attributes->Artist;
	}
	print "artist: $artist; title: $attributes->Title<br />";
    }
?>
