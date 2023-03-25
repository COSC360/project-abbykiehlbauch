<?php 
session_start();
include "dbConnection.php";
$conn = new mysqli($connString, $user, $pass, $dbname);

$stmt = $conn->prepare("SELECT * FROM adminuser WHERE username=?");
$stmt->bind_param("s",$_SESSION['username']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username, $email, $password, $fname, $lname);
while($stmt->fetch()){
    $username.$email.$password.$fname.$lname;
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
<?php echo "<h2>Welcome <span id = \"fname\">".$fname."</span>!</h2>" ?>
<table>
<form id = "profile-info" method = POST action = "userBackend/updateProfile.php">
    <tr>
        <td><label for = "username">Username: </label></td>
        <?php echo "<td><input type = 'text' name = 'username' value = '".$username."' readonly></td>" ?>
    </tr>
    <tr>
        <td><label for = "email">Email Address: </label></td>
        <?php echo "<td><input type = \"email\" name = \"email\" value = '".$email."'></td>" ?>
    </tr>
    <tr>
        <td><label for = "firstName">First Name: </label></td>
        <?php echo "<td><input type = 'text' name = 'firstName' value = '".$fname."'></td>" ?>
    </tr>
    <tr>
        <td><label for = "lastName">Last Name: </label></td>
        <?php echo "<td><input type = 'text' name = 'lastName' value = '".$lname."'></td>" ?>
    </tr>
    <tr colspan = "2"><td><input type = "submit" value = "Save Changes"></td></tr>
</table>
</form>
<form id = "logoutButton" method = "post" action = "logout.php">
    <input id = "logout" type = "submit" value = "Log Out">
</form>
</div>
<div id = "welcome">
    <p>Welcome to your administrator portal! To return to the main site, click the button below. Get back to this portal by clicking the profile icon in the top right!</p>
    <input id = "main-site" type = "button" value = "MAIN SITE">
</div>
</body>
</html>