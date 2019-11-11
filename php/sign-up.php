<?php
session_start();
if (isset($_POST['submit'])) {
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $db = mysqli_connect("mysql.developertony.com", "ics370root", "metrostate", "ics370");
    $query = "INSERT INTO members(id,username,password) VALUES('null', '$username','$password')";
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
        <h2 class="logo">Class Dash</h2>
    </nav>

    <header>
        <h1>Sign Up</h1>
    </header>

    <form action="sign-up.php" method="POST">
        <div class="form-sections-wrapper">
            <div class="form-section">
                <input class="form-input" type="text" name="username" required="required" placeholder="New username">
            </div>

            <div class="form-section">
                <input class="form-input" type="password" name="password" required="required" placeholder="New password">
            </div>
        </div>

        <input type="submit" name="submit" value="Register" class="submit-btn">

    </form>
</body>



</html>