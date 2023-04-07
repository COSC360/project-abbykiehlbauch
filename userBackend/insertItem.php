<?php
session_start();
include "../dbConnection.php";

$conn = new mysqli($connString, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{ 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        $success = false;
        // prepare and bind
        if(isset($_POST['description']) && isset($_POST['itemName']) && isset($_POST['itemBrand']) && isset($_POST['store']) &&isset($_POST['volume']) && isset($_POST['units']) && isset($_POST['price'])){
            $stmt = $conn->prepare("INSERT INTO products (productName, productBrand, store, `description`, volume, unit, currPrice) VALUES (?, ?, ?, ?, ?, ?,?)");
            $stmt->bind_param("ssssdsd",$_POST['itemName'], $_POST['itemBrand'],$_POST['store'],$_POST['description'],$_POST['volume'], $_POST['units'],$_POST['price']);
            $stmt->execute();
            $stmt->close();
            $success = true;
        }else if (isset($_POST['itemName']) && isset($_POST['itemBrand']) && isset($_POST['store']) &&isset($_POST['volume']) && isset($_POST['units']) && isset($_POST['price'])){
            $stmt = $conn->prepare("INSERT INTO products (productName, productBrand, store, volume, unit, currPrice) VALUES (?, ?, ?, ?, ?,?)");
            $stmt->bind_param("sssdsd",$_POST['itemName'], $_POST['itemBrand'],$_POST['store'],$_POST['volume'], $_POST['units'],$_POST['price']);
            $stmt->execute();
            $stmt->close();
            $success = true;
        }
        
        if($success == true){
            //get itemID
            $stmtID = $conn->prepare("SELECT productID FROM products WHERE productName = ? AND productBrand = ? AND store = ?");
            $stmtID->bind_param("sss", $_POST['itemName'], $_POST['itemBrand'],$_POST['store']);
            $stmtID->execute();
            $stmtID->bind_result($prodId);
            $stmtID->store_result();
            while($stmtID->fetch()){
                $prodId;
            }
            $stmtID->close();
            //insert price into price db
            $stmtPrice = $conn->prepare("INSERT INTO prices (productId, price, username) VALUES (?, ?, ?)");
            $stmtPrice->bind_param("ids", $prodId, $_POST['price'], $_SESSION['username']);
            $stmtPrice->execute();

            $stmtPrice->close();
            $conn->close();
        }
    }
}
?>