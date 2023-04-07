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
<!--Login to system as customer or admin-->
<div id = "loginForm">
    <h3>Please Login to System</h3>
    <form id="login" method=post action="authentication.php?q=user">
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
    <div id = "switchPage">
</div>
</div>
<!--Register in system-->
<div id = "registerForm">
    <h3>New here? Register today!</h3>
    <form name="register" method=post action="userBackend/addUser.php?q=user">
    <table>
    <tr>
        <td>Email address: </td>
        <td><input type="email" name="email"></td>
    </tr>
    <tr>
        <td>First Name: </td>
        <td><input type="text" name="fname"></td>
    </tr>
    <tr>
        <td>Last Name: </td>
        <td><input type="text" name="lname"></td>
    </tr>
    <tr>
        <td>Username: </td>
        <td><input type="text" name="username"></td>
    </tr>
    <tr>
        <td>Password:</td>
        <td><input type="password" name="password"></td>
    </tr>
    </table>
    <br/>
    <input class="submit" type="submit" name="submitlogin" value="Register">
    </form>
</div>
<div id = 'otherButtons'>
    <input id = "guest" type = 'button' value = 'CONTINUE AS GUEST' onclick = "document.location.href='search.php'">
    <input id = "switch" type = "button" value = "Login as admin" onclick = "document.location.href='adminLogin.php'">
</div>

<footer>
    <p>DISCLAIMER: The grocery store price tracker relies on honesty and integrity from its user's in order to keep all
        information on the website accurate and up to date. Please be honest when logging prices and leaving comments.
        Any suspicious user activity will be investigated and users may be banned at the discretion of administrators.</p>
</footer>

</body>
</html>