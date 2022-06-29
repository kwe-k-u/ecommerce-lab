<?php
	require("../controllers/product_controller.php");

	if (isset($_POST["new_brand"])){
		//getting the passed brand name
		$brand_name = $_POST["brand_name"];

		//sending information to controller;
		$success = add_product_brand_ctrl($brand_name);

		if ($success){
			echo "Successfully added";
			header("Location:../admin/brand.php");
		} else {
			echo "There was a problem with addition";
		}
	}
?>