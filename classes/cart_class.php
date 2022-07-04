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

class cart_class extends db_connection{
	//--INSERT--//



	//--SELECT--//
	function count_cart_by_customer_cls($customer_id){
		$sql = "SELECT * FROM `cart` WHERE `c_id`='$customer_id' ";
		return $this->db_count($sql);
	}

	function count_cart_by_ip_cls($customer_id){
		$sql = "SELECT * FROM `cart` WHERE `p_add`='$customer_id' ";
		return $this->db_count($sql);
	}
	function get_cart_by_customer_cls($customer_id){
		$sql = "SELECT * FROM `cart` WHERE `c_id`='$customer_id' ";
		return $this->db_fetch_all($sql);
	}

	function get_cart_by_ip_cls($customer_id){
		$sql = "SELECT * FROM `cart` WHERE `p_add`='$customer_id' ";
		return $this->db_fetch_all($sql);
	}

	function get_cart_item_by_customer_cls($product_id,$user_id){
		$sql = "SELECT * FROM `cart` WHERE `p_id`='$product_id' and `c_id`= '$user_id'";

		return $this->db_fetch_one($sql);
	}

	function get_cart_item_by_ip_cls($product_id,$ip_address){
		$sql = "SELECT * FROM `cart` WHERE `p_id`='$product_id' and `ip_add`= '$ip_address' and `c_id` = null";

		return $this->db_fetch_one($sql);
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
		$sql = "UPDATE `cart` SET  `qty`='$quantity'
		WHERE `p_id`='$product_id' AND `c_id`='$customer_id' AND `ip_add` = '$customer_ip'";

		return $this->db_query($sql);
	}




	//--DELETE--//


	function remove_item_by_customer_cls($product_id,$user_id){
		$sql = "DELETE FROM `cart` WHERE `p_id`='$product_id' and `c_id`= '$user_id'";
		return $this->db_query($sql);
	}

	function remove_item_by_ip_cls($product_id,$ip_address){
		$sql = "DELETE FROM `cart` WHERE `p_id`='$product_id' and `ip_add`= '$ip_address'  and `c_id` = null";
		return $this->db_query($sql);
	}


}

?>