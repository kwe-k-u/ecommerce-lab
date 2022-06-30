<?php

	//renames an image with the name originalName.xtn to newName.xtn
	function renameImage($newName, $originalName){
		return $newName.".".explode(".", $originalName)[1];
	}


	function insert_profile_image_fn($image){
		$path = "../images/uploads/";
		$destination = $path.$image['name'];

		//creating the directory if it does not exist
		if (!file_exists($path)) {
			 mkdir($path, 0777, true);
		}
		//move uploaded image to destination
		$success = copy($image['tmp_name'], $destination);

		if (!$success){
			echo "upload failed";
		}
		return $destination;

	}
?>