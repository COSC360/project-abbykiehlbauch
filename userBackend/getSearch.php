<?php 
session_start();
$q = $_GET['q'];
$store = $_GET['s'];
include "../dbConnection.php";

$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    

$sql = "SELECT * FROM products WHERE productName LIKE '%".$q."%' AND store LIKE '%".$store."%'";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($result)){
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
mysqli_close($conn);
?>