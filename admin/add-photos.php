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
	    <input type="submit" value="Upload Images" name="submit">
	</form>

</body>
</html>