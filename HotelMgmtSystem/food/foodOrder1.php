<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_GET["action"])) 
{
	//creating switch case for add product, remove product, empty cart and checkout
	switch($_GET["action"]) {
	
	//add switch case to add product on mouseclick.
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblfood WHERE id='" . $_GET["id"] . "'");
			$itemArray = array($productByCode[0]["id"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["id"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["id"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	//add switch case end here
	
	
	//remove switch case to remove selected item on mouseclick
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["id"] == $_SESSION["cart_item"][$k]['code'])
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
	
	case "checkout":
		header("Location:http://localhost/HotelMgmtSystem/login/signin.php");
	break;
}
}
?>

<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/header.php";
    include($path);
  ?>
  
<div class="txt-heading">

<h1 align="center">Resturant

</h1>



<?php
	 if (isset($_SESSION['failfood'])) : ?>
			<div class="box">
				<h2>
					<?php 
						 echo $_SESSION['failfood']; 
						unset($_SESSION['failfood']);
					?>
				</h2>
			</div>
	<?php endif ?>


	<?php
	 if (isset($_SESSION['successfood'])) : ?>
			<div class="box">
				<h1 style="color: cyan">
					<?php 
						 echo $_SESSION['successfood']; 
						unset($_SESSION['successfood']);
					?>
				</h1>
			</div>
	<?php endif ?>

<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
	echo    '<a style="margin-top:10px;" id="btnEmpty" href="foodOrder1.php?action=empty">Click Here to Empty Cart</a> 
</div>';
?>	


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


<body>  



<div style="background:#FFF; margin-top:-10px;">
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:center;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	

<form method="post" action="http://localhost/HotelMgmtSystem/food/welcome.php">
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><p style="margin-right:-20px;"><strong>
				<?php echo $item["name"]; ?></strong></p><input type="hidden" name="prname" value="<?php echo $item["name"]; ?>"></td>
				<?php //echo $item["code"]; ?>
                <input type="hidden" name="prid" value="<?php echo $item["code"]; ?>"><!--</td>-->
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;">
				<?php echo $item["quantity"]; ?><input type="hidden" name="prquantity" value="<?php echo $item["quantity"]; ?>"></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;">
				<?php echo $item["price"]; ?><input type="hidden" name="prprice" value="<?php echo $item["price"]; ?>"></td>
		        <td style="text-align:right;border-bottom:#F0F0F0 1px solid;">
				<?php echo $item["price"]; ?><input type="hidden" name="prprice" value="<?php echo $item["price"]; ?>"></td>
		        <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="foodOrder1.php?action=remove&id=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>
</tr>
<tr>
<td colspan="3" align=right><strong>Total:</strong> <?php echo $item_total.".00"; ?></td>
<td colspan="5" align=right>
	<strong>
        <input type="submit" name="chkout" value="Checkout" class="add_cart"/>
    </strong>
    </form>
</td>
</tr>
</tbody>
</table>		
</div>
  <?php
}

?>


        
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}

/*--------------------------------------*/

.bd	{
	height:1150px;
	width:1060px;
	background:#FFF;
	margin-left:160px;
	margin-top:-15px;
	border:2px solid #003;
}
.title{
	height:120px;
	background:#090;
	margin-top:-15px;
	border:1px solid #000;
}
.img{
	margin-top:20px;
}
.menu{
	width:1050px;
	height:30px;
	background:#4479BA;
	padding:5px;
}
.link_btn {
   
    border-radius: 4px;
    border: solid 1px #20538D;
    background: #4479BA;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;
	margin-top:5px;
}

.img_p{
	height:280px;
	width:180px;
}

.txt-heading{    
	padding: 10px 10px;
    border-radius: 2px;
    color: #FFF;
    background: #6aadf1;
	margin-bottom:10px;
}

.add_cart{
    background-color: #f44336;
    color: white;
    padding: 5px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}

#btnEmpty {
	background-color: #f44336;
    border: #FFF 1px solid;
    padding: 1px 10px;
	color:white;
    text-decoration: none;
	margin-left:100px;
    border-radius: 4px;
}



</style>

<div class="tab">
  <button class="tablinks" onClick="openCity(event, 'breakfast')">Snacks</button>
  <button class="tablinks" onClick="openCity(event, 'lunch')">Main Course</button>

</div>

<div id="breakfast" class="tabcontent">
 <?php include('breakfast.php'); ?>
</div>

<div id="lunch" class="tabcontent">
 <?php include('mainCourse.php'); ?>
</div>

<!--
<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
-->
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
  
</div>
  <?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/footer.php";
    include($path);
  ?>

</body>
</html>
