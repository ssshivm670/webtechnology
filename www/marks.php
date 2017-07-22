<!DOCTYPE html>
  <head>
	<?php include('config.php');?>
    <meta charset="UTF-8">
    <title>Marks</title>
    <!--link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'-->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/style1.css">  
    </head>
	<body>
	
	<div class=form>
	
	<h1>Enter Roll Number</h1>
	<form action="update.php" method =POST>
			<div class="field-wrap">
			<label>Roll Number<span class="req">*</span></label>
            <input type="text" name="rollno" required autocomplete="off"/>
			<?php
				session_start();
				$sem1=$_SESSION['selected_sem'];
				$ia_no=$_SESSION['selected_ia'];
				$year=$_SESSION['selected_year'];
				$sub=$_SESSION['sub'];
				$table=$_SESSION['table'];

				$_SESSION['table']=$table;
				$query="SELECT * FROM question_table where sem = $sem1 and ia_no=$ia_no and subject='$sub' and year='$year' ORDER BY Question_no;";
				$SQL=mysql_query($query,$conn);
					echo "<table border = 0px>";
				while($record1=mysql_fetch_array($SQL))
				{	
					$r=$record1['Question_no'];
					echo "<tr><td>" . $r . "</td><td><input name=". $r." type=text required></tr>";
				};
			?></table>
    </div>
	
        <button type="submit" name="result" value="SUBMIT" class="button button-block"/>Submit</button></form>
				  <br><br>
        <div ><a href="sel.php">
          <button  class="button button-block">Back</button>
		  </a></div>
    <br><br>	</div>
    <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>
