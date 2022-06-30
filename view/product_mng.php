<?php
// landing/index page
require("../settings/core.php");
require("../controllers/product_controller.php");
if (!is_session_logged_in()) {
	echo "You are not logged in";
	exit();
} elseif (!is_session_user_admin()) {
	echo "You need to be an admin to access this page";
	exit();
}

$runUpdate = isset($_POST['product_id']);

if ($runUpdate){
	$record = get_product_by_id_ctrl($_POST['product_id']);
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



	<form action="../actions/add_product.php" method="POST" enctype="multipart/form-data">
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="product_title">Title</label>
				<input type="text" class="form-control" <?php if ($runUpdate){$value=$record["product_title"];echo "value='$value'";} ?> id="product_title" name="product_title" placeholder="Product name">
			</div>
			<div class="form-group col-md-6">
				<label for="product_description">Description</label>
				<input type="text" class="form-control" id="product_description" name="product_description" <?php if ($runUpdate){$value=$record["product_desc"];echo "value='$value'";} ?>placeholder="Some cool product">
			</div>
		</div>
		<div class="form-group">
			<label for="product_price">Price</label>
			<input type="text" class="form-control" id="product_price" <?php if ($runUpdate){$value=$record["product_price"];echo "value='$value'";} ?>name="product_price" placeholder="">
		</div>
		<div class="form-group">
			<label for="product_category">Category</label>
			<select class="form-select" name="product_category" id="product_category" <?php if ($runUpdate){$value=$record["product_category"];echo "value='$value'";} ?>aria-label="Default select example">
				<?php
				$categories = get_all_product_categories_ctrl();
				foreach ($categories as $entry) {
					$id = $entry["cat_id"];
					$name = $entry["cat_name"];
					if ($runUpdate && $id== $_POST['product_id']){
						echo "<option value='$id' selected>$name</option>";
					} else {
						echo "<option value='$id'>$name</option>";
					}
				}
				?>

			</select>
		</div>


		<div class="form-group">
			<label for="product_brand">Brand</label>
			<select class="form-select" name="product_brand" id="product_brand" aria-label="Default select example">
			<?php
				$brands = get_all_product_brands_ctrl();
				foreach ($brands as $entry) {
					$id = $entry["brand_id"];
					$name = $entry["brand_name"];

					if ($runUpdate && $id== $_POST['product_id']){
						echo "<option value='$id' selected>$name</option>";
					} else {
						echo "<option value='$id'>$name</option>";
					}
				}
				?>
			</select>
		</div>

		<div class="mb-3">
				<label for="image" class="form-label">Image for product</label>
				<input class="form-control" type="file" accept="image/*" id="product_image" name="product_image" >
			</div>

		<div class="form-group col-md-6">
			<label for="product_keyword">Keyword</label>
			<input type="text" class="form-control" <?php if ($runUpdate){$value=$record["product_keywords"];echo "value='$value'";} ?> id="product_keyword" name="product_keyword" placeholder="Keyword">
		</div>
		<?php
		if ($runUpdate){
			$i = $record["product_id"];
			echo "<input type='text' class='form-control' value='$id' id='product_id' name='product_id' hidden>";
			echo '<button type="submit" name="update_product" class="btn btn-success"> Update product</button>';
		} else {
			echo '<button type="submit" name="add_product" class="btn btn-primary"> Add product</button>';
		}
		?>
	</form>
	<br>
	<br>
	<br>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>