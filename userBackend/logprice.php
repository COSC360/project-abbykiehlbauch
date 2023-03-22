<?php
session_start();
$connString = "localhost";
$user = 'root';
$pass = 'rootuser';
$dbname = "groceryTracker";
$conn = new mysqli($connString, $user, $pass, $dbname);
echo $_SESSION['productId'];
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    
// prepare and bind
$stmt = $conn->prepare("INSERT INTO prices(productId, price) VALUES (?,?)");
$stmt->bind_param("id", $_SESSION['productId'],$_POST['price']);
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