<?php
 session_start();
?>

<?php

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
	

 $a=$_POST[date_in];
 $b=$_POST[date_out];
 $c=$_POST[room_type];
 $d=$_POST[adult];
 $e=$_POST[child];
 $f=$_SESSION['uid'];
 
 //echo "$a+$b+$c+$d+$e+$f";

 $sql1= "SELECT * from room where rmtype=$c and status='notfill' limit 1";

 $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));


if (mysqli_num_rows($result) == 1) {
	$logged_in_user = mysqli_fetch_assoc($result);
	//echo "hello";
	$g=$logged_in_user['rid'];
	if(!isset($_SESSION['uid'])) { 
				echo "Invaild uid";
				$_SESSION['lfail'] = "You Must Have to Log-In First";
	 header('location:http://localhost/HotelMgmtSystem/login/signin.php');
    // HTML here
		}
		else if ($b < $a) {

	$_SESSION['fail']="Check_Out Date Should be greater then Check_In";
	header('location:http://localhost/HotelMgmtSystem/reservation/reservation.php');
			# code...
		}
		else
		{


	$sql2="UPDATE room SET status='fill' where rid=$g";
	mysqli_query($conn,$sql2) or die(mysqli_error($conn));
	//echo "$g";

	$sql= "INSERT INTO reservation (date_in,date_out,gid,rmid,adults,childs,days) VALUES('$a','$b',$f,$g,$d,$e,datediff('$b','$a'))";

 		if (mysqli_query($conn, $sql)==true) {
 			//echo "Sucessfully";

			$_SESSION['success']  = "Sucessfully Bookd ! Looking Forward to see you";
	     header('location:http://localhost/HotelMgmtSystem/reservation/reservation.php');
      //echo "New record created successfully";
		} else {
			//	echo "fail";
			//echo mysqli_error($conn);
			$_SESSION['fail']  = "Invaild Book! Enter all the details correctly";
	     header('location:http://localhost/HotelMgmtSystem/reservation/reservation.php');
      //echo "Error: Invalid Login";
	}
}


} else {


	$_SESSION['fail']="Sorr!!Try Other Room Type!!Cuurently this type room is full";
	header('location:http://localhost/HotelMgmtSystem/reservation/reservation.php');
}
mysqli_close($conn);

?>