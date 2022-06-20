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

$category_name = null;

if (isset($_POST["edit_category"])){
	$category_name = $_POST["category_name"];
	$category_id = $_POST["category_id"];
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>easyGo- Categories</title>
</head>

<body>
	<form action=<?php if (isset($_POST["edit_category"])){ echo "../processors/update_category.php";}else {echo "../processors/add_category.php";}?> method="POST" enctype="multipart/form-data">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="category_name">Category name</label>
				<input type="text" class="form-control" name="category_name" id="category_name" placeholder="category Name" <?php if ($category_name != null){echo "value='$category_name'";} ?> required>
			</div>
		</div>
		<?php if (isset($_POST["edit_category"])){ ?>
			<input type="hidden" name="category_id" value=<?php echo "'$category_id'"; ?>>
		<button type="submit" name="new_category" class="btn btn-primary"> Edit Category</button>
		<?php } else { ?>

		<button type="submit" name="new_category" class="btn btn-primary"> Edit Category</button>

		<?php } ?>
	</form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>