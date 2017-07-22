<?php
	include('config.php');
	session_start();
	$sem1=$_SESSION['selected_sem'];
	$ia_no=$_SESSION['selected_ia'];
	$year=$_SESSION['selected_year'];
	$sub=$_SESSION['sub'];
	$table=$_SESSION['table'];
	$query="SELECT * FROM question_table where sem = $sem1 and ia_no=$ia_no and subject='$sub' and year='$year' ORDER BY Question_no;";
	$SQL=mysql_query($query,$conn);
	$ROLL=$_POST['rollno'];
	while($record1=mysql_fetch_array($SQL))
	{	
		$r=$record1['Question_no'];
		$ANS=$_POST[$r];
		$query1="INSERT INTO $table(ia_no,roll_no,year,subject,sem,quest,marks) VALUES ($ia_no,'$ROLL','$year','$sub',$sem1,'$r',$ANS);";
		$SQL1=mysql_query($query1,$conn);
		echo "while \n";
	}
	echo"not while ";
	header("location: marks.php");
?>
	