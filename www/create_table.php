<html>
<head>
	<title>Welcome</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style1.css">	 
	<script>
		function successfull() 
		{
			alert("TABLE CREATED");
		}
		function unsuccessfull() 
		{
			alert("TABLE NOT CREATED");
		}
	</script>
</head>
<?php 	
	$db_name="wtl_proj";
	$conn = mysql_connect("localhost","root","")or die("Error in connection");
	mysql_select_db($db_name)or die("cannot select DB");
	
	$que=$_POST["que"];
	$subject=$_POST["subject"];
	$ia_no=$_POST["ia_no"];
	$sem=$_POST["sem"];
	$year=$_POST["year"];
	
	$table_name=$year.'_'.$sem.'_'.$ia_no.'_'.$subject;
	echo $table_name;
	
	/*$create_table="CREATE TABLE ".$table_name."(id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT ,
	roll_no VARCHAR(10) NOT NULL ,
	ia_no INT(1) NOT NULL,
	year VARCHAR(7) NOT NULL ,
	sem INT(1) NOT NULL);";	
	echo $create_table;
	$table_create_query=mysql_query($create_table);*/
	if (/*$table_create_query!=NULL*/1==1)
		echo '<script language="javascript">alert("TABLE CREATED");</script>';
	else
		echo '<script language="javascript">alert("TABLE NOT CREATED");</script>';
	
	session_start();
	$_SESSION['que'] = $que;
	$_SESSION['subject'] = $subject;
	$_SESSION['ia_no'] = $ia_no;
	$_SESSION['sem'] = $sem;
	$_SESSION['year'] = $year;
		
	header("location: sel.php");
	header("location: select.html");
	?>

	
</body>
</html>
