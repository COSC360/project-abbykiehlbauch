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
?>
<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/search.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/search.js"></script>
   <script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
   <script>
        function results(){
        var str = document.getElementById("searchbar").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("results").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getSearch.php?q="+str);
            xmlhttp.send();
            return false;
        }
        function addListener(){
            var moreInfo = document.getElementById("more-info");
            moreInfo.style.visibility = "visible";
        }
        
    </script>
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
            <img id = "profile" src = "images/profile.png" href = "user-profile.php">
        </a>
        </header>
<div id = "search-bar">
    <p>
        <form id = "search-bar" >
            <label for = "searchbar">Search for items: </label>
            <input type = "search" id = "searchbar" onkeyup = "return results()" placeholder = "Start typing to see items...">
        </form>
    </p>
</div>
<div id="main">
<h1>Results</h1>
<div id="results"></div>
<div id="center">
    <div id="more-info">
        <h3>Item Name</h3>
        <p>
            <ul>
                <li>Item Price</li>
                <li>Brand</li>
                <li>Store</li>
            </ul>
        </p>
        <p>Item description</p>
        <h4>Price History</h4>
        <div id = "prices">
            <p>Date - Price</p>
            <p>Date - Price</p>
            <p>Date - Price</p>
            <p>Date - Price</p>
            <p>Date - Price</p>
        </div>
        <div id = "price-alert">
            <form>
                <p>
                <label for = "target-price">Track this item and be alerted when it reaches a certain price!</label>
                <input id = "target-price" type = "number">
                <input type = "button" value = "Track item">
            </p>
            </form>
        </div>
        <div id = "log-price">
            <h3>Log Price</h3>
            <form>
                <input id = "new-price" type = "number">
                <select id = "units">
                    <option>lb</option>
                    <option>g</option>
                    <option>kg</option>
                    <option>oz</option>
                    <option>ml</option>
                    <option>L</option>
                </select>
                <input type = "button" value = "Log new price">
            </form>
        </div>
        <h3>Forum</h3>
        <div id = "comments">
            <?php
                echo "<article class = \"entry\">";
                    echo "<p>Date - Username</p>";
                    echo "<p>Comment</p>";
                echo "</article>";
            ?>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Comment</p>
            </article>
            <article class = "entry">
                <p>Date - Username</p>
                <p>Comment</p>
            </article>
        </div>
        <p>
            <form id = "write-comment" method = POST action = "insertComment.php">
                <input type = "text" name = "comment">
                <input type = "submit" value = "Send">
            </form>
        </p>
    </div>
</div>
</div>
</body>

</script>
</html>
