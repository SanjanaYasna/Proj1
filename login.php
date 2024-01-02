<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST"){
  $mysqli= require __DIR__ ."/database.php";
  $sql  = sprintf("SELECT * FROM user
          WHERE email = '%s'",
          $mysqli -> real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
  var_dump($user);
  exit;
    
  if ($user) {
      
      if (password_verify($_POST["pwd"], $user["pwd_hash"])) {
        die("Login success");
          
      }
  }
} 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up Page</title>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type=text/css href=login.css>
   
</head>
<body>
<div class="login-box">
  <h2>Login</h2>

  <form method = "post" action = "addtoSql.php" name="login">
    <div class="user-box">
      <input type="email" name="email" id=email value = "<?= htmlspecialchars($_POST['email'] ?? "") ?>" required>
      <label>Email</label>
    </div>
    <div class="user-box">
      <input type="password" name="pwd" id=pwd required>
      <label>Password</label>
    </div>
    <a href="dashboard.html" onclick="pass_to_sql()">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      Submit
    </a> <!--Officially submit form for addtoSql.php processing-->
    <script type = "text/javascript">
      function pass_to_sql(){
        document.login.submit();
      }
      </script>
  </form>
</div>
</body>
</html>