<?php
    session_start();
    include "../dbConnection.php";
    
    $conn = new mysqli($connString, $user, $pass, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            if(isset($_SESSION['username']) && isset($_POST['comment']) && isset($_SESSION['productId'])){
                $stmt = $conn->prepare("INSERT INTO comments (username, comment, productId) VALUES (?, ?, ?)");
                $stmt->bind_param("ssd",$_SESSION['username'],$_POST['comment'], $_SESSION['productId']);
                
                $stmt->execute();
                $stmt->close();
                $conn->close();
            }
        }
    }
?>