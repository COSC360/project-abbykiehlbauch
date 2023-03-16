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
                <li>Item Price</li>
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
        /*
        <div id = "price-alert">
            <form>
                <p>
                <label for = "target-price">Track this item and be alerted when it reaches a certain price!</label>
                <input id = "target-price" type = "number">
                <input type = "button" value = "Track item">
            </p>
            </form>
        </div>
        */
        //echo $q;
        echo "<div id = 'log-price'>
            <h3>Log Price</h3>
            <form id = 'priceLog' method = post action = 'logprice.php?'>
                <input id = 'new-price' name = 'price' type = 'text'>
                <input type = 'submit' value = 'Log new price'>
            </form>
        </div>";
        /*
        <h3>Forum</h3>
        <div id = "comments">
            <?php
                echo "<article class = \"entry\">";
                    echo "<p>Date - Username</p>";
                    echo "<p>Comment</p>";
                echo "</article>";
            ?>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Comment</p>
            </article>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Comment</p>
            </article>
        </div>
        <p>
            <form id = "write-comment" method = POST action = "insertComment.php">
                <input type = "text" name = "comment">
                <input type = "submit" value = "Send">
            </form>
        </p>
    </div>
    */
}
?>
