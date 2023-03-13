<?php
session_start();
if (isset($_POST['submitlogin'])) {
    //connect to the database
    $connString = "localhost";
    $user = 'root';
    $pass = 'rootuser';
    $dbname = "groceryTracker";
    $conn = new mysqli($connString, $user, $pass, $dbname);

    //get the user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    //sanitize the input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    //query the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('location: profile.php'); //redirect to homepage
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>