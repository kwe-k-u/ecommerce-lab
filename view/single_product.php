<?php
require("../controllers/product_controller.php");

$hasId = isset($_GET['product_id']);

if ($hasId){
	$record = get_product_by_id_ctrl($_GET['product_id']);
} else {
	header("Location:all_product.php");
}

?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>easyGo- <?php echo $record["product_title"]; ?></title>
</head>
<br>
<br>
<br>

<form action="" method="post">
	<?php $id = $record["product_id"]; echo '<input type="hidden" name="product_id" value="$id">' ?>

	<button class="btn btn-success" type="submit">Add to Cart</button>
</form>


<h4>Product Title</h4>
<p><?php echo $record["product_title"]; ?></p>
<br>

<img  alt="" srcset="">
<p><?php $src=$record["product_image"]; echo '<img src="$src" alt="No Image" srcset="">';?></p>


<h4>Price</h4> <?php echo "GHC ".$record["product_price"]; ?> <br>
<h4>category</h4> <?php echo get_category_by_id_ctrl($record["product_cat"])["cat_name"]; ?> <br>
<h4>brand</h4> <?php echo get_brand_by_id_ctrl($record["product_brand"])["brand_name"]; ?> <br>






<h4>Product Description</h4>
<p><?php echo $record["product_desc"]; ?></p>
<br>

<h4>Product Keywords</h4>
<p><?php echo $record["product_keywords"]; ?></p>
<br>

<body>






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>