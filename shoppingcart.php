<?php
session_start();

echo "<pre>";
//print_r($_SESSION['shoppingcart']);
echo "</pre>";

$koneksi= mysqli_connect ("fdb28.awardspace.net","3690530_sxdslime","Bismillah123","3690530_sxdslime");
if (empty ($_SESSION["shoppingcart"]) OR !isset($_SESSION["shoppingcart"]))
{
	echo "<script>alert('Shopping Cart is empty. Kindly buy some products first.');</script>";
	echo "<script>location='products.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <title>Shopping Cart</title>
 <link rel="icon" type="image/png" img src="assets/img/logo.png">
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
        <li class="nav-item active">
          <a class="nav-link" href="shoppingcart.php">Shopping Cart <span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a class="nav-link" href="checkout.php">Checkout</a>
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

  <!--konten -->
  <section class="konten">
   <div class="container">
    <hr>
    <hr>
    <hr>
    <hr>
    <h1>Shopping Cart</h1>
    <hr>
    <table class="table table-bordered">
     <thead class="thead-dark">
      <tr>
       <th>No</th>
       <th>Variant</th>
       <th>Price</th>
       <th>Amount</th>
       <th>Sub Price</th>
       <th>Action</th>
     </tr>
   </thead>
   <tbody>
    <?php $nomor=1; ?>
    <?php foreach ($_SESSION["shoppingcart"] as $product_id => $amount):?>
      <!-- menampilkan produk yang  sedang diperulang berdasarkan product_id -->
      <?php 
      $ambil = $koneksi->query ("SELECT * FROM pricelist WHERE product_id='$product_id'");	
      $pecah = $ambil -> fetch_assoc();
      $subharga = $pecah ["price"]*$amount;

      ?>
      <tr>
       <td><?php echo $nomor; ?></td>
       <td><?php echo $pecah ["variant"]; echo " ";echo $pecah ["size"]; ?></td>
       <td> Rp. <?php echo number_format($pecah ["price"]); ?></td>
       <td><?php echo $amount; ?></td>
       <td>Rp. <?php echo number_format($subharga); ?></td>
       <td><a href="detail.php?id=<?php echo $product_id?>" class="btn btn-primary btn-xs">UPDATE</a>
         <a href="delete.php?id=<?php echo $product_id?>" class="btn btn-danger btn-xs">DELETE</a></td>
       </tr>
       <?php $nomor++; ?>
     <?php endforeach ?>
   </tbody>
 </table>
 <a href="products.php" class="btn btn-secondary">Continue Shopping</a>
 <a href="checkout.php" class="btn btn-primary">Checkout</a>
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
</html>