<?php
session_start();

?>
<!DOCTYPE>
<html>
	<head>
		<title>Login Form</title>
<link rel="stylesheet" href="styles/login_style.css" media="all" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
<body>

<div class="container">
	 <div class="topleft"><h2><a href="../menuUtama.php" style="text-decoration:none; color:white; ">HOME</a></H2></div>
</div>

<div class="login">
<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_seller']; ?></h2>

<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>

	<h1>Seller Login</h1>
    <form method="post" action="login.php">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
		<h2 style="float:right; padding-right:20px;"><a href="seller_register.php" style="text-decoration:none;">Want To Become Seller? Register Here</a></h2>
</div>


</body>
</html>
<?php

include("includes/db.php");

	if(isset($_POST['login'])){

		$email = $_POST['email'];
		$pass = $_POST['password'];

	$sel_user = "select * from seller where email='$email'";

	$run_user = mysqli_query($con, $sel_user);

	$check_user =mysqli_num_rows($run_user);

	if($check_user==0){

		echo "<script>alert('User with that email not exist , try again!')</script>";

	}else{

		$row = mysqli_fetch_assoc($run_user);

		if(password_verify($pass,$row['password'])){

			$_SESSION['user_email']=$email;

			echo "<script>alert('You have succesfully login , Welcome!')</script>";
			echo "<script>window.open('pagePenjual.php?logged_in=You have successfully Logged in!','_self')</script>";

		}else{

			echo "<script>alert('Password or Email is wrong, try again!')</script>";

		}

	}


	}














?>
