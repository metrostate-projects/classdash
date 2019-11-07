<?php
session_start();

if(isset($_POST['submit'])) {
	include_once('connection.php');
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);

	$sql = "SELECT id,username,password FROM members where username = '$username' LIMIT 1";
	$query = mysqli_query($db, $sql);
	if($query) {
		$row = mysqli_fetch_row($query);
		$userId= $row[0];
		$dbUserName = $row[1];
		$dbPassword = $row[2];
	}
	if($username == $dbUserName && $password == $dbPassword) {
		$_SESSION['username'] = $username;
		$_SESSION['id'] = $userId;
		header('Location: user.php');
	}
	else {
		echo "<b><i>Incorrect credentials</i><b>";

	}
}

?>


<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="../javascript/app.js"></script>
    <title>Class Dash</title>
</head>

<body>
    <nav>
        <a href="../index.php">Home</a>
        <a href="../php/food-menu.php">Food Menu</a>
        <a href="../php/cart.php">Shopping Cart</a>
        <h2 class="logo">Class Dash</h2>
    </nav>

    <header>
        <h1>Login</h1>
    </header>

    <div class="img-container">
        <img class="homepage-img" src="../images/food.jfif" alt="Food Image">
    </div>


    <form action="" method="POST">
        <div class="form-sections-wrapper">
            <div class="form-section">
                <label for="username">Username:
                    <input class="form-input" type="text" name="username">
                </label>
            </div>

            <div class="form-section">
                <label for="password">Password:
                    <input class="form-input" type="password" name="password">
                </label>
            </div>
        </div>


        <button type="submit" class="submit-btn">Submit</button>

    </form>
</body>



</html>