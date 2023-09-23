<?php
require "init.php";


if(  isset($_POST["Submit"]) && !empty($_POST["test-input"])){
    $product = $_POST["test-input"];
    echo $product;
}
else echo "nothing recieved";
?>

