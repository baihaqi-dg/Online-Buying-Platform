<?php

session_start();
if(!isset($_SESSION['user_email'])){

	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE>

<html>
	<head>
		<title>This is Seller Panel</title>


	<link rel="stylesheet" href="styles/style.css" media="all" />
	</head>


<body>

	<div class="main_wrapper">


		<div id="header"></div>

		<div id="right">
		<h2 style="text-align:center;">Manage Content</h2>

			<a href="insert_product.php">Insert New Product</a>
			<a href="pagePenjual.php?view_products">View All Products</a>
			<a href="pagePenjual.php?view_customers">View Customers</a>
			<a href="pagePenjual.php?view_orders">View Orders</a>
			<a href="logout.php">Admin Logout</a>

		</div>

		<div id="left">
		<h2 style="color:red; text-align:center;"><?php echo @ $_GET['logged_in']; ?></h2>
		<?php

		include ("includes/db.php");

		if(isset($_GET['view_products'])){

		include("view_products.php");

		}
		if(isset($_GET['edit_pro'])){

		include("edit_pro.php");

		}
		if(isset($_GET['insert_cat'])){

		include("insert_cat.php");

		}

		if(isset($_GET['view_cats'])){

		include("view_cats.php");

		}

		if(isset($_GET['edit_cat'])){

		include("edit_cat.php");

		}

		if(isset($_GET['insert_brand'])){

		include("insert_brand.php");

		}

		if(isset($_GET['view_brands'])){

		include("view_brands.php");

		}
		if(isset($_GET['edit_brand'])){

		include("edit_brand.php");

		}
		if(isset($_GET['view_customers'])){

		include("view_customers.php");

		}
		if(isset($_GET['view_orders'])){

		include("view_orders.php");

		}
		if (isset($_GET['confirm_order'])) {

		include("send_email.php");

		}

		?>
		</div>


	</div>



</body>

</html>

<?php } ?>
