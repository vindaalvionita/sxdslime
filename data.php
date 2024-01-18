<?php 
session_start();
//koneksi ke database
$koneksi= mysqli_connect ("fdb28.awardspace.net","3690530_sxdslime","Bismillah123","3690530_sxdslime");
?>
<!doctype html>
<html lang="en">
<head>
  <link rel="icon" type="image/png" href="logo.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>SXDSlime Data</title>
  <link rel="icon" type="image/png" href="logo.png">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
  crossorigin="anonymous">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>

  <style>
    body {
      background: url("wp.jpg") no-repeat fixed;
      -webkit-background-size: 100%;
      -moz-background-size: 100%;
      -o-background-size: 100%;
      background-size: 100% 100%;
    }
  </style>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" alt="logo" style="width:40px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shoppingcart.php">Shopping Cart</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="checkout.php">Checkout</a>
          </li>
          <li class="nav-item active">            
            <a class="nav-link" href="data.php">Data <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a></a>
          </li>
        </ul>
      </div>
    </nav>
  </header><section class="konten">
    <div class="container">
      <h1>SXDSlime's Data</h1>
      <hr>
      <a href="grafikorder.php" class="btn btn-primary">ORDER CHART</a>
      <a href="searchorder.php" class="btn btn-primary">SHOW LISTED ORDERS</a>
      <a href="proof.php" class="btn btn-primary">SHOW PAYMENT PROOFS</a>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
  crossorigin="anonymous"></script>
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
  crossorigin="anonymous"></script>
  <footer class="footer mt-auto py-3">
    <div class="container">
      <p class="mt-5 mb-3 text-muted" align="right">sxdslime &copy; 2020</p>
    </div>
  </footer>
</body>
<html>