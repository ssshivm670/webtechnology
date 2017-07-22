
<html>
	<body>

	
	<?php 
		$name=$_POST["name"];
		$psw=$_POST["psw"];

		$db_name="wtl_proj";
		$table_name="login";
		$conn = mysql_connect("localhost","root","")or die("Error in connection");
		mysql_select_db($db_name)or die("cannot select DB");
		
		
		
		$select_user="SELECT * FROM login WHERE rollno='$name' AND psw='$psw';";
		

			
		$user_selected=mysql_query($select_user,$conn);
		
		$count=mysql_num_rows($user_selected);

		$user = mysql_fetch_array($user_selected);
		
		if ($user['access']==1)
		{
			header("location: select.html");
		}
			
		else if ($count == 1)
		{	
		    session_start();
			$_SESSION['login_user'] = $name;
			header("location: sel.php");
		}

		else 
		{
		    header("location: login.html");
		}
	?>
	<br>

	</body>
</html> 







