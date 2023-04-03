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
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    <?php
        // Step 1: Retrieve user data from database
        $sql = "SELECT DATE(dateCreated) as created_date, COUNT(*) as user_count FROM users GROUP BY created_date";
        $result = mysqli_query($conn, $sql);

        // Step 2: Format data for Chart.js
        $labels = [];
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['created_date'];
            $data[] = $row['user_count'];
        }
        $data = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Users Created',
                    'data' => $data,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];
    ?>
    <div id = "users-created">
    <h2>Users Created by Date</h2>
    <canvas id="myChart">
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = <?php echo json_encode($data); ?>;
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
    </canvas>
    </div>
</body>
</html>
