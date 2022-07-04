<?php

require_once("../classes/cart_class.php");
// include("../classes/cart_class.php");


	function get_cart_by_ip_ctrl($ip){
		$cart = new cart_class();
		return $cart->get_cart_by_ip_cls($ip);
	}

	function get_cart_by_customer_ctrl($id){
		$cart = new cart_class();
		return $cart->get_cart_by_customer_cls($id);
	}

	function count_cart_by_customer_ctrl($customer_id){
		$cart = new cart_class();
		return $cart->count_cart_by_customer_cls($customer_id);
	}

	function count_cart_by_ip_ctrl($customer_id){
		$cart = new cart_class();
		return $cart->count_cart_by_ip_cls($customer_id);
	}



	//--UPDATE--//

	function add_to_cart_signed_in_ctrl($product_id, $customer_id, $quantity, $customer_ip){
		$cart = new cart_class();

		//check if the product is already there
		$item = $cart->get_cart_item_by_customer_cls($product_id, $customer_id);

		if($item) { // update entry if product is already in cart
			return $cart->update_cart_cls($item["p_id"], $item["c_id"], intval($item["qty"])+1,$item["ip_add"]);
		}else {
			//new entry if its not already added to cart
			return $cart->add_to_cart_signed_in_ctrl($product_id, $customer_id, $quantity, $customer_ip);
		}
	}

	function add_to_cart_signed_out_ctrl($product_id, $quantity, $customer_ip){
		$cart = new cart_class();
		//check if the product is already there
		$item = $cart->get_cart_item_by_ip_cls($product_id, $customer_ip);

		if($item) { // update entry if product is already in cart
			return $cart->update_cart_cls($item["p_id"], $item["c_id"], intval($item["qty"])+1,$item["ip_add"]);
		}else {
		return $cart->add_to_cart_signed_out_ctrl($product_id, $quantity, $customer_ip);
		}
	}

	function update_cart_ctrl($product_id, $customer_id, $quantity, $customer_ip){
		$cart = new cart_class();
		return $cart->update_cart_cls($product_id, $customer_id, $quantity, $customer_ip);
	}


	function remove_item_by_customer_ctrl($product_id, $user_id){
		$cart = new cart_class();
		return $cart->remove_item_by_customer_cls($product_id, $user_id);
	}


	function remove_item_by_ip_ctrl($product_id, $ip_address){
		$cart = new cart_class();
		return $cart->remove_item_by_ip_cls($product_id, $ip_address);
	}

?>