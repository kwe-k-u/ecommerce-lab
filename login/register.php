<?php
require_once("../settings/core.php");
	if (is_session_logged_in()){
		echo "You are already logged in";
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>easyGo - Register</title>
</head>

<body>
	<h1>easyGo</h1>
	<h4>Create account</h4>

	<form action="../actions/register_processing.php" method="POST" enctype="multipart/form-data" onsubmit="return validate_auth()">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="fullName">Full name</label>
				<input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full Name" required>
			</div>
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
				<p id="email_error" class="error"></p>
			</div>

			<div class="form-group col-md-6">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				<p id="password_error" class="error"></p>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="city">City</label>
				<input type="text" class="form-control" id="city" name="city" required>
			</div>


			<div class="form-group col-md-6">
				<label for="number">Contact Number</label>
				<input type="text" class="form-control" id="number" name="number">
			</div>
			<div class="form-group col-md-4">
				<label for="country">Country</label>
				<select id="country" name="country" class="form-control" required>
					<option selected>Choose...</option>
					<option>Ghana</option>
					<option>Germany</option>
					<option>Nigeria</option>
					<option>United States of America</option>
				</select>
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">Default file input example</label>
				<input class="form-control" type="file" accept="image/*" id="image" name="image" >
			</div>
		</div>
		<button type="submit" name="register" class="btn btn-primary">Sign in</button>
	</form>
	<script src="../js/auth_validation.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>