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
   <link rel="stylesheet" href="css/activity-monitor.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/activityMonitor.js"></script>
</head>
<body>
    <?php include "adminHeader.php"?>
    <div id = "search-dates">
        <label for = "target-date">Search by date: </label>
        <input type = "date" id = "target-date" onchange = "results(event)">
    </div>
    <div id = "info">
        <div id="results">
        <h2>RECENT COMMENTS</h2>
        <?php
             $sql = "SELECT * FROM comments ORDER BY `date` DESC";
             $result = mysqli_query($conn,$sql);
             while($row = mysqli_fetch_array($result)){
                echo "<article class = 'entry'>";
                echo"<p>".$row['date']." - ".$row['username']."</h3>";
                echo"<p>".$row['comment']."</p>           
                </article>";
            };
        ?>
        </div>
        <div id="site-activity">
        <h2>PRICE LOGS</h2>
        <?php
            $sqlp = "SELECT priceDate, price, productName, username  FROM prices JOIN products ON prices.productId = products.productId ORDER BY priceDate DESC";
            $prices = mysqli_query($conn,$sqlp);
            while($price = mysqli_fetch_array($prices)){
            echo "<article class = \"entry\">
                <p>".$price['priceDate']." - ".$price['username']."</p>
                <p>".$price['productName']." - $".$price['price']."</p>
                </article>";
            }
        ?>
        </div>
    </div>
</body>
</html>
