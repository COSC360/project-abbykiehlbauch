<?php 
    session_start();
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<input type = 'button' id = 'return' value = 'Return to search page' onclick = "window.location.assign('../search.php')" >
<?php
//if(isset($_SESSION['username'])){
        //Retrieve user data from database
        $sql = "SELECT priceDate, price FROM prices WHERE productId = ".$_SESSION['productId'];
        $result = mysqli_query($conn, $sql);

        // Step 2: Format data for Chart.js
        $labels = [];
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['priceDate'];
            $data[] = $row['price'];
        }
        $data = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Price Adjustment',
                    'data' => $data,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];
?>
    <div id = 'price-log-chart'>
    <h2>Price logs by date</h2>
    <canvas id='myChart'>
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
                            stepSize: 0.5,
			    callback: function(value, index, ticks) {
                        	 return '$' + Chart.Ticks.formatters.numeric.apply(this, [value, index, ticks]);

                    	    }
                        }
                    }
                }
            }
        });
    </script>
    </canvas>
    </div>