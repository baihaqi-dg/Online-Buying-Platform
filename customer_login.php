<?php
include("includes/db.php");
?>

<div>

	<form method="post" action="">

		<table width="500" align="center" bgcolor="skyblue">

			<tr align="center">
				<td colspan="3"><h2>Login or Register to Buy!</h2></td>
			</tr>

			<tr>
				<td align="right"><b>Email:</b></td>
				<td><input type="text" name="email" placeholder="enter email" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Password:</b></td>
				<td><input type="password" name="pass" placeholder="enter password" required/></td>
			</tr>

			<tr align="center">
				<td colspan="3"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
			</tr>

			<tr align="center">
				<td colspan="3"><input type="submit" name="login" value="Login" /></td>
			</tr>



		</table>

			<h2 style="float:right; padding-right:20px;"><a href="customer_register.php" style="text-decoration:none;">New? Register Here</a></h2>


	</form>

	<?php
	if(isset($_POST['login'])){

		$c_email = mysqli_real_escape_string($con,$_POST['email']);
		$c_pass = mysqli_real_escape_string($con,$_POST['pass']);

		$sel_pas = "select * from customers where customer_email='$c_email'";

		$run_pas = mysqli_query($con, $sel_pas);

		while($row_pas = mysqli_fetch_array($run_pas)){

		$t_pass = $row_pas['customer_pass'];
		$t_email = $row_pas['customer_email'];

				if (password_verify($c_pass , $t_pass )){

						$ip = getIp();

						$sel_cart = "select * from cart where ip_add='$ip'";

						$run_cart = mysqli_query($con, $sel_cart);

						$check_cart = mysqli_num_rows($run_cart);

								if($check_customer>0 AND $check_cart==0){

											$_SESSION['customer_email']=$c_email;

											echo "<script>alert('You logged in successfully, Thanks!')</script>";
											echo "<script>window.open('customer/my_account.php','_self')</script>";

								}
								else {

											$_SESSION['customer_email']=$c_email;

											echo "<script>alert('You logged in successfully, Thanks!')</script>";
											echo "<script>window.open('checkout.php','_self')</script>";
								}

				}

				else {

							echo "<script>alert('Password or email is incorrect, plz try again!')</script>";

				}
		}
	}

	?>




</div>
