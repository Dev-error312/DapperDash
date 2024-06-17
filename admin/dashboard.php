<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash | Admin Panel</title>
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
                <ul class="MenuItems">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>
            </nav>
        </div>

        <div>
            <h1>Admin Dashboard</h1>
            <div class="left">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form">
                    <h3>Insert Products</h3><br>
                    <p>Upload Image</p><input type="file" name="product_img" required><br><br>
                    <p>Product Title</p><input type="text" placeholder="Enter product title" name="product_title" required><br>
                    <p>Product Description</p><textarea placeholder="Enter product description" name="product_desc" cols="60" rows="3" required></textarea><br>
                    <p>Product Price</p><input type="text" placeholder="Enter product price" name="product_price" required><br><br>
                    <div class="cnc">
                        <input type="submit" value="Insert" name="inserttodb" class="btn">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['inserttodb'])) {
    if(isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['product_img']['name'];
        $fileTmpName = $_FILES['product_img']['tmp_name'];
        
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedFileExtensions = array('jpg', 'png');
        if(in_array($fileExtension, $allowedFileExtensions)) {
            $uploadFileDir = "../assets/product-image/";
            $dest_path = $uploadFileDir . $fileName;

            if(move_uploaded_file($fileTmpName, $dest_path)) {
                $queryPath = "assets/product-image/" . $fileName;

                include("../scripts/serverSide/connection.php");

                $product_name = mysqli_real_escape_string($conn, $_POST['product_title']);
                $product_desc = mysqli_real_escape_string($conn, $_POST['product_desc']);
                $product_price = floatval($_POST['product_price']);

                if($product_price > 0) {
                    $insertQuery = "INSERT INTO products(p_name, p_desc, p_price, p_url)
                                    VALUES ('$product_name', '$product_desc', '$product_price', '$queryPath')";

                    $result = mysqli_query($conn, $insertQuery);

                    if($result) {
                        echo "<script>alert('Data Inserted Successfully');</script>";
                    } else {
                        echo "<script>alert('Error inserting data: " . mysqli_error($conn) . "');</script>";
                    }
                } else {
                    echo "<script>alert('Price cannot be negative or zero.');</script>";
                }

                mysqli_close($conn);
            } else {
                echo "<script>alert('Failed to move uploaded file.');</script>";
            }
        } else {
            echo "<script>alert('Unsupported Image Format');</script>";
        }
    }
}
?>