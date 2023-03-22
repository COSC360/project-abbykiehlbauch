<?php 
session_start();
$_SESSION['productId'] = $_GET['q'];
$connString = "localhost";
$user = 'root';
$pass = 'rootuser';
$dbname = "groceryTracker";

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
        
        //set price alert
        echo "<div id = 'price-alert'>
                <form id = 'trackPrice' method = POST action = 'userBackend/trackPrice.php'>
                <p>
                    <label for = 'target-price'>Track this item and be alerted when it reaches a certain price!</label>
                    <input name = 'target-price' type = 'text'>
                    <input type = 'submit' value = 'Track item'>
                </p>
            </form>
        </div>";

        //log new price for a product
        echo "<div id = 'log-price'>
            <h3>Log Price</h3>
            <form id = 'priceLog' method = post action = 'userBackend/logprice.php'>
                <input id = 'new-price' name = 'price' type = 'text'>
                <input type = 'submit' value = 'Log new price'>
            </form>
        </div>";
        
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

        //write a comment
        echo "<p>
            <form id = 'write-comment' method = POST action = 'userBackend/insertComment.php'>
                <input type = 'text' name = 'comment'>
                <input type = 'submit' value = 'Send'>
            </form>
        </p>
    </div>";
    
}
?>
