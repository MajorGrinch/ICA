<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:pet-login.php');
}

?>

<!DOCTYPE html>
<?php
session_start();
require 'database.php';
?>
<html>
<head>
	<title>All pets</title>
</head>
<body>
<h1>All pets</h1>
<?php
        $stmt = $mysqli->prepare("select username, species, petname, weight, description, picture from pets");

        if (!$stmt) {
            printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
        }
        $stmt->execute();
        $result = $stmt->bind_resut($username, $species, $petname, $weight, $description, $picture);
        while( $result->fetch()){
?>
<img src="<?php echo $picture?>"/>
<div class="pet_item">
	<h2><?php echo $petname ?></h2>
	<p><bold><?php echo $username ?></bold></p>
	<p><?php echo $weight ?></p>
	<p><?php echo $species?></p>
	<p><?php echo $description ?></p>
</div>
</form>
</body>
</html>