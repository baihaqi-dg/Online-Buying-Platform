<?php
session_start();
?>



<html>
	<head>
		<title>Order Successful!</title>

	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>

<?php
		include("includes/db.php");
		include("functions/functions.php");

		//this is all for product details

		$total = 0;

		global $con;

		$ip = getIp();

		$sel_price = "select * from cart where ip_add='$ip'";

		$run_price = mysqli_query($con, $sel_price);

		while($p_price=mysqli_fetch_array($run_price)){

			$pro_id = $p_price['p_id'];

			$pro_price = "select * from products where product_id='$pro_id'";

			$run_pro_price = mysqli_query($con,$pro_price);

			while ($pp_price = mysqli_fetch_array($run_pro_price)){

			$product_price = array($pp_price['product_price']);

			$product_id = $pp_price['product_id'];

			$pro_name = $pp_price['product_title'];

			$pro_user_id = $pp_price['product_user_id'];


			$values = array_sum($product_price);

			$total +=$values;



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

			$total = $total*$qty;

			}

			// this is about the customer
			$user = $_SESSION['customer_email'];

			$get_c = "select * from customers where customer_email='$user'";

			$run_c = mysqli_query($con, $get_c);

			$row_c = mysqli_fetch_array($run_c);

			$c_id = $row_c['customer_id'];
			$c_email = $row_c['customer_email'];
			$c_name = $row_c['customer_name'];

			$invoice = mt_rand();

			$cus_name = $_POST['c_name'];
			$cus_address=$_POST['c_address'];


				// inserting the order into table
				$insert_order = "insert into orders (p_id, c_id, qty, invoice_no, order_date,status,product_user_id,order_name,order_location) values ('$pro_id','$c_id','$qty','$invoice',NOW(),'in Progress','$pro_user_id','$cus_name','$cus_address')";
				$run_order = mysqli_query($con, $insert_order);

				//removing the products from cart
				$empty_cart = "delete from cart";
				$run_cart = mysqli_query($con, $empty_cart);



?>
<?php } }  ?>

<!--Main Container starts here-->
<div class="main_wrapper">

	<!--Header starts here-->
	<div class="header_wrapper">

		<a href="menuUtama.php"><img id="logo" src="images/logo.gif" /> </a>
	</div>
	<!--Header ends here-->

	<!--Navigation Bar starts-->
	<div class="menubar">

		<ul id="menu">
			<li><a href="menuUtama.php">Home</a></li>
			<li><a href="all_products.php">All Products</a></li>
			<li><a href="customer/my_account.php">My Account</a></li>
			<li><a href="customer_register.php">Sign Up</a></li>
			<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="#">Contact Us</a></li>

		</ul>

		<div id="form">
			<form method="get" action="results.php" enctype="multipart/form-data">
				<input type="text" name="user_query" placeholder="Search a Product"/ >
				<input type="submit" name="search" value="Search" />
			</form>

		</div>

	</div>
	<!--Navigation Bar ends-->

	<!--Content wrapper starts-->
	<div class="content_wrapper">

		<div id="sidebar">

			<div id="sidebar_title">Categories</div>

			<ul id="cats">

			<?php getCats(); ?>

			<ul>


		</div>

		<div id="content_area">

		<?php cart(); ?>

		<div id="shopping_cart">

				<span style="float:right; font-size:17px; padding:5px; line-height:40px;">

				<?php
				if(isset($_SESSION['customer_email'])){
				echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b style='color:purple;'>Your</b>" ;
				}
				else {
				echo "<b>Welcome Guest:</b>";
				}
				?>

				<b style="color:purple">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="menuUtama.php" style="color:purple">Back to Shop</a>

				<?php
				if(!isset($_SESSION['customer_email'])){

				echo "<a href='checkout.php' style='color:orange;'>Login</a>";

				}
				else {
				echo "<a href='logout.php' style='color:orange;'>Logout</a>";
				}



				?>

				</span>
		</div>

			<div id="products_box" style="height: 200px;  width: 750px;  background-color: skyblue;">

				
				<br></br>
				<h2>Your order has been sent!</h2></br>
				<h2>Please go to your account to check your order	</h2>



		</form>


			</div>

		</div>
	</div>
	<!--Content wrapper ends-->


			<div id="footer">

			<h2 style="text-align:center; padding-top:30px;">&copy; 2018 By OFIC Website</h2>

			</div>


		</div>
	<!--Main Container ends here-->

</table>
</body>
</html>
