<!DOCTYPE html>
<html >
<?php include('config.php');?>
  <head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">  
    <link rel="stylesheet" href="css/style1.css">  
  </head>
    <body>

    <div class="form">  
      
        <div id="Result">                                        
          <h1>Enter Roll Number</h1>
          
          <form method="post" name="myform1" action="showResult.php">

          <div class="field-wrap">
            <label>
              Roll Number<span class="req">*</span>
            </label>
            <input type="text" name="rollno" required autocomplete="off"/>
          </div>
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
          <button type="submit" name="getresult"  class="button button-block"/>Get Result</button>
          
          </form>
        </div>
        
</div> <!-- /form -->
    <script src='js/jquery.min.js'></script>

        <script src="js/index.js"></script>
  
  </body>
</html>
