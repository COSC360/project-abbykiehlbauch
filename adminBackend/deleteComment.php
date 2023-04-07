<?php
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
        $sql = "DELETE FROM comments WHERE username = '".$_POST['user']."' AND `date` = '".$_POST['date']."'";
        $delete = mysqli_query($conn,$sql);
    }
?>