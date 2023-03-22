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

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
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
   <script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
   <script type="text/javascript" src="script/user-profile.js"></script>
</head>
<body>
<header id="masthead">
    <h1>Grocery Store Price Tracker</h1>
    <nav>
        <p><a href = "search.php">Search page</a></p>
        <p><a href = "login.php">Login page</a></p>
        <p><a href = "addItem.php">Add an Item</a></p>
    </nav>
    <a href = "profile.php">
        <img id = "profile" src = "images/profile.png" href = "profile.php">
    </a>
</header>
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
<h2>Tracked Items</h2>
<div id = "alerts">

<?php
    $tracked = "SELECT * FROM trackeditems JOIN products ON trackedItems.productId = products.productId WHERE trackeditems.username = '".$_SESSION['username']."'";
    $result = mysqli_query($conn,$tracked);

    while($row = mysqli_fetch_array($result)){
        echo "<div class = entry>";
        echo"<h3>".$row['productName']."</h3>";
        echo"<p>
            <ul>
                <li>$".$row['currPrice']."</li>
                <li>".$row['productBrand']."</li>
                <li>".$row['store']."</li>
            </ul>
        </p>
        <p>".$row['description']."</p>";
        echo "<p>Target price: ".$row['trackedPrice']."</p>";
        echo "</div>";
    };

?>
</div>
</body>
</html>