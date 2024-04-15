<div class="sidebar">
    <a href="profile.php" class="styled-btn">Profile</a><br>
    <a href="cart.php" class="styled-btn">Orders</a>
    <form method="post">
        <input type="submit" name="logout" value="Logout" class="styled-btn" />
    </form>
</div>
<?php
if (isset($_POST['logout'])) {
    session_start();
    session_unset();
    header('Location: index.php');
}
?>