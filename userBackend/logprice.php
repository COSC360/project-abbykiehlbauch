<?php
session_start();
include "../dbConnection.php";
$conn = new mysqli($connString, $user, $pass, $dbname);
echo $_SESSION['productId'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    
// prepare and bind
$stmt = $conn->prepare("INSERT INTO prices(productId, price, username) VALUES (?,?, ?)");
$stmt->bind_param("ids", $_SESSION['productId'],$_POST['price'], $_SESSION['username']);
$stmt->execute();
$stmt->close();

//update current price
$stmtPrice = $conn->prepare("UPDATE products SET currPrice = ? WHERE productId = ?");
$stmtPrice->bind_param("di",$_POST['price'], $_SESSION['productId']);
$stmtPrice->execute();
$stmtPrice->close();
$conn->close();

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>