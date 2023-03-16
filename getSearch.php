<?php 
session_start();
$q = $_GET['q'];
$connString = "localhost";
$user = 'root';
$pass = 'rootuser';
$dbname = "groceryTracker";

$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    

$sql = "SELECT * FROM products WHERE productName LIKE '%".$q."%' GROUP BY productId";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
        $psql = "SELECT price FROM prices WHERE productId = '".$row['productId']."' ORDER BY priceDate DESC LIMIT 1";
        $prices = mysqli_query($conn, $psql);
        $itemPrice = mysqli_fetch_array($prices);
        echo "<div id = item-entry>";
        echo"<h3>".$row['productName']."</h3>";
        echo"<p>
            <ul>
                <li>$".$itemPrice[0]."</li>
                <li>".$row['productBrand']."</li>
                <li>".$row['store']."</li>
            </ul>
        </p>
        <p>".$row['description']."</p>";
        echo "<input id = 'see-more' type = 'button' value = 'See more' onclick = 'return addListener()'>";
        echo "</div>";
    };

mysqli_close($conn);
?>