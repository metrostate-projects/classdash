<!DOCTYPE html>
<html xml:lang="en" lang="en" class="html">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <script src="../javascript/app.js"></script>
    <title>Class Dash</title>
</head>

<body>
    <nav>
        <a href="../index.php">Home</a>
        <a href="food-menu.php">Food Menu</a>
        <a href="">Shopping Cart</a>
        <h2>Class Dash</h2>
    </nav>

    <header>
        <h1>Sign Up</h1>
    </header>

    <form action="../php/sign-up-successful.php" method="POST">
        <div class="form-sections-wrapper">
            <div class="form-section">
                <label for="username">Username:
                    <input class="form-input" type="text" name="username" required="required">
                </label>
            </div>

            <div class="form-section">
                <label for="password">Password:
                    <input class="form-input" type="password" name="password" required="required">
                </label>
            </div>

            <div class="form-section">
                <label for="confirmPassword">Confirm Password:
                    <input class="form-input" type="password" name="confirmPassword" required="required">
                </label>
            </div>

            <div class="form-section">
                <label for="firstName">First Name:
                    <input class="form-input" type="text" name="firstName" required="required"> 
                </label>
            </div>

            <div class="form-section">
                <label for="lastName">Last Name:
                    <input class="form-input" type="text" name="lastName" required="required">
                </label>
            </div>

            <div class="form-section">
                <label for="studentId">Student Id:
                    <input class="form-input" type="text" name="studenId" required="required">
                </label>
            </div>
        </div>

        <button type="submit" class="submit-btn">Submit</button>
        
    </form>
</body>



</html>