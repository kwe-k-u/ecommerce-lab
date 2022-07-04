<?php
require_once("../controllers/cart_controller.php");
require_once("../settings/core.php");
	if ($_POST["product_id"]){
		$item_id = $_POST["product_id"];

		//if user is signed in, remove by user id
		if (is_session_logged_in()){
			remove_item_by_customer_ctrl($item_id, get_session_user_id());
		}else {
			//if user is signed out, remove by ip address
			remove_item_by_ip_ctrl($item_id, $_SERVER['REMOTE_ADDR']);
		}

	}

	// header("Location: ../view/cart.php");
?>