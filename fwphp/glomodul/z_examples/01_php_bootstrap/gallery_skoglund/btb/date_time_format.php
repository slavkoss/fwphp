<html>
	<head>
		<title>Dates and Times: Formatting</title>
	</head>
	<body>
	<?php
		$timestamp = time();
		echo strftime("The date today is %m/%d/%y", $timestamp);
		echo "<br />";
		
		function strip_zeros_from_date($marked_string="") {
			// remove the marked zeros
			$no_zeros = str_replace('*0', '', $marked_string);
			// then remove any remaining marks
			$cleaned_string = str_replace('*', '', $no_zeros);
			return $cleaned_string;
		}
		
		echo strip_zeros_from_date(strftime("The date today is *%m/*%d/%y", $timestamp));
		
		echo "<br />";
		
		$dt = time();
		$mysql_datetime = strftime("%Y-%m-%d %H:%M:%S", $dt);
		echo $mysql_datetime;
	?>
	</body>
</html>