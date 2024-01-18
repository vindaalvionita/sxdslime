<?php 
include_once('connect.php');
$database = new database();
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $name = $_POST['name'];
    if($database->register($username,$password,$name))
    {
      header('location:login.php');
    }
}

?>
<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Register Form</title>
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sticky-footer/">

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
    <link href="sticky-footer.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <!-- Begin page content -->
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5"><b>SXDSlime's Member Registration</b></h1>
    <p class="lead"><b>Please register your identity</b></p>
    <hr/>
    <form method="post" action="">
    <div class="form-group row">
      <label for="username" class="col-sm-2 col-form-label"><b>Username</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      </div>
    </div>

    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label"><b>Name</b></label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
      </div>
    </div>


  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label"><b>Password</b></label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <a href="login.php" class="btn btn-success">Login</a>
      <button type="submit" class="btn btn-primary" name="register">Register</button>
    </div>
  </div>
</form>
  </div>
</main>

<footer class="footer mt-auto py-3">
  <div class="container">
    <p class="mt-5 mb-3 text-muted">sxdslime &copy; 2020</p>
  </div>
</footer>
</body>
</html>