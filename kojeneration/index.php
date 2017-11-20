<?php 
session_start();
$_SESSION['status'] = 'logged-out';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="Cody Kealy">
  <title>Kojeneration || Welcome</title>
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <section id="loginBox">
<div class="loginBox">
  <a href= "http://www.kojeneration.com/ "><img src="./img/usericon.png" class="user"> </a>
  <h2>Kojeneration</h2>
    <form action = "process.php" method = "POST">
        <p>
            <label>Email </label>
            <input type = "text" id = "email" name = "email" />
        </p>
        <p>
            <label>Password </label>
            <input type = "password" id = "pass" name = "pass" />
        </p>        
        <p>
            <input type = "submit" id = "btn" value = "Login" />
        </p>
    </form>
</div>
</section>
</body>
</html>