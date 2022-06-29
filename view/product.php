<?php
// landing/index page
require("../settings/core.php");
require("../controllers/product_controller.php");
if (!is_session_logged_in()){
	echo "You are not logged in";
	exit();
}elseif (!is_session_user_admin()){
	echo "You need to be an admin to access this page";
	exit();
}

$brand_name = null;

if (isset($_POST["edit_brand"])){
	$brand_name = $_POST["brand_name"];
	$brand_id = $_POST["brand_id"];
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>easyGo- Add/Edit Brand</title>
</head>

<body>

			<a href="product_mng.php">
				<button type="submit" name="new_brand" class="btn btn-primary"> Add Product</button>
			</a>
<br>
<br>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
	<?php
		$brand = get_all_products_ctrl();

		foreach ($brand as $brand) {
	?>
    <tr>
      <th scope="row"><?php echo $brand["brand_id"] ?></th>
      <td><?php echo $brand["brand_name"] ?></td>
      <td>
		<form action="../admin/brand.php" method="post">
			<input type="hidden" name="brand_id" value='<?php echo $brand["brand_id"] ?>'>
			<input type="hidden" name="brand_name" value='<?php echo $brand["brand_name"] ?>'>
			<button type="submit" class="btn btn-success" value="test"name="edit_brand">Edit</button>
		</form>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>