<?php
    session_start();
    include "../dbConnection.php";
    $search = $_GET['q'];
    if($_GET['q']==null){

    }
    $conn = new mysqli($connString, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    
    $sql = "SELECT * FROM comments WHERE DATE(`date`) = '".$search."' ORDER BY `date` DESC";
    $result = mysqli_query($conn,$sql);
    echo "<div id = 'results'>";
    echo "<h2>RECENT COMMENTS</h2>";
    while($row = mysqli_fetch_array($result)){
            echo "<article class = 'entry'>";
            echo"<p>".$row['date']." - ".$row['username']."</h3>";
            echo"<p>".$row['comment']."</p>           
            </article>";
    };
    echo "</div>";

    $sqlp = "SELECT priceDate, price, productName, username  FROM prices JOIN products ON prices.productId = products.productId WHERE DATE(priceDate) = \"".$search."\" ORDER BY priceDate DESC";
    $prices = mysqli_query($conn,$sqlp);
    echo "<div id = 'site-activity'>";
    echo "<h2>PRICE LOGS</h2>";
    while($price = mysqli_fetch_array($prices)){
        echo "<article class = \"entry\">
            <p>".$price['priceDate']." - ".$price['username']."</p>
            <p>".$price['productName']." - $".$price['price']."</p>
        </article>";
    }
    echo "</div>";
    mysqli_close($conn);
?>

