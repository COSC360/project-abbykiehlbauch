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
        //call php file to generate results
        function results(){
            var str = document.getElementById("searchbar").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200){
                    document.getElementById("results").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "userBackend/getSearch.php?q="+str);
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
                }
            };
            xmlhttp.open("GET", "userBackend/moreinfo.php?q="+prodId);
            xmlhttp.send();
        }
        
    </script>
</head>
<body>
    <?php 
    if (!isset($_SESSION['admin'])) {
        include "userHeader.php";
    }else{
        include "adminHeader.php";
    }
    ?>
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
        <div id = "product-info"></div>
    </div>
</div>
</body>

</script>
</html>
