<?php

require_once("../classes/cart_class.php");


function get_cart_by_ip_ctrl($ip){
	$cart = new cart_class();
	return $cart->get_cart_by_ip_cls($ip);
}

function get_cart_by_customer_ctrl($id){
	$cart = new cart_class();
	return $cart->get_cart_by_customer_cls($id);
}



	//--UPDATE--//

	function add_to_cart_signed_in_ctrl($product_id, $customer_id, $quantity, $customer_ip){
		$cart = new cart_class();
		return $cart->add_to_cart_signed_in_ctrl($product_id, $customer_id, $quantity, $customer_ip);
	}

	function add_to_cart_signed_out_ctrl($product_id, $quantity, $customer_ip){
		$cart = new cart_class();
		return $cart->add_to_cart_signed_out_ctrl($product_id, $quantity, $customer_ip);
	}

	function update_cart_ctrl($product_id, $customer_id, $quantity, $customer_ip){
		$cart = new cart_class();
		return $cart->update_cart_cls($product_id, $customer_id, $quantity, $customer_ip);
	}


?>