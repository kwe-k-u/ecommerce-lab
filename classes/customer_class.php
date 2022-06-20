<?php
//connect to database class
require("../settings/db_class.php");

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
	function insert_customer_cls($name, $email, $password, $city, $number, $country){
		//encrypt user password
		$enc_password = md5($password);
		//the sql query
		$sql = "INSERT INTO `customer` (`customer_name`,`customer_email`, `customer_pass`, `customer_city`, `customer_contact`, `customer_country`, `user_role`)
		 VALUES
		 ('$name', '$email', '$enc_password', '$city', '$number', '$country','2')";

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
	function insert_profile_image_cls($email,$image){

		//getting the user's id
		$id = $this->get_id_by_email_cls($email);
		$id = $id["customer_id"];


		//return false if no user exists with the passed email
		if (!$id){
			return false;
		}

		//location to save profile image
		$path =getcwd()."/../data/images/profiles/".$id;

		//creating the directory if it does not exist
		if (!file_exists($path)) {
			return mkdir($path, 0777, true);
		}
		//moving the image to the directory
		$file = $path."/".$image["name"];
		// return $file;
		 return copy($image['tmp_name'], $file);
		return move_uploaded_file($image["tmp_name"], $path);

		$sql = "UPDATE `customer` SET `customer_image`='$file' WHERE `customer_id`='$id'";

		return $this->db_query($sql);

	}



	//--DELETE--//


}

?>