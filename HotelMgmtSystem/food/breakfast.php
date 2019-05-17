<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

?>

<html>
<head>
<title>Breakfast Menu</title>
<style>
.table1 {
  width: 100%;
  table-layout: fixed;
}

th {
  width: 20%
}


.headings {
  height: 100%;
  width:20%;
  border: 1px black solid;
  overflow: scroll;
  font-weight:bold;
}

.img	{
	width:100px;
	height:70px;
}
</style>
</head>

<body>
<div style="background:#FFF;">
<div style="width:1200px; margin-left:20px; background:#CCC; margin-top:-25px;">


<h3>Breakfast Menu</h3>
<table>
<thead>
    	<tr class='headings'><td>IMAGE</td><td>NAME</td><td>SUMMARY</td><td></td><td>PRICE</td><td>QUANTITY</td></tr>
        <tr><td colspan="8"><hr /></td></tr>
  	  <?php
	  		
			$product_array = $db_handle->runQuery("SELECT * FROM tblfood where type = 'breakfast'");
			if (!empty($product_array)) { 
			foreach($product_array as $key=>$value){
	?>
				<form method="post" action="foodOrder1.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
                <tr><td><?php echo '<img class="img" src="data:image/jpeg;base64,'.base64_encode($product_array[$key]["image"]).'"/>'; ?></td>
				<td><?php echo '<p style="font-family:Helvetica;">'.$product_array[$key]["name"]; ?></p></td>
				<td><?php echo '<p style="font-family:Times New Roman, Times, serif;">'.$product_array[$key]["summary"]; ?></p></td>
				<td><?php echo '<img style="height:30px; width:30px;" src="data:image/jpeg;base64,'.base64_encode($product_array[$key]["veg_nv"]).'"/>'; ?></td>
				<td><?php echo $product_array[$key]["price"]; ?></td>
				<td><input type="text" name="quantity" id="quant" style="text-align:center;" value="1" size="2" /></td>
            <td><input type="submit" name="addToCart" value="Add to cart" /></td>
            </tr>
			</form>
		</div>
		
	<?php
			}
	}
	?>

            
</thead>

</table>

</div>
</div>
</body>
</html>