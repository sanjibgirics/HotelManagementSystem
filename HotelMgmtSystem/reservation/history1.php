<html>
<head>
<title>Booking History</title>
<link rel="stylesheet" type="text/css" href="http://localhost/HotelMgmtSystem/style/formCSS.css">
<style>
.box table tr td{

text-align: center;
padding: 10px
}
</style>
</head>

<body>

   <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/header.php";
    include($path);
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

$a=$_SESSION['user_id'];


 $sql = "select distinct * from reservation r,room,room_type where gid='$a' and rmtype=rtid and rid=rmid order by date_in desc , date_out";
?>
 <div class="box">

  <div class="heading"><h2 align="center">Yours Booking</h2><hr></div><br><br>
  
  <table align="center">
      <tr><td><p>Booking ID</p></td><td><p>Check In</p></td><td><p>Check Out</p></td><td><p>Amount</p></td></tr>
    


 <?php   
  $result = mysqli_query($conn,$sql) or die(mysql_error($conn));
 



while($row = mysqli_fetch_array($result))
{
$c = $row['rtid'];
$d = $row['days'];
$sql1 = "select price from room_type where rtid='$c'";
$result1 = mysqli_query($conn,$sql1) or die(mysql_error($conn));
$row1 = mysqli_fetch_array($result1);
echo "<tr>"; 	
echo "<td><p>" . $row['rsid'] . "</p></td>";echo "<td><p>" . $row['date_in'] . "</p></td>";echo "<td><p>" . $row['date_out'] . "</p></td>";echo "<td><p>" . ($row['amount'] + $d*$row['price']). "</p></td>";
echo "</tr>";
}


mysqli_close($con);
?>

</table>

</div>
</div>


<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/footer.php";
    include($path);
  ?>


</body>
</html>
