<?php 
session_start();
$_SESSION['user'] = $_GET['q'];
include "../dbConnection.php";

$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    
//get product info
$sql = "SELECT * FROM users WHERE username = \"".$_GET['q']."\"";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    echo"<h3>".$row['fname']." ".$row['lname']."</h3>";
    echo"<p>".$row['username']."</p>
    <p>".$row['emailAddress']."</p>";

    echo "<h3>Recent Activity</h3>";
    $sqlc = "SELECT `date`, comment, username, productName FROM comments JOIN products ON comments.productId = products.productId WHERE username = \"".$_GET['q']."\" ORDER BY `date` DESC";
    $comments = mysqli_query($conn,$sqlc);
    echo "<h4>Recent comments</h4>";
    echo "<div class = 'activity'>";
    while($comment = mysqli_fetch_array($comments)){
        echo "<article class = 'entry'>";
        echo "<p>Comment for product: ".$comment['productName']."</p>";
        echo "<p>".$comment['date']." - ".$comment['username']."</p>
            <p>".$comment['comment']."</p>";
        echo "<input type = 'button' id = 'delete' value = 'DELETE COMMENT' onclick = \"return deleteComment('".$comment['username']."','".$comment['date']."')\">";
        echo "</article>";
    }
    echo "</div>";
    

    $sqlp = "SELECT priceDate, price, productName, username  FROM prices JOIN products ON prices.productId = products.productId WHERE username = \"".$_GET['q']."\" ORDER BY priceDate DESC";
    $prices = mysqli_query($conn,$sqlp);
    echo "<h4>Recent price logs</h4>";
    echo "<div class = 'activity'>";
    while($price = mysqli_fetch_array($prices)){
        echo "<article class = \"entry\">
            <p>".$price['priceDate']." - ".$price['username']."</p>
            <p>".$price['productName']." - $".$price['price']."</p>
        </article>";
    }
    echo "</div>";
    echo "<input id = 'block-user' type = 'button' value = 'DISABLE USER' onclick = \"return deleteUser('".$_SESSION['user']."')\">";
}
?>
