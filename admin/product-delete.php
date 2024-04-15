<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include("..\scripts\serverSide\connection.php");
    $delete_query = "DELETE from products WHERE p_id = $id;";
    $conn->query($delete_query);        
    $conn->close();
    ?>

    <script>
        alert("Product Deleted successfully");
        window.location.href = 'products.php';
    </script>
    <?php
}
?>