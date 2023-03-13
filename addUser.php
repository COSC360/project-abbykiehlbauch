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
    $stmt = $conn->prepare("INSERT INTO users (emailAddress, fname, lname, username, `password`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$_POST['email'], $_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password']);
    $stmt->execute();
    $_SESSION['username'] = $_POST['username'];
    header('location: profile.php'); 

    $stmt->close();
    $conn->close();
?>