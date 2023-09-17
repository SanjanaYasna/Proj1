<?php
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    header("Location: tryOtherEmail.html");
    //die("Valid email required");
}
$pwd_hash = password_hash($_POST['pwd'], PASSWORD_DEFAULT);

$sqlout = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, pwd_hash) VALUES (?, ?, ?) ";

$stmt = $sqlout->stmt_init();
if (!$stmt->prepare($sql)){
    echo "error: " . $sqlout->error;
    exit();
}

$stmt->bind_param('sss', $_POST['name'], $_POST['email'], $pwd_hash);

if ($stmt->execute()){
    echo "success";
    header("Location: success.html");
    exit();
}
else{
    if ($sqlout->errno === 1062){
        die("Email taken.");
}
    else{
        die($sqlout->error . " " . "Error no: " . $sqlout->errno);
}
}


?>
