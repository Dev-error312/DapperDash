<!DOCTYPE html>
<html lang="en">

<head>
    <title>DapperDash | Register</title>
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
            </ul>
        </nav>
    </div>


    <form name="signupform" onsubmit="return validateForm('signupform')" method="post" class="form">
        <fieldset>
            <div class="group">
                <h1>Register an Account</h1>
                <br>
                <label>Full Name</label><input type="text" name="name" required>
                <label>Address</label><input type="text" name="address" required>
                <label>Phone</label><input type="text" name="phone" required>
                <label>Email</label><input type="text" name="email" required>
                <label>Password</label><input type="password" name="password" required>
                <label>Confirm Password</label><input type="password" name="confirm_password" required>

                <label for="gender">Gender:</label>
                <select name="gender">
                    <option value="">Please select one…</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                <input type="submit" value="Register" name="submit" class="btn">
                <a href="login.php" class="btn">Already a User?</a>

            </div>
        </fieldset>
    </form>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    include("scripts\serverSide\connection.php");

    $c_email = htmlspecialchars($_POST['email']);
    $c_pass = htmlspecialchars($_POST['password']);
    $hashedPass = password_hash($c_pass, PASSWORD_DEFAULT);
    $c_name = htmlspecialchars($_POST['name']);
    $c_address = htmlspecialchars($_POST['address']);
    $c_phone = htmlspecialchars($_POST['phone']);
    $c_gender = htmlspecialchars($_POST['gender']);


    $customerQuery = "INSERT INTO customerdetails(c_email, c_pass, c_username, c_address,c_phone, c_gender)
                                VALUES('$c_email', '$hashedPass', '$c_name', '$c_address', '$c_phone', '$c_gender'); ";


    if (mysqli_query($conn, $customerQuery)) {

?>
        <script type="text/javascript">
            alert("Account Registered Successfully");
            window.location.href = "login.php";
        </script>
<?php
    } else {
        $error = mysqli_error($conn);
        echo "<script>alert('An Error occured : $error')</script>";
    }
    $conn->close();
}

?>