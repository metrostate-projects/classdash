<?php
session_start();

if (isset($_POST['submit'])) {
    include_once('connection.php');
    $username = $_POST['username'];

    $sql = "SELECT id,username FROM users where username = '$username'";
    
    $query = mysqli_query($db, $sql);
    if ($query) {
        $row = mysqli_fetch_row($query);
        $userId = $row[0];
        $dbUserName = $row[1];
    }
    if ($username == $dbUserName) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $userId;
        header('Location: users.php');
    } else {
        $message = "User not found.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}

if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
} else {
    $username = '';
}

?>


<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <title>SQL Injection Demonstration</title>
</head>




<body>

    <header>
        <h1>View User</h1>
    </header>

    <form method="POST" action="users.php" class="login-form">
        <div class="form-sections-wrapper">
            <div class="form-section">
                <input class="form-control" type="text" name="username" required placeholder="user id">
            </div>
        </div>

        <input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg">

    </form>

    <form class="form-inline" action="ulogout.php">
        <input class="btn btn-sm btn-outline-secondary" type="submit" name="logout" value="Logout">
    </form>

    <h1>
        <?php echo $username; ?>
    </h1>
</body>



</html>