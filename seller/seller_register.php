<!DOCTYPE>
<?php
session_start();
include("includes/db.php");
?>
<html>
	<head>
		<title>Online Food IKS Centre</title>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

</head>

<body>
<h1>Please Fill in the Data</h2>
<div class="container">
    <h1 class="well">Registration Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="seller_register.php" method="post">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Seller Name</label>
								<input type="text" placeholder="Enter Your Name Here.." name="name" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label>Address Of Company</label>
							<textarea placeholder="Enter Address Here.." rows="3" name="address" class="form-control"required></textarea>
						</div>
						<div class="row">
							<div class="col-sm-4 form-group">
								<label>City</label>
								<input type="text" placeholder="Enter City Name Here.." name="city" class="form-control" required>
							</div>
							<div class="col-sm-4 form-group">
								<label>State</label>
								<input type="text" placeholder="Enter State Name Here.." name="state" class="form-control" required>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Company Name</label>
								<input type="text" placeholder="Enter Company Name Here.." name="company_name" class="form-control" required>
							</div>
						</div>
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." name="phone_number" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" placeholder="Enter Email Address Here.." name="email" class="form-control" required>
					</div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" placeholder="Enter password Here.." name="password" class="form-control" required>
          </div>
					<button type="submit" class="btn btn-lg btn-info" name="submit">Submit</button>
					</div>
				</form>
				</div>
	</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['submit'])){


		$name = $_POST['name'];
		$address = $_POST['address'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$company_name = $_POST['company_name'];
		$phone_number = $_POST['phone_number'];
		$email = $_POST['email'];
    $pass = $_POST['password'];

		$encrypted_password = password_hash($pass, PASSWORD_DEFAULT);

		$insert = "insert into seller (name,address,city,state,company_name,phone_number,email,password) values ('$name','$address','$city','$state','$company_name','$phone_number','$email','$encrypted_password')";

		$run = mysqli_query($con, $insert);

		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('login.php','_self')</script>";


	}





?>
