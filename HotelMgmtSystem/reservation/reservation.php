<?php
 session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Reservation</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/HotelMgmtSystem/style/formCSS.css">
</head>
<body>

   <body>

	 <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/header.php";
    include($path);
  ?>



	<?php
	 if (isset($_SESSION['lfail'])) : ?>
			<div class="box">
				<p>
					<?php 
						 echo "You Must Have to Login-In First";
					?>
				</p>
			</div>
	<?php endif ?>
	
	<?php
	 if (isset($_SESSION['success'])) : ?>
			<div class="box">
				<p>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</p>
			</div>
	<?php endif ?>
	<?php
	 if (isset($_SESSION['fail'])) : ?>
			<div class="box">
				<p>
					<?php 
						echo $_SESSION['fail']; 
						unset($_SESSION['fail']);
					?>
				</p>
			</div>
	<?php endif ?>

   


      

 <div class="box">

<form action="http://localhost/HotelMgmtSystem/reservation/book.php" method="post">
    
    <img class="image" src="book.png"><div class="heading"><h2 align="center">Reservation</h2><hr></div><br>
    
    <table align="center">
           <tr><td><p>Check-In</p></td><td><input class="input_box" type="date" name="date_in" min=<?php
         echo date('Y-m-d');
     ?> required></td></tr>
           <tr><td><p>Check-Out</p></td><td><input class="input_box" type="date" name="date_out" min=<?php
         echo date('Y-m-d');
     ?> required></td></tr>
      
        <tr><td><p>Room Type</p></td><td><select name="room_type" required></p>
		<option value="">-- select one --</option>
		<option value="1001">A/c Suite-Rs.4500/-</option>
		<option value="1002">A/c Deluxe-Rs.3800/-</option>
		<option value="1003">A/c Double Deluxe-Rs.6700/-</option>
		<option value="1004">Non A/c Double Deluxe-Rs.4400/-</option>
		<option value="1005">Non A/c Deluxe-Rs.2300/-</option>
		</select></td></tr>

        <tr><td><p>Adult</p></td><td><select name="adult" required></p>
			<option value="">-- select one --</option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select></td></tr>


		<tr><td><p>Child</p></td><td><select name="child" required></p>
			<option value="">-- select one --</option>
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select></td></tr>


            <tr><td colspan="2"><p align="center"><input class="lgn_rgstr" type="submit" name="submit" value="Book"></p></td></tr>
    </table>
   </form>
   
   
   </div>
 </div>

<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem//footer.php";
    include($path);
     ?>
	
		
</body>
</html>