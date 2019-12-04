<?php
session_start();

if (isset($_POST['submit'])) {
    include_once('connection.php');
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $sql = "SELECT id,username,password FROM users where username = '$username' LIMIT 1";
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

if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
}
else {
    $username = 'Guest';
}

?>

<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="../javascript/app.js"></script>
    <title>Class Dash</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://developertony.com">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="food-menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin-login.php">Admin</a>
                </li>
            </ul>
        </div>
        <span class="navbar-text">
            Hello, <?php echo $username; ?>
            <form class="form-inline" action="logout.php">
                <input class="btn btn-sm btn-outline-secondary" type="submit" name="logout" value="Logout">
            </form>
        </span>
    </nav>

    <header>
        <h1>Sign Up Successful!</h1>
    </header>

    <p class="sign-up-thanks">Thank you for signing up! Log in with your new credentials and start ordering! </p>

    <form method="POST" action="sign-up-successful.php" class="login-form">
        <h2>Login: </h2>
        <div class="form-sections-wrapper">
            <div class="form-section">
                <input class="form-control" type="text" name="username" required placeholder="Username">
            </div>

            <div class="form-section">
                <input class="form-control" type="password" name="password" required placeholder="Enter password">
            </div>
        </div>

        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg">

    </form>
</body>

</html>