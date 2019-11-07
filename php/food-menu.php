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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <h1>Food Menu</h1>
    </header>

    <div class="food-menu">
        <div class="food-row">
            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h5 class="food-name">Banana</h5>
                <h5 class="food-price">$4.95</h5>
                <button class="add-btn">Add to Cart</button>
            </div>

            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>

            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>
        </div>
        <div class="food-row">
            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>

            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>

            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>
        </div>
        <div class="food-row">
            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>

            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>

            <div class="item-wrapper">
                <img class="food-img" src="../images/banana.jpg">
                <h2 class="food-name">Banana</h2>
                <h2 class="food-price">$4.95</h2>
                <button class="add-btn">Add to Cart</button>
            </div>
        </div>
    </div>

</body>



</html>