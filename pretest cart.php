<?php

$sel_price = "select * from cart where ip_add='$ip'";

$run_price = mysqli_query($con, $sel_price);

while($p_price=mysqli_fetch_array($run_price))

{

$pro_id_cart = $p_price['p_id'];

$pro_qty = $p_price['qty'];

$set_price = "select * from products where product_id='$pro_id_cart'";

$run_pro_price = mysqli_query($con, $set_price);

while($pro_price=mysqli_fetch_array($run_pro_price))

{

#$actual_price = array($pro_price['product_price']);

$pro_id = $pro_price['product_id'];

$pro_title = $pro_price['product_title'];

$pro_image = $pro_price['product_image'];

$single_price = $pro_price['product_price'];

$sub_total_price = $single_price*$pro_qty;

$product_price = array($sub_total_price);

$values = array_sum($product_price);

$total+=$values;

?>

<tr align="center">

<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id_cart; ?>"/><input type="hidden" name="product_adjust_id[]" value="<?php echo $pro_id_cart ?>" /></td>

<td><?php echo $pro_title ?><br />

<img src="admin_area/product_images/<?php echo $pro_image ?>" width="60px" height="60px"/>

</td>

<td><input type="text" size="3" name="qty[]" value="<?php echo $pro_qty ?>"/></td>

<td><?php echo "Rs".$sub_total_price; ?></td>

</tr>

<?php } } ?>

<tr align="right">

<td colspan="4" style="padding-right:45px;"><b>Sub Total:</b> <?php echo "Rs".$total ?></td>

</tr>

<tr align="center">

<td ><input type="submit" name="update_cart" value="Update Quantity" /></td>

<td><input type="submit" name="continue" value="Continue Shopping" /></td>

<td><button><a href="checkout.php" style="text-decoration:none; color:#000;">Check Out</a></button></td>

</tr>

</table>

</form>

<?php

$ip = getIPAddress();

if(isset($_POST['remove'])){

if($_POST['remove'] !="")

{
foreach($_POST['remove'] as $remove_id){

$delete_product = "delete from cart where p_id='$remove_id' AND ip_add='$ip'";

$run_delete = mysqli_query($con, $delete_product);

if($run_delete){

echo "<script>window.open('cart.php','_self')</script>";

}

}

}

}

elseif(isset($_POST['update_cart']))

{

$i=0;

$new_qty = $_POST['qty'];

foreach($_POST['product_adjust_id'] as $pro_adj_id)

{

$new_qty = $_POST['qty'][$i];

$update_product_qty = "update cart set qty='$new_qty' where ip_add='$ip' and p_id='$pro_adj_id'";

$run_update = mysqli_query($con, $update_product_qty);

$i++;

}

if($run_update)

{

echo "<script>window.open('cart.php','_self')</script>";

}

}

elseif(isset($_POST['continue']))

{

echo "<script>window.open('index.php','_self')</script>";

}

?>
