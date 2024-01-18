<?php
session_start ();
$koneksi=new mysqli("fdb28.awardspace.net","3690530_sxdslime","Bismillah123","3690530_sxdslime");
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Checkout</title>
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
<section class="konten">
  <div class="container">
    <hr>
    <hr>
    <hr>
    <hr>
    <h1>Order Details</h1>
    <hr>
    <?php
    $ambil=$koneksi->query("SELECT *FROM orders WHERE orders.order_id='$_GET[id]'");
    $detail=$ambil-> fetch_assoc();
    ?>


    <div class="row">
      <div class="col-md-4">
        <h3>Order ID : <?php echo $detail['order_id'];?></h3>
        Date : <?php echo $detail['order_date'];?><br>
        <p>
          Total : Rp.  <?php echo number_format($detail ['total_price']);?>
        </p>
      </div>
      <div class="col-md-4">
        <h3>Customer</h3>
        Name : <?php echo $detail['name'];?><br>
        <p>
          Phone Number : <?php echo $detail ['phone_number'];?>
        </p>
      </div>
      <div class="col-md-4">
        <h3>Shipping</h3>
        Shipping Address : <?php echo $detail ['address'];?><br><br>
      </div>
    </div>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th>No</th>
          <th>Variant</th>
          <th>Price</th>
          <th>Amount</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $nomor=1; ?>
        <?php $ambil = $koneksi->query ("SELECT * FROM product_order JOIN pricelist ON product_order.product_id=pricelist.product_id WHERE product_order.order_id='$_GET[id]'");?>  
        <?php while ($pecah = $ambil -> fetch_assoc()){ ?>
          <tr>
            <td><?php echo $nomor; ?></td>
            <td><?php echo $pecah ["variant"];echo " ";echo $pecah ["size"]; ?></td>
            <td> Rp.<?php echo number_format($pecah ["price"]) ; ?></td>
            <td><?php echo $pecah['amount']; ?></td>
            <td> Rp. <?php echo number_format ($pecah['price']*$pecah['amount']) ; ?></td>
            <td>
              <a href="payment.php?id=<?php echo $pecah["order_id"];?>" class="btn btn-success">PAYMENT</a>
            </td>
          </tr>
          <?php $nomor++; ?>
        <?php }?>
      </tbody>
    </table>
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-info">
          <p>
            Kindly make a payment Rp. <?php echo  number_format($detail ['total_price']);?> to <br>
            <strong> DANA 0895367184605 AN. Vinda Alvionita</strong>
          </p>
        </div>
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
  <p style="text-align: center;">sxdslime &copy; 2020</p>
</footer>
</body>
</html>