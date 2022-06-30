<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*General class to handle all functions
*/
/**
 *@author Kweku Acquaye
 *
 */

class cart_class extends db_connection
{
	//--INSERT--//



	//--SELECT--//
	function get_cart_by_customer_cls($customer_id){
		$sql = "SELECT * FROM `cart` WHERE `c_id`='$customer_id' ";
		return $this->db_fetch_all($sql);
	}

	function get_cart_by_ip_cls($customer_id){
		$sql = "SELECT * FROM `cart` WHERE `p_add`='$customer_id' ";
		return $this->db_fetch_all($sql);
	}



	//--UPDATE--//

	function add_to_cart_signed_in_ctrl($product_id, $customer_id, $quantity, $customer_ip){
		$sql = "INSERT INTO  `cart` (`p_id`, `ip_add`, `qty`, `c_id`)
		VALUES ('$product_id', '$customer_ip', '$quantity', '$customer_id')";

		return $this->db_query($sql);
	}

	function add_to_cart_signed_out_ctrl($product_id, $quantity, $customer_ip){
		$sql = "INSERT INTO  `cart` (`p_id`, `ip_add`, `qty`)
		VALUES ('$product_id', '$customer_ip', '$quantity')";

		return $this->db_query($sql);
	}

	function update_cart_cls($product_id, $customer_id, $quantity, $customer_ip){
		$sql = "UPDATE`cart` SET `p_id`='$product_id', `ip_add`='$customer_ip', `qty`='$quantity', `c_id`='$customer_id'
		WHERE `p_id`='$product_id' AND `c_id`='$customer_id'";

		return $this->db_query($sql);
	}



	//--DELETE--//


}

?>