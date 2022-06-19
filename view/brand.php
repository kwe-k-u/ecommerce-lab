<?php
// landing/index page
require("../settings/core.php");
if (!is_session_logged_in()){
	echo "You are not logged in";
	exit();
}elseif (!is_session_user_admin()){
	echo "You need to be an admin to access this page";
	exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>easyGo-Brand</title>
</head>

<body>
	<form action="../processors/add_brand.php" method="POST" enctype="multipart/form-data">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="brand_name">Brand name</label>
				<input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name" required>
			</div>
		</div>
		<button type="submit" name="new_brand" class="btn btn-primary">Add Brand</button>
	</form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>