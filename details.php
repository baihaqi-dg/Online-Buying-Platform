<!DOCTYPE>
<?php

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

			<img id="logo" src="images/logo.gif" />
		</div>
		<!--Header ends here-->

		<!--Navigation Bar starts-->
		<div class="menubar">

			<ul id="menu">
				<li><a href="menuUtama.php">Home</a></li>
				<li><a href="all_products.php">All Products</a></li>
				<li><a href="#">My Account</a></li>
				<li><a href="#">Sign Up</a></li>
				<li><a href="#">Shopping Cart</a></li>
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

					cart();

				 ?>

			<div id="shopping_cart">

					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">

					Welcome Guest! <b style="color:purple">Shopping Cart -</b> Total Items: Total Price: <a href="cart.php" style="color:purple">Go to Cart</a>



					</span>
			</div>

				<div id="products_box">
					<?php
					if(isset($_GET['pro_id'])){

						$product_id = $_GET['pro_id'];

						$get_pro = "select * from products where product_id='$product_id'";

						$run_pro = mysqli_query($con, $get_pro);

						while($row_pro=mysqli_fetch_array($run_pro)){

							$pro_id = $row_pro['product_id'];
							$pro_title = $row_pro['product_title'];
							$product_brand = $row_pro['product_brand'];
							$pro_price = $row_pro['product_price'];
							$pro_image = $row_pro['product_image'];
							$pro_desc = $row_pro['product_desc'];

							echo "
								<div id='single_product'>

								<h3>$pro_title</h3>

								<img src='seller/product_images/$pro_image' width='400' height='300' />

								<p><b> Price : RM $pro_price </b></p>

								<h2>$product_brand</h2></br>

								<p>$pro_desc </p>

								<a href='menuUtama.php' style='float:left;'>Go Back</a>

								<a href='details.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>

								</div>


								";

	}
	}
?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->



		<div id="footer">

		<h2 style="text-align:center; padding-top:30px;">&copy; 2014 by www.OnlineTuting.com</h2>

		</div>






	</div>
<!--Main Container ends here-->


</body>
</html>
