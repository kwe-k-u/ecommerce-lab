<?php
// landing/index page
require_once("../settings/core.php");
require_once("../controllers/product_controller.php");


?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>easyGo- Search Results</title>
</head>

<body>



<form action="" method="get">
  <input type="search" name="search_keys" id="search_keys">
  <button type="submit" class="btn btn-success">Search</button>
</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	<?php
		$products = search_products_ctrl($_GET["search_keys"]);
		if ($products != false){
		foreach ($products as $product) {
	?>
    <tr>
      <td>

		  <img src='<?php echo $product["product_image"] ?>' alt="No Image">
	  </td>
      <td><?php echo $product["product_title"] ?></td>
      <td><?php echo "GHC ".$product["product_price"] ?></td>
      <td>
		<form action="../actions/add_to_cart.php" method="post">
			<input type="hidden" name="product_id" value='<?php echo $product["product_id"] ?>'>
			<button type="submit" class="btn btn-success" name="add_to_cart">Add to Cart</button>
		</form>
		<?php $id=$product["product_id"];echo "<a href='single_product.php?product_id=$id'>" ?>
		<button  class="btn btn-primary">View</button>
		</a>
	  </td>
    </tr>
	<?php }
	}else {
		echo "<center> No products to display</center>";
	}
	?>
  </tbody>
</table>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>