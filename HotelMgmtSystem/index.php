 
<html>

<head>
  <title>Mayfair</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style/homepageStyle.css">  
</head>

<body>

  <!--header-->
 <div id = "main">

  <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/header.php";
    include($path);
  ?>

  <!--footer-->

  <div id="site_content">

    "Welcome To MayFair"
    <h3>Hotel Mayfair welcomes you to the glorious city of Bhubaneswar, where hospitality is a way of life. Peace-loving people with a rich cultural heritage and places of natural scenic beauty, makes Bhubaneswar an ideal place to plan your holiday and business ventures.</h3>

  </div>


  <div id = "slider">

          <!-- slider code -->
 <style>


.mySlides {display: none;}
img {vertical-align: middle;}

.slideshow-container {
  max-width: 1300px;
  position: relative;
  margin: auto;
 
}


/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}


</style>



<div class="slideshow-container">

 <div class="mySlides fade">
  <a href = "gallery.php"><img src="style\11.jpg" style="width:100%;height:500px;"></a>
 </div>

<div class="mySlides fade">
  <a href = "gallery.phpl"><img src="style\22.jpg" style="width:100%;height:500px;"></a>
</div>

<div class="mySlides fade">
  <a href = "gallery.php"><img src="style\33.jpg" style="width:100%;height:500px;"></a>
</div>

<div class="mySlides fade">
  <a href = "booking.php"><img src="style\44.jpg" style="width:100%;height:500px;"></a>
</div>


</div>

<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 3000); // Change image every 2 seconds
}
</script>

</div>

<div id="article">
  
  <style>

#grid-cell .grid_border{
padding:1px;
}
#grid-cell .grid_border:hover{
padding:0.5px;
border:0.5px solid #D3D3D3;
}


</style>

<table id="grid-cell" cellspacing="50" style="padding:0 0 150px 0;margin-left:8px;">
<tr>
  



<td class="grid_border" style="text-align:center;">
   <a href = "offer.php"><img src="style\1.jpg"></a><br>
   <div id = "grid_span">
   <span>Book through this offer and get 10% off on the lowest available rate for your favourite hotel</span>
 </div>
  
</td>
<td class="grid_border" style="text-align:center;">
   <a href = "reservation/reservation.php"><img src="style\111.jpg"></a>
   <div id = "grid_span">
   <span>Experience More.Rejuvenate in the city of temple with our  most exquisite offer of the Year</span>
 </div>
  
</td>

<td class="grid_border" style="text-align:center;">
   <a href = "food/foodOrder1.php"><img src="style\3.jpg"></a>
   <div id = "grid_span">
   <span>Indulge yourself with a variety of Indian and international cuisine available at our restaurants with the Breakfast Inclusive Rate.</span>
 </div>
  
</td>

</tr>

<tr>

<td class="grid_border" style="text-align:center;">
   <a href = "food/foodOrder1.php"><img src="style\4.jpg"></a>
   <div id = "grid_span">
   <span>Fresh, local produce, natural ingredients and vivid regional cooking styles make Mayfair Hotel a smart choice for any of your meals. Our kitchen's open 24x7. So you can eat on schedule or on a whim. </span>
 </div>
  
</td>
<td class="grid_border" style="text-align:center;">
   <a href = "gallery.php"><img src="style\5.jpg"></a>
   <div id = "grid_span">
   <span>Comfortable rooms.To ensure that you're stay with us is truly memorable we offer spacious rooms with 24x7 quick an hassle-free service.</span>
 </div>
  
</td>

<td class="grid_border" style="text-align:center;">
   <a href = "eminities.php"><img src="style\6.jpg"></a>
   <div id = "grid_span">
   <span>Gym Centre.Equipped to offer you authentic workout experience.</span>
 </div>
  
</td>


</table>

</div>




  <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/footer.php";
    include($path);
     ?>
     
</div>

</body>
</html>
