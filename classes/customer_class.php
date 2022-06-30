<?php
//connect to database class
require_once("../settings/db_class.php");

/**
*General class to handle all functions
*/
/**
 *@author Kweku Acquaye
 *
 */

class customer_class extends db_connection
{
	//--INSERT--//
	// create a new user
	function insert_customer_cls($name, $email, $password, $city, $number, $country, $image){
		//encrypt user password
		$enc_password = md5($password);
		//the sql query
		$sql = "INSERT INTO `customer` (`customer_name`,`customer_email`, `customer_pass`, `customer_city`, `customer_contact`, `customer_country`, `customer_image`, `user_role`)
		 VALUES
		 ('$name', '$email', '$enc_password', '$city', '$number', '$country', '$image','2')";

		//executing and returning the query
		return $this->db_query($sql);

	}





	//--SELECT--//

	//sign in user
	function login_cls($email, $password){
		//encrypt user password
		$enc_password = md5($password);

		//sql query
		$sql = "SELECT * FROM `customer` WHERE `customer_email`='$email' and `customer_pass`='$enc_password'";

		//execute query
		return $this->db_fetch_one($sql);
	}


	//returns the id of the user matching the passed email
	function get_id_by_email_cls($email){

		//sql query
		$sql = "SELECT customer_id FROM `customer` WHERE `customer_email`='$email'";

		//execute query
		return $this->db_fetch_one($sql);
	}




	//--UPDATE--//



	//--DELETE--//


}

?>