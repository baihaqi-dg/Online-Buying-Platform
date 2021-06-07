<!DOCTYPE>

<?php

include("includes/db.php");

if(isset($_GET['confirm_order'])){

	$get_id = $_GET['confirm_order'];
	$get_order = "select * from orders where order_id='$get_id'";
	$run_order = mysqli_query($con, $get_order);
  $i = 0;

  $row_order=mysqli_fetch_array($run_order);

    $order_id = $row_order['order_id'];
    $order_invoice = $row_order['invoice_no'];
    $order_qty = $row_order['qty'];
    $order_customer_id = $row_order['c_id'];
		$order_prod_id = $row_order['p_id'];

	//get customer detail
  $get_cust = "select * from customers where customer_id='$order_customer_id'";
  $run_cust=mysqli_query($con, $get_cust);
  $row_cust=mysqli_fetch_array($run_cust);

  $cust_email = $row_cust['customer_email'];
	$cust_name = $row_cust['customer_name'];

	//get product details
	$get_prod = "select * from product where product_id = '$order_prod_id'";
	$run_prod = mysqli_query($con,$get_prod);
	$row_prod = mysqli_fetch_array($run_prod);

	$prod_name = $row_prod['product_title'];

}
?>
<html>
	<head>
		<title>Update Product</title>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>

<body bgcolor="skyblue">


	<form action="" method="post" enctype="multipart/form-data">

		<table align="center" width="795" border="2" bgcolor="#187eae">

			<tr align="center">
				<td colspan="7"><h2>Send Email To Customer</h2></td>
			</tr>

			<tr>
				<td align="right"><b>Tracking No:</b></td>
				<td><input type="text" name="tracking_no" size="60" value=""/></td>
			</tr>

			<tr>
				<td align="right"><b>Company Contact Information:</b></td>
				<td><input type="text" name="company_contact" value=""/></td>
				</td>
			</tr>

			<tr align="center">
				<td colspan="7"><input type="submit" name="send_mail" value="Send"/></td>
			</tr>

		</table>


	</form>


</body>
</html>
<?php

	if(isset($_POST['send_mail'])){

    $tracking_no = $_POST['tracking_no'];
    $company_contact = $_POST['company_contact'];

    $status = 'Completed';
    $update_order = "update orders set status = '$status' where order_id='$order_id' ";
    $run_update = mysqli_query($con , $update_order);

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <onlinefoodikscentre.com>' . "\r\n";

    $subject = "Order Confirmation";

    $message = "<html>
    <p>

    Hello dear <b style='color:blue;'></b> you have ordered some products on our website onlinefoodikscentre.com, please find your order details, your order has been processed. Thank you!</p>

      <table width='600' align='center' bgcolor='#FFCC99' border='2'>

        <tr align='center'><td colspan='6'><h2>Your Order Details from onlinefoodikscentre.com</h2></td></tr>

        <tr align='center'>
          <th><b>S.N</b></th>
					<th><b>Product Name</b></th>
          <th><b>Quantity</b></th>
          <th>Invoice No</th>
        </tr>

        <tr align='center'>
          <td>1</td>
					<td>$order_qty</td>
          <td>$order_qty</td>
          <td>$order_invoice</td>
        </tr>

      </table>

      <h3>Your Tracking number: $tracking_no</h3>

      <h3>For further information about your item contact $company_contact</h3>

      <h3>Please go to your account and see your order details!</h3>

      <h3> Thank you for your order @ - www.onlinefoodikscentre.com</h3>

    </html>

    ";

    mail($cust_email,$subject,$message,$headers);

    if ($run_update){

      echo"<script>alert('Order was updated')</script>";
      echo "<script>window.open('pagePenjual.php?view_orders','self')</script>";

    }
	}

?>
