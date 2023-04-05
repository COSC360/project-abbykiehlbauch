<?php
session_start();
if (isset($_POST['submitlogin'])) {
    
    //connect to the database
    include "dbConnection.php";
    
    $conn = new mysqli($connString, $user, $pass, $dbname);

    //get the user input
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //sanitize the input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    //query the database
    if($_GET['q'] == 'user'){
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss",$username,md5($password));
    }
    else{
        $stmt = $conn->prepare("SELECT * FROM adminuser WHERE username=? AND password=?");
        $stmt->bind_param("ss",$username,$password);
    }
        
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['admin'];
        if($_GET['q'] == 'user')
            header('location: profile.php'); //redirect to homepage
        else{
            $_SESSION['admin'] = "true";
            header('location: admin-profile.php');
        }
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>