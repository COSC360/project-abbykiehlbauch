<?php
    session_start();
    // Check if the user is not logged in and redirect to the login page
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
        exit();
    }
    include "dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/search-users.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/search-users.js"></script>
</head>
<body>
    <?php include "adminHeader.php"?>
<div id = "search-bar">
    <p>
        <label for = "searchbar">Search for users: </label>
        <input type = "search" id = "searchbar" onkeyup = "return results()">
    </p>
</div>
<div id="main">
<h1>Results</h1>
<div id="results">
</div>
<div id="center">
    <div id="more-info">
        <div id = "user-info"></div>
        <input id = "block-user" type = "button" value = "DISABLE USER">
    </div>
</div>
</div>
</body>
</html>
