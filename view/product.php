<?php
// landing/index page
require_once("../settings/core.php");
require_once("../controllers/product_controller.php");
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

  <title>easyGo- Add/Edit product</title>
</head>

<body>

			<a href="product_mng.php">
				<button type="submit" name="new_product" class="btn btn-primary"> Add Product</button>
			</a>
<br>
<br>
<br>

<table class="table">
  <thead>

    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col"> Category</th>
      <th scope="col"> Brand</th>
      <th scope="col"> Image</th>
      <th scope="col"> Keyword</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	<?php
		$product = get_all_products_ctrl();

		foreach ($product as $product) {
	?>
    <tr>
      <th scope="row"><?php echo $product["product_id"] ?></th>
      <td><?php echo $product["product_name"] ?></td>
      <td>
		<form action="../admin/product.php" method="post">
			<input type="hidden" name="product_id" value='<?php echo $product["product_id"] ?>'>
			<button type="submit" class="btn btn-success" value="test" name="edit_product">Edit</button>
		</form>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>