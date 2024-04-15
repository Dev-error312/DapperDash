<?php

    $id = $_GET['id'];
    $name = $_GET['name'];
    $price = $_GET['price'];

    if($price > 1){
        include("..\scripts\serverSide\connection.php");
        $updateQuery = "UPDATE products SET p_name='$name', p_price='$price' WHERE p_id='$id'";
        $conn->query($updateQuery);
        $conn->close();

        ?>
            <script>
                alert("Product Updated Successfully");
                // window.location.href = "products.php";
            </script>
        <?php

    }
    else{
        ?>
            <script>
            alert("Price cannot be negative nor zero");
            
            </script>
        <?php
    }
    echo "<script>window.location.href = 'products.php'</script>";
?>

