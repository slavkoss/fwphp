<!doctype html>
<!-- H:\1downl\Tutsplus - Build your Own JavaScript Library Parts 1 and 2\index.html -->
<html>
<head>
   <meta charset="utf-8">
	<title><?php echo $txtlang[$jezik]['titreHtml']; ?></title>
   <link rel="stylesheet" type="text/css" href="index_wamp.css" />
	<link rel="shortcut icon" href="index.php?img=favicon" type="image/ico" />
</head>

<body>
		<span>
         Z - 
         <abbr title="Windows">W</abbr>
         <abbr title="Apache">A</abbr>
         <abbr title="MySQL">M</abbr>
         <abbr title="PHP">P</abbr>
      </span>
      &nbsp;&nbsp;&nbsp;

   <?php
   //<div id="head">  ul...li je horizontalno !!
	echo '' 
      .''.'v. '.$wampserverVersion
      .'&nbsp;&nbsp'.$fle.' (subst Z: "J:\zwamp\vdrive")'
	   .'<a href="?lang='.$txtlang[$jezik]['autreLangueLien'].'">'
           .'&nbsp;&nbsp'.$txtlang[$jezik]['autreLangue']
      .'</a>' 
   ;
   ?>
   
   <hr />
