<!DOCTYPE html>
<html lang="en">

<head>
    <title>DapperDash | Login</title>
    <link rel="stylesheet" href="styles/form.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="scripts/clientSide/form.js" type="text/javascript"></script>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.php"><img src="assets\ui\logo.png" height="125px"></a>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="register.php">Register</a></li>
            </ul>
        </nav>
    </div>


    <form action="#" name="signinform" method="post" class="form">
        <fieldset>
            <div class="group">
                <h1>LOGIN</h1>
                <br>
                <label>Email</label><input type="text" name="email" required>
                <label>Password</label><input type="password" name="password" required>
                <input type="submit" value="Sign In" name="submit" class="btn">
                <a href="register.php" class="btn">Register an Account</a>
            </div>
        </fieldset>
    </form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {

    session_start();

    $email = htmlspecialchars($_POST['email']);
    $pass = htmlspecialchars($_POST['password']);
    // $hashedPass = password_hash($pass, PASSWORD_DEFAULT);


    include("scripts\serverSide\connection.php");

    $passRetrieveQuery = "SELECT c_pass FROM customerdetails WHERE c_email = '$email'";
    $resultSet = mysqli_query($conn, $passRetrieveQuery);
    if ($rowData = mysqli_fetch_assoc($resultSet)) {
        $hashPass = $rowData['c_pass'];
    }

    if (password_verify($pass, $hashPass)) {
        $loginQuery = "SELECT c_id, c_username
                    FROM customerdetails
                    WHERE c_email = '$email';";
        echo $loginQuery;
        $resultSet = mysqli_query($conn, $loginQuery);

        if ($rowData = mysqli_fetch_assoc($resultSet)) {
            $_SESSION['username'] = $rowData['c_username'];
            $_SESSION['id'] =  $rowData['c_id'];
            header('Location: index.php');
        }
    } else {
        echo "<script>
                alert('Invalid Email or Password');
            </script>";
    }

}


?>