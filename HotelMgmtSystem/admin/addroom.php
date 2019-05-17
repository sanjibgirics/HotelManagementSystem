<?php
 session_start();

$servername = "localhost";
$database = "hotel1";
$username = "root";
$password = "test";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 $a=$_POST[rno];
 $b=$_POST[room_type];
 
 
 //echo "$a+$b+$c+$d+$e+$f";

 $sql1= "INSERT INTO room VALUES ($a,'notfill',$b) ";

 $result=mysqli_query($conn,$sql1); //or die(mysqli_error($conn));


if ($result) {

			$_SESSION['a_success']  = "Room is Sucessfully Added ! It is now Available for book";
	      header('location:http://localhost/HotelMgmtSystem/admin/settings.php');

} else {


	$_SESSION['a_fail']="Invalid Entry room number is already exist";
	header('location:http://localhost/HotelMgmtSystem/admin/settings.php');
}
mysqli_close($conn);

?>