<?php
require_once("../classes/product_class.php");

	//adds brand
	function add_product_brand_ctrl($name){
		$product = new product_class();
		return $product->add_product_brand_cls($name);
   }


	function add_product_category_ctrl($name){
		$product = new product_class();
		return $product->add_product_category_cls($name);
   }
   function add_product_ctrl($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key)	{
	   $product = new product_class();
	   return $product->add_product_cls($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key);
	   ;
   }
   function update_product_ctrl($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key, $id)	{
	   $product = new product_class();
	   return $product->update_product_cls($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key, $id);
	   ;
   }


	function update_product_brand_ctrl($id, $brandName){
		$product = new product_class();
		return $product->update_product_brand_cls($id, $brandName);
	}

	function update_product_category_ctrl($id, $categoryName){
		$product = new product_class();
		return $product->update_product_category_cls($id, $categoryName);
	}

	function get_product_by_id_ctrl($id){
		$product = new product_class();
		return $product->get_product_by_id_cls($id);
	}

	function search_products_ctrl($search){
		$product= new product_class();
		return $product->search_products_cls($search);
	}



	function get_brand_by_id_ctrl($id){
		$product = new product_class();
		return $product->get_brand_by_id_cls($id);
	}

	function get_category_by_id_ctrl($id){
		$product = new product_class();
		return $product->get_category_by_id_cls($id);
	}

	function get_all_product_brands_ctrl(){
		$product = new product_class();
		return $product->get_all_product_brands_cls();
	}

	function get_all_product_categories_ctrl(){
		$product = new product_class();
		return $product->get_all_product_categories_cls();
	}

	function get_all_products_ctrl(){
		$product = new product_class();
		return $product->get_all_products_cls();
	}

	// function add_product_ctrl($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key)	{
	// 	$product = new product_class();
	// 	return $product->get_all_products_cls();
	// }

?>