<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash | Admin (Login)</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="admin.css">
    <script src="../scripts/clientSide/form.js" type="text/javascript"></script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="..\assets\ui\logo.png" height="125px"></a>
        </div>

        <nav>
            <ul class="MenuItems">
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>

    <div class="center">
        <form action="#" method="post">
            <fieldset>
                <div class="group">
                    <h1>ADMIN LOGIN</h1>
                    <hr>
                    <br>
                    <label>Email</label><input type="text" name="email" required>
                    <label>Password</label><input type="password" name="password" required>
                    <div class="cnc">
                        <input type="submit" value="Log In" name="submit" class="btn">
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {

    // session_start();

    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);

    include("../scripts/serverSide/connection.php");

    $hashPass = ''; 

    $passRetrieveQuery = "SELECT a_password FROM admindetails WHERE a_email = '$email'";
    $resultSet = mysqli_query($conn, $passRetrieveQuery);
    if ($rowData = mysqli_fetch_assoc($resultSet)) {
        $hashPass = $rowData['a_password'];
    }

    if (password_verify($pass, $hashPass)) {
        $_SESSION['name'] = $rowData['a_user'];
        header('Location: dashboard.php');
    } else {
        echo "<script>
                alert('Invalid Email or Password');
            </script>
            ";
    }
}