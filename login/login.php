<?php
require("../settings/core.php");
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

	<title>easyGo - Login</title>
</head>

<body>
	<h1>easyGo</h1>
	<h4>Login</h4>

	<form action="../actions/login_processing.php" method="POST" onsubmit="return validate_auth()">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email">
				<p id="email_error" class="error"></p>
			</div>

			<div class="form-group col-md-6">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
				<p id="password_error" class="error"></p>
			</div>
		</div>
		<button type="submit" name="login" class="btn btn-primary">Login</button>
	</form>
	<script src="../js/auth_validation.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>