
<?php
require_once("../controllers/cart_controller.php");
require_once("../settings/core.php");

	// var_dump($_POST);
	// exit();
	if (isset($_POST["quantity"])){
		$product_id = $_POST["product_id"];
		$quantity = $_POST["quantity"];


		if (is_session_logged_in()){
			$result = update_cart_ctrl($product_id, get_session_user_id(), $quantity, $_SERVER["REMOTE_ADDR"]);
		} else {
			$result = update_cart_ctrl($product_id, null, $quantity, $_SERVER["REMOTE_ADDR"]);
		}
	}

	header("Location: ../view/cart.php");
?>