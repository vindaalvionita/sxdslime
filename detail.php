<?php 
session_start();
//koneksi ke database
$koneksi= mysqli_connect ("fdb28.awardspace.net","3690530_sxdslime","Bismillah123","3690530_sxdslime");
?>
<?php
$product_id = $_GET["id"];
$ambil=$koneksi->query("SELECT *FROM pricelist WHERE product_id='$product_id'");
$detail=$ambil-> fetch_assoc();
echo "<pre>";
//print_r($detail);
echo "</pre>";
?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Details</title>
  <link rel="icon" type="image/png" href="logo.png">
</head>
<body>
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
  crossorigin="anonymous">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <style>
    /* Make the image fully responsive */
    .carousel-inner img {
      width: 50%;
      height: 50%;
    }
    .post
    {
      margin-bottom:50px;
      margin-top:50px;
      text-align: center;
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
            <li class="nav-item active">
              <a class="nav-link" href="products.php">Products <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="shoppingcart.php">Shopping Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="checkout.php">Checkout</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="data.php">Data</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <section class="konten">
      <div class="container">
       <hr>
       <hr>
       <hr>
       <hr>
       <h1>Product Details</h1>
       <hr>
       <div class="row">
       </div>
       <div class="col-md-6">
        <img src="variant/<?php echo $detail["photo"];?>" alt="" class="img-responsive" style="width:400px">
      </div>
      <div class="col-md-6">
        <h2><?php echo $detail["variant"]; echo " "; echo $detail["size"];?></h2>
        <h4> Rp. <?php echo number_format ($detail ['price']);?></h4>
        <form method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="number" class="form-control" name="amount">
              <div class="input-group-btn">
                <button class="btn btn-primary" name="buy">BUY</button>
              </div>
            </div>
          </div>
        </form>
        <?php
        if (isset($_POST["buy"])) 
        {
          $amount= $_POST["amount"];
          $_SESSION ["shoppingcart"][$product_id] = $amount;
          echo "<script>alert('Product has been successfully entered Shopping Cart.');</script>";
          echo "<script>location='shoppingcart.php';</script>";
        }
        ?>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
crossorigin="anonymous"></script>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
crossorigin="anonymous"></script>
<footer class="container">
  <p style="text-align: center;"><br>sxdslime &copy; 2020</p>
</footer>
</body>
</html>