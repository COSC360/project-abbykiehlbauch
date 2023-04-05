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
   <script>
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

<div id="main">
    <h1>Hot Items</h1>
    <div id="results"></div>
    <?php
    $sql = "SELECT productId, COUNT(*) as count FROM prices WHERE priceDate >= DATE_SUB(NOW(), INTERVAL 24 HOUR) GROUP BY productId HAVING count > 3";
    $result = mysqli_query($conn, $sql);
    while($prod = mysqli_fetch_array($result)){
        $sql2 = "SELECT * FROM products WHERE productId = ".$prod['productId'];
        $result2 = mysqli_query($conn,$sql2);
        while($row = mysqli_fetch_array($result2)){
            echo "<div id = item-entry>";
            echo"<h3>".$row['productName']."</h3>";
            echo"<p>
                <ul>
                    <li>$".$row['currPrice']."</li>
                    <li>".$row['productBrand']."</li>
                    <li>".$row['store']."</li>
                </ul>
            </p>
            <p>".$row['description']."</p>";
            echo "<input id = 'see-more' type = 'button' value = 'See more' onclick = 'return addListener(".$row['productId'].")'>";
            echo "</div>";
        };
    };
    mysqli_close($conn);

?>
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
