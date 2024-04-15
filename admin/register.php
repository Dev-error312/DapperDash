<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash | Admin(Register)</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="admin.css">
    <script src="../scripts/clientSide/form.js" type="text/javascript"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="..\assets\ui\logo.png" height="150px"></a>
        </div>

        <nav>
            <ul class="MenuItems">
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </div>

    <div class="center">
        <form name="signupform" onsubmit="return validateForm('signupform')" method="post" class="form">
            <fieldset>
                <h1>REGISTER ADMIN</h1>
                <hr>
                <br>
                <label>Username</label><input type="text" name="name" required>
                <label>Email</label><input type="text" name="email" required>
                <label>Password</label><input type="password" name="password" required>
                <label>Confirm Password</label><input type="password" name="confirm_password" required>
                <div class="cnc">
                    <input type="submit" value="Register" name="submit" class="btn">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php

if (isset($_POST["submit"])) {
    include("../scripts/serverSide/connection.php");

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $adminRegisterQuery = "INSERT INTO admindetails
                            VALUES('$name', '$email', '$hashedPass')";

    if (mysqli_query($conn, $adminRegisterQuery)) {
        echo "<script>alert('Account Registered Successfully')</script>";
        header('Location: index.php');
    }
}

?>