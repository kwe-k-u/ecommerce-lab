<?php
	require("../settings/db_class.php");


/**
*General class to handle all functions for products,
*categories and brands
*/
/**
 *@author Kweku Acquaye
 *
 */
	class product_class extends db_connection{


		//Adds a new brand to the database
		//returns true if successful
		function add_product_brand_cls($name){
			//sql query
			$sql = "INSERT INTO `brands` (`brand_name`)
			VALUES ('$name')";
			return $this->db_query($sql);
		}

		//adds a product to the database
		//returns true if successful
		function add_product_cls($cat, $brand, $title,$price,$desc,$image,$keywords){
			//sql query
			$sql = "INSERT INTO `products`
			(`product_cat`,`product_brand`,`product_title`,`product_price`,
			`product_desc`,`product_image`,`product_keywords`)
			 VALUES ('$cat','$brand','$title','$price','$desc','$image','$keywords')";

			return $this->db_query($sql);
		}


		//update the brand with the matching id
		function update_product_brand_cls($id, $brandName){
			//sql query
			$sql = "UPDATE `brands` SET `brand_name`='$brandName' WHERE `brand_id`= '$id'";

			return $this->db_query($sql);

		}

		//---SELECTS---

		function get_all_product_brands_cls(){
			//sql query
			$sql="SELECT * FROM `brands`";

			return $this->db_fetch_all($sql);
		}


		// function get_product_brands(){
		// 	//sql query
		// 	$sql="SELECT * FROM `brands`";

		// 	return $this->db_fetch_all($sql);
		// }


	}
?>