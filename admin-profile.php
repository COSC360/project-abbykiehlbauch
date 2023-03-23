<?php
session_start();
// Check if the user is not logged in and redirect to the login page
if (!isset($_SESSION['username'])) {
    header('location: login.php');
    exit();
}
$connString = "localhost";
$user = 'root';
$pass = 'rootuser';
$dbname = "groceryTracker";
$conn = new mysqli($connString, $user, $pass, $dbname);

$stmt = $conn->prepare("SELECT * FROM adminuser WHERE username=?");
$stmt->bind_param("s",$_SESSION['username']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $password, $email, $fname, $lname);
while($stmt->fetch()){
    $username.$password.$email.$fname.$lname;
} 
?>

<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/profile.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/admin-profile.js"></script>
</head>
<body>
<?php include "adminHeader.php";?>
<div id = "edit-profile">
<h2>Welcome <span id = "fname">Jane</span>!</h2>
<table>
<form id = "profile-info">
    <tr>
        <td><label for = "email">Email Address: </label></td>
        <td><input type = "email" id = "email" value = "example@mail.com"></td>
    </tr>
    <tr>
        <td><label for = "username">Username: </label></td>
        <td><input type = "text" id = "username" value = "janedoe"></td>
    </tr>
    <tr>
        <td><label for = "firstName">First Name: </label></td>
        <td><input type = "text" id = "firstName" value = "Jane"></td>
    </tr>
    <tr>
        <td><label for = "lastName">Last Name: </label></td>
        <td><input type = "text" id = "lastName" value = "Doe"></td>
    </tr>
    <tr colspan = "2"><td><input type = "submit" value = "Save Changes"> </td></tr>
</table>
</form>
<input id = "logout" type = "button" value = "Log Out">
</div>
<div id = "welcome">
    <p>Welcome to your administrator portal! To return to the main site, click the button below. Get back to this portal by clicking the profile icon in the top right!</p>
    <input id = "main-site" type = "button" value = "MAIN SITE">
</div>
</body>
</html>