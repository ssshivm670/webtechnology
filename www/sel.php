<html>
<?php include('config.php');?>
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
</head>

<body>														
								
    <div class="form">
      <form action="temp_ses.php" method="POST">
      <ul class="tab-group1">
			 <li class="tab-sem">
			<select name='selected_sem'>
					<option value=0>Select Sem</option> 
					<option value=1>Sem 1</option> 
					<option value=2>Sem 2</option> 
					<option value=3>Sem 3</option> 
					<option value=4>Sem 4</option> 
					<option value=5>Sem 5</option> 
					<option value=6>Sem 6</option> 
					<option value=7>Sem 7</option> 
					<option value=8>Sem 8</option> 

				</select></li>	
					<li class="tab"><p></p></li>
			<li class="tab-year">
			<select name='selected_year'>
					<option value=0>Select Year</option>
					<?php $sql=mysql_query("SELECT DISTINCT(year) FROM question_table;",$conn);?>
					<?php $count =0;
					while($record=mysql_fetch_array($sql)){?>
					<option value=<?php echo $record['year'];?>>Year <?php echo $record['year']; ?></option> 
					<?php $count++;}?>
				</select></li>
			</ul>  
			<br><br><br><br>
			<ul class="tab-group1">
			 <li class="tab-ia">
			<select name='selected_ia'>
				<option value=0>IA</option> 
				<option value=1>1</option> 
				<option value=2>2</option> 
			</select>
			</li>	
	</ul>
		<br><br><br><br>
	
		  
		    <h4>Enter Subject</h4>
		    <input type="text" name="sub"  required autocomplete="off"/>
		
	<ul class="tab-group">
        <li class="tab"><button type="submit" name="result" value="SUBMIT" class="button button-block"/>Enter Marks</button></li>
		<li class="tab"><p></p></li>
        <li class="tab"><a href="result.php" class="a" >Get Result</a></li>
    </ul><br><br>
		</form>
   </div>
 

</footer>
  
</body>
</html>
