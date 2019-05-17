
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
 $a=$_GET['rid'];
echo "$a";

$sql1="delete from room where rid='$a'";

$result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));


if (mysqli_num_rows($result) == 1) {
	header('location:http://localhost/HotelMgmtSystem/admin/settings.php');


} else {
	header('location:http://localhost/HotelMgmtSystem/admin/settings.php');
}
mysqli_close($conn);

?>