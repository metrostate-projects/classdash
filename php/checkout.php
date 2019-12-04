<?php
session_start();
$con = mysqli_connect("mysql.developertony.com", "admin_cd", "metrostate", "classdash") or die("USERNAME OR PASSWORD INCORRECT");

if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
}


if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["food_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("food has been Removed...!")</script>';
                echo '<script>window.location="food-menu.php"</script>';
            }
        }
    }
}

if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'Guest';
}

if (isset($_POST['submit'])) {
    include_once('connection.php');
    $roomNumber = strip_tags($_POST['submit']);

    echo "<script type='text/javascript'>alert('Your order has been received!');</script>";
}
?>

<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
            Hello, <?php echo $roomNumber; ?>
            <form class="form-inline" action="logout.php">
                <input class="btn btn-sm btn-outline-secondary" type="submit" name="logout" value="Logout">
            </form>
        </span>
    </nav>

    <header>
        <h1>Checkout</h1>
    </header>

    <div class='container' style="width: 65%">
        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Item</th>
                    <th width="10%">Quantity</th>
                    <th width="13%">Price Details</th>
                    <th width="10%">Total Price</th>
                    <th width="17%">Remove Item</th>
                </tr>

                <?php
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>$ <?php echo $value["food_price"]; ?></td>
                            <td>
                                $ <?php echo number_format($value["item_quantity"] * $value["food_price"], 2); ?></td>
                            <td><a href="food-menu.php?action=delete&id=<?php echo $value["food_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>

                        </tr>
                    <?php
                            $total = $total + ($value["item_quantity"] * $value["food_price"]);
                        }
                        ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <th align="right">$ <?php echo number_format($total, 2); ?></th>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>

        <div class='container' style="width: 40%">

            <form method="POST" action="checkout.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Class Room #</label>
                    <input type="text" class="form-control" name="submit" placeholder="" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Special Instructions</label>
                    <input type="text" class="form-control" name="submit" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Submit Order</button>
            </form>
        </div>

    </div>




</body>



</html>