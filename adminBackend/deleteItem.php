<?php
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
        $sql = "DELETE FROM products WHERE productId = '".$_POST['product']."'";
        $delete = mysqli_query($conn,$sql);

        $sql2 = "DELETE FROM comments WHERE productId = '".$_POST['product']."'";
        $delete2 = mysqli_query($conn,$sql2);
        $sql3 = "DELETE FROM prices WHERE productId = '".$_POST['product']."'";
        $delete3 = mysqli_query($conn,$sql3);
    }
?>