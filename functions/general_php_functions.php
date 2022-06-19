<?php

	//renames an image with the name originalName.xtn to newName.xtn
	function renameImage($newName, $originalName){
		return $newName.".".explode(".", $originalName)[1];
	}
?>