<?php 
session_start();
$_SESSION['productId'] = $_GET['q'];
include "../dbConnection.php";

$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    
//get product info
$sql = "SELECT * FROM products WHERE productId = ".$_GET['q'];
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
if(isset($row["description"]))
    $description = $row['description'];
else   
    $description = "";
echo "<h3>".$row['productName']."</h3>
        <p>
            <ul>
                <li>$".$row['currPrice']."</li>
                <li>".$row['productBrand']."</li>
                <li>".$row['store']."</li>
            </ul>
        </p>
        <p>".$description."</p>
        <h4>Price History</h4>";

        $sqlp = "SELECT priceDate, price FROM prices WHERE productId = ".$_GET['q']." ORDER BY priceDate DESC";
        $prices = mysqli_query($conn,$sqlp);
        echo "<div id = 'prices'>";
        while($price = mysqli_fetch_array($prices)){
            echo "<p>".$price['priceDate']." - $".$price['price']."</p>";
        }
        echo "</div>";

        if(isset($_SESSION['username'])){
        //Retrieve user data from database
        $sql = "SELECT priceDate, price as FROM prices WHERE productId = ".$_SESSION['productId'];
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
                    'label' => 'Price Changes',
                    'data' => $data,
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

    echo "<div id = 'price-log-chart'>
    <h2>Users Created by Date</h2>
    <canvas id='price-chart'>
    <script>
        var ctx = document.getElementById('price-chart').getContext('2d');
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
    </div>";
        }

        if(isset($_SESSION['username'])){
        //set price alert
        echo "<div id = 'price-alert'>
                <form id = 'trackPrice' method = POST action = ''>
                <p>
                    <label for = 'target-price'>Track this item and be alerted when it reaches a certain price!</label>
                    <input id = 'target-price' type = 'text'>
                    <input id = 'trackBtn' type = 'button' value = 'Track item'>
                </p>
            </form>
        </div>";
        }
        //log new price for a product
        if(isset($_SESSION['username'])){
        echo "<div id = 'log-price'>
            <h3>Log Price</h3>
            <form id = 'priceLog' method = 'POST' action = ''>
                <input id = 'new-price' name = 'price' type = 'text'>
                <input id = 'submitBtn' type = 'button' value = 'Log new price'>
            </form>
        </div>";
        }
        
        $sqlc = "SELECT `date`, username, comment FROM comments WHERE productId = ".$_GET['q']." ORDER BY date DESC";
        $comments = mysqli_query($conn,$sqlc);
        echo "<h3>Forum</h3>
        <div id = 'comments'>";
        while($comm = mysqli_fetch_array($comments)){
            echo "<article class = \"entry\">
                <p>".$comm['date']." - ".$comm['username']."</p>
                <p>".$comm['comment']."</p>
            </article>";
        }
        echo "</div>";

        if(isset($_SESSION['username'])){
        //write a comment
        echo "<p>
            <form id = 'write-comment' method = POST action = ''>
                <input id = 'comment-text' type = 'text' >
                <input id = 'comment' type = 'button' value = 'Send'>
            </form>
        </p>
    </div>";
        }else{
            echo "<p>Login to track and log prices, and write comments!</p>";
        }
    
    if(isset($_SESSION['admin']))
        echo "<input id = 'delete-item' type = 'button' value = 'DELETE ITEM' onclick = \"return deleteItem('".$_SESSION['productId']."')\">";

}
?>
