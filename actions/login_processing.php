<?php
	require("../controllers/customer_controller.php");
;	//create session
	require_once("../settings/core.php");

	if (isset($_POST["login"])){
		//getting form values
		$email = $_POST["email"];
		$password = $_POST["password"];

		$user_info = login_customer_ctrl($email, $password);



		//if email and password checkout, save info as session and go to index page
		if ($user_info){
			session_user_log_in($user_info["customer_id"],$user_info["user_role"]);
			header("Location:../index.php");
		} else { //go back
			header("Location:../login/login.php");
		}

	} elseif (isset($_POST["logout"])){

		session_user_log_out();
		header("Location:../index.php");
	}else {
		header("Location:../index.php");

	}
?>