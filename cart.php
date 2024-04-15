<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapperDash | Cart</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/form.css">

</head>

<body>
    <?php include_once('sections/navbar.php'); ?>


    <div class="profile">
        <?php include_once('sections/sidebar.php'); ?>
        <div class="main">
            <h1>Orders</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Product Preview</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("scripts\serverSide\connection.php");
                    $c_id = $_SESSION['id'];
                    $retrieve_query = " SELECT p.p_name, p.p_price, p.p_url
                                        FROM products as p INNER JOIN orders as o
                                        ON p.p_id = o.p_id
                                        INNER JOIN customerdetails as c
                                        ON c.c_id = o.c_id
                                        WHERE o.c_id = $c_id;";
                    $resultSet = mysqli_query($conn, $retrieve_query);

                    while ($rowData = mysqli_fetch_assoc($resultSet)) {
                        $productName = $rowData['p_name'];
                        $productPrice = $rowData['p_price'];
                        $productImgURL = $rowData['p_url'];
                    ?>
                        <tr>
                            <td>
                                <p><?php echo $productName ?></p>
                            </td>
                            <td>
                                <p>&#8360; <?php echo $productPrice ?></p>
                            </td>
                            <td><img src="<?php echo $productImgURL; ?>" class="preview"></td>
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


<?php
if ($_SESSION['id'] == null) {
?>
    <script type="text/javascript">
        alert("Please Login First");
        window.location.href = "login.php";
    </script>
<?php
}



?>