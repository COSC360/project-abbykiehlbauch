<?php
session_start();
include "../dbConnection.php"; 
$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        //get current price of item
        $sql = "SELECT currPrice FROM products WHERE productId = ".$_SESSION['productId'];
        $result = mysqli_query($conn,$sql);
        $price;
        while($row = mysqli_fetch_array($result)){
            $price = $row['currPrice'];
        }

        if(isset($_POST['trackprice']) && isset($price)){
            //insert price into price db
            $stmtPrice = $conn->prepare("INSERT INTO trackeditems (username, productId, trackedPrice, currPrice) VALUES (?, ?, ?, ?)");
            $stmtPrice->bind_param("sidd", $_SESSION['username'],$_SESSION['productId'], $_POST['trackprice'], $price);
            $stmtPrice->execute();
            $stmtPrice->close();
            $conn->close();
        }
    }
}
?>