<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <!-- Header Section -->
    <div class="header">
        <div class="container">
            
            <!-- Include the Navigation Bar -->
            <?php include_once('sections/navbar.php'); ?>

            <div class="row">
                <div class="col-2">
                    <h1>Give Your Outfit<br>A New Style!</h1>
                    <p>True fashion isn't just about what you wear,<br>it reflects your inner self.</p>
                    <a href="products.php" class="btn">Explore Now &#8594;</a>
                </div>

                <div class="col-2">
                    <img src="images/image1.png">
                </div>
            </div>


        </div>
    </div>

    <!-- End of Header Section -->

    <!------- Featured products ------->
    <div class="small-container">
        <h2 class="title">Featured Products</h2>
        <div class="row">

            <!-- connecting to Database to Retrieve image name and price. -->

            <?php
            include('scripts/serverSide/connection.php');

            // QUERY Returns 4 Product Name, Price and It's Image URL.
            // TODO Add Featured Option in Admin
            $selectProductsQuery = "SELECT p_id, p_name, p_price, p_url 
                                    FROM `products`
                                    LIMIT 3";

            $resultSet = mysqli_query($conn, $selectProductsQuery);

            while ($row = mysqli_fetch_array($resultSet, MYSQLI_BOTH)) {

                $productID = $row['p_id'];
                $productName = $row['p_name'];
                $productPrice = $row['p_price'];
                $productImgURL = $row['p_url'];
            ?>
                <div class="col-4">
                    <a href='<?php echo "product-details.php?product_id=" . $productID; ?>'>
                        <span>
                            <img src='<?php echo $productImgURL; ?>'>
                            <h4><?php echo $productName; ?></h4>
                            <p>&#8360; <?php echo $productPrice; ?></p>
                        </span>
                    </a>
                </div>
            <?php

            }
            $conn->close();
            ?>

        </div>
    </div>
    <!-- END of Featured Products -->

    <!-- Latest products -->
    <div class="small-container">

    
    <h2 class="title">Latest products</h2>
    <div class="row">

        <!-- Latest Products will show the last 8 Items in Descending order that have been added. -->
        <?php
        include('scripts/serverSide/connection.php');

        // QUERY Returns 8 Product Name, Price and It's Image URL.

        $selectProductsQuery = "SELECT p_id, p_name, p_price, p_url 
                                FROM `products`
                                ORDER BY p_id DESC
                                LIMIT 8";

        $resultSet = mysqli_query($conn, $selectProductsQuery);

        while ($row = mysqli_fetch_array($resultSet, MYSQLI_BOTH)) {

            $productID = $row['p_id'];
            $productName = $row['p_name'];
            $productPrice = $row['p_price'];
            $productImgURL = $row['p_url'];
        ?>

            <div class="col-4">
                <a href='<?php echo "product-details.php?product_id=" . $productID; ?>'>
                    <span>
                        <img src='<?php echo $productImgURL; ?>'>
                        <h4><?php echo $productName; ?></h4>
                        <p>&#8360; <?php echo $productPrice; ?></p>
                    </span>
                </a>
            </div>

        <?php
        }

        $conn->close();

        ?>
    </div>
    </div>
    <!-- END of Latest Products -->

    <!-------- footer -------->
    <div class="footer">
        <div class="container">
            <p class="Copyright">Copyright 2023 &copy; DapperDash.</p>
        </div>
    </div>


</body>

</html>

<!-- Rupee Sign : &#8360; -->