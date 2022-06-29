<?php
	require("../controllers/customer_controller.php");
	require("../functions/general_php_functions.php");

	if (isset($_POST["register"])){
		//getting form values
		$name = $_POST["fullName"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$city = $_POST["city"];
		$number = $_POST["number"];
		$country = $_POST["country"];
		$image = $_FILES["image"];

		var_dump($image);

		echo getcwd();

		// creating the user's account
		$success = insert_customer_ctrl($name, $email, $password, $city, $number, $country, $image);
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