<?php
    print_r($_POST);

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("Valid email required");
}


?>
