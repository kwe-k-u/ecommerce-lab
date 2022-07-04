<?php
require_once("../controllers/product_controller.php");
require_once("../functions/general_php_functions.php");
//if pos request is coming from add button click, run addition process
	if (isset($_POST["add_product"])){
			$product_title = $_POST["product_title"];
			$product_desc = $_POST["product_description"];
			$product_price = $_POST["product_price"];
			$product_cat = $_POST["product_category"];
			$product_brand =  $_POST["product_brand"];
			$product_key =  $_POST["product_keyword"];
			$image_file = $_FILES["product_image"];

			$image_path = insert_profile_image_fn($image_file);


		$success = add_product_ctrl($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key, $image_path);

		if ($success){
			echo "Successfully added";
			header("Location:../index.php");
		} else {
			echo "There was a problem with addition";
		}
	} else if (isset($_POST["update_product"])){


		$product_title = $_POST["product_title"];
		$product_desc = $_POST["product_description"];
		$product_price = $_POST["product_price"];
		$product_cat = $_POST["product_category"];
		$product_brand =  $_POST["product_brand"];
		$product_key =  $_POST["product_keyword"];
		$product_id =  $_POST["product_id"];
		// $product_image_file = $_POST["product_image"];

		$image_path = insert_profile_image_fn($_FILES["product_image"]);



	$success = update_product_ctrl($product_title,$product_desc,$product_price,$product_cat,$product_brand,$product_key,$product_id, $image_path);

	if ($success){
		echo "Successfully updated";
		header("Location:../index.php");
	} else {
		echo "There was a problem with update";
	}
	}
?>