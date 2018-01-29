<?php require '../config/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form action="scripts/upload.php" method="post" enctype="multipart/form-data">
	    Select image to upload:
	    <input type="file" name="filesToUpload[]" multiple="multiple" id="fileToUpload">
	    <select name="photoShoot">

	    	<?php 
	    		$sql = "SELECT * FROM shoots ORDER BY category";   			
    			$result = mysqli_query($conn, $sql);

    			if (mysqli_num_rows($result) > 0) {
    			    while($row = mysqli_fetch_assoc($result)) {
    			        echo "<option value=\"" . $row['id'] . "\">" . strtoupper($row['category']) . " - " . $row['shoot'] . "</option>";
    			    }
    			}

    			mysqli_close($conn);
    		?>

	    </select>
	    <input type="submit" value="Upload Images" name="submit">
	</form>

</body>
</html>