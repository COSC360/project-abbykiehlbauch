<?php
session_start();
include "../dbConnection.php";
$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        // prepare and bind
        if(isset($_POST['newprice'])){
            $stmt = $conn->prepare("INSERT INTO prices(productId, price, username) VALUES (?,?,?)");
            $stmt->bind_param("ids", $_SESSION['productId'],$_POST['newprice'], $_SESSION['username']);
            $stmt->execute();
            $stmt->close();

            //update current price
            $stmtPrice = $conn->prepare("UPDATE products SET currPrice = ? WHERE productId = ?");
            $stmtPrice->bind_param("di",$_POST['newprice'], $_SESSION['productId']);
            $stmtPrice->execute();
            $stmtPrice->close();
            $conn->close();
        }
    }
}
?>