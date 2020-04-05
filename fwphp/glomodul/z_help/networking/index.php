<?php
// http://dev1:8083/fwphp/glomodul/z_help/networking_help/
// J:\awww\www\fwphp\glomodul\z_help\networking_help\index.php

function displ_breadcrumbs($id='')
{
  $txt = '
  <p><b>WHAT: </b><a href="#content" id="lnkcontent">GoTop</a> 
  1. <a href="#intro" id="lnkintro">Introduction</a>&nbsp;&nbsp;
     <a href="#basics" id="lnkbasics">Basics</a>&nbsp;
     <a href="#visibility" id="lnkvisibility">Visibility</a>&nbsp;
     <a href="#class_constants" id="lnkclass_constants">Constants</a>&nbsp;
     <a href="#data_encapsulation" id="lnkdata_encapsulation">Encapsulation</a>&nbsp;
     <a href="#inheritance" id="lnkinheritance">Inheritance (ISA)</a>&nbsp;
     <a href="#overriding" id="lnkoverriding">Overriding</a>&nbsp;
     <a href="#final_keyword" id="lnkfinal_keyword">Final</a>&nbsp;
     <a href="#abstract" id="lnkabstract">Abstract</a>&nbsp;
     <a href="#interfaces" id="lnkinterfaces">Interface</a>&nbsp;
     <a href="#constr_destr" id="lnkconstr_destr">Constructor</a>
   &nbsp;&nbsp;&nbsp;&nbsp;
   2. <a href="#static" id="lnkstatic">Static</a>&nbsp;
      <a href="#magic" id="lnkmagic">Magic</a>&nbsp;
      <a href="#errors" id="lnkerrors">Errors</a>&nbsp;
      <a href="#autoloading" id="lnkautoloading">Autoloading</a>
   &nbsp;&nbsp;&nbsp;&nbsp;
   3. <a href="#serialization" id="lnkserialization">Serialization</a>&nbsp;
      <a href="#cloning" id="lnkcloning">Cloning</a>&nbsp;
      <a href="#hinting" id="lnkhinting">Hinting</a>&nbsp;
      <a href="#comparing" id="lnkcomparing">Comparing</a>&nbsp;
      <a href="#overloading" id="lnkoverloading">Overloading</a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  4. <a href="#traits" id="lnktraits">Traits</a>&nbsp;
  <a href="#binding" id="lnkbinding">Binding</a>&nbsp;
  <a href="#iteration" id="lnkiteration">Iteration</a> <b>HOW: </b>
  </p>' ;

  $dom = new DOMDocument;
  @$dom->loadHTML($txt);

  //$id = $id ? $id : 'content' ;
  if ($id) {
    $link = $dom->getElementById('lnk'.$id) ;
    $href = $link->getAttribute('href') ;     // #content
    $nodeValue = $link->nodeValue ;           // GoTop
    /*
    echo "fn parameter \$id=" . '<b>'.$id.'</b>' ; // =content
    echo ", link (href element) id=lnk$id, \$link->tagName=" . $link->tagName.'<br />'; // =a
    echo "\$link->getAttribute('href')=" . $href .'<br />'; // =#content
    echo "Link to replace =" 
          . '&lt;a href="'.$href .'"'.' id="lnk'.$id.'"'.'>'
          . $nodeValue .'&lt;/a>' // =lnkcontent
          . '<br />'; 
    echo "Replacement = \$link->nodeValue=<b>" . $nodeValue.'</b><br />'; // =GoTop
    */
    //eg $txt = str_replace('<a href="#basics" id="lnkbasics">Basics</a>', '<b>'.$id.'</b>', $txt) ; 
    $txt = str_replace(
        '<a href="'.$href .'"'.' id="lnk'.$id.'"'.'>'
        . $nodeValue.'</a>'
      , '<b>'. $nodeValue .'</b>', $txt) ; 
  }

  echo $txt ;
}


include '00_hdr.php' ;
include '00_NETW01_basics.php' ;
include '00_NETW02_static_magic_err_autoload.php' ;
include '00_NETW03_serializ, cloning, hinting, comparing, overload.php' ;
include '00_NETW04_traits, binding, iteration.php' ;
include '00_ftr.php' ;


exit(0) ;



  /*
  //$txt = str_replace('<a href="#'.$id.'">', '<b>||</b>', $txt) ; 
  $dom = new DOMDocument;
  @$dom->loadHTML($txt);

  $link = $dom->getElementById($id);
  echo "\$id=" . $id; // =content
  echo ", link (href element) id=$id, \$link->tagName=" . $link->tagName.'<br />'; // =a
  echo "\$link->getAttribute('href')=" . $link->getAttribute('href').'<br />'; // =#content
  echo "\$link->nodeValue=" . $link->nodeValue.'<br />'; // =GoTop
  */


  /*
  $links = $dom->getElementsByTagName('a');
  foreach ($links as $link){
    //for http://localhost:8083/v_book/oop_help/00_OOP00_img_gallery_flexcss.php#visibility
    echo ' link url (href anchor) ='.$link->getAttribute('href'); // =#content
    echo ', link txt (href attribute) ='.$link->nodeValue;        // =GoTop
    echo '<br>';
  }
  */




/*

$html = file_get_contents('bookmarks.html');
//Create a new DOM document
$dom = new DOMDocument;

//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
@$dom->loadHTML($html);

//Get all links. You could also use any other tag name here,
//like 'img' or 'table', to extract other tags.
$links = $dom->getElementsByTagName('a');

//Iterate over the extracted links and display their URLs
foreach ($links as $link){
    //Extract and show the "href" attribute.
    echo $link->nodeValue;
    echo $link->getAttribute('href'), '<br>';
}



$txt = preg_replace('/<a href="(http:\/\/)?[\w.]+\/([\w]+)"\s?>/'
   , '<a href="http://mywebsite.com/$2">'
   , $txt);

look for string part <a*>{TEXT}</a>, copy {TEXT}, and replace that whole matched string with <b>{TEXT}</b>
$link = '<a title="title" href="http://example.com">Text</a>';
$link = preg_replace("/<a\s(.+?)>(.+?)<\/a>/is", "<b>$2</b>", $link);
echo($link);
or :
echo $formatted = "<b>".strip_tags($link)."</b>";

$text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a>';
echo strip_tags($text);
echo "\n";
// Allow <p> and <a> :
echo strip_tags($text, '<p><a>');
        The above example will output:
        Test paragraph. Other text
        <p>Test paragraph.</p> <a href="#fragment">Other text</a>

****************
s/<a(?:\s[^>]*)?>([^<]+)<\/a>/<b>\1<\/b>/
The part between the first // SEARCHES FOR 
   - opening tag (either <a> alone or with some parameters, in this case a white space \s is required to avoid matching <abbrev> e.g. as well)
   - some text which will stored by the brackets
   - and closing tag
The part between the second // IS THE REPLACEMENT part where \1 denotes the text matched by the brackets in the first part.

See also PHP’s preg_replace function http://ch.php.net/manual/en/function.preg-replace.php
The final expression would then look like this (tested):

$link = '<a href="blabla">Text</a>' ;
preg_replace('/<a(?:\s[^>]*)?>([^<]+)<\/a>/i', '<b>\\1</b>', $link);

*/

