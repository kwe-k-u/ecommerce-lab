
<?php
	require_once("../settings/core.php");
	require_once("../controllers/cart_controller.php");
	require_once("../functions/general_php_functions.php");


	if(isset($_POST["add_to_cart"])){

		//product id
		$product_id = $_POST["product_id"];

		//quantity
		if (isset($_POST["quantity"])){
			$quantity = $_POST["quantity"];
		} else {
			$quantity = 1;
		}
		//ip address
		$ip_address = $_SERVER['REMOTE_ADDR'];
		//customer id


		if (is_session_logged_in()){
			//if user is signed in, add to cart with their user id
			$customer_id = get_session_user_id();
			$success = add_to_cart_signed_in_ctrl($product_id, $customer_id, $quantity, $ip_address);
		} else {
			//if user isn't signed in, add to cart without user id
			$success = add_to_cart_signed_out_ctrl($product_id, $quantity, $ip_address);
		}

		if ($success){
			header("Location: " . $_SERVER["HTTP_REFERER"]);
		} else {
			echo "something went wrong";
		}

	} else {
		header("Location:../views/all_products.php");
	}




?>