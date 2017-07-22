<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!--<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'-->
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/style2.css">
	
	<script type="text/javascript" src="js/script.js">
			function addRow(tableID) {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				if(rowCount <100){                            // limit the user from creating fields more than your limits
					var row = table.insertRow(rowCount);
					var colCount = table.rows[0].cells.length;
					for(var i=0; i <colCount; i++) {
						var newcell = row.insertCell(i);
						newcell.innerHTML = table.rows[0].cells[i].innerHTML;
					}
				}else{
					 alert("Maximum Passenger per ticket is 5");
						   
				}
			}

			function deleteRow(tableID) {
				var table = document.getElementById(tableID);
				var rowCount = table.rows.length;
				for(var i=0; i<rowCount; i++) {
					var row = table.rows[i];
					var chkbox = row.cells[0].childNodes[0];
					if(null != chkbox && true == chkbox.checked) {
						if(rowCount <= 1) {               // limit the user from removing all the fields
							alert("Cannot Remove all the Passenger.");
							break;
						}
						table.deleteRow(i);
						rowCount--;
						i--;
					}
				}
			}
			
		</script>
  </head> 
 <body>
	<div class='form'>
 <?php
	$db_name="wtl_proj";
	$table_name="marks_table";
	$conn = mysql_connect("localhost","root","")or die("Error in connection");
	mysql_select_db($db_name)or die("cannot select DB");
	$que=$_POST['que'];
	$year=$_POST['year'];
	$sem=$_POST['sem'];
	$ia_no=$_POST['ia_no'];
	$subject=$_POST['subject'];
	
	
	session_start();
	$_SESSION['que'] = $que;
	$_SESSION['subject'] = $subject;
	$_SESSION['ia_no'] = $ia_no;
	$_SESSION['sem'] = $sem;
	$_SESSION['year'] = $year;

 ?>
	<form action="addCOs.php" class="register" method="POST">
            <h1>Enter COs and total marks</h1>
	<?php for ($i=0;$i<$que;$i++){?>		
            <fieldset class="form">
				<legend>Question Details</legend>
				<ul class='tab-group'> 
	
				<li class='tab' ><button value="Add" onClick="addRow('dataTable<?php echo $i;?>')" class="button button-block">Add<?php echo $i+1;?></button> </li>
					<li class='tab' ><p></p></li>
					<li class='tab'><button value="Remove" onClick="deleteRow('dataTable<?php echo $i;?>')" class="button button-block">Remove<?php echo $i+1;?></button> 
				</li></ul><br><br><br><br>
				
               <table id="dataTable<?php echo $i;?>"  border="0">
                    <tr>
							<td><input type="checkbox" class="form-control" required="required" name="chk[]" checked="checked" /></td>
								<td>
								<label for="BX_Question">Enter Question Number</label>
								<input type="text" required="required" name="BX_Question[]">
							</td>
							 
							<td>
								<label for="BX_cos">Enter COs</label>
								<input type="text" required="required" name="BX_cos[]">
							</td>
							
							<td>
								<label for="BX_marks">Enter total marks</label>
								<input type="text" required="required" name="BX_marks[]">
							</td>
                    </tr>
	</table>
				
            </fieldset>

            <?php } ?>
			<button type="submit" name="result" value="SUBMIT" class="button button-block"/>Continue</button><br><br>
			 </form></div>       
		
	<script src='js/jquery.min.js'></script>
        <script src="js/index.js"></script>
		<script type="text/javascript">
var sc_project=9046834; 
var sc_invisible=1; 
var sc_security="ec55ba17"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="free hit
counter" href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9046834/0/ec55ba17/1/"
alt="free hit counter"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->

  </body>
</html>
