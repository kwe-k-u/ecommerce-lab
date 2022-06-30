<?php
	require_once("../controllers/customer_controller.php");
	require_once("../functions/general_php_functions.php");

	if (isset($_POST["register"])){
		//getting form values
		$name = $_POST["fullName"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$city = $_POST["city"];
		$number = $_POST["number"];
		$country = $_POST["country"];
		$image = $_FILES["image"];


		//upload profile image and get path
		$imagePath = insert_profile_image_fn($image);
		// echo $imagePath;



		// creating the user's account
		$success = insert_customer_ctrl($name, $email, $password, $city, $number, $country, $imagePath);
		// echo $success;



		if ($success){
			header("Location:../login/login.php");
		} else {
			echo "Something went wrong";
		}

	} else {
		header("Location:../index.php");

	}
?>