<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> All Products - DapperDash</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>

    <div class="container">

        <?php include('sections/navbar.php'); ?>

        <div class="small-container">

            <div class="row">
                <?php

                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $start_from = ($page - 1) * 8;

                include('scripts/serverSide/connection.php');

                $productPageQuery = "select COUNT(p_id) as count
                                        From products;";
                $resultSet = mysqli_query($conn, $productPageQuery);
                $rowData = mysqli_fetch_assoc($resultSet);
                $no_of_ProductsPages = ceil($rowData['count'] / 8);


                $selectProductsQuery = "SELECT p_id,p_name, p_price, p_url
                                            FROM `products`
                                            ORDER BY `p_id` ASC
                                            LIMIT $start_from, 8";
                $resultSet = mysqli_query($conn, $selectProductsQuery);

                while ($rowData = mysqli_fetch_assoc($resultSet)) {

                    $productID = $rowData['p_id'];
                    $productName = $rowData['p_name'];
                    $productPrice = $rowData['p_price'];
                    $productImgURL = $rowData['p_url'];

                ?>
                    <div class='col-4'>
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

            <!-- Calculate page numbers -->
            <!-- Page Buttons -->
            <div class="page-btn">
                <?php
                for ($i = 1; $i <= $no_of_ProductsPages; $i++) {
                ?>
                    <a href="products.php?page=<?php echo $i; ?>"><span> <?php echo $i; ?> </span></a>
                <?php
                }
                ?>
            </div>

        </div>


    </div>

    </div>

    <!-------- footer -------->
    <div class="footer">
        <div class="container">
            <p class="Copyright">Copyright 2023 &copy; DapperDash.</p>
        </div>
    </div>
</body>


</html>