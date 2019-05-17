<?php
   //include('connect.php');
   
   $con = mysqli_connect('localhost','root','test');
if(!$con)
{
	die("Database connection failed".mysqli_error($con));
}
$select_db = mysqli_select_db($con,'hotel1');
if(!$select_db)
{
	die("Database selection failed".mysqli_error($con));
}
   
   session_start();
   $user_check = $_SESSION['user_id'];
   $ses_sql = mysqli_query($con,"select * from registration where email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['name'];

   if(!isset($_SESSION['uid'])) { 
  //      echo "Invaild uid";
        $_SESSION['lfail'] = "You Must Have to Log-In First";
   header('location:http://localhost/HotelMgmtSystem/login/signin.php');
}
?>