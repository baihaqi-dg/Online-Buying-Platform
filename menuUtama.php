<!DOCTYPE>
<?php
session_start();
include("functions/functions.php");

?>
<html lang="utf-18">
	<head>
		<title>Online Food IKS Centre</title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>

<body>

	<!--Main Container starts here-->
	<div class="main_wrapper">

		<!--Header starts here-->
		<div class="header_wrapper">

			<a href="menuUtama.php"><img id="logo" src="images/FYP PROJEK SIAP.jpg" /> </a>
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
				<li><a href="seller/login.php">Seller Login</a></li>

			</ul>

			<div id="form">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"/ >
					<input type="submit" name="search" value="Search" />
				</form>

			</div>

		</div>
		<!--Navigation Bar ends-->
<div id="mainBody">
	<div class="container">
	<div class="row">
		<!--Content wrapper starts-->
		<div class="content_wrapper">

			<div id="sidebar">

				<div id="sidebar_title">Categories:</div>

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

					<b style="color:purple">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price: <?php total_price(); ?> <a href="cart.php" style="color:purple">Go to Cart</a>


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

				<div id="products_box">

				<h1 style="text-align:left">Product Preview </h1>

				<?php getPro(); ?>
				<?php getCatPro(); ?>
				<?php getBrandPro(); ?>

				</div>

			</div>
		</div>
		<!--Content wrapper ends-->



		<div id="footer">

		<h2 style="text-align:center; padding-top:30px;">&copy; 2018 : OFIC Website</h2>

		</div>






	</div>
<!--Main Container ends here-->


</body>
</html>
