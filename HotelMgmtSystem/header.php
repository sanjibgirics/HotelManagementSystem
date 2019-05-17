 <?php
 session_start();
 ?>

 <html>

<head>
  <title>Mayfair</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="http://localhost/HotelMgmtSystem/style/style.css">


 
  <!--  <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$(document).ready(function(){
var header = $('body');

var backgrounds = new Array(
    'url(http://localhost/HotelMgmtSystem/style/logo3.jpg)'
  , 'url(http://localhost/HotelMgmtSystem/style/logo2.jpg)'
  , 'url(http://localhost/HotelMgmtSystem/style/logo4.jpg)'
  , 'url(http://localhost/HotelMgmtSystem/style/logo1.png)'
);

var current = 0;

function nextBackground() {
    current++;
    current = current % backgrounds.length;
    header.css('background-image', backgrounds[current]);
}
setInterval(nextBackground, 4000);

header.css('background-image', backgrounds[0]);
});

</script> -->




</head>

<body>

  

    <div id = "header">

      <div id="logo">
          <h1><a href="http://localhost/HotelMgmtSystem/index.php" id="logo_text1">Mayfair<span id="logo_text2">   Hotel</span></a></h1>
          &nbsp;<span id= "logo_text3">Responsible Luxury</span>
          &nbsp;&nbsp;<img src = "http://localhost/HotelMgmtSystem/style/logoo.png" alt = "image not avilable" style = "width:4%;height :5%">
       
 

        </div>
    

      <div id="nav">
        <ul id="menu">
          <li><a href="http://localhost/HotelMgmtSystem/index.php">Home</a></li>
          <li><a href="http://localhost/HotelMgmtSystem/reservation/reservation.php">Book Room</a></li>
          <li><a href="http://localhost/HotelMgmtSystem/food/foodOrder1.php">Food Lounge</a></li>
          <li><a href="http://localhost/HotelMgmtSystem/eminities.php">Eminities</a></li>
          <li><a href="http://localhost/HotelMgmtSystem/gallery.php">Gallery</a></li>
          <li><a href="http://localhost/HotelMgmtSystem/contact.php">Contact Us</a></li>

   <?php

   if (isset($_SESSION['username'])) : ?>
      
        <li><span style ="color: cyan">

          <?php 
            echo "Hello, ";
            echo $_SESSION['username']; 
            //echo $_SESSION['uid'];
            //
            //unset($_SESSION['username']);
          ?>

        </span></li>

        <li><a href="http://localhost/HotelMgmtSystem/reservation/history1.php">Bookings</a></li>
        <li><a href="http://localhost/HotelMgmtSystem/login/signout.php">SignOut</a></li>
      
      
  <?php endif ?>


  <?php
   if (!isset($_SESSION['username'])) : ?>

   <li><a href="http://localhost/HotelMgmtSystem/login/signin.php">Login</a></li>

  <?php endif ?>

        </ul>

  </div>

  </div> 
  
</body>
</html>
