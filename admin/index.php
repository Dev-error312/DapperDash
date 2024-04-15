<?php

include("..\scripts\serverSide\connection.php");

$userAvailableQuery = "SELECT COUNT(*) AS adminNo FROM admindetails;";

$resultSet = mysqli_query($conn, $userAvailableQuery);

$rowData = mysqli_fetch_assoc($resultSet);

if($rowData["adminNo"] != "0") {
    header('Location: login.php');
} else {
    header('Location: register.php');
}
?>