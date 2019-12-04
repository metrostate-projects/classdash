<?php
session_start();
if (isset($_POST['submit'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $db = mysqli_connect("mysql.developertony.com", "admin_cd", "metrostate", "classdash") or die("USERNAME OR PASSWORD INCORRECT");
    $query = "INSERT INTO users(id,username,password) VALUES('null', '$username','$password')";
    $result = mysqli_query($db, $query);
    if ($result) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: sign-up-successful.php');
    } else {
        $message = "Username already exists. Try again.";
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
        <h1>Sign Up</h1>
    </header>

    <form action="sign-up.php" method="POST">
        <div class="form-sections-wrapper">
            <div class="form-section">
                <input class="form-control" type="text" name="username" required="required" placeholder="New username">
            </div>

            <div class="form-section">
                <input class="form-control" type="password" name="password" required="required" placeholder="New password">
            </div>
        </div>

        <input type="submit" name="submit" value="Register" class="btn btn-success">

    </form>
</body>



</html>