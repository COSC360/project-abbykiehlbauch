<header id="masthead">
    <h1>Grocery Store Price Tracker</h1>
    <nav>
        <p><a href = "search-users.php">Search for Users</a></p>
        <p><a href = "activity-monitor.php">Activity Monitor</a></p>
        <p><a href = "search.php">Search page</a></p>
        <p><a href = "addItem.php">Add an Item</a></p>
        <p><a href = "hotItems.php">Hot Items</a></p>
    </nav>
    <a href = "admin-profile.php">
        <img id = "profile" src = "images/profile.png" href = "admin-profile.php">
    </a>
</header>
<?php
if (!isset($_SESSION['username'])) {
        header('location: login.php');
        exit();
}else if(!isset($_SESSION['admin'])){
        echo "<script>alert(\"You don't have access to this page!\"); history.back();</script>";
        exit();
}
?>