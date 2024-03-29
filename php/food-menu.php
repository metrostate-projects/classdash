<?php
session_start();
$con = mysqli_connect("mysql.developertony.com", "admin_cd", "metrostate", "classdash") or die("USERNAME OR PASSWORD INCORRECT");

if (isset($_SESSION['id'])) {
    $username = $_SESSION['username'];
}

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "food_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'food_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'food_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][$count] = $item_array;
            echo '<script>window.location="food-menu.php"</script>';
        } else {
            echo '<script>alert("Item is already Added to Cart")</script>';
            echo '<script>window.location="food-menu.php"</script>';
        }
    } else {
        $item_array = array(
            'food_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'food_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"],
        );
        $_SESSION["cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["food_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>window.location="food-menu.php"</script>';
            }
        }
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
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="food-menu.php">Menu<span class="sr-only">(current)</span></a>
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
        <h1>Menu</h1>
    </header>

    <div class="container" style="width: 65%">
        <?php
        $query = "SELECT * FROM food ORDER BY id ASC ";
        $result = mysqli_query($con, $query);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

                ?>
                <div class="col-md-3">

                    <form method="post" action="food-menu.php?action=add&id=<?php echo $row["id"]; ?>">

                        <div class="food">
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                            <h5 class="text-info"><?php echo $row["fname"]; ?></h5>
                            <h5 class="text"><?php echo $row["price"]; ?></h5>
                            <input type="text" name="quantity" class="form-control" value="1">
                            <input type="hidden" name="hidden_name" value="<?php echo $row["fname"]; ?>">
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                            <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-primary" value="Add to Cart">
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>

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
        <a class="btn btn-success" href="checkout.php">Checkout</a>
    </div>

</body>



</html>