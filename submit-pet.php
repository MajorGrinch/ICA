<?php
session_start();
require 'database.php';
if(isset($_POST['username'])&&isset($_POST['species'])&&isset($_POST['petname'])&&isset($_POST['description'])){

	$username = $_POST['username'];
	$species = $_POST['species'];
	$petname = (int)$_POST['petname'];
	$description = $_POST['description'];
	$weight = (float)$_POST['weight'];


	$filename = basename($_FILES['picture']['name']);

	if (!preg_match('/^([\w_\-]+.(jpeg|jpg|bmp|png))$/', $filename)) {
	    echo "Invalid filename";
	    exit;
	}

	if (!preg_match('/^([\w_\-]+)$/', $username)) {
	    echo "Invalid username";
	    exit;
	}
	$filepath = sprintf("./images/%s", $filename);
	//Upload File
	if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $filepath)) {
	    header("Location: index.html");
	    $stmt = $mysqli->prepare("insert into pets (username, species, petname, weight, description, filename) values (?, ?, ?, ?, ?, ?)");
	    $stmt->bind_param("sssiss", $username, $species, $petname, $weight, $description, $filepath);
	    if($stmt->execute()){
	    	header("Location: show-pets.php");
	    }
	    $stmt->close();

	} else {
	    die("Something going wrong");
	    sleep(3);
	    header("Location: index.html");
	}
}

