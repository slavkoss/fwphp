<!-- J:\awww\www\fwphp\glomodul\kalendar\inc\hdr.php -->
<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset=utf-8" />
    <title><?php echo $page_title; ?></title>
<?php 

foreach ( $css_files as $fmtf ): 
?>
  <link rel="stylesheet" type="text/css" media="screen,projection"
   href="<?php echo URLMODUL_CSS.'/'.$fmtf; ?>" />
<?php endforeach; ?>
</head>

<body>
