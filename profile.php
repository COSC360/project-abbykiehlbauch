<?php
session_start();

// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/profile.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/user-profile.js"></script>
</head>
<body>
<header id="masthead">
    <h1>Grocery Store Price Tracker</h1>
    <nav>
        <p><a href = "search.php">Search page</a></p>
        <p><a href = "login.php">Login page</a></p>
        <p><a href = "addItem.php">Add an Item</a></p>
    </nav>
    <a href = "profile.php">
        <img id = "profile" src = "images/profile.png" href = "profile.php">
    </a>
</header>

<div id = "edit-profile">
<h2>Welcome <span id = "fname">Jane</span>!</h2>
<table>
<form id = "profile-info">
    <tr>
        <td><label for = "email">Email Address: </label></td>
        <td><input type = "email" id = "email" value = "example@mail.com"></td>
    </tr>
    <tr>
        <td><label for = "username">Username: </label></td>
        <td><input type = "text" id = "username" value = "janedoe"></td>
    </tr>
    <tr>
        <td><label for = "firstName">First Name: </label></td>
        <td><input type = "text" id = "firstName" value = "Jane"></td>
    </tr>
    <tr>
        <td><label for = "lastName">Last Name: </label></td>
        <td><input type = "text" id = "lastName" value = "Doe"></td>
    </tr>
    <tr colspan = "2"><td><input type = "submit" value = "Save Changes"> </td></tr>
</table>
</form>
<form id = "logoutButton" method = "post" action = "logout.php">
    <input id = "logout" type = "submit" value = "Log Out">
</form>
</div>
<h2>Tracked Items</h2>
<div id = "alerts">
<div class="entry">
    <h3>Item Name</h3>
    <p>
        <ul>
            <li>Item Price</li>
            <li>Brand</li>
            <li>Store</li>
        </ul>
    </p>
    <p>Item description</p>
    <form>
        <label for = "tracked">Tracked price: $</label>
        <input type = number id = "tracked" value = "1.95">
        <input type = submit value = "Update tracked price">
    </form>
</div>
</div>

</body>
</html>