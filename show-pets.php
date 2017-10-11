<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:pet-login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>New Pet Listing</title>
</head>
<body>
<form action="show-pets.php" method="post" enctype="multipart/form-data">
	<label for="petname">Petname</label>
	<input type="text" name="petname" id="petname">
	<input type="hidden" name="username" >
	<label for="species">Species</label>
	<select name="species" id="species">
	  <option value="fish">fish</option>
	  <option value="dog">dog</option>
	  <option value="turtle">turtle</option>
	  <option value="pet rock">pet rock</option>
	  <option value="wolf">wolf</option>
	</select>
	<label for="weight">weight</label>
	<input type="number" name="weight" id="weight" min="0" step="any">
	<label for="description">description</label>
	<textarea name="description" id="description" cols="50" rows="10"></textarea>
    <label for="picture">Select a file to upload:</label>
    <input type="file" name="picture" id="picture">
    <p>Please submit a picture file</p>
    <input type="submit" value="upload">
</form>
	
</form>
</body>
</html>