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

echo "Failed to connect to MySQL: " . mysqli_connect_error();
      die("Connection failed: " . mysqli_connect_error());
}

/*$a=$_POST[name];
$b=$_POST[mobile];
$c=$_POST[email];
$i=$_POST[nationality];
$h=$_POST[idcard];
$g=$_POST[gender];
$f=$_POST[address];
echo "$a + $b +$c +$i +$h +$g +$f";*/

 if ($_POST['pwd']!= $_POST['pwd1'])
 {
     $_SESSION['pass_error']="Oops! Confirm Password did not match! Try again. ";
     header('Location:http://localhost/HotelMgmtSystem/login/signup.php');
 }
 else
 {

$sql="INSERT INTO registration (name,mobile,pwd,email,nationality,idcard,gender,address) VALUES('$_POST[name]',$_POST[mobile],'$_POST[pwd]','$_POST[email]','$_POST[nationality]','$_POST[idcard]','$_POST[gender]','$_POST[address]')";

$result=mysqli_query($conn,$sql);



if ($result == true) {

	$_SESSION['success']  = "New user successfully created!!";

	header('Location:http://localhost/HotelMgmtSystem/login/signin.php');
       
} else {
//echo("Error description: " . mysqli_error($con));
	$_SESSION['fail']  = mysqli_error($con);
	header('Location:http://localhost/HotelMgmtSystem/login/signup.php');
      //echo "Error: Invalid Login";
}
}
mysqli_close($conn);

?>
