<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include("..\scripts\serverSide\connection.php");
    $delete_query = "DELETE from orders WHERE o_id = $id;";
    $conn->query($delete_query);        
    $conn->close();
    ?>

    <script>
        alert("Order Deleted successfully");
        window.location.href = 'cart.php';
    </script>
    <?php
}
?>