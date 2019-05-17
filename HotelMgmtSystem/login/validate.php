<?php
 session_start();
$servername = "localhost";
$database = "hotel1";
$username = "root";
$password = "test";

$a=$_POST[mobile];
$b=$_POST[pwd];
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);


// Check connection
if (!$conn) {

      die("Connection failed: " . mysqli_connect_error());
}
 
$sql="select * from registration where mobile=$a and pwd='$b' limit 1";

$result=mysqli_query($conn,$sql);


if (mysqli_num_rows($result) == 1) {

	$logged_in_user = mysqli_fetch_assoc($result);
	$_SESSION['username']=$logged_in_user['name'];
	$_SESSION['uid']=$logged_in_user['uid'];
	$_SESSION['user_id']=$logged_in_user['uid'];
	header('Location:http://localhost/HotelMgmtSystem/index.php');

} else {

	$_SESSION['fail']="Invalid Login Detail";
	header('Location:http://localhost/HotelMgmtSystem/login/signin.php');
}
mysqli_close($conn);

?>
