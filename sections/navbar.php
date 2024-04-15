<!-- Navigation Bar section of the Website -->
<div class="navbar">
    <!-- Section for Logo on Top left side of the Website -->
    <div class="logo">
        <a href="index.php"><img src="assets/ui/logo.png" style="height: 125px;"></a> 
    </div>

    <!-- Navigation Bar -->
    <nav>
        <ul id="MenuItems">
            <li><a href="index.php">Home</a></li>               <!-- Redirects to the HomePage -->
            <li><a href="products.php">Products</a></li>        <!-- Redirects to Products page -->

            <li><a href="<?php
                            session_start();

                            if (!empty($_SESSION['username'])) {
                                echo 'profile.php';
                            } else {
                                echo 'login.php';
                            }
                            ?>">

                    <!-- USERNAME -->
                    <?php
                    if (!empty($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo 'Login';
                    }
                    ?>
                </a></li>
        </ul>
    </nav>
    <a href="cart.php"><img src="assets\ui\cart.png" width="30px" height="30px"></a>
</div>