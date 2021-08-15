<?php
$name = $_POST['name'];
$mediaType = $_POST['media_type'];
$filename = $_POST['filename'];
$caption = $_POST['caption'];
$status = $_POST['status']; 
 
$tried = ($_POST['tried'] == 'yes'); 
 
if ($tried) { 
 $validated = (!empty($name) && !empty($mediaType) && 
!empty($filename)); 
 
 if (!$validated) { ?> 
 <p>The name, media type, and filename are required fields.
    Please fill them out to continue.</p> 
 <?php }
} 
 
if ($tried && $validated) { 
 echo "<p>The item has been created.</p>";
} 

// was this type of media selected? print "selected" if so
function mediaSelected($type)
{ 
 global $mediaType; 
 
 if ($mediaType == $type) { echo "selected"; }
} ?> 
 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" 
      method="POST"> 
   Name*: <input type="text" name="name" value="<?php echo $name; 
  ?>" /><br /> 
   
   Status: <input type="checkbox" name="status" value="active" 
   <?php if ($status == "active") { echo "checked"; } ?> /> 
  Active<br /> 
   
   Media*: <select name="media_type"> 
       <option value="">Choose one</option> 
       <option value="picture" <?php mediaSelected("picture"); ?> 
      />Picture</option> 
       <option value="audio" <?php mediaSelected("audio"); ?> 
      />Audio</option> 
       <option value="movie" <?php mediaSelected("movie"); ?> 
      />Movie</option> 
   </select><br /> 
   
   File*: <input type="text" name="filename" value="<?php echo 
  $filename; ?>" /><br /> 
   
   Caption: <textarea name="caption"><?php echo $caption; ?>
  </textarea><br /> 
   
   <input type="hidden" name="tried" value="yes" /> 
   <input type="submit" value="<?php echo $tried ? "Continue" : 
  "Create"; ?>" />
</form>

<?php
$age = '99' ; //$_POST['age'];
$validAge = strspn($age, "1234567890") == strlen($age);

echo "<br /> <br />\$validAge (1) = $validAge";
