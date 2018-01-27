<?php
$target_dir = "../../uploads/";
$uploadOk = 1;

if(isset($_POST["submit"])) {
	for($i = 0; $i < count($_FILES['filesToUpload']['name']); $i++) {
		$target_file = $target_dir . basename($_FILES["filesToUpload"]["name"][$i]);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		var_dump($_FILES['filesToUpload']['name'][$i]);

		// Check if image file is a actual image or fake image
	    $check = getimagesize($_FILES["filesToUpload"]["tmp_name"][$i]);

	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".<br />";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.<br />";
	        $uploadOk = 0;
	    }

		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.<br />";
		    $uploadOk = 0;
		}
		// Check file size
		// if ($_FILES["filesToUpload"]["size"] > 500000) {
		//     echo "Sorry, your file is too large.";
		//     $uploadOk = 0;
		// }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br />";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.<br />";
		// if everything is ok, try to upload file
		} else {
		    
			//Get the temp file path
			$tmpFilePath = $_FILES['filesToUpload']['tmp_name'][$i];

			//Make sure we have a filepath
			if($tmpFilePath != ""){
		    
			    //save the filename
			    $shortname = $_FILES['filesToUpload']['name'][$i];

			    //save the url and the file
			    $filePath = $target_dir . date('d-m-Y-H-i-s').'-'.$_FILES['filesToUpload']['name'][$i];

			    //Upload the file into the temp dir
			    if(move_uploaded_file($tmpFilePath, $filePath)) {
			        //insert into db 
			        //use $shortname for the filename
			        //use $filePath for the relative url to the file
			    }
			}
		}
	}
}
?>