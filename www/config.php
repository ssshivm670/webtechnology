<?php
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'wtl_proj');
	$db_name="wtl_proj";
		
	$conn = mysql_connect("localhost","root","")or die("Error in connection");
	mysql_select_db($db_name)or die("cannot select DB");
	
	
?>
	

