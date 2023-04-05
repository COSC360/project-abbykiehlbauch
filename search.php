<?php
    session_start();
    include "dbConnection.php";
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
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <script>
        //call php file to generate results
        function results(){
            var str = document.getElementById("searchbar").value;
            var store = document.getElementById("dropdown").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("results").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "userBackend/getSearch.php?q="+str+"&s="+store);
            xmlhttp.send();
            return false;
        }
        //call PHP file to generate more-info section
        function addListener(prodId){
            var moreInfo = document.getElementById("more-info");
            moreInfo.style.visibility = "visible";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("product-info").innerHTML = this.responseText;
                    initializeListener();
                }
            };
            xmlhttp.open("GET", "userBackend/moreinfo.php?q="+prodId);
            xmlhttp.send();
        }
        
    </script>
</head>
<body>
    <?php
    if(!isset($_SESSION['username'])){
        include "guestHeader.php";
    }else if (!isset($_SESSION['admin'])) {
        include "userHeader.php";
    }else if(isset($_SESSION['admin'])){
        include "adminHeader.php";
    }
    ?>
<div id = "search-bar">
    <p>
        <form id = "search-bar" >
            <label for = "searchbar">Search for items: </label>
            <input type = "search" id = "searchbar" onkeyup = "return results()" placeholder = "Start typing to see items...">
            <label for = "dropdown">Filter by store: </label>
	    <select id = "dropdown" onclick = "return results()">
            <option> </option>
            <?php
                $sql = "SELECT store FROM products GROUP BY store";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_array($result)){
                    echo "<option>".$row['store']."</option>";
                }
            ?>
            </select>
        </form>
    </p>
</div>
<div id="main">
    <h1>Results</h1>

    <div id="results"></div>

    <div id="center">
        <div id="more-info">
        <div id = "product-info"></div>
    </div>
</div>

<footer>
    <p>DISCLAIMER: The grocery store price tracker relies on honesty and integrity from its user's in order to keep all
        information on the website accurate and up to date. Please be honest when logging prices and leaving comments.
        Any suspicious user activity will be investigated and users may be banned at the discretion of administrators.</p>
</footer>

</body>
</script>
</html>
