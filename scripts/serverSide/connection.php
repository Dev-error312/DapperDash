<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbName = "dapperdash";

// Create Connection
$conn = new mysqli($servername,$username,$password,$dbName);
if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}
?>