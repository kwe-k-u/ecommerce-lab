<?php
	require_once("../controllers/product_controller.php");

	if (isset($_POST["new_brand"])){
		//getting the passed brand name
		$brand_name = $_POST["brand_name"];
		$brand_id = $_POST["brand_id"];

		//sending information to controller;
		$success = update_product_brand_ctrl($brand_id, $brand_name);

		if ($success){
			echo "Successfully added";
			header("Location:../admin/brand.php");
			// header("../admin/brand.php");
		} else {
			echo "There was a problem with update";
		}
	}
?>