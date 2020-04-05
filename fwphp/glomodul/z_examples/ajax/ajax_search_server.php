<?php
/**
* J:\awww\www\fwphp\glomodul\z_examples\AJAX\ajax_search_server.php
*
* searches an XML file for titles matching the search string and returns the result
*
* If there is any text sent from the JavaScript (strlen($q) > 0), the following happens:
*    Load an XML file into a new XML DOM object
*    Loop through all <title> elements to find matches from the text sent from the JavaScript
*    Sets the correct url and title in the "$response" variable. If more than one match is found, all matches are added to the variable
*    If no matches are found, the $response variable is set to "no suggestion"
**/
$xmlDoc=new DOMDocument();
$xmlDoc->load("ajax_search.xml");

$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" .
          $z->item(0)->childNodes->item(0)->nodeValue .
          "' target='_blank'>" .
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") { $response="no suggestion";
} else { $response=$hint; }

//output the response
echo $response;
?>