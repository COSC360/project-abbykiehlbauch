<?php
    session_start();
    $connString = "localhost";
    $user = 'root';
    $pass = 'rootuser';
    $dbname = "groceryTracker";
    
    $conn = new mysqli($connString, $user, $pass, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    // prepare and bind
    if(isset($_POST['description'])){
        $stmt = $conn->prepare("INSERT INTO products (productName, productBrand, store, `description`, volume, unit, currPrice) VALUES (?, ?, ?, ?, ?, ?,?)");
        $stmt->bind_param("ssssdsd",$_POST['itemName'], $_POST['itemBrand'],$_POST['store'],$_POST['description'],$_POST['volume'], $_POST['units'],$_POST['price']);
    }else{
        $stmt = $conn->prepare("INSERT INTO products (productName, productBrand, store, volume, unit, currPrice) VALUES (?, ?, ?, ?, ?,?)");
        $stmt->bind_param("sssdsd",$_POST['itemName'], $_POST['itemBrand'],$_POST['store'],$_POST['volume'], $_POST['units'],$_POST['price']);
    }
    $stmt->execute();
    $stmt->close();

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
    $stmtPrice = $conn->prepare("INSERT INTO prices (productId, price) VALUES (?, ?)");
    $stmtPrice->bind_param("id", $prodId, $_POST['price']);
    $stmtPrice->execute();

    echo "Thank you for submitting a new item!";

    $stmtPrice->close();
    $conn->close();
?>