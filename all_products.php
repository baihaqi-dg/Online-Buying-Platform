<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

?>
<html>
	<head>
		<title>Online Food IKS Centre</title>


	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">

		<!--Header starts here-->
		<div class="header_wrapper">

			<a href="menuUtama"><img id="logo" src="images/logo.gif" /> </a>
		</div>
		<!--Header ends here-->

		<!--Navigation Bar starts-->
		<div class="menubar">

			<ul id="menu">
				<li><a href="menuUtama.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="customer/my_account.php">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
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

				<?php
				if(isset($_GET['add_cart'])){

					global $con;

					$ip = getIp();

					$pro_id = $_GET['add_cart'];

					$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";

					$run_check = mysqli_query($con, $check_pro);

					if(mysqli_num_rows($run_check)>0){

					echo "";

					}
					else {

					$insert_pro = "insert into cart (p_id,ip_add) values ('$pro_id','$ip')";

					$run_pro = mysqli_query($con, $insert_pro);

					echo "<script>window.open('all_products.php','_self')</script>";
					}

				}
				  ?>

			<div id="shopping_cart">

					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

					Welcome Guest! <b style="color:purple">Shopping Cart -</b> Total Items:<?php total_items();?>Total Price:<?php total_price() ?> <a href="cart.php" style="color:purple">Go to Cart</a>



					</span>
			</div>

				<div id="products_box">
					<?php
					$get_pro = "select * from products";

					$run_pro = mysqli_query($con, $get_pro);

					while($row_pro=mysqli_fetch_array($run_pro)){

						$pro_id = $row_pro['product_id'];
						$pro_cat = $row_pro['product_cat'];
						$pro_brand = $row_pro['product_brand'];
						$pro_title = $row_pro['product_title'];
						$pro_price = $row_pro['product_price'];
						$pro_image = $row_pro['product_image'];

						echo "
							<div id='single_product'>

							<h3>$pro_title</h3>

							<img src='seller/product_images/$pro_image' width='180' height='180' />

							<p><b> RM $pro_price </b></p>

							<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>

							<a href='all_products.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>

							</div>


							";

	}
	?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->



		<div id="footer">

		<h2 style="text-align:center; padding-top:30px;">&copy; 2018 by OFIC Website</h2>

		</div>






	</div>
<!--Main Container ends here-->


</body>
</html>
