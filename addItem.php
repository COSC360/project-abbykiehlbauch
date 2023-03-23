<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/addItem.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/add-item.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    
</head>
<body>
<?php 
    if (!isset($_SESSION['admin'])) {
        include "userHeader.php";
    }else{
        include "adminHeader.php";
    }
    ?>
<h2>Add an item to the database!</h2>
<div id = "add-item">
    <table>
        <form id = "newItem" method = 'POST' action = "">
            <tr><td><label>Item name: </label></td><td><input type = "text" name = "itemName" placeholder = "e.g. Black beans"></td></tr>
            <tr><td><label>Item brand: </label></td><td><input type = "text" name = "itemBrand" placeholder = "e.g. No name"></td></tr>
            <tr><td><label>Store: </label></td><td><input type="text" name = "store" placeholder = "e.g. Save-On-Foods"></td></tr>
            <tr>
                <td><label>Price: </label><input name = "price" type = "text" placeholder = "e.g. 3.75"></td>
                <td><label>Weight/Volume: </label><input  name = "volume" type = "number" placeholder = "e.g. 100">
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
        </form>            <tr><td colspan = "2"><input id = "submitBtn" type = "button" value = "Add an item"></td></tr>

    </table>
</div>
</body>
</html>