<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysql_query("SELECT rollno FROM login WHERE rollno = '$user_check';",$conn);
   
   $row = mysql_fetch_array($ses_sql);
   
   $login_session = $row['rollno'];
   
   if(!isset($_SESSION['login_user']))
   {
      header("location:index.php");
   }
?>
