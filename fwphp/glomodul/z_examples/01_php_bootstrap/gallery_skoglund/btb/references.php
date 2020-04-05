<html>
	<head>
		<title>Reference Assignment</title>
	</head>
	<body>
	<?php
	
	$a = 1;
	$b = $a;
	$b = 2;
	echo "a:{$a} / b: {$b}<br />";
	// returns 1/2

	$a = 1;
	$b =& $a;
	$b = 2;
	echo "a:{$a} / b: {$b}<br />";
	// returns 2/2
	
	unset($b);
	echo "a:{$a} / b: {$b}<br />";
	
	?>
	</body>
</html>