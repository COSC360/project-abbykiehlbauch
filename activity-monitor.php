<!DOCTYPE html>
<html>
<head lang="en">
   <meta charset="utf-8">
   <title>Grocery Store Price Tracker</title>
   <link rel="stylesheet" href="css/activity-monitor.css" />
   <link rel="stylesheet" href="css/header.css" />
   <script type="text/javascript" src="script/search-users.js"></script>
</head>
<body>
    <?php include "adminHeader.php"?>
    <div id = "search-dates">
        <label for = "target-date">Search by date: </label>
        <input type = "date" id = "target-date">
    </div>
    <div id="results">
        <h2>Recent Comments</h2>
        <article class = "entry">
            <p>Date - Username</p>
            <p>Comment</p>
        </article>
    </div>
    <div id="site-activity">
        <h2>Site Activity</h2>
        <article class = "entry">
            <p>Date - Username</p>
            <p>Item - New price</p>
        </article>
    </div>
</body>
</html>
