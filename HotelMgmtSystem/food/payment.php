
<?php
   //include('connect.php');
   $con = mysqli_connect('localhost','root','test');
if(!$con)
{
	die("Database connection failed".mysqli_error($con));
}
$select_db = mysqli_select_db($con,'hotel1');
if(!$select_db)
{
	die("Database selection failed".mysqli_error($con));
}
   
   session_start();
   $user_check = $_SESSION['user_id'];
   $ses_sql = mysqli_query($con,"select * from registration where email = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['name'];

   
  if(!isset($_SESSION['uid'])) { 
  //      echo "Invaild uid";
        $_SESSION['lfail'] = "You Must Have to Log-In First";
   header('location:http://localhost/HotelMgmtSystem/login/signin.php');
 }
  
   

require_once("dbcontroller.php");
$db_handle = new DBController();
?>

<html>
<head>
<title>Payment Page</title>
<style>
.bd	{
	height:800px;
	width:1060px;
	background:#FFF;
	margin-left:160px;
	margin-top:-15px;
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

.container	{
	width:900px;
}
</style>
</head>
<body>

<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/header.php";
    include($path);
  ?>


<div style="background:#FFF; margin-top:50px; height:800px;">
<!--
      <div class="menu"
      <div style="margin-top:5px; background:#0F9; height:80px; width:600px">
    <h3 style="margin-left:80px;">Welcome <?php echo $login_session; ?></h3>
    	<a class="link_btn" style="float:right; margin-right:10px; margin-top:-10px; width:80px;" href="signout.php">Logout</a>
      </div>
 -->
  
    <?php
if(isset($_SESSION["cart_item"]))
{
    $item_total = 0;
?>
	<div class="container">
        <div style="border:1px solid #000; height:300px;width:400px; float:left; margin-top:20px;">
            <table border="3" cellpadding="3" cellspacing="3" style="margin-left:45px; margin-top:40px;">
                <tr><th colspan="4"><h4><br>Your order summary</h4></th></tr>
                <th>Product Description</th><th>Quant.</th><th>Price</th>
                
                <?php		
                    foreach ($_SESSION["cart_item"] as $item)
                    {
                ?>
                <tr>
                    <td>
                        <?php echo $item["name"]; ?></td>
    
                    <td style="text-align:right;border-bottom:#F0F0F0 2px solid;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;border-bottom:#F0F0F0 2px solid;"><?php echo $item["price"]; ?></td>
                </tr>
                        <?php $item_total += ($item["price"]*$item["quantity"]);
                    }
                ?>
                <tr><td><center>Total Amount</center></td><td colspan="2"><b><center><?php echo $item_total.".00"; } ?></center></b></td></tr>
                </table>
        </div>

        <!--
        <div style="border:1px solid #000; height:460px; width:400px; float:right; margin-top:20px;">
        	<h4 align="center">Pay with a debit or credit card</h4>
            <form name="order_form" method="post">
            <table style="margin-left:52px;">
            	<tr><td>Country</td><td><input type="text" name="country"/></td></tr>
                <tr><td>Card number</td><td><input type="number" name="card_number"/></td></tr>
                <tr><td>Expiration date</td><td><input type="number" name="mm" style="width:72px;" placeholder="MM" maxlength="2"/>&nbsp;/&nbsp;
                								<input type="number" name="yy" style="width:72px;" placeholder="YY" maxlength="2"/></td></tr>
                <tr><td>Card Holder Name</td><td><input type="text" name="card_holder" ></td></tr>
                <tr><td>CVV Number</td><td><input type="number" name="cvv" maxlength="3" ></td></tr>
                <tr><td colspan="2"><h4 align="center"><b><u>Delivery Address</u></b></h4></td></tr><hr>
                <tr><td>Name</td><td><input type="text" name="name"></td></tr>
                <tr><td>Address</td><td><textarea name="address"></textarea></td></tr>
                <tr><td>Contact No.</td><td><input type="number" name="contact_no" maxlength="10"></td></tr>
                <tr><td>PIN</td><td><input type="number" name="pin" maxlength="6"></td></tr>
                <tr><td colspan="2"><center><input type="submit" name="submit_order" value="Pay and place order" class="link_btn"></center></td></tr>
            </table>
        </div>
      -->
    </div>
    
</div>

<?php
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path = $path . "/HotelMgmtSystem/footer.php";
    include($path);
  ?>

</body>
</html>