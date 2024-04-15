<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link rel="stylesheet" href="styles/style.css">

</head>

<body>

    <div class="container">
        <?php include('sections/navbar.php'); ?>
    </div>

    <!------single product details-------->
    <?php
    include('scripts/serverSide/connection.php');

    if (isset($_GET['product_id'])) {
        $productID = $_GET['product_id'];
        $selectProductsQuery = "SELECT p_name, p_desc, p_price, p_url FROM `products` 
                WHERE p_id = $productID";

        $resultSet = mysqli_query($conn, $selectProductsQuery);

        $rowData = mysqli_fetch_assoc($resultSet);

        $productName = $rowData['p_name'];
        $productDesc = $rowData['p_desc'];
        $productPrice = $rowData['p_price'];
        // $productImgURL = $rowData['p_url'];
        $productImgURL = $rowData['p_url'];
    ?>
        <div class="small-container">
            <div class="row">
                <div class="product">
                    <img src=  '<?php echo $productImgURL;?>'>
                </div>
                <div class="product">
                    <h1> <?php echo $productName; ?> </h1>
                    <p> <?php echo $productDesc; ?> </p>
                    <br>
                    <h4>&#8360; <?php echo $productPrice; ?> </h4>
                    <br>
                    <form action="#" method="post">
                        <input type="hidden" value="<?php echo $productID ?>" name="product_id">
                        <input type="submit" value="ORDER" name="submit" class='btn'>
                    </form>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

    <!-------- footer -------->
    <div class="footer">
        <div class="container">
            <p class="Copyright">Copyright 2023 &copy; DapperDash.</p>
        </div>
    </div>

</body>

</html>


<?php
if(isset($_POST['submit'])){

    if(is_object($_SESSION['id'])){

        echo "
        <script>
        alert('Please Login First to order.');
        </script>
        ";
    }

    else{
        include("scripts\serverSide\connection.php");
        
        $product = $_POST['product_id'];
        $customer = $_SESSION['id'];
        
        
        $insertQuery = "INSERT INTO orders(c_id, p_id)
                        VALUES('$customer','$product');";
        
        echo $insertQuery;

        $result = mysqli_query($conn, $insertQuery);
        $conn->close();
        
        echo "
        <script>
            alert('$productName has been added to your cart');
        </script>
        ";
        // header()
    }
    
}
?>

