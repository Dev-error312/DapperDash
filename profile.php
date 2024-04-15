<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AliceStore | Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">

</head>

<body>
    <?php include_once('sections/navbar.php'); ?>


    <div class="profile">
    <?php include_once('sections/sidebar.php'); ?>
        <div class="main">
            <h1>Profile</h1>
            <p>Username: <?php echo $_SESSION["username"]; ?></p>
            <br>
            <p>Change Password</p>
            <form action="#" method="post" class="form2">
                <input type="password" name="old_pass" placeholder="Enter your old password" class="inputs"><br>
                <input type="password" name="new_pass" placeholder="Enter your new password" class="inputs"><br>
                <input type="submit" value="Change" name="change" class="btn">
            </form>
        </div>
    </div>


</body>

</html>

<?php
// if (isset($_POST['logout'])) {
//     session_start();
//     session_unset();
//     header('Location: index.php');
// }

if (isset($_POST['change'])) {
    include("scripts\serverSide\connection.php");
    
    $c_id = $_SESSION['id'];
    $old_pass = htmlspecialchars($_POST['old_pass']);

    $passRetrieveQuery = "SELECT c_pass FROM customerdetails WHERE c_id = '$c_id'";
    $resultSet = mysqli_query($conn, $passRetrieveQuery);
    if ($rowData = mysqli_fetch_assoc($resultSet)) {
        $hashPass = $rowData['c_pass'];
    }
    if (password_verify($old_pass, $hashPass)) {
        echo "Old password matched";
        $new_pass = htmlspecialchars($_POST['new_pass']);
        $hashedPass = password_hash($new_pass, PASSWORD_DEFAULT);
        $updatePassQuery = "UPDATE customerdetails SET c_pass = '$hashedPass' WHERE c_id = '$c_id'";
        mysqli_query($conn, $updatePassQuery);
        $conn->close();
?>
        <script type="text/javascript">
            alert("Password Updated Successfully");
            // window.location.href = "login.php";
        </script>
<?php
    }

    else{
        ?>
        <script type="text/javascript">
            alert("Your old password doesn't match");
            // window.location.href = "login.php";
        </script>
<?php
    }
}
?>