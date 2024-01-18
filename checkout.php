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
 <link rel="icon" href="../../../../favicon.ico">
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
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shoppingcart.php">Shopping Cart</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="checkout.php">Checkout <span class="sr-only">(current)</span></a>
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
  <!--konten -->
  <section class="konten">
   <div class="container">
    <hr>
    <hr>
    <hr>
    <hr>
    <h1>Checkout</h1>
    <hr>
    <table class="table table-bordered">
     <thead class="thead-dark">
      <tr>
       <th>No</th>
       <th>Variant</th>
       <th>Price</th>
       <th>Amount</th>
       <th>Sub price</th>
     </tr>
   </thead>
   <tbody>
    <?php $nomor=1; ?>
    <?php $totalbelanja = 0; ?>
    <?php foreach ($_SESSION["shoppingcart"] as $product_id => $amount):?>
      <!-- menampilkan produk yang  sedang diperulang berdasarkan product_id -->
      <?php 
      $ambil = $koneksi->query ("SELECT * FROM pricelist WHERE product_id='$product_id'");	
      $pecah = $ambil -> fetch_assoc();
      $subharga = $pecah ["price"]*$amount;

      ?>
      <tr>
       <td><?php echo $nomor; ?></td>
       <td><?php echo $pecah ["variant"]; echo " "; echo $pecah ["size"];?></td>
       <td> Rp. <?php echo number_format($pecah ["price"]); ?></td>
       <td><?php echo $amount; ?></td>
       <td>Rp. <?php echo number_format($subharga); ?></td>

     </tr>
     <?php $nomor++; ?>
     <?php $totalbelanja+=$subharga;?>
   <?php endforeach ?>
 </tbody>
</tfoot>
<tr>
  <th colspan="4">Total Order</th>
  <th>Rp. <?php echo number_format($totalbelanja) ?></th>
</tr>
</table>

<form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name"><br>
    <label>Phone Number</label>
    <input type="text" class="form-control" name="phone_number"><br>
    <label>Shipping Address</label>
    <textarea class="form-control" name="address"></textarea>
  </div>
<button class="btn btn-primary" name="checkout">Checkout</button>
</form>
</div>
<?php
if (isset($_POST["checkout"]))
{
  $name = $_POST ["name"];
  $phone_number=$_POST ["phone_number"];
  $address=$_POST["address"];
  $order_date = date ("Y-m-d");
  $total_price =$totalbelanja;
    //1. menyimpan data ke tabel pembelian
  $koneksi->query("INSERT INTO orders (order_id,name,phone_number,address,order_date,total_price,payment_status) VALUES('','$name','$phone_number','$address','$order_date','$total_price','pending')");

    // mendapatkan id pembelian barsuan terjadi
  $recent_order_id=$koneksi->insert_id;

  foreach ($_SESSION["shoppingcart"] as $product_id => $amount) {
    $koneksi->query("INSERT INTO product_order (order_id, product_id, amount) VALUES('$recent_order_id','$product_id','$amount')");
  }
    // mengosongkan shoppingcart
  unset($_SESSION["shoppingcart"]);

    //tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
  echo "<script>alert('Order has been submitted.');</script>";
  echo "<script>location='nota.php?id=$recent_order_id';</script>";

  
}
?>
</section>
<pre><?php  //print_r($_SESSION["shoppingcart"])?></pre>
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