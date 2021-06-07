<?php

session_start();
include("includes/db.php");
if(!isset($_SESSION['user_email'])){

	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>

<!DOCTYPE>

<html>
	<head>
		<title>This is Insert Product Panel</title>

	<link rel="stylesheet" href="styles/style.css" media="all" />
  <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
  <script>
          tinymce.init({selector:'textarea'});
  </script>
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
    <form action="insert_product.php" method="post" enctype="multipart/form-data">

  		<table align="center" width="795" border="2" bgcolor="#187eae">

  			<tr align="center">
  				<td colspan="7"><h2>Insert New Post Here</h2></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Title:</b></td>
  				<td><input type="text" name="product_title" size="60" required/></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Category:</b></td>
  				<td>
  				<select name="product_cat" >
  					<option>Select a Category</option>
  					<?php
  						$get_cats = "select * from categories";

  						$run_cats = mysqli_query($con, $get_cats);

  						while ($row_cats=mysqli_fetch_array($run_cats)){

  							$cat_id = $row_cats['cat_id'];
  							$cat_title = $row_cats['cat_title'];

  							echo "<option value='$cat_id'>$cat_title</option>";


  						}

  					?>
  				</select>
  				</td>
  			</tr>

				<tr>
  				<td align="right"><b>Product Brand Or Company:</b></td>
  				<td><input type="text" name="product_brand" /></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Image:</b></td>
  				<td><input type="file" name="product_image" /></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Price:</b></td>
  				<td><input type="text" name="product_price" required/></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Description:</b></td>
  				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
  			</tr>

  			<tr>
  				<td align="right"><b>Product Keywords:</b></td>
  				<td><input type="text" name="product_keywords" size="50" required/></td>
  			</tr>

  			<tr align="center">
  				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
  			</tr>

  		</table>


  	</form>
		<?php
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

		?>
		</div>


	</div>



</body>

</html>
<?php


$user = $_SESSION['user_email'];

$get_a = "select * from seller where email='$user'";

$run_a = mysqli_query($con, $get_a);

$row_a = mysqli_fetch_array($run_a);

$a_id = $row_a['seller_id'];

	if(isset($_POST['insert_post'])){
		//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_cat= $_POST['product_cat'];
		$product_brand= $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
		$product_user_id = $a_id;

		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp,"product_images/$product_image");

		 $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords,product_user_id) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords','$product_user_id')";

		 $insert_pro = mysqli_query($con, $insert_product);
		 if($insert_pro){

		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('insert_product.php','_self')</script>";

		 }
	}

?>

<?php } ?>
