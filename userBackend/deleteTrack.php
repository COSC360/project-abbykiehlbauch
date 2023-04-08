<?php
    include "../dbConnection.php";
    $conn = new mysqli($connString, $user, $pass, $dbname);
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    { 
        $sql = "DELETE FROM trackeditems WHERE productId = '".$_POST['product']."'";
        $delete = mysqli_query($conn,$sql);
        echo $_POST['product'];
    }
?>