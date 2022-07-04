<?php
	require_once("../settings/db_class.php");


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

		//Adds a new category to the database
		//returns true if successful
		function add_product_category_cls($name){
			//sql query
			$sql = "INSERT INTO `categories` (`cat_name`)
			VALUES ('$name')";
			return $this->db_query($sql);
		}

		//adds a product to the database
		//returns true if successful
		function add_product_cls($title,$desc,$price,$cat,$brand,$key, $image)
		{
			//sql query
			$sql = "INSERT INTO `products`
			(`product_cat`,`product_brand`,`product_title`,`product_price`,
			`product_desc`,`product_keywords`, `product_image`)
			 VALUES ('$cat','$brand','$title','$price','$desc','$key', '$image')";

			return $this->db_query($sql);
		}



		function update_product_cls($title,$desc,$price,$cat,$brand,$key, $id, $image)
		{
			//sql query
			$sql = "UPDATE `products` SET
			`product_cat`='$cat',`product_brand`='$brand',`product_title`='$title',
			`product_price`='$price', `product_desc`='$desc',`product_keywords`='$key', `product_image` = '$image' WHERE `product_id` ='$id'";

			return $this->db_query($sql);
		}



		//update the brand with the matching id
		function update_product_brand_cls($id, $brandName){
			//sql query
			$sql = "UPDATE `brands` SET `brand_name`='$brandName' WHERE `brand_id`= '$id'";

			return $this->db_query($sql);

		}


		//update the brand with the matching id
		function update_product_category_cls($id, $categoryName){
			//sql query
			$sql = "UPDATE `categories` SET `cat_name`='$categoryName' WHERE `cat_id`= '$id'";

			return $this->db_query($sql);

		}

		//---SELECTS---

		function get_all_product_brands_cls(){
			//sql query
			$sql="SELECT * FROM `brands`";

			return $this->db_fetch_all($sql);
		}

		function get_all_products_cls(){
			//sql query
			$sql="SELECT * FROM `products`";

			return $this->db_fetch_all($sql);
		}

		function get_all_product_categories_cls(){
			//sql query
			$sql="SELECT * FROM `categories`";

			return $this->db_fetch_all($sql);
		}

		function get_brand_by_id_cls($id){
			$sql = "SELECT * FROM `brands` WHERE `brand_id` = $id";
			return $this->db_fetch_one($sql);
		}

		function search_products_cls($search){
			$sql = "SELECT * FROM `products` WHERE `product_keywords` LIKE '%$search%' OR `product_title` LIKE '%$search%'";
			return $this->db_fetch_all($sql);
		}

		function get_category_by_id_cls($id){
			$sql = "SELECT * FROM `categories` WHERE `cat_id` = $id";
			return $this->db_fetch_one($sql);
		}

		function get_product_by_id_cls($id){
			$sql = "SELECT * FROM `products` WHERE `product_id` = $id ";
			return $this->db_fetch_one($sql);
		}

		// function get_product_brands(){
		// 	//sql query
		// 	$sql="SELECT * FROM `brands`";

		// 	return $this->db_fetch_all($sql);
		// }


	}
?>