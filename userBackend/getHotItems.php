<?php 
session_start();
include "../dbConnection.php";

$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    

$sql = "SELECT productId, COUNT(*) as count
FROM prices
WHERE priceDate >= DATE_SUB(NOW(), INTERVAL 24 HOUR)
GROUP BY productId
HAVING count > 3";
$result = mysqli_query($conn, $sql);
while($prod = mysqli_fetch_array($result)){
    echo prod['productId'];
    $sql2 = "SELECT * FROM products WHERE productId = ".prod['productId']. " AND store = '".$_GET['s']."'" ;
    $result2 = mysqli_query($conn,$sql2);
    while($row = mysqli_fetch_array($result2)){
        echo "<div id = item-entry>";
        echo"<h3>".$row['productName']."</h3>";
        echo"<p>
            <ul>
                <li>$".$row['currPrice']."</li>
                <li>".$row['productBrand']."</li>
                <li>".$row['store']."</li>
            </ul>
        </p>
        <p>".$row['description']."</p>";
        echo "<input id = 'see-more' type = 'button' value = 'See more' onclick = 'return addListener(".$row['productId'].")'>";
        echo "</div>";
    };
};



mysqli_close($conn);
?>