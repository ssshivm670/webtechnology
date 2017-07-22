<html>
	<head>
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


<?php
	$Q=$_POST['BX_Question'];
	$C=$_POST['BX_cos'];
	$M=$_POST['BX_marks'];
	
	session_start();
	$ia_no=$_SESSION['ia_no'];
	$sem=$_SESSION['sem'];
	$year=$_SESSION['year'];
	$subject=$_SESSION['subject'];

	$db_name="wtl_proj";
	$conn = mysql_connect("localhost","root","")or die("Error in connection");
	mysql_select_db($db_name)or die("cannot select DB");

	$table=$year.'_'.$sem.'_'.$ia_no.'_'.$subject;
	foreach($Q as $a => $b)
	{
		$qa=$Q[$a];
		$ca=$C[$a];
		$ma=$M[$a];
		$sql="INSERT INTO question_table(Question_no,COs,Total_marks,year,sem,ia_no,subject) VALUES('$qa','$ca',$ma,'$year',$sem,$ia_no,'$subject');";
		$ex_sql=mysql_query($sql,$conn);
	}
	
	
	$query="CREATE TABLE ".$table."
	(id INT(10) NOT NULL PRIMARY KEY AUTO_INCREMENT , 
	 roll_no  VARCHAR(10) NOT NULL , 
	 ia_no  INT(1) NOT NULL ,
	 year  VARCHAR(7) NOT NULL , 
	 subject  VARCHAR(10) NOT NULL , 
	 sem  INT(1) NOT NULL ,
	 quest  VARCHAR(2) NOT NULL , 
	 marks  INT(2) NOT NULL );
	";
	$execute=mysql_query($query);
	
	if ($execute!=NULL)
		echo '<script language="javascript">alert("TABLE CREATED");</script>';
	else
		echo '<script language="javascript">alert("TABLE NOT CREATED");</script>';
	
	
	header("location: sel.php");
	
?>	