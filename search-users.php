<?php 
    session_start();
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
   <script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>

</head>
<body>
<?php
    include "adminHeader.php";
?>
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
    </div>
</div>
</div>
</body>
</html>
