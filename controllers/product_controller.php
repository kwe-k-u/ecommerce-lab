<?php
require("../classes/product_class.php");

	//adds brand
	function add_product_brand_ctrl($name){
		 $product = new product_class();
		 return $product->add_product_brand_cls($name);
	}

	function add_product_ctrl($cat, $brand, $title,$price,$desc,$image,$keywords){
		$product = new product_class();
		return $product->add_product_cls($cat, $brand, $title,$price,$desc,$image,$keywords);
	}


	function update_product_brand_ctrl($id, $brandName){
		$product = new product_class();
		return $product->update_product_brand_cls($id, $brandName);
	}



	function get_all_product_brands_ctrl(){
		$product = new product_class();
		return $product->get_all_product_brands_cls();
	}

?>