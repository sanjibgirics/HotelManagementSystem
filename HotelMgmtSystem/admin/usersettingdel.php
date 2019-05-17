<?php


include ('db.php');

			
			$id =$_GET['eid'];		
			$newsql ="DELETE FROM `login` WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
							
						
				}
			header("Location: usersetting.php");
		
?>
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
$id =$_GET['eid'];	
 //echo "$a+$b+$c+$d+$e+$f";

 $sql1= "DELETE FROM admin where aid='$id'";

 $result=mysqli_query($conn,$sql1); //or die(mysqli_error($conn));


if ($result) {

			$_SESSION['a_success']  = "Room is Sucessfully Added ! It is now Available for book";
	      header('location:http://localhost/HotelMgmtSystem/admin/usersetting.php');

} else {


	$_SESSION['a_fail']="Invalid Entry room number is already exist";
	header('location:http://localhost/HotelMgmtSystem/admin/usersetting.php');
}
mysqli_close($conn);

?>

