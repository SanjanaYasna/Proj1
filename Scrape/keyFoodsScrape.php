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
    <a class="active" href="keyFoodsScrape.html">Home</a>
    <a href="dailyScrape.php">Daily Scrape</a>
    <div class="search-container">
  <form method="post" class="form" action ="<?php echo $_SERVER["PHP_SELF"]; ?>" >
  <input type="text" id="test-input" name="test-input"/>
  <button id="submit-button" type="submit" name="Submit">OK</button>
</form>
</div>
</div>
<div style="padding-left:16px" id = "product-test">
  <h2>Responsive Results Table</h2>
</div>
  <div class="center"  >
    <p id="test-output"></p>
  </div>
  <?php
$product ="";
$display_results = ""; //results from a query, in the rform of a table outlined in function below
$display_values= array();
$item_number = 0;

if(isset($_POST['submit'])) {
  $display_results .= "<h2> Search Results </h2>";
  $display_results .= '
  <table class= "table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Item #</th>
      <th scope="col">Item Title</th>
      <th scope="col">Add to "Daily Scrape"</th>
    </tr>
  </thead>
  <tbody>';
  foreach ($display_values as $value) { //add each of the results to table for output
    $display_results .= '<tr>
      <th scope="row">'.($item_number++).'</th>'.
      '<td >'.$value.'</td>'.
      '<td><form method="post" action="addtoSql.php">'.
      '<button type="submit" class="btn btn-success" name="keyFoods" value="'.$value.">Add to Scrapes</button>".
      "</form>
      </td>
  </tr>";
}
$display_results .= '</tbody>
</table>'; 
}


if(  isset($_POST["Submit"]) ){
  if (empty($_POST["test-input"])) echo "Must enter input to get search results";
  else {
    $product=$_POST["test-input"];
    $queryOut = shell_exec("python3 ./keyFoods.py $product");
    //print_r($queryOut)
    $display_values = $queryOut; //make product outputs part of array
}
}

echo $display_results;
?>

  </body>
</html>