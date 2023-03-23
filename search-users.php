<?php
    session_start();
    // Check if the user is not logged in and redirect to the login page
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
        exit();
    }
    $connString = "localhost";
    $user = 'root';
    $pass = 'rootuser';
    $dbname = "groceryTracker";
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
   <script>
    function results(){
        var str = document.getElementById("searchbar").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200){
                document.getElementById("results").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "adminBackend/getUserSearch.php?q="+str);
        xmlhttp.send();
        return false;
    }
   </script>
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
        <h3>FirstName LastName</h3>
        <p>Username</p>
        <p>Email Address</p>
        <h4>Recent Activity</h4>
        <div id = "activity">
            <article class = "entry">
                <p>Date - Username</p>
                <p>Comment</p>
            </article>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Item - New price</p>
            </article>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Comment</p>
            </article>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Item - New price</p>
            </article>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Item - New price</p>
            </article>
        </div>
        <input id = "block-user" type = "button" value = "DISABLE USER">
    </div>
</div>
</div>
</body>
</html>
