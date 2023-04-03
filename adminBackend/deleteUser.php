<?php
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
        //delete user
        $sql = "DELETE FROM users WHERE username = '".$_POST['user']."'";
        $delete = mysqli_query($conn,$sql);

        //set username of comments and prices to 'deleted user'
        $sql2 = "UPDATE prices SET username = 'Deleted User' WHERE username ='".$_POST['user']."'";
        $prices = mysqli_query($conn,$sql2);

        $sql3 = "UPDATE comments SET username = 'Deleted User' WHERE username='".$_POST['user']."'";
        $comments = mysqli_query($conn,$sql3);
    }
?>