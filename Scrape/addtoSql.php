<?php
$item = "";
$store = "Key Foods";
//$price
//$item = $mysqli -> real_escape_string($_POST["keyFoods"]);

$host = "localhost";
$dbname = "login";
$user = "root";
$pwd = "";

$conn = new mysqli($host, $user, $pwd, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$item = $conn -> real_escape_string($_POST["keyFoods"]);

$user = $conn -> real_escape_string($_POST["email"]);
$currUser = $user; //to preserve user value for dailyscrape.php

 //insert into itemDB table of login...
$sql = "INSERT INTO itemDB (User, Store, Item_Name)
 VALUES ('$user', '$store', '$item')";


/*if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}*/

$query = "SELECT User, Store, Item_Name from ItemDB WHERE User = '$user' ";
$print = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($print)) {
  echo $row["User"]. " " . $row["Store"]. " " . $row["Item_Name"]. "<br>";
}

?>