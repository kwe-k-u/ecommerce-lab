<?php
	require("../controllers/product_controller.php");

	if (isset($_POST["new_category"])){
		//getting the passed brand name
		$category_name = $_POST["category_name"];

		//sending information to controller;
		$success = add_product_category_ctrl($category_name);

		if ($success){
			echo "Successfully added";
			header("Location:../admin/category.php");
		} else {
			echo "There was a problem with addition";
		}
	}
?>