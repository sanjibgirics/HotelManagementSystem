<?php
 session_start();
$servername = "localhost";
$database = "hotel1";
$username = "root";
$password = "test";

$conn = mysqli_connect($servername, $username, $password, $database);


// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 

$a=$_GET['id'];
$b=$_SESSION['user_id'];

$sql="UPDATE reservation SET amount=$a where gid=$b and status='current'";
mysqli_query($conn,$sql) or die(mysqli_error($conn));


	if (mysqli_query($conn, $sql)) {
 		

			$_SESSION['successfood']  = "Order Placed.Will be delivered Soon.Enjoy";
	     header("Location:http://localhost/HotelMgmtSystem/food/foodOrder1.php");
	     unset($_SESSION["cart_item"]);
      //echo "New record created successfully";
		} else {
			
			
			$_SESSION['failfood']  = "Invaild Order Details";
	     header("Location:http://localhost/HotelMgmtSystem/login/food/foodOrder1.php");
      //echo "Error: Invalid Login";
	}
	
?>