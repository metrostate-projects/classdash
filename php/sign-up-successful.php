<?php
session_start();

if (isset($_POST['submit'])) {
    include_once('connection.php');
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $sql = "SELECT id,username,password FROM members where username = '$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $userId = $row[0];
        $dbUserName = $row[1];
        $dbPassword = $row[2];
    }
    if ($username == $dbUserName && $password == $dbPassword) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userId;
        header('Location: food-menu.php');
    } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

?>

<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="../javascript/app.js"></script>
    <title>Class Dash</title>
</head>

<body>
    <nav>
        <a href="../index.php">Home</a>
        <a href="food-menu.php">Food Menu</a>
        <a href="cart.php">Shopping Cart</a>
        <h2 class="logo">Logged in as: <?php echo $username; ?> </h2>
        <form action="logout.php">
            <input class="logo" type="submit" name="logout" value="Logout">
        </form>
    </nav>

    <header>
        <h1>Sign Up Successful!</h1>
    </header>

    <p class="sign-up-thanks">Thank you for signing up! Log in with your new credentials and start ordering! </p>

    <form method="POST" action="sign-up-successful.php" class="login-form">
    <h2>Login: </h2>
        <div class="form-sections-wrapper">
            <div class="form-section">
                <input class="form-input" type="text" name="username" required placeholder="Username">
            </div>

            <div class="form-section">
                <input class="form-input" type="password" name="password" required placeholder="Enter password">
            </div>
        </div>

        <input type="submit" name="submit" value="Login" class="submit-btn">

    </form>
</body>

</html>