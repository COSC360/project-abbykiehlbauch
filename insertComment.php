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

    $stmt = $conn->prepare("INSERT INTO comments (username, comment, productId) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd",$_SESSION['username'],$_POST['comment'], $_SESSION['productId']);
      
    $stmt->execute();
    $stmt->close();
    $conn->close();
?>