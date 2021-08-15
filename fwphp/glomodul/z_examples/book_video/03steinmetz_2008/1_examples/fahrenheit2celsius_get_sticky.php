<html>
<head><title>Temperature Conversion</title></head>
<body>
<?php
 $fahrenheit = $_GET['fahrenheit']??0;
?> 
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" 
      method="GET"> 
   Fahrenheit temperature: 
   <input type="text" name="fahrenheit" 
          value="<?php echo $fahrenheit; ?>" /><br /> 
   <input type="submit" value="Convert to Celsius!" />

 
  <?php if (!is_null($fahrenheit)) { 
   $celsius = ($fahrenheit - 32) * 5 / 9; 
   printf("<br /><br /> %.2fF is %.2fC", $fahrenheit, $celsius);
  } ?> 
   


   <br /><br />
   Select your personality attributes:<br /> 
   <select name="attributes[]" multiple> 
     <option value="perky">Perky</option> 
     <option value="morose">Morose</option> 
     <option value="thinking">Thinking</option> 
     <option value="feeling">Feeling</option> 
     <option value="thrifty">Spend-thrift</option> 
     <option value="shopper">Shopper</option> 
   </select><br /> 

  <input type="submit" name="s" value="Record my personality!" />

 
<?php if (array_key_exists('s', $_GET)) { 
 $description = join(' ', $_GET['attributes']); 
 echo "<br /><br />You have a {$description} personality (select box).";
} ?> 



   <br /><br />
   <input type="checkbox" name="attributes[]" value="perky" /> Perky<br /> 
   <input type="checkbox" name="attributes[]" value="morose" /> Morose<br /> 
   <input type="checkbox" name="attributes[]" value="thinking" /> Thinking<br /> 
   <input type="checkbox" name="attributes[]" value="feeling" /> Feeling<br /> 
   <input type="checkbox" name="attributes[]" value="thrifty" />Spend-thrift<br /> 
   <input type="checkbox" name="attributes[]" value="shopper" /> Shopper<br /> 
   <br /> 
   <input type="submit" name="s2" value="Record my personality!" 
  />

  <?php if (array_key_exists('s2', $_GET)) { 
   $description = join (' ', $_GET['attributes']); 
   echo "<br /><br />You have a {$description} personality (checkboxes).";
  } ?> 


   <br /><br />
  <p>
  Can I make multiple-selection form elements sticky? You can, but it isn't easy. 
  You'll need to check whether each possible value in the form was one of the submitted values. 
  </p>
  Perky: <input type="checkbox" name="attributes[]" 
  value="perky"  />

  <?php
  if ( is_array($_GET['attributes']) 
       && in_array('perky', $_GET['attributes'])) {
   echo "<br /><br />checked";
  } ?><br />




</form>
</body>
</html>