<?php
// landing/index page
require_once("../settings/core.php");
require_once("../controllers/cart_controller.php");
require_once("../controllers/product_controller.php");


?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>easyGo- Cart</title>
</head>

<body>





<table class="table">
  <thead>
    <tr>
      <th scope="col">Product Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	<?php
	if (is_session_logged_in()){
		//if user is signed in, get the cart by their id
		$cart = get_cart_by_customer_ctrl(get_session_user_id());
	} else {
		//if user is signed out, get cart by the ip address
		$cart = get_cart_by_ip_ctrl($_SERVER['REMOTE_ADDR']);

	}

		foreach ($cart as $item) {
	?>
    <tr>
		<td>
		<?php
			$name = get_product_by_id_ctrl($item["p_id"])["product_title"];
			echo "$name";
		?>
		</td>

	  <td><?php echo $item["qty"] ?></td>
      <td>
	  <form action="" method="post">
			<input type="hidden" name="product_id" value='<?php echo $product["product_id"] ?>'>
			<button type="submit" class="btn btn-success" name="add_to_cart">Update</button>
		</form>
		<!-- <?php $id=$product["product_id"];echo "<a href='single_product.php?product_id=$id'>" ?> -->
		<button  class="btn btn-primary" name="remove_item" >Remove</button>
		</a>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>