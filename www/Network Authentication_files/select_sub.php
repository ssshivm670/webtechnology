<?php
   include('session.php');
?>
<html>
<head>
	<title>COURSE EXIT SERVEY</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="alternate stylesheet" href="demo.css"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link type="text/css" rel="stylesheet" href="stylesheet.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
</head>

<body>														
															  <!-- this is logo-->
  		<center><br>
				<img  src="logo1.jpg" alt="vit-logo" width="400px" height="100px"  min-height="150px">     <br><br>  
		          
				
				
		<br>
		</center> 
		
<form action=sample.php method="POST" target="_blank">
<center>
<?php
 
		session_start();
	
		$db_name="course_exit_survey";
		$table_name="login";
		$conn = mysql_connect("localhost","root","user123")or die("Error in connection");
		mysql_select_db($db_name)or die("cannot select DB");
		
		$rollno =$_SESSION['login_user'] ;
		
		//selecting subject 
		
		$select_sem="Select DISTINCT(sem) FROM login WHERE rollno='$rollno';";
		$sem_selected=mysql_query($select_sem,$conn);
		$sem_array=mysql_fetch_array($sem_selected);
		$sem1=(int)$sem_array['sem'];
		
		$_SESSION['sem']=$sem1;
		
		
		
		
		$select_year="Select DISTINCT(year) FROM login WHERE rollno='$rollno';";
		$year_selected=mysql_query($select_year,$conn);
		$year_array=mysql_fetch_array($year_selected);
		$year2=$year_array['year'];
		
		$_SESSION['year2']=$year2;
		
		
		
		//to display all subjects
		echo "<h2>List of all the subjects you are applicable.</h2>";
		$all_sub="Select distinct(subject) from qdb where sem=$sem1 AND year='$year2';";  	      
								
		$selected_all_sub=mysql_query($all_sub,$conn);
		$count1=mysql_num_rows($selected_all_sub);
		echo "<div >";
		echo "<table class='main'  cellspacing=10><tr>";
		while($record3=mysql_fetch_array($selected_all_sub))
		{	
			$s_val=$record3['subject'];
			echo "<th>$s_val</th>";
		}
		echo"</tr></table>";
		echo "</div>";
		
	//to display subjects which are not fill
	echo "<h2>List of subject remaining to fill.<br>Click on subject you want to fill.</h2>";
		
		$select_sub="SELECT DISTINCT(q.subject) FROM qdb q LEFT JOIN marks_table m ON q.subject=m.subject WHERE q.sem=$sem1 AND q.year='$year2' AND m.subject IS NULL;";  	      
									
	    $selected_sub=mysql_query($select_sub,$conn);
		
		$count=mysql_num_rows($selected_sub);
		//$record2=mysql_fetch_array($selected_sub);
		
		echo "<div >";
		while($record2=mysql_fetch_array($selected_sub))
		{	
			$s_val=$record2['subject'];
			echo "<input class='design' type='submit' class='btn btn-info' id=".$s_val." name='sname' value=".$s_val." >";
		
		}
		echo "</div>";
		
?>
</center>
<div class="studentinfo">
						<fieldset> 							<!-- this is information-->
					
						<h3><i>STUDENT DETAILS:</i></h3>
				
					<table class="table table-striped">
					<tr class="success"><th>Roll No:</th> <td><?php echo $login_session; ?></td></tr>					
					<tr class="danger"><th>Semester:</th> <td><?php $sem1=$_SESSION['sem'];  echo $sem1; ?></td></tr>
					<tr class="info"><th>Year: </th> <td><?php $sem1=$_SESSION['year'];  echo $year2; ?></td></tr>
					<tr class="warning"><th>Total subject:</th><td> <?php echo $count1; ?></td></tr>
					<tr class="primary"><th>Remaining subject:</th><td> <?php echo $count; ?></td></tr>
					</table>
						<a href="logout.php">LOGOUT</a>
				</fieldset>
				</div>



</form>


<footer>
<?php
 $c=$count1-$count;
 $p=$c/$count1*100;
 echo  "<div class='progress'>
  <div class='progress-bar  progress-bar-striped active' role='progressbar'
  aria-valuenow='".$c."' aria-valuemin='0' aria-valuemax='".$count1."' style='width:".$p."%'>".$p."% completed</div>"; 
?>
</footer>
   <!--  <div>
			<iframe name="1" src="" frameborder="0"  width=90% height=63%  scrolling="yes">
		</div>
	-->

</body>
</html>
