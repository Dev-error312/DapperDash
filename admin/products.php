<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash | Products</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src="../assets/ui/logo.png" height="125px">
            </div>

            <nav>
                <ul id="MenuItems">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>
            </nav>
        </div>

        <div>
            <h1>Products</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Price</th>
                        <th>Product Preview</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("..\scripts\serverSide\connection.php");
                    $retrieve_query = "SELECT * FROM products;";
                    $resultSet = mysqli_query($conn, $retrieve_query);

                    while ($rowData = mysqli_fetch_assoc($resultSet)) {
                        $productID = $rowData['p_id'];
                        $productName = $rowData['p_name'];
                        $productDesc = $rowData['p_desc'];
                        $productPrice = $rowData['p_price'];
                        $productImgURL = $rowData['p_url'];
                    ?>
                        <tr>
                            <form action="product-edit.php" method="get">
                                <td><input type="text" value="<?php echo $productName ?>" name="name"></td>
                                <td><?php echo $productDesc; ?></td>
                                <td>&#8360; <input type="text" value="<?php echo $productPrice ?>" name="price"></td>
                                <td><img src="<?php echo "../" . $productImgURL; ?>" class="preview"></td>
                                <input type="hidden" name="id" value="<?php echo $productID; ?>">
                                <td><input type="submit" name="submit" value="Save" class="btn"></td>
                                <td><input type="button" class="btn" onclick="location.href='product-delete.php?id=<?php echo $productID ?>';" value="Delete"></td>
                            </form>
                        </tr>
                    <?php
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>