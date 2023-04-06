<?php
    
    //connect to the database
    include "dbConnection.php";
    
    $conn = new mysqli($connString, $user, $pass, $dbname);

    //get the user input
    //$username = $user;
    //$password = $pass;
    
    //sanitize the input
    //$username = mysqli_real_escape_string($conn, $username);
    //$password = mysqli_real_escape_string($conn, $password);

    //query the database
    if($u == 'user'){
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
	$md5=md5($password);
        $stmt->bind_param("ss",$username,$md5);
    }
    else{
        $stmt = $conn->prepare("SELECT * FROM adminuser WHERE username=? AND password=?");
        $stmt->bind_param("ss",$username,$password);
    }
        
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
                   echo "profile.php"; //redirect to homepage    
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
?>