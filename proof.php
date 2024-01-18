<?php 
session_start();
//koneksi ke database
$koneksi= mysqli_connect ("fdb28.awardspace.net","3690530_sxdslime","Bismillah123","3690530_sxdslime");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Download Payment Proof</title>
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
  <head>
    <body>

      <!-- navbar -->
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
</header>

<!--konten -->
<section class="konten">
  <div class="container">
   <hr>
   <hr>
   <hr>
   <hr>
   <h1>SXDSlime's Payment Proofs</h1>
   <hr>
   <div class="row">

    <?php $ambil = $koneksi->query("SELECT * FROM payment"); ?>
    <?php while($perphoto = $ambil->fetch_assoc()){ ?>
    <div class="col-md-3">
      <div class="thumbnail">
        <img src="proof/<?php echo $perphoto ['image'];?>" alt="" style="width:150px">
        <div class="caption">
          <h5><?php echo "Order ID. "; echo $perphoto['order_id'];?></h5>
          <h6><?php echo "From : "; echo $perphoto['name'];?></h6>
          <h6><?php echo "Date : "; echo $perphoto['date'];?></h6>
          <a href="download.php?file=<? echo $perphoto['image'];?>" class="btn btn-success">DOWNLOAD</a>
          <br><br>
      	</div>
      </div>
    </div>
<?php } ?>
</div>
</div>
<br>
<br>
<br>
<!-- Optional JavaScript; choose one of the two! -->
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-
ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
crossorigin="anonymous"></script>
 <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-
DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-
9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
integrity="sha384-
w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
crossorigin="anonymous"></script>
-->
    <footer class="footer mt-auto py-3">
      <div class="container">
        <p class="mt-5 mb-3 text-muted" align="right">sxdslime &copy; 2020</p>
      </div>
    </footer>
</body>
</html>