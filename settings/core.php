<?php
//start session
session_start();

//for header redirection
ob_start();

//funtion to check for login
function is_session_logged_in(){
	// return isset($_SESSION["customer_id"]);

	if (isset($_SESSION["customer_id"])){
		return true;
	} else {
		return false;
	}
}

//function to logged the user into a session
function session_user_log_in($id,  $role){
	$_SESSION["customer_id"] = $id;
	$_SESSION["user_role"] = $role;

}


//function to log out the user from the session
//returns true if this was done else return false if no user is logged in
function session_user_log_out(){

	//if login credentials exist in session unset them and return true
	if (is_session_logged_in()){

		unset($_SESSION["customer_id"]);
		unset($_SESSION["user_role"]);
		return true;
	}
	//return false if no credentials exist to be removed
	return false;
}


//function to get user ID
function get_session_user_id(){
	return $_SESSION["customer_id"];

}


//function to check for role (admin, customer, etc)
function is_session_user_admin(){
	//admin role is 1;
	return $_SESSION["user_role"] == 1;
}



?>