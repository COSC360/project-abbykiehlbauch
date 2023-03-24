<?php
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);

    echo $_POST['user'];
    echo $_POST['date'];
    $sql = "DELETE FROM comments WHERE username = '".$_POST['user']."' AND `date` = '".$_POST['date']."'";
    $delete = mysqli_query($conn,$sql);
?>