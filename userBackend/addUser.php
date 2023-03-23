<?php
session_start();
include "../dbConnection.php";
    
    $conn = new mysqli($connString, $user, $pass, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    
    // prepare and bind
    if($_GET['q'] == 'user')
        $stmt = $conn->prepare("INSERT INTO users (emailAddress, fname, lname, username, `password`) VALUES (?, ?, ?, ?, ?)");
    else
        $stmt = $conn->prepare("INSERT INTO adminuser (email, fname, lname, username, `password`) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss",$_POST['email'], $_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['password']);
    $stmt->execute();
    $_SESSION['username'] = $_POST['username'];
    if($_GET['q'] == 'user')
        header('location: profile.php'); //redirect to homepage
    else
        header('location: ../admin-profile.php');

    $stmt->close();
    $conn->close();
?>