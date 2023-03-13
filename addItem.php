<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/addItem.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/add-item.js"></script>
</head>
<body>
<header id="masthead">
<h1>Grocery Store Price Tracker</h1>
<nav>
    <p><a href = "search.html">Search page</a></p>
    <p><a href = "login.html">Login page</a></p>
    <p><a href = "addItem.html">Add an Item</a></p>
</nav>
<a href = "profile.html">
    <img id = "profile" src = "images/profile.png" href = "user-profile.html">
</a></header>
<h2>Add an item to the database!</h2>
<div id = "add-item">
    <table>
        <form id = "newItem" method = post action = "insertItem.php">
            <tr><td><label>Item name: </label></td><td><input type = "text" name = "itemName" placeholder = "e.g. Black beans"></td></tr>
            <tr><td><label>Item brand: </label></td><td><input type = "text" name = "itemBrand" placeholder = "e.g. No name"></td></tr>
            <tr><td><label>Store: </label></td><td><input type="text" name = "store" placeholder = "e.g. Save-On-Foods"></td></tr>
            <tr>
                <td><label>Price: </label><input name = "price" type = "text" placeholder = "e.g. 3.75"></td>
                <td><label>Weight/Volume: </label><input  id = "weight" name = "volume" type = "number" placeholder = "e.g. 100">
                <select name = "units">
                    <option value="none" selected disabled hidden></option>
                    <option>g</option>
                    <option>lb</option>
                    <option>kg</option>
                    <option>oz</option>
                    <option>ml</option>
                    <option>L</option>
                </select></td>
            </tr>
            <tr><td><label for = "description">Item description: </label></td><td><input name = description type = "text"></td></tr>
            <tr><td colspan = "2"><input type = "submit" value = "Add an item"></td></tr>
        </form>
    </table>
</div>

</body>
</html>