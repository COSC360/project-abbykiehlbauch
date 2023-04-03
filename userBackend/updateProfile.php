<?php
    session_start();
    include "../dbConnection.php";
    
    $conn = new mysqli($connString, $user, $pass, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
            //insert price into price db
            $stmtPrice = $conn->prepare("UPDATE users SET fname = ? , lname = ?, emailAddress = ? WHERE username = ?");
            $stmtPrice->bind_param("ssss", $_POST['firstName'], $_POST['lastName'], $_POST['email'], $_SESSION['username']);
            $stmtPrice->execute();

            header("Location: ../profile.php");
            exit();

            $stmtPrice->close();
            $conn->close();
        }
    }
?>