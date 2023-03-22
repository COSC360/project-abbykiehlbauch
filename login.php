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
    <form id="login" method=post action="authentication.php">
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
    <form method=post action="reset.jsp">
        <input class="submit" type="submit" name="forgotpassword" value="Forgot Password">
    </form>
</div>
<!--Register in system-->
<div id = "registerForm">
    <h3>New here? Register today!</h3>
    <form name="register" method=post action="userBackend/addUser.php">
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
</body>
</html>