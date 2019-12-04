<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="../javascript/app.js"></script>
    <title>Admin Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            color: black;
            font-family: monospace;
            font-size: 25px;
            text-align: left;
        }

        th {
            background-color: grey;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
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
                <li class="nav-item active">
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
    <div class='container' style="width: 65%">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Users</h1>
            </div>
        </div>
    </div>
    <div class='container' style="width: 65%">
        <table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php
            $conn = mysqli_connect("mysql.developertony.com", "admin_cd", "metrostate", "classdash") or die("USERNAME OR PASSWORD INCORRECT");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT id, username, password FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>"
                        . $row["password"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </table>
        <br />
        <a class="btn btn-primary btn-lg" href="https://west1-phpmyadmin.dreamhost.com/" role="button">EDIT USERS</a>
    </div>
    <br /><br /><br />
    <div class='container' style="width: 65%">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Inventory</h1>
            </div>
        </div>
    </div>
    <div class='container' style="width: 65%">
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            <?php
            $conn = mysqli_connect("mysql.developertony.com", "admin_cd", "metrostate", "classdash") or die("USERNAME OR PASSWORD INCORRECT");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT fname, price, stock FROM food";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["fname"] . "</td><td>" . $row["price"] . "</td><td>"
                        . $row["stock"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </table>
        <br />
        <a class="btn btn-primary btn-lg" href="https://west1-phpmyadmin.dreamhost.com/" role="button">EDIT INVENTORY</a>
        <br />
        <br />
    </div>
</body>

</html>