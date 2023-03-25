<?php
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);

    $sql = "DELETE FROM comments WHERE username = '".$_POST['user']."' AND `date` = '".$_POST['date']."'";
    $delete = mysqli_query($conn,$sql);
?>