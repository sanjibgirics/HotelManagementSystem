<html>
<head>
<title>Gallery</title>
<link rel="stylesheet" type="text/css" href="http://localhost/HotelMgmtSystem/style/gallery.css">
</head>

<body>

   <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/header.php";
    include($path);
  ?>

  
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

<table id="grid-cell" cellspacing="30" style="padding:0 0 0px 0;argin-left:0px;">

<tr>
  
<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/111.jpg"></a>
</td>

<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/5.jpg"></a>
</td>

<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/222.jpg"></a>
</td>


</tr>

<tr>
  
<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/2.jpg"></a>
</td>

<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/6.jpg"></a>
</td>

<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/4.jpg"></a>
</td>


</tr>

<tr>
  
<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/22.jpg"></a>
</td>

<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/11.jpg"></a>
</td>

<td class="grid_border" style="text-align:center;">
   <img src="http://localhost/HotelMgmtSystem/style/3.jpg"></a>
</td>


</tr>




</table>

</div>



  <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/footer.php";
    include($path);
  ?>

</body>
</html>
