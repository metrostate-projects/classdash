<?php
session_start();
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="javascript/app.js"></script>
    <title>Class Dash</title>
</head>

<body>
    <nav>
        <a href="../index.php">Home</a>
        <a href="php/food-menu.php">Food Menu</a>
        <a href="php/cart.php">Shopping Cart</a>
        <h2 class="logo">Logged in as: <?php echo $username; ?> </h2>
        <form action="logout.php">
            <input class="logo" type="submit" name="logout" value="Logout">
        </form>
    </nav>

    <header>
        <h1>Class Dash</h1>
        <h2>We aim to provide Metro students accessibility to a wide variety of snack options with the convenience of
            ordering items online.</h2>
    </header>

    <div class="img-container">
        <img class="homepage-img" src="images/food.jfif" alt="Food Image">
    </div>


    <div class="buttons-container">
        <a href="php/login.php">Login</a>
        <a href="php/sign-up.php">Sign Up</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>