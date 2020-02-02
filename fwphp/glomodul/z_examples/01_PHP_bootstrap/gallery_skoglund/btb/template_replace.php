<?php

	function display_template($filename, $assigned_vars) {
	  if(file_exists($filename)) {
	    $output = file_get_contents($filename);
	    foreach($assigned_vars as $key => $value) {
	      $output = preg_replace('/{'.$key.'}/', $value, $output);
	    }
	    echo $output;
	  } else {
	    echo "*** Missing template error ***";
	  }
	}

	$template = "template2.php";
	$assigned_vars = array('page_title' => "Template Test", 
	'content' => "This is a test of templating using search and replace.");

	display_template($template, $assigned_vars);

?>
