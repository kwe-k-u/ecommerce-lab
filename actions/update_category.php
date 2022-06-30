<?php
	require_once("../controllers/product_controller.php");

	if (isset($_POST["new_category"])){
		//getting the passed brand name
		$category_name = $_POST["category_name"];
		$category_id = $_POST["category_id"];

		//sending information to controller;
		$success = update_product_category_ctrl($category_id, $category_name);

		if ($success){
			echo "Successfully added";
			header("Location:../admin/category.php");
		} else {
			echo "There was a problem with update";
		}
	}
?>