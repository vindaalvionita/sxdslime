<?php 
session_start();
include_once('connect.php');
$database = new database();

if(isset($_SESSION['is_login']))
{
  header('location:home.php');
}

if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}

if(isset($_POST['login']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  if(isset($_POST['remember']))
  {
    $remember = TRUE;
  }
  else
  {
    $remember = FALSE;
  }

  if($database->login($username,$password,$remember))
  {
    header('location:home.php');
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Login Form</title>
  <link rel="icon" type="image/png" href="logo.png">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


  <style>
    body {
      background: url("w3.jpg") no-repeat fixed;
      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100% 100%;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="assets/css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" method="post" action="">
    <img class="mb-0" src="logo.png" alt="" width="220" height="220">
    <h1 class="h2 mb-2 font-weight-normal">Please sign in</h1>
    <label for="username" class="sr-only">Username</label>
    <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" name="remember"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
    <a href="register.php" class="btn btn-lg btn-success btn-block">Register</a>
    <footer class="footer mt-auto py-3">
      <div class="container">
        <p class="mt-5 mb-3 text-muted">sxdslime &copy; 2020</p>
      </div>
    </footer>
  </form>
</body>
</html>