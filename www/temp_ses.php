<?php 
	session_start();
	$sem1=$_POST['selected_sem'];
	$_SESSION['selected_sem']=$sem1;
	$ia_no=$_POST['selected_ia'];
	$_SESSION['selected_ia']=$ia_no;
	$year=$_POST['selected_year'];
	$_SESSION['selected_year']=$year;
	$sub=$_POST['sub'];
	$_SESSION['sub']=$sub;
	$table=$year.'_'.$sem1.'_'.$ia_no.'_'.$sub;
	$_SESSION['table']=$table;
	header("location: marks.php");
?>