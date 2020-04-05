<?php
//H:\dev_web\htdocs\apl\t1\1_steinmetz\get_pg_curl.php
function retrieve_page($url, $post_parameters = null) {
  /* Connects to a site using POST or GET; fetches data */
  $query_string = null;
  if (!is_null($post_parameters)) {
      if (!is_array($post_parameters)) {
          die("POST parameters not in array format");
      }
      /* Build query string. */
      $query_string = http_build_query($post_parameters);
  }
//
// 
$ch = curl_init();
if ($query_string) {
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
}
//
//
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $return_data = curl_exec($ch);
    curl_close($ch);
    return $return_data;

} // e n d  f n

if (isset($_POST['pg']) and $_POST['pg'] == 1)
  print retrieve_page("http://www.google.hr/"); 
else if (isset($_POST['pg']) and $_POST['pg'] == 2)
  print retrieve_page("http://search.yahoo.com/search"
                   , array("p" => "beans")); // mahune
else { echo '<pre>'; 
echo <<< EOTXT
<form action="get_pg_curl.php" method="post">
  Page to show [1,2] : <input type="text" name="pg" /><br />
  Street [for page 2]: <input type="text"       name="street" /><br />
  City               : <input type="text"         name="city" /><br />
  State              : <input type="text"        name="state" /><br />
  <input type="submit" /><br>
</form>
EOTXT;
echo '</pre>'; 
}
                   
?>