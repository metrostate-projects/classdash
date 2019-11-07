<?php
session_start();
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $username = $_SESSION['username'];
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
        <a href="../php/food-menu.php">Food Menu</a>
        <a href="cart.php">Shopping Cart</a>
        <h2 class="logo">Logged in as: <?php echo $username; ?> </h2>
        <form action="logout.php">
            <input class="logo" type="submit" name="logout" value="Logout">
        </form>
    </nav>

    <header>
        <h1>Shopping Cart</h1>
    </header>


    <div class="checkout-wrapper">
        <button type="submit" class="submit-btn">Checkout</button>
    </div>

</body>



</html>