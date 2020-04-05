<?php
// J:\awww\apl\dev1\04knjige\03steinmetz\1101curl.php
//
/* // works :
print retrieve_page( 
        "http://search.yahoo.com/search"
       , array("p" => "beans") 
);
*/
function retrieve_page(
     $url // URL to access
   , $post_parameters = null // 
       // optional array of POST parameters 
       // (parameter names as keys, parameter values as its key values)
       // If fn doesn’t receive second argument, uses GET method
)
{   //  Connects to a site using POST or GET, fetches data
    //   works for most casual client-access needs 
            // casual = ležeran, nemaran, povremen, slučajan, usputan
            // casuality insurance =osiguranje od nezgode
            // casually = ležerno, prigodno, slučajno
            // casualness = ležernost
            // casualties = poginuli u borbi
            // casualty = nesretan slučaj, nezgoda, oštećenje, žrtva
    /* Verify the parameter array: */
    if (!is_null($post_parameters)) {
        if (!is_array($post_parameters)) {
            die("POST parameters not in array format");
        }
      /* Create query string from array in the form :
              parm1=value1&parm2=value2[...]
         much like it would appear in a GET query, except that it does not include leading question mark
      */
        $query_string = null;
        $query_string = http_build_query($post_parameters);
    }
    
// If there is a query string at this point, we know that we’re using the POST method, so we configure the connection in that manner and use the query string as the POST data:
 $ch = curl_init(); // 1.Create cURL connection handle
    if ($query_string) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
    }
    
// We configure the connection execute the query, and return the data:
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_HEADER, false); // 2.no HTTP header in output
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 3.output string, no printing
 $return_data = curl_exec($ch); // 4. access page
 curl_close($ch); // 5. clean up
    
 return $return_data; 
  
} // e n d  f n

?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8">
  <title><?php echo $title2; ?></title>
</head>  
<body>  
<pre>
11: Using cURL PHP library to Interact with Web Services  
    #68: Connecting to Other Websites see retrieve_page() fn example
         in this script.
    #69: Using Cookies. To log in to a server that has cookie-based 
         authentication we need to enable cookie collection system in cURL
    #70: Transforming XML into a Usable Form
    #71: Using Mapping Web Services
    #72: Using PHP and SOAP to Request Data from Amazon.com
    #73: Building a Web Service
</pre>
<h2>#68: Connecting to Other Websites</h2>
<p>How to make your server interact with web services on other sites via XML.<br>cURL PHP library to handle the connection between your webserver and other
<br>webservers. The idea is to make your scripts act like clients, similar to the way web browsers work. You can ask cURL to do anything from retrieving the HTML from a web page to directly accessing an XML-based web service.
<br></p>
<p><br>There are three basic ways to access data :</p>
<ol>
  <li>&nbsp;<strong>Download the site's web page</strong> to pick through the HTML. Chapter 5 contained an example: "#41: Creating a Screen Scraper" on page 75.&nbsp;&nbsp;
  </li>
  <li>&nbsp;<strong>Post query parameters to a website</strong>, and pick through the results.<br>
  </li>
  <li>&nbsp;Use an <strong>XML-based web service</strong> to access data, and use an XML parser&nbsp; to access the results. You'll encounter
  <strong>several different access protocols</strong>, such as <strong>SOAP</strong> (Simple Object Access Protocol) and
  <strong>REST</strong> (REpresentational State Transfer; usually this is just a fancy term for sending POST or GET parameters).
  <br><br>Don't expect much consistency. Even two sites that provide the same type of data will probably have
  <strong>completely different output formats and access methods</strong>.</li>
</ol>
<p>You'll also need a subset of the following libraries, depending on what you need to do:
</p>
<ol>
  <li>&nbsp;cURL (the library and the PHP extension). See "#18: Adding Extensions&nbsp; to PHP" on page 27 if you do not have the extension.</li>
  <li>&nbsp;OpenSSL for accessing secure sites. </li>
  <li>&nbsp;XML for parsing data from web services. Most PHP servers include this by default.
  <br></li>
</ol>
<h2>#69: Using Cookies</h2>
If your application requires that you log in to a server that has cookie-based authentication, then you need to enable a cookie collection system in cURL.
<br>The idea is that when you access a page, cURL stores the cookies it receives in a file (called the cookie jar), and upon subsequent accesses, you want cURL to check that file for any cookies that it should send to the server.
<br>Typically, you need to add two configuration lines: the first to set the write location and the second to set the read location:
<br><br>curl_setopt(c, CURLOPT_COOKIEJAR, 'cookiejar');<br>curl_setopt(c, CURLOPT_COOKIEFILE, 'cookiejar');<br>
<br>Here, c is a cURL connection handle, and cookiejar is a PHP-writable file.<br>The biggest problem with this scheme is that it does not work with parallel connections; if you have more than one process using the same cookie jar, then they’ll all have the same session, trample each other, or worse. You can get around this by inserting the PHP process ID
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (use getmypid()) <br><br>into the cookie jar filename. However, if you do so, make sure that you clean up by removing the cookie jar file when you’re finished, or you will have a really big collection of cookie jars on your hands that may confuse subsequent processes.<br>
<br>
<?php

?>
</body>
</html>