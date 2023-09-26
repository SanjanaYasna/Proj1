<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

.center {
  margin: auto;
  width: 30%;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>
<body>


  <div class="topnav">
    <a class="active" href="keyFoodsScrape.php">Home</a>
    <a href="dailyScrape.php">Daily Scrape</a>
</div>
<div style="padding-left:16px" id = "monitor">
    <h2>Items monitored:</h2>
    <p>Each of these items are scraped regularily at 11 am every day to monitor for price or availability</p>
<?php
include 'addtoSql.php';
$user = 'root';
$host = "localhost";
$dbname = "login";
$user = "root";
$pwd = "";

$conn = new mysqli($host, $user, $pwd, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">User</th>
      <th scope="col">Store</th>
      <th scope="col">Item_Nam</th>
    </tr>
  </thead>
  <tbody>
<?php
$query = "SELECT User, Store, Item_Name from ItemDB WHERE User = '$currUser' ";
$print = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($print)) {
  echo "<tr>
  <td>".$row["User"]. "</td>".
  "<td>".$row["Store"]. "</td>".
  "<td>".$row["Item_Name"]. "</td>";
}
    ?>
  </tbody>
</table>
</div>

