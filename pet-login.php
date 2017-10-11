<?php
session_start();
require 'database.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>New Pet Listing</title>
</head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
	<label for="username">username</label>
	<input type="text" name="username" id="username">
	<label for="password">password</label>
	<input type="password" name="password" id="password">
	<input type="submit" name="signin">
	<input type="submit" name="signup">
</form>

<?php
if(isset($_POST['signin'])){
	$username = $_POST['username'];
	$temp_pwd = $_POST['password'];
    if (!preg_match("/^(\w)+$/", $username) || !preg_match("/^(\w)+$/", $password)) {
        die("Invalid username or password");
    }
    $stmt = $mysqli->prepare("select hashed_password from users where username=?");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($password);
    $stmt->fetch();
    if (password_verify($password, $temp_password)) {
        $_SESSION['user']   = $username;
        $_SESSION['token']  = bin2hex(openssl_random_pseudo_bytes(32));
    } else {
        print("password incorrect");
        sleep(2);
    }
    $stmt->close();
    header("Location: new-pet.html");
}

if(isset($_POST['signup'])){
	$username = $_POST['username'];
	$temp_pwd = $_POST['password'];
    if (!preg_match("/^(\w)+$/", $username) || !preg_match("/^(\w)+$/", $password)) {
        die("Invalid username or password");
    }
    $stmt = $mysqli->prepare("insert into users (username, hashed_password) values (?, ?)");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
        exit;
    }
    $stmt->bind_param("ss", $username, password_hash($password, PASSWORD_BCRYPT));
    $stmt->execute();
    $stmt->close();
    header("Location: new-pet.html");
}


?>
</body>
</html>