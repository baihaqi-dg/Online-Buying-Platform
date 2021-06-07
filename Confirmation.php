<div>

</div>

	<div id="products_box">


  <h2 align="center" style="padding:2px;">Payment Method Are via Cash On Delivery</h2>
	<h2 align="center" style="padding:2px;">Please Confirm Your Order</h2>

</div>
<form action="order_success.php" method="post" enctype="multipart/form-data">


	<table align="center" width="700" bgcolor="skyblue">

		<tr align="center">
			<th>Product(S)</th>
			<th>Quantity</th>
			<th>Total Price</th>
		</tr>

<?php

$total = 0;
global $con;
$ip = getIp();
$sel_price = "select * from cart where ip_add='$ip'";
$run_price = mysqli_query($con, $sel_price);

while($p_price=mysqli_fetch_array($run_price)){

	$pro_id = $p_price['p_id'];
	$pro_qty  = $p_price['qty'];
	$pro_price = "select * from products where product_id='$pro_id'";
	$run_pro_price = mysqli_query($con,$pro_price);

	while ($pp_price = mysqli_fetch_array($run_pro_price)){

	#$product_price = array($pp_price['product_price']);
	$product_title = $pp_price['product_title'];
	$product_image = $pp_price['product_image'];
	$single_price = $pp_price['product_price'];
	#$value = array_sum($product_price);
	#$total += $value * $pro_qty;

	$sub_total_price =$single_price * $pro_qty;
	$product_price = array($sub_total_price);
	$values = array_sum($product_price);
	$total+=$values;



// getting Quantity of the product
$get_qty = "select * from cart where p_id='$pro_id'";

$run_qty = mysqli_query($con, $get_qty);

$row_qty = mysqli_fetch_array($run_qty);

$qty = $row_qty['qty'];

if($qty==0){

$qty=1;
}
else {

$qty=$qty;

}


		?>

		<tr align="center">
			<td><?php echo $product_title; ?><br>
			<img src="seller/product_images/<?php echo $product_image;?>" width="60" height="60"/>
			</td>
			<td><?php echo $qty; ?></td>
			<td><?php echo "RM" . $single_price; ?></td>
		</tr>




	<?php } } ?>

	<tr>
			<td colspan="3" align="right"><b>Sub Total:</b></td>
			<td><?php echo "RM" . $total;?></td>
		</tr>

			<tr></tr>
			<tr></tr>
			<tr></tr>

			<tr align="left">
				<td colspan="6"><h3>Name and Address For Postage:</h3></td>
			</tr>

			<tr>
				<td align="left">Customer Name:</td>
				<td><input type="text" name="c_name" required/></td>
			</tr>

			<tr>
				<td align="left">Customer address:</td>
				<td><input type="text" name="c_address" required/></td>
			</tr>

			<tr></tr>

		<tr align="center" >
			<td colspan="2"><button><a href="menuUtama.php" style="text-decoration:none; color:black;">Back</a></button></td>
			<td><input type="submit" name="submit" value="Confirm" </td>
		</tr>


</table>

</form>
