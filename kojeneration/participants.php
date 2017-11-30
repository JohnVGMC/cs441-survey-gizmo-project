<?php 
session_start();
if($_SESSION['status'] != 'logged-in')
    header("Location: index.php");
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
  <img src="./img/usericon.png" class="user">
  <h2>Login</h2>
    Welcome
</div>
</section>
</body>
</html>