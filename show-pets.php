<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:pet-login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>All pets</title>
</head>
<body>
<h1>All pets</h1>
<?php

?>
</form>
</body>
</html>