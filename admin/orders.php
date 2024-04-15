<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash | Orders</title>
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
            <h1>Orders</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Product Preview</th>
                        <th>Customer Name</th>
                        <th>Customer Contact</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("..\scripts\serverSide\connection.php");
                    $retrieve_query = " SELECT p.p_name, p.p_price, p.p_url, c.c_username, c.c_phone
                                        FROM orders as o inner join customerdetails as c
                                        on o.c_id = c.c_id
                                        INNER join products as p
                                        on o.p_id = p.p_id;";
                    $resultSet = mysqli_query($conn, $retrieve_query);

                    while ($rowData = mysqli_fetch_assoc($resultSet)) {
                        $productName = $rowData['p_name'];
                        $productPrice = $rowData['p_price'];
                        $productImgURL = $rowData['p_url'];
                        $customerName = $rowData['c_username'];
                        $customerContact = $rowData['c_phone'];
                    ?>
                        <tr>
                                <td><p><?php echo $productName ?></p></td>
                                <td><p>&#8360; <?php echo $productPrice ?></p></td>
                                <td><img src="<?php echo "../" . $productImgURL; ?>" class="preview"></td>
                                <td><p><?php echo $customerName ?></p></td>
                                <td><p><?php echo $customerContact ?></p></td>
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