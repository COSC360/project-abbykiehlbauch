<?php 
session_start();
$q = $_GET['q'];
include "../dbConnection.php";

$conn = new mysqli($connString, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}    

$sql = "SELECT * FROM users WHERE username LIKE '%".$q."%' OR emailAddress LIKE '%".$q."%'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
        echo "<div class = user-entry>";
        echo"<h3>".$row['fname']." ".$row['lname']."</h3>";
        echo"<p>".$row['username']."</p>
        <p>".$row['emailAddress']."</p>";
        echo "<input id = 'see-more' type = 'button' value = 'See more' onclick = 'return viewMore(\"".$row['username']."\")'>";
        echo "</div>";
    };
mysqli_close($conn);
?>