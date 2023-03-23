<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Grocery Store Price Tracker</title>
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/header.css" />
    <script type="text/javascript" src="script/login.js"></script>
</head>
<body>
<header id="masthead">
    <h1>Grocery Store Price Tracker</h1>
</header>
<!--Login to system as admin-->
<div id = "loginForm">
    <h3>Please Login to System</h3>
    <form id="login" method=post action="authentication.php?q=admin">
    <table>
    <tr>
        <td>Username: </td>
        <td><input type="text" id="username" name = "username"></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="password" id="password" name = "password"></td>
    </tr>
    </table>
    <br/>
    <input class="submit" type="submit" name="submitlogin" value="Log In">
    </form>
    <form method=post action="">
        <input class="submit" type="submit" name="forgotpassword" value="Forgot Password">
    </form>
    <div id = "switchPage">
    <input id = "switch" type = "button" value = "Login or register as user">
</div>
</div>

</body>
</html>