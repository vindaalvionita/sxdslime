<?php
session_start ();
$koneksi=new mysqli("fdb28.awardspace.net","3690530_sxdslime","Bismillah123","3690530_sxdslime");
//mendapatkan id_pembelian dari url
$idpem=$_GET["id"];
$ambil=$koneksi->query("SELECT *FROM orders WHERE order_id='$idpem'");
$detpem=$ambil->fetch_assoc();
//mendapatkan id_pelanggan yang beli
$id_pelanggan_beli=$detpem["user_id"];
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Payment</title>
 <link rel="icon" type="image/png" href="logo.png">
 <link rel="stylesheet"
 href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
 integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
 crossorigin="anonymous">
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
        <li>
          <a class="nav-link active" href="checkout.php">Checkout <span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="data.php">Data</a>
        </li>
        <li>
          <a href="logout.php" class="form-inline my-2 my-lg-0 btn btn-secondary">Logout</a></a>
        </li>
      </ul>
    </div>
  </nav>
  <section>
    <div class="container">
      <hr>
      <hr>
      <hr>
      <hr>
      <h2>Payment Confirmation</h2>
      <hr>
      <p>Kindly submit your payment proof here</p>
      <div class="alert alert-info">Your bill is <strong> Rp. <?php echo number_format($detpem["total_price"])?></strong></div>
      <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label>Bank</label>
          <input type="text" class="form-control" name="bank">
        </div>
        <div class="form-group">
          <label>Total</label>
          <input type="number" class="form-control" name="total_price" min="1">
        </div>
        <div class="form-group">
          <label>Payment Proof</label>
          <input type="file" class="form-control" name="image">
        </div>
        <button class="btn btn-primary" name="kirim">SUBMIT</button>
      </form>
    </div>
    <?php
    if (isset($_POST["kirim"]))
    {
     $namabukti= $_FILES["image"]["name"];
     $lokasibukti= $_FILES["image"]["tmp_name"];
     $namafix= date("YmdHis").$namabukti;
     move_uploaded_file($lokasibukti, "proof/$namafix");

     $name = $_POST ["name"];
     $bank = $_POST ["bank"];
     $total_price = $_POST ["total_price"];
     $date = date ("Y-m-d");

     $koneksi->query ("INSERT INTO payment (order_id,name,bank,total_price,date,image)VALUES('$idpem','$name','$bank','$total_price','$date','$namafix')");

     $koneksi->query ("UPDATE orders SET payment_status='payment cleared' WHERE order_id='$idpem'");

     echo "<script>alert ('Thanks for submitting payment proof!');</script>";
     echo "<script>location='home.php';</script>";
   }
   ?>
 </section>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
 integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
 crossorigin="anonymous"></script>
 <script
 src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
 crossorigin="anonymous"></script>
 <footer class="container">
  <p style="text-align: center;">sxdslime &copy; 2020</p>
</footer>
</body>
</html>