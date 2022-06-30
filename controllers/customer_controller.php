<?php
	require("../classes/customer_class.php");

	//creates an account for the user if no other user with that email exists
	function insert_customer_ctrl($name, $email, $password, $city, $number, $country, $image ){

		//create instance of customer
		$customer = new customer_class();

		return $customer->insert_customer_cls($name, $email, $password, $city, $number, $country, $image);
	}


	function login_customer_ctrl($email, $password){
		$customer = new customer_class();
		return $customer->login_cls($email, $password);
	}




	//returns the user record that contains the passed email
	function get_id_by_email_ctrl($email){
		$customer = new customer_class();
		return $customer->get_id_by_email_cls($email);
	}

?>