<?php

function find_browser() {
    // determine OS, version, and type of client browsers
    $browser_info = array(
	"name"    => "Unknown", 
	"version" => "Unknown",
	"OS"      => "Unknown",
    );
    // get the User Agent.
    if (!empty($_SERVER["HTTP_USER_AGENT"])) {
	$agent = $_SERVER["HTTP_USER_AGENT"]; 
    }
	
    // find operating system
    if (preg_match('/win/i', $agent)) {
	$browser_info["OS"] = "Windows";
    } else if (preg_match('/mac/i', $agent)) {
	$browser_info["OS"] = "Macintosh";
    } else if (preg_match('/linux/i', $agent)) {
	$browser_info["OS"] = "Linux";
    }

    if (preg_match('/opera/i', $agent)) {
    // Must start with Opera, since it matches IE string
	$browser_info["name"] = "Opera";
	$agent = stristr($agent, "Opera");
	if (strpos("/", $agent)) {
	    $agent = explode("/", $agent); 
	    $browser_info["version"] = $agent[1];
	} else {
	    $agent = explode(" ", $agent); 
	    $browser_info["version"] = $agent[1];
	}
    } else if (preg_match('/msie/i', $agent)) {
	$browser_info["name"] = "Internet Explorer";
	$agent = stristr($agent,"msie");
	$agent = explode(" ", $agent);
	$browser_info["version"] = str_replace(";", "", $agent[1]);
    } else if (preg_match('/firefox/i', $agent)) {
	$browser_info["name"] = "Firefox";
	$agent = stristr($agent, "Firefox");
	$agent = explode("/", $agent); 
	$browser_info["version"] = $agent[1];
    } else if (preg_match('/safari/i', $agent)) {
	$browser_info["name"] = "Safari";
	$agent = stristr($agent, "Safari");
	$agent = explode("/", $agent); 
	$browser_info["version"] = $agent[1];
    } else if (preg_match('/netscape/i', $agent)) {
	$browser_info["name"] = "Netscape Navigator";
	$agent = stristr($agent, "Netscape");
	$agent = explode("/", $agent); 
	$browser_info["version"] = $agent[1];
    } else if (preg_match('/Gecko/i', $agent)){
	$browser_info["name"]= 'Mozilla';
	$agent = stristr($agent, "rv");
	$agent = explode(":", $agent); 
	$agent = explode(")", $agent[1]); 
	$browser_info["version"] = $agent[1];
    }
    return $browser_info; 
}

print_r(find_browser());

?>
